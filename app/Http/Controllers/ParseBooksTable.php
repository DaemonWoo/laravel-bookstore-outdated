<?php

namespace App\Http\Controllers;

use App\Imports\GoogleSheetsImport;
use Maatwebsite\Excel\Facades\Excel;

class ParseBooksTable extends Controller
{
    private $filePath = 'https://docs.google.com/spreadsheets/d/1LpyjeuO9Tz7zN4myiDSt1AVlGn9PFd4l/edit#gid=682307266';

    public function import()
    {
        $import = new GoogleSheetsImport();
        Excel::import($import, $this->filePath);
        $data = $import->getData();
        dd($data);

        // process the imported data as needed
    }
}
