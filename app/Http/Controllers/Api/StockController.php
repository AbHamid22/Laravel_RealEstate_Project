<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Uom;
use App\Models\TransactionType;
use App\Models\Warehouse;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class StockController extends Controller
{
    // List paginated stocks
    public function index()
    {
        $stocks = Stock::with(['product', 'uom', 'transactionType', 'warehouse'])->paginate(10);
        return response()->json($stocks);
    }

    // Show single stock
    public function show($id)
    {
        $stock = Stock::with(['product', 'uom', 'transactionType', 'warehouse'])->find($id);

        if (!$stock) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        return response()->json($stock);
    }

    // Store new stock
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'uom_id' => 'required|exists:uoms,id',
            'qty' => 'required|numeric',
            'transaction_type_id' => 'required|exists:transaction_types,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'remark' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $stock = Stock::create($request->all());

        return response()->json(['message' => 'Created Successfully.', 'data' => $stock], 201);
    }

    // Update stock
    public function update(Request $request, $id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'uom_id' => 'required|exists:uoms,id',
            'qty' => 'required|numeric',
            'transaction_type_id' => 'required|exists:transaction_types,id',
            'warehouse_id' => 'required|exists:warehouses,id',
            'remark' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $stock->update($request->all());

        return response()->json(['message' => 'Updated Successfully.', 'data' => $stock]);
    }

    // Delete stock
    public function destroy($id)
    {
        $stock = Stock::find($id);

        if (!$stock) {
            return response()->json(['message' => 'Stock not found'], 404);
        }

        $stock->delete();

        return response()->json(['message' => 'Deleted Successfully.']);
    }

    
    public function balance()
{
    $summary = DB::table('stocks')
        ->join('products', 'products.id', '=', 'stocks.product_id')
        ->join('uoms', 'uoms.id', '=', 'stocks.uom_id')
        ->select(
            'products.id as product_id',
            'products.name as product',
            'uoms.name as uom',
            DB::raw('SUM(laravel_stocks.qty) as total')
        )
        ->groupBy('stocks.product_id', 'products.id', 'products.name', 'uoms.name')
        ->get();

    return response()->json(['summary' => $summary]);
}





    // Issue stock to a project
    public function issue(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'uom_id' => 'required|exists:uoms,id',
            'qty' => 'required|numeric|min:1',
            'warehouse_id' => 'required|exists:warehouses,id',
            'project_id' => 'required|exists:projects,id',
            'remark' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $currentStock = Stock::where('product_id', $request->product_id)
            ->where('uom_id', $request->uom_id)
            ->where('warehouse_id', $request->warehouse_id)
            ->sum('qty');

        if ($currentStock < $request->qty) {
            return response()->json(['error' => 'Not enough stock available!'], 400);
        }

        $transactionTypeId = TransactionType::where('name', 'Issue')->value('id') ?? 2;

        $stock = new Stock;
        $stock->product_id = $request->product_id;
        $stock->uom_id = $request->uom_id;
        $stock->qty = -abs($request->qty);
        $stock->transaction_type_id = $transactionTypeId;
        $stock->warehouse_id = $request->warehouse_id;
        $stock->project_id = $request->project_id;
        $stock->remark = $request->remark ?? 'Issued to project';
        $stock->save();

        return response()->json(['message' => 'Stock issued successfully.', 'data' => $stock]);
    }

    // Manage all issues
    public function manageIssues()
    {
        $issueTypeId = TransactionType::where('name', 'Issue')->value('id') ?? 2;

        $issues = Stock::with(['project', 'product', 'uom', 'warehouse'])
            ->where('transaction_type_id', $issueTypeId)
            ->orderByDesc('created_at')
            ->get();

        return response()->json(['issues' => $issues]);
    }
}
