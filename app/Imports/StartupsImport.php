<?php


namespace App\Imports;

use App\Models\Startup;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StartupsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
       
        $userId = Auth::id();
        
        $leveFond = !empty($row['leve_fond']) ? $row['leve_fond'] : 'non';
        $montantFonds = !empty($row['montant_fonds']) ? $row['montant_fonds'] : 0;
        $dateLeveFond = !empty($row['date_leve_fond']) ? $row['date_leve_fond'] : null;


        $existingStartup = Startup::where('nom_startup', $row['nom_startup'])->first();


        if ($existingStartup) {
            $existingStartup->update([
                'description' => $row['description'],
                'partenariat_orange' => $row['partenariat_orange'],
                'date_creation' => $row['date_creation'],
                'ceo_co_fondateur' => $row['ceo_co_fondateur'],
                'logo' => $row['logo'],
                'adresses' => $row['adresses'],
                'site_web' => $row['site_web'],
                'filename' => $row['filename'],
                'video' => $row['video'],
                'email' => $row['email'],
                'leve_fond' => $leveFond,
                'montant_fonds' => $montantFonds,
                'date_leve_fond' => $dateLeveFond,
                'coordonnee' => $row['coordonnee'],
                'user_id' => $userId,
                'referent' => $row['referent'],
                'autre_part' => $row['autre_part'],
            ]);


            return $existingStartup;
        }


        return new Startup([
            'nom_startup' => $row['nom_startup'],
            'description' => $row['description'],
            'partenariat_orange' => $row['partenariat_orange'],
            'date_creation' => $row['date_creation'],
            'ceo_co_fondateur' => $row['ceo_co_fondateur'],
            'logo' => $row['logo'],
            'adresses' => $row['adresses'],
            'site_web' => $row['site_web'],
            'filename' => $row['filename'],
            'video' => $row['video'],
            'email' => $row['email'],
            'leve_fond' => $leveFond,
            'montant_fonds' => $montantFonds,
            'date_leve_fond' => $dateLeveFond,
            'coordonnee' => $row['coordonnee'],
            'user_id' => $userId,
            'referent' => $row['referent'],
            'autre_part' => $row['autre_part'],
        ]);
    }
}



