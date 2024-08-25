<?php

namespace App\Imports;

use Carbon\Carbon;
use App\Models\PesertaCareerFest;
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
        return new PesertaCareerFest([
            'timestamp' => Carbon::createFromFormat('Y/m/d g:i:s A T', $row[0])->format('Y-m-d H:i:s'),
            'username' => $row[1],
            'username' => $row[1],
            'name' => $row[2],
            'no_wa' => $row[3],
            'asal_sekolah' => $row[4],
        ]);
    }
}
