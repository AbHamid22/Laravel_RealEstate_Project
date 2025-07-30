<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Uom;
use App\Models\TransactionType;
use App\Models\Warehouse;
use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class StockController extends Controller
{
	public function index()
	{
		$stocks = Stock::with(['product', 'uom', 'transactionType', 'warehouse'])->paginate(5);
		return view("pages.stock.index", ["stocks" => $stocks]);
	}

public function balance(Request $request)
{
    
    $summary = DB::table('stocks')
        ->join('products', 'products.id', '=', 'stocks.product_id')
        ->join('transaction_types', 'transaction_types.id', '=', 'stocks.transaction_type_id')
        ->join('uoms', 'uoms.id', '=', 'stocks.uom_id') 
        ->select(
            'products.id',
            'products.name as product',
            'uoms.name as uom', 
            DB::raw('SUM(laravel_stocks.qty) as total')
        )
        ->groupBy('stocks.product_id', 'products.id', 'products.name', 'uoms.name')
        ->get();

    return view("pages.stock.balance", ["summary" => $summary]);
}


	public function create()
	{
		return view("pages.stock.create", ["products" => Product::all(), "uom" => Uom::all(), "transaction_types" => TransactionType::all(), "warehouses" => Warehouse::all()]);
	}
	public function store(Request $request)
	{
		//Stock::create($request->all());
		$stock = new Stock;
		$stock->product_id = $request->product_id;
		$stock->uom_id = $request->uom_id;
		$stock->qty = $request->qty;
		$stock->transaction_type_id = $request->transaction_type_id;
		$stock->warehouse_id = $request->warehouse_id;
		$stock->remark = $request->remark;
		date_default_timezone_set("Asia/Dhaka");
		$stock->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$stock->updated_at = date('Y-m-d H:i:s');

		$stock->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$stock = Stock::find($id);
		return view("pages.stock.show", ["stock" => $stock]);
	}
	public function edit(Stock $stock)
	{
		return view("pages.stock.edit", ["stock" => $stock, "products" => Product::all(), "uom" => Uom::all(), "transaction_types" => TransactionType::all(), "warehouses" => Warehouse::all()]);
	}
	public function update(Request $request, Stock $stock)
	{
		//Stock::update($request->all());
		$stock = Stock::find($stock->id);
		$stock->product_id = $request->product_id;
		$stock->uom_id = $request->uom_id;
		$stock->qty = $request->qty;
		$stock->transaction_type_id = $request->transaction_type_id;
		$stock->warehouse_id = $request->warehouse_id;
		$stock->remark = $request->remark;
		date_default_timezone_set("Asia/Dhaka");
		$stock->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$stock->updated_at = date('Y-m-d H:i:s');

		$stock->save();

		return redirect()->route("stocks.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Stock $stock)
	{
		$stock->delete();
		return redirect()->route("stocks.index")->with('success', 'Deleted Successfully.');
	}

	public function createIssue()
	{
		return view('pages.stock.issue', [
			'products' => Product::all(),
			'uoms' => Uom::all(),
			'warehouses' => Warehouse::all(),
			'projects' => Project::all(),
		]);
	}

	public function storeIssue(Request $request)
	{
		$request->validate([
			'product_id' => 'required|exists:products,id',
			'uom_id' => 'required|exists:uoms,id',
			'qty' => 'required|numeric|min:1',
			'warehouse_id' => 'required|exists:warehouses,id',
			'project_id' => 'required|exists:projects,id',
		]);

	
		$currentStock = \App\Models\Stock::where('product_id', $request->product_id)
			->where('uom_id', $request->uom_id)
			->where('warehouse_id', $request->warehouse_id)
			->sum('qty');

		if ($currentStock < $request->qty) {
			return back()->withErrors(['qty' => 'Not enough stock available!']);
		}

		$stock = new \App\Models\Stock;
		$stock->product_id = $request->product_id;
		$stock->uom_id = $request->uom_id;
		$stock->qty = -abs($request->qty); 
		$stock->transaction_type_id = \App\Models\TransactionType::where('name', 'Issue')->value('id') ?? 2; // Use 'Issue' type
		$stock->warehouse_id = $request->warehouse_id;
		$stock->project_id = $request->project_id;
		$stock->remark = $request->remark ?? 'Issued to project';
		$stock->save();

		return redirect()->route('stock.issue.create')->with('success', 'Product issued to project and stock decreased.');
	}

	public function manageIssue()
	{
		$issueTypeId = \App\Models\TransactionType::where('name', 'Issue')->value('id') ?? 2;
		$issues = \App\Models\Stock::with(['project', 'product', 'uom', 'warehouse'])
			->where('transaction_type_id', $issueTypeId)
			->orderByDesc('created_at')
			->get();
		return view('pages.stock.manage', compact('issues'));
	}
}
