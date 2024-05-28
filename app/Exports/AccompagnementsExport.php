<?php

namespace App\Exports;

use App\Models\Accompagnement;
use Maatwebsite\Excel\Concerns\FromCollection;

class AccompagnementsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Accompagnement::all();
    }
}
