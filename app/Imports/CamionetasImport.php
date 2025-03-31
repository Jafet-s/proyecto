<?php
namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Support\Facades\Http;

class CamionetasImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $index => $row) {
            if ($index == 0) continue; // Saltar la primera fila si es encabezado

            Http::post('http://localhost:3002/api/registro_camioneta', [
                
                'placas' => $row[0],
                'marca' => $row[1],
                'modelo' => $row[2],
                'capacidad' => $row[3],     

            ]);
        }
    }
}
