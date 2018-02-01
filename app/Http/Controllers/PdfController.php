<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function index()
    {
        $data = ['name'=>'Test'];
        $pdf = PDF::loadView('pdf.invoice',compact('data'));
        return $pdf->download('invoice.pdf');
    }
}
