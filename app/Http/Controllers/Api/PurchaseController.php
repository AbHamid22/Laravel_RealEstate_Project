<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $purchases = Purchase::with(['vendor', 'warehouse', 'status'])
            ->orderBy('id', 'desc')
            ->paginate(10);
        return response()->json($purchases);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $purchase = new Purchase();
        $purchase->vendor_id = $request->vendor_id;
        $purchase->warehouse_id = $request->warehouse_id;
        $purchase->purchase_date = date("Y-m-d H:i:s");
        $purchase->delivery_date = date("Y-m-d H:i:s");

        $purchase->purchase_total = $request->purchase_total;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->status_id = 5;
        $purchase->discount = $request->discount;
        $purchase->vat = 5;

        $purchase->save();

        $items = $request->items;
        foreach ($items as $item) {
            $purchasedetails = new PurchaseDetail();
            $purchasedetails->purchase_id = $purchase->id;
            $purchasedetails->product_id = $item["product_id"];
            $purchasedetails->qty = $item["qty"];
            $purchasedetails->uom_id = $item['uom_id'];
            $purchasedetails->price = $item["price"];
            $purchasedetails->item_vat = 0;
            $purchasedetails->item_discount = 5;

            $purchasedetails->save();

            $stock = new Stock();
            $stock->product_id = $item["product_id"];
            $stock->uom_id = $item["uom_id"];
            $stock->qty = $item["qty"];
            $stock->transaction_type_id = 3;
            $stock->warehouse_id = 1;
            $stock->remark = "yes";
            $stock->save();
        }
        return response()->json([
            'success' => true,
            'message' => 'Purchase saved successfully.',
            'id' => $purchase->id
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $purchase = \App\Models\Purchase::find($id);

        if (!$purchase) {
            return response()->json([
                'error' => 'Purchase not found',
                'purchase' => null
            ], 404);
        }

        $vendor = \App\Models\Vendor::find($purchase->vendor_id);
        $items = \App\Models\PurchaseDetail::where('purchase_id', $id)->get();
        $company = \App\Models\Company::first();

        return response()->json([
            'purchase' => $purchase,
            'vendor' => $vendor,
            'items' => $items,
            'company' => $company
        ]);
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
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['message' => 'Purchase not found.'], 404);
        }

        // Optional: delete related purchase details and stock
        PurchaseDetail::where('purchase_id', $purchase->id)->delete();
        Stock::where('transaction_type_id', 3)->where('product_id', $purchase->id)->delete();

        $purchase->delete();

        return response()->json(['message' => 'Purchase deleted successfully.']);
    }
}
