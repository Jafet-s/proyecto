<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ClientesImport;
use App\Exports\ClientesExport;


class ControllerCliente extends Controller
{
    public function getDataCli(Request $request)
    {
        $searchTerm = $request->input('search', '');
        $page = $request->input('page', 1);

        $url = "http://localhost:3002/api/tb_cliente?page={$page}";
        if ($searchTerm) {
            $url .= "&search=" . urlencode($searchTerm);
        }

        $data = Http::get($url)->json();

        return view('clientes.getData', ['data' => $data]);
    }

    public function welcome()
    {
        return view('welcome');
    }
    public function getData2Cli($id)
    {
        // Hacemos una solicitud GET a una API externa
        $response = Http::get('http://localhost:3002/api/id_cliente/' . $id);




        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            $data = $response->json(); // Obtiene los datos en formato JSON

            //return view('getData2')->with(['data' => $data]);

            return view('clientes.getData2', compact('data')); // Pasamos los datos a una vista
        } else {
            return back()->withErrors('Error al obtener el registro.');
        }
    }

    public function deleteDataCli($id)
    {
        // Hacemos una solicitud DELETE a la API para eliminar el recurso
        $response = Http::delete('http://localhost:3002/api/eli_cliente/' . $id);

        // Verificamos si la solicitud fue exitosa
        if ($response->successful()) {
            return redirect('/consultar-apiCli')->with('message', 'Recurso eliminado correctamente');
        } else {
            return response()->json(['error' => 'Error al eliminar el recurso'], 500);
        }
    }

    public function showEditCli($id)
    {

        // Obtener los datos actuales de la API
        $response = Http::get('http://localhost:3002/api/id_cliente/' . $id);

        // Verificar si la solicitud fue exitosa
        if ($response->successful()) {
            // Obtener los datos del alumno
            $data = $response->json();


            // Retornar la vista con los datos del alumno
            return view('clientes.updateData', compact('data'));
        } else {
            // Si no se encuentra el recurso
            return back()->withErrors(['error' => 'Error al obtener los datos para actualizar.']);
        }
    }

    // Método para procesar la actualización
    public function actualizarCli(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'username' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
        ]);

        // Enviar los datos a la API para actualizar
        $response = Http::put('http://localhost:3002/api/act_cliente/' . $id, [
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'username' => $request->username,
            'correo' => $request->correo,
            'contraseña' => $request->contraseña, // Asegúrate de que coincida con la API
        ]);

        if ($response->successful()) {
            return redirect()->route('/consultar-apiCli')->with('success', 'Registro actualizado correctamente');
        } else {
            return back()->withErrors(['error' => 'Error al actualizar el registro.']);
        }
    }

    public function postDataCli(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'username' => 'required',
            'correo' => 'required',
            'contraseña' => 'required',
        ]);

        try {

            // Enviar los datos a la API para crear un nuevo registro
            $response = Http::post('http://localhost:3002/api/registro_cliente/', [
                'nombre' => $request->input('nombre'),
                'telefono' => $request->input('telefono'),
                'username' => $request->input('username'),
                'correo' => $request->input('correo'),
                'contraseña' => $request->input('contraseña'),
            ]);

            // Verificar si la solicitud fue exitosa
            if ($response->successful()) {
                return redirect()->route('/consultar-apiCli')->with('success', 'Registro creado correctamente');
            } else {
                // Mostrar el mensaje de error de la API si está disponible
                $errorMessage = $response->json()['message'] ?? 'Error al crear el registro.';
                return back()->withErrors(['error' => $errorMessage]);
            }
        } catch (\Exception $e) {
            // Mostrar el mensaje de error general si no se pudo conectar con la API
            return back()->withErrors(['error' => 'Error al conectar con la API.']);

        }

    }


    // Vista de formulario para crear un nuevo registro (cambia el nombre de la función)
    public function showFormCli()
    {
        return view('clientes.postData');
    }


    public function importClientes(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(new ClientesImport, $request->file('file'));

        return redirect()->back()->with('success', 'Registros importados correctamente');
    }



    public function exportarClientes()
    {
        return Excel::download(new ClientesExport, 'clientes.xlsx');
    }




}
