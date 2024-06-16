<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // Import the PDF facade
use Carbon\Carbon;


class HomeController extends Controller
{
    //

    public function getPDF(Request $request) {
        //bring parameter to pdf
        $data = [
            'date' => Carbon::now(),
            'address' => $request->paddress,
            'salesperson' => json_decode($request->salesperson)
        ];

        $pdf = PDF::loadView('pdf.output', $data);
        return $pdf->stream('document.pdf');

    }
}
