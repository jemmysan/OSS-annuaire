<?php

namespace App\Imports;

use App\Models\Startup;
use Maatwebsite\Excel\Concerns\ToModel;

class StartupsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Startup([
            'nom_startup' => $row['0'],
            'description' => $row['1'],
            'partenariat_orange' => $row['2'],
            'date_creation' => $row['3'],
            'ceo_co_fondateur' => $row['4'],
            'logo' => $row['5'],
            'adresses' => $row['6'],
            'site_web' => $row['7'],
            'filename' => $row['8'],
            'video' => $row['9'],
            'email' => $row['10'],
            'leve_fond' => $row['11'],
            'montant_fonds' => $row['12'],
            'date_leve_fond' => $row['13'],
            'coordonnee' => $row['14'],
            'user_id' => $row['15'],
            'referent' => $row['16'],
            'autre_part' => $row['17'],

        ]);
    }
}
