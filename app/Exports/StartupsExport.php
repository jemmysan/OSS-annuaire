<?php

namespace App\Exports;

use App\Models\Startup;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StartupsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
         return Startup::all();
    }

    public function headings(): array
    {
        return array_keys($this->collection()->first()->toArray());

        /*return [
            'nom_startup' ,
            'description',
            'partenariat_orange',
            'date_creation' ,
            'ceo_co_fondateur',
            'logo',
            'adresses',
            'site_web',
            'filename',
            'video',
            'email',
            'leve_fond',
            'montant_fonds',
            'date_leve_fond',
            'coordonnee',
            'user_id',
            'referent',
            'autre_part',

        ];*/
    }
}
