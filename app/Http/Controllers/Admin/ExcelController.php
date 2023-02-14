<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ExcelRequest;
use App\Imports\Import;
use Excel;

class ExcelController extends Controller
{
    public function import(ExcelRequest $request) 
    {
        Excel::import(new Import, $request->file('file'));
        
        return redirect('/admin')->with('success', 'Import data sucessfully!');
    }
}
