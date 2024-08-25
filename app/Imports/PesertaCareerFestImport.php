<?php

namespace App\Imports;

use App\Models\PesertaCareerFest;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class PesertaCareerFestImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        Log::info($row[0]);
        return new PesertaCareerFest([
            'timestamp' => $row[0],
            'username' => $row[1],
            'name' => $row[2],
            'no_wa' => $row[3],
            'asal_sekolah' => $row[4],
        ]);
    }
}
