<?php

namespace App\Imports;

namespace App\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;


class Import implements WithMultipleSheets 
{
   
    public function sheets(): array
    {

        return [
            new TableSheetImport(),
          //  new CategorySheetImport(),
          //  new MenuSheetImport(),
        ];
    }
}