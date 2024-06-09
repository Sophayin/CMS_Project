<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ExportChannelPDF implements FromView
{
    public $channellist;
    public function __construct($channellist)
    {
        $this->channellist = $channellist;
    }
    public function view(): View
    {
        return view('exports.pdf.channel-export', [
            'channellist' => $this->channellist,
        ]);
    }
}
