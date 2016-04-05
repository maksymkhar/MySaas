<?php

namespace App\Http\Controllers;

use App\User;
use DOMPDF;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Laravel\Cashier\Subscription;
use View;

class PDFController extends Controller
{
    public function invoiceHtml()
    {
        return $this->getInvoiceView();
    }

    public function downloadInvoice()
    {
        if (! defined('DOMPDF_ENABLE_AUTOLOAD')) {
            define('DOMPDF_ENABLE_AUTOLOAD', false);
        }

        if(file_exists($configPath = base_path() . '/vendor/dompdf/dompdf/dompdf_config.inc.php')) {
            require_once $configPath;
        }

        $dompdf = new Dompdf();
        $dompdf->load_html($this->getInvoiceView()->render());
        $dompdf->render();
        return $this->download($dompdf->output());
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

    public function getInvoiceView()
    {
        $invoice = new Invoice();

        $invoice->date = '12/5/2015';
        $invoice->id = 1;
        $invoice->startingBalance = 1235;
        $invoice->items = array('description' => 'Item desc', 'total' => 6789);
        $invoice->subscriptions = Subscription::all()->take(10);
        $invoice->hasDiscount = false;
        $invoice->tax_percent = 21;
        $invoice->tax = 88;
        $invoice->total = 124544;

        $data = array(
            'vendor' => 'MySaas',
            'user' => User::find(2),
            'invoice' => $invoice,
            'product' => 'Milk'
        );

        return view('invoices.invoice', $data);
    }

    public function pdfGenerator()
    {
        return view('invoices.pdf_generator');
    }

}

class Invoice { }
