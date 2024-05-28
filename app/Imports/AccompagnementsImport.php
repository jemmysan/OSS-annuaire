<?php

namespace App\Imports;

use App\Models\Accompagnement;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AccompagnementsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Accompagnement([
            'nom_structure' => $row['nom_structure'],
            'description'  => $row['description'],
            'partenariat_orange'  => $row['partenariat_orange'],
            'nom_partenariat'  => $row['nom_partenariat'],
            'nom_prenom_directeur'  => $row['nom_prenom_directeur'],
            'adresses'  => $row['adresses'],
            'coordonnee'  => $row['coordonnee'],
            'site_web'  => $row['site_web'],
            'email'  => $row['email'],
            'commentaire'  => $row['commentaire'],
            'user_id'  => $row['user_id'],


        ]);
    }
}
