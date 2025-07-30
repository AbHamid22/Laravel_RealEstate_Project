<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Stock;
use function PHPUnit\Framework\returnArgument;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $orders=Order::all();
       print_r("$orders");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order=new Order();
        $order->customer_id=$request->customer_id;
        $order->order_date=date("Y-m-d");
        $order->handover_date=date("Y-m-d");
        $order->total_amount=$request->total_amount;
        $order->paid_amount=$request->paid_amount;
        $order->discount=0;
        $order->remark=$request->remark;
        $order->created_at=date("Y-m-d");
        $order->updated_at=date("Y-m-d");
        $order->save();

          $items=$request->items;

          foreach($items as $item){
            $details=new OrderDetail();
            $details->order_id=$order->id;
            $details->property_id=$item["property_id"];
            $details->flat_no=$item["flat_no"];
            $details->amount=$item["amount"];
            $details->discount=$item["discount"];
            
            $details->save();

            // $stock=new Stock();
            // $stock->product_id=$item["product_id"];
            // $stock->transaction_type_id=1;
            // $stock->qty=$item["qty"];       
            // $stock->remark="Purchase";  
            // $stock->warehouse_id=1;  
            // //$stock->timestamps = false;
            // $stock->save();

          }


        $data=[   
            "id"=>$order->id,          
            "msg"=>"Success"
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
