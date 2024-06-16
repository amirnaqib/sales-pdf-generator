<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Import the PDF facade


class HomeController extends Controller
{
    //
    public function generatePdf() {
        {
            $data = [
                'title' => 'Welcome to Laravel PDF Generation',
                'date' => date('m/d/Y')
            ];
    
            $pdf = PDF::loadView('pdf.output', $data);
    
            // return $pdf->download('document.pdf'); // To force download the PDF
            return $pdf->stream('document.pdf'); // To stream the PDF in the browser
        }
    }

    public function submitToPDF() {
        
    }

    public function viewOutput() {
        return view('pdf.output');
    }
}
