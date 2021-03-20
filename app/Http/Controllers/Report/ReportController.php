<?php

namespace App\Http\Controllers\report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;

use App\Exports\CaseExport;
use Maatwebsite\Excel\Facades\Excel;

use App\Models\Track;
use App\Models\Province;

class ReportController extends Controller
{
    public function pdfLocal()
    {
        $local = Track::with('rw.subdist.district.city.province')->get();
        $pdf = PDF::loadview('report.index', compact('local'));
        return $pdf->download('laporan_covid.pdf');
    }

    public function xlsLocal()
    {
        return Excel::download(new CaseExport, 'laporan_covid.xlsx');
    }

    public function pdfProv()
    {
        $prov = Province::all();
        $pdf = PDF::loadview('report.province', compact('prov'));
        return $pdf->download('laporan_provinsi.pdf');
    }
}
