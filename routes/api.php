<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\ContractorController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\InvoiceController;
use App\Http\Controllers\Api\MoneyReceiptController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProgresseController;
use App\Http\Controllers\Api\PurchaseController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ProjectCostingController;
use App\Http\Controllers\Api\ProjectPersonController;
use App\Http\Controllers\Api\ProjectStatusController;
use App\Http\Controllers\Api\ProjectTypeController;
use App\Http\Controllers\Api\PropertyController;
use App\Http\Controllers\Api\StockController;
use App\Http\Controllers\Api\VendorController;
use App\Http\Controllers\Api\WarhouseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/stock-balance', [StockController::class, 'balance']);
Route::get('/invoices/latest', [InvoiceController::class, 'latest']);
Route::get('/moneyreceipts/next-no', [MoneyReceiptController::class, 'nextReceiptNo']);


Route::apiResources([
    'projects' => ProjectController::class,
    'purchases' => PurchaseController::class,
    'orders' => OrderController::class,
    'invoices' => InvoiceController::class,
    'moneyreceipts' => MoneyReceiptController::class,
    

    'properties' => PropertyController::class,
    'vendors' => VendorController::class,
    'warehouses' => WarhouseController::class,
    'products' => ProductController::class,
    'customers' => CustomerController::class,
    'projectpersons' => ProjectPersonController::class,
    'contractors' => ContractorController::class,
    'projecttypes' => ProjectTypeController::class,
    'projectstatuses' => ProjectStatusController::class,
    'categories' => CategoryController::class,
    'companys' => CompanyController::class,
    'progresses' => ProgresseController::class,
    'stocks' => StockController::class,
    'projectcostings' => ProjectCostingController::class,

]);

