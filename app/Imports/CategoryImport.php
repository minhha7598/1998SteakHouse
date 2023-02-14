<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategorySheetImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'name'     => $row['name'],
            'image'     => $row['image'],
            'description'     => $row['description'],
        ]);
    }

    public function uniqueBy()
    {
        return ['name', 'image', 'description'];
    }
}
