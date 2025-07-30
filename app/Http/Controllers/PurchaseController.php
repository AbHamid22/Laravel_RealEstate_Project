<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Vendor;
use App\Models\Warehouse;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PurchaseController extends Controller
{

	public function index(Request $request)
	{
		$query = Purchase::with(['vendor', 'warehouse', 'status']);

		  if ($request->filled('search')) {
        $search = $request->input('search');

        $query->where(function($q) use ($search) {
            $q->where('id', $search)  // exact match on purchase id
              ->orWhereHas('vendor', function ($q2) use ($search) {
                  $q2->where('name', 'like', "%{$search}%"); // vendor name partial match
              })
              ->orWhereHas('warehouse', function ($q3) use ($search) {
                  $q3->where('name', 'like', "%{$search}%"); // warehouse name partial match
              })
              ->orWhereHas('status', function ($q4) use ($search) {
                  $q4->where('name', 'like', "%{$search}%"); // status name partial match
              });
        });
    }
		$purchases = $query->orderBy('id', 'desc')->paginate(5);

		return view("pages.purchase.index", ["purchases" => $purchases]);
	}


	public function create()
	{
		return view("pages.purchase.create", ["vendors" => Vendor::all(), "warehouses" => Warehouse::all(), "status" => Status::all()]);
	}
	public function store(Request $request)
	{
		//Purchase::create($request->all());
		$purchase = new Purchase;
		$purchase->vendor_id = $request->vendor_id;
		$purchase->warehouse_id = $request->warehouse_id;
		$purchase->purchase_date = $request->purchase_date;
		$purchase->delivery_date = $request->delivery_date;
		$purchase->purchase_total = $request->purchase_total;
		$purchase->paid_amount = $request->paid_amount;
		$purchase->status_id = $request->status_id;
		$purchase->discount = $request->discount;
		$purchase->vat = $request->vat;
		date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at = date('Y-m-d H:i:s');

		$purchase->save();

		return back()->with('success', 'Created Successfully.');
	}

	public function show($id)
	{
		echo $id;
		$purchase = Purchase::find($id);

		return view("pages.purchase.show", ["purchase" => $purchase]);
	}


	public function edit(Purchase $purchase)
	{
		return view("pages.purchase.edit", ["purchase" => $purchase, "vendors" => Vendor::all(), "warehouses" => Warehouse::all(), "status" => Status::all()]);
	}
	public function update(Request $request, Purchase $purchase)
	{
		//Purchase::update($request->all());
		$purchase = Purchase::find($purchase->id);
		$purchase->vendor_id = $request->vendor_id;
		$purchase->warehouse_id = $request->warehouse_id;
		$purchase->purchase_date = $request->purchase_date;
		$purchase->delivery_date = $request->delivery_date;
		$purchase->purchase_total = $request->purchase_total;
		$purchase->paid_amount = $request->paid_amount;
		$purchase->status_id = $request->status_id;
		$purchase->discount = $request->discount;
		$purchase->vat = $request->vat;
		date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at = date('Y-m-d H:i:s');

		$purchase->save();

		return redirect()->route("purchases.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Purchase $purchase)
	{
		$purchase->delete();
		return redirect()->route("purchases.index")->with('success', 'Deleted Successfully.');
	}
}
