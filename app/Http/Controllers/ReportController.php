<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function exportPdf()
    {
        $wisatas = Wisata::all();
        $data = [
            'title' => 'Laporan Destinasi Wisata Surabaya',
            'date' => date('d/m/Y'),
            'wisatas' => $wisatas
        ];

        $pdf = Pdf::loadView('admin.reports.wisata_pdf', $data);
        return $pdf->download('laporan-wisata-surabaya.pdf');
    }
}
