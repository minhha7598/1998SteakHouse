<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class MenuSheetImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Menu([
            'name'     => $row['name'],
            'price'     => $row['price'],
            'quantity'     => $row['quantity'],
            'description'     => $row['description'],
            'image'     => $row['image'],
        ]);
    }

    public function uniqueBy()
    {
        return ['name', 'price', 'quantity', 'description', 'image'];
    }
}
