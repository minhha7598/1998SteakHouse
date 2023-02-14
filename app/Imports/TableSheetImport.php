<?php

namespace App\Imports;

use App\Models\Table;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpserts;

class TableSheetImport implements ToModel, WithHeadingRow, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Table([
            'name'     => $row['name'],
            'guest_number'     => $row['guest_number'],
            'status'     => $row['status'],
            'location'     => $row['location'],
        ]);
    }

    public function uniqueBy()
    {
        return ['name', 'guest_number', 'status', 'location'];
    }
}
