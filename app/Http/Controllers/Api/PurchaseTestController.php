<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    // GET /api/purchases
    public function index()
    {
        $purchases = Purchase::with(['vendor', 'warehouse', 'status'])->paginate(10);
        return response()->json($purchases);
    }

    // POST /api/purchases
    public function store(Request $request)
    {
        $purchase = Purchase::create([
            'vendor_id' => $request->vendor_id,
            'warehouse_id' => $request->warehouse_id,
            'purchase_date' => $request->purchase_date,
            'delivery_date' => $request->delivery_date,
            'purchase_total' => $request->purchase_total,
            'paid_amount' => $request->paid_amount,
            'status_id' => $request->status_id,
            'discount' => $request->discount,
            'vat' => $request->vat,
        ]);

        return response()->json([
            'message' => 'Purchase created successfully.',
            'data' => $purchase,
        ]);
    }

    // GET /api/purchases/{id}
    public function show($id)
    {
        $purchase = Purchase::with(['vendor', 'warehouse', 'status'])->findOrFail($id);
        return response()->json($purchase);
    }

    // PUT /api/purchases/{id}
    public function update(Request $request, $id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->update($request->all());

        return response()->json([
            'message' => 'Purchase updated successfully.',
            'data' => $purchase,
        ]);
    }

    // DELETE /api/purchases/{id}
    public function destroy($id)
    {
        $purchase = Purchase::findOrFail($id);
        $purchase->delete();

        return response()->json([
            'message' => 'Purchase deleted successfully.',
        ]);
    }
}
