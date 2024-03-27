<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Invoice\PatchInvoiceRequest;
use App\Http\Requests\Invoice\PostInvoiceRequest;
use App\Http\Resources\Invoice\InvoiceResource;
use App\Models\Customer;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;


class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $invoices = Invoice::with('customer')->get();

        return InvoiceResource::collection($invoices);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostInvoiceRequest $request)
    {
        try {
            dump($request->validated());
            $invoice = Invoice::create($request->validated());
            return new InvoiceResource($invoice);
        } catch (\Exception $e) {
            dump($e);
            return response()->json(['error' => 'Controller says: Failed to create invoice.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice->load('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PatchInvoiceRequest $request, Invoice $invoice)
    {
        try {
            $invoice->update($request->validated());
            return $invoice;
        } catch (\Exception $e) {
            return response()->json(['error' => 'Controller says: Failed to update invoice.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        //
    }

    public function downloadPdf(Invoice $invoice)
    {
        $invoice->load('customer');

        $symbol = match($invoice->currency) {
            'usd' => '$',
            'eur' => '€',
            'pln' => 'zł',
            default => '',
        };

        $data = [
            [
                'number' => $invoice->number,
                'quantity' => 1,
                'amount' => $invoice->amount,
                'customer' => $invoice->customer,
                'date' => $invoice->date->format('Y-m-d'),
                'service_date' => $invoice->service_date->format('Y-m-d'),
                'product_id' => $invoice->product_id,
                'currencySymbol' => $symbol,
//                'amountInWords' => $words
            ]
        ];
        dump($data);

        $pdf = Pdf::loadView('pdf', ['data' => $data]);
        return $pdf->download("invoice-{$invoice->number}.pdf");
    }

}
