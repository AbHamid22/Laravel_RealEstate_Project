<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MoneyReceipt;
use App\Models\MoneyReceiptDetail;
use Illuminate\Http\Request;

class MoneyReceiptController  extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mr = MoneyReceipt::all();
        return response()->json($mr);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $moneyreceipt = new MoneyReceipt;
        $moneyreceipt->customer_id = $request->customer_id;
        $moneyreceipt->remark = $request->remark;
        $moneyreceipt->receipt_total = $request->receipt_total;
        $moneyreceipt->discount = $request->discount;
        $moneyreceipt->vat = $request->vat;
        // date_default_timezone_set("Asia/Dhaka");
        // $moneyreceipt->created_at = date('Y-m-d H:i:s');
        // date_default_timezone_set("Asia/Dhaka");
        // $moneyreceipt->updated_at = date('Y-m-d H:i:s');



        $moneyreceipt->save();

          $items = $request->items;
        foreach ($items as $item) {
            $details = new MoneyReceiptDetail();
            $details->money_receipt_id = $moneyreceipt->id;
            $details->property_id = $item["property_id"];
            $details->amount = $item["amount"];
            $details->flat_no = $item["flat_no"];
            $details->discount = $item["discount"];
            $details->save();
        }
        $data = [
            "id" => $moneyreceipt->id,
            "msg" => "Success"
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
