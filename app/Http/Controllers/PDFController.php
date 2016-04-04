<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;

class PDFController extends Controller
{
    public function downloadInvoice()
    {
        return view('invoice');
    }

    public function download($pdf)
    {
        //$filename = 'test' . '_'.$this->date()->month . '_' . $this->date()->year . '.pdf';

        $filename = "test.pdf";

        return new Response($pdf, 200, [
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => 'attachment; filename="'.$filename.'"',
            'Content-Transfer-Encoding' => 'binary',
            'Content-Type' => 'application/pdf',
        ]);
    }
}
