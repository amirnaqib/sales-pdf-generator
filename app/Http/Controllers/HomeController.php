<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function generatePdf() {
        echo('test');
    }

    public function viewOutput() {
        return view('pdf.output');
    }
}
