<?php

namespace App\Exports;

use App\Models\PointHistory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportsExampleController implements FromCollection, WithHeadings
{
    //add construct if needed

    public function collection() {
        return collect();
    }


    // add heading from parents if needed
}
