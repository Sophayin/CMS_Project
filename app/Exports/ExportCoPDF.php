<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportCoPDF implements FromView
{
    public $Colist;
    public function __construct($Colist)
    {
        $this->Colist = $Colist;
    }
    public function view(): View
    {
        return view('exports.pdf.co-export-list', [
            'Colist' => $this->Colist,
        ]);
    }
}
