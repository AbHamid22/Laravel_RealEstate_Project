<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MoneyReceipt;
use App\Models\MoneyReceiptDetail;
use Illuminate\Http\Request;

class MoneyReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {

        $mr = MoneyReceipt::with('customer')
            ->orderBy('id', 'desc')
            ->paginate(10);

        return response()->json($mr);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Optional: add validation here
            // $request->validate([...]);

            $moneyreceipt = new MoneyReceipt;
            $moneyreceipt->customer_id = $request->customer_id;
            $moneyreceipt->remark = $request->remark;
            $moneyreceipt->total_amount = $request->total_amount;
            $moneyreceipt->discount = $request->discount;
            $moneyreceipt->vat = $request->vat;
            $moneyreceipt->payment_method = $request->payment_method;
            $moneyreceipt->paid_amount = $request->paid_amount;
            $moneyreceipt->save();

            $items = $request->items;
            foreach ($items as $item) {
                $details = new MoneyReceiptDetail();
                $details->money_receipt_id = $moneyreceipt->id;
                $details->property_id = $item["property_id"];
                $details->amount = $item["amount"];
                $details->project_id = $item["project_id"];
                $details->discount = $item["discount"];
                $details->save();
            }

            return response()->json([
                "id" => $moneyreceipt->id,
                "msg" => "Success"
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile(),
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $receipt = MoneyReceipt::with('customer')->findOrFail($id);
            $details = MoneyReceiptDetail::with(['property', 'project'])->where('money_receipt_id', $id)->get();
            $company = \App\Models\Company::find(1);

            $items = $details->map(function ($item) {
                return [
                    'property' => [
                        'title' => optional($item->property)->title ?? 'N/A',
                    ],
                    'project' => [
                        'name' => optional($item->project)->name ?? 'N/A',
                    ],
                    'property_id' => $item->property_id,
                    'project_id' => $item->project_id,
                    'amount' => $item->amount,
                    'discount' => $item->discount,
                ];
            });

            return response()->json([
                'moneyreceipt' => $receipt,
                'customer'     => $receipt->customer,
                'company'      => $company,
                'items'        => $items,
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function nextReceiptNo()
    {
        $last = \App\Models\MoneyReceipt::latest('id')->first();
        $next = $last ? $last->id + 1 : 1;

        return response()->json(['next_receipt_no' => $next]);
    }
}
