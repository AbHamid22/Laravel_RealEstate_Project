<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Company;
use App\Models\InvoiceDetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $invoices = Invoice::with('customer')
         ->orderBy('id', 'desc')
         ->paginate(10);
        return response()->json($invoices);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $invoice = new Invoice();
        $invoice->customer_id = $request->customer_id;
        $invoice->total_amount = $request->total_amount;
        $invoice->status = $request->status;

        $invoice->remark = $request->remark;
        $invoice->issue_date = date('Y-m-d', strtotime($request->issue_date));
        $invoice->due_date = date('Y-m-d', strtotime($request->due_date));

        // date_default_timezone_set("Asia/Dhaka");
        // $invoice->created_at = date('Y-m-d H:i:s');
        // date_default_timezone_set("Asia/Dhaka");
        // $invoice->updated_at = date('Y-m-d H:i:s');

        $invoice->save();

        $items = $request->items;
        foreach ($items as $item) {
            $details = new InvoiceDetail();
            $details->invoice_id = $invoice->id;
            $details->property_id = $item["property_id"];
            $details->amount = $item["amount"];
            $details->project_id = $item["project_id"];
            $details->discount = $item["discount"];
            $details->save();
        }
        $data = [
            "id" => $invoice->id,
            "msg" => "Success"
        ];

        return response()->json($data);
    }
    public function show($id)
    {
        try {
            $invoice = Invoice::with(['customer', 'items.property', 'items.project'])->find($id);
            
            if (!$invoice) {
                return response()->json(['message' => 'Invoice not found with ID: ' . $id], 404);
            }

            if (!$invoice->customer) {
                return response()->json(['message' => 'Customer not found for invoice ID: ' . $id], 404);
            }

            if ($invoice->items->isEmpty()) {
                return response()->json(['message' => 'No items found for invoice ID: ' . $id], 404);
            }

            $company = Company::find(1);
            if (!$company) {
                return response()->json(['message' => 'Company information not found'], 404);
            }

            return response()->json([
                'invoice' => $invoice,
                'customer' => $invoice->customer,
                'company' => $company,
                'items' => $invoice->items,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error retrieving invoice',
                'error' => $e->getMessage(),
                'trace' => config('app.debug') ? $e->getTraceAsString() : null
            ], 500);
        }
    }





    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
}
