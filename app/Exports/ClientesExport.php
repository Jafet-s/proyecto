<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\Http;

class ClientesExport implements FromArray
{
    public function array(): array
    {
        // Obtener datos de la API
        $response = Http::get('http://localhost:3002/api/tb_cliente');

        if ($response->successful()) {
            return $response->json(); // Retorna los datos en formato array
        }

        return []; // Si falla, retorna un array vacío
    }
}
