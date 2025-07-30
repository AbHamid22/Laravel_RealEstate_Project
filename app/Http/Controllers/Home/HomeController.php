<?php

namespace App\Http\Controllers\Home;
 use App\Models\Sales\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        $customers = \App\Models\Customer::all();
        $productsCount = \App\Models\Product::count();
        $vendorsCount = \App\Models\Vendor::count();
        $ordersCount = \App\Models\Order::count();
        $invoicesCount = \App\Models\Invoice::count();
        $purchasesCount = \App\Models\Purchase::count();
        $customersCount = $customers->count();
        
        // Property and Project tracking
        $propertiesCount = \App\Models\Property::count();
        $projectsCount = \App\Models\Project::count();
        $contractorsCount = \App\Models\Contractor::count();
        $recentProperties = \App\Models\Property::latest()->take(5)->get();
        $recentProjects = \App\Models\Project::latest()->take(5)->get();
        
        // Completed and Ongoing Projects
        $completedProjects = \App\Models\Project::where('status_id', 2)
            ->with(['contractor', 'type'])
            ->latest()
            ->take(10)
            ->get();
            
        $ongoingProjects = \App\Models\Project::where('status_id', 1)
            ->with(['contractor', 'type'])
            ->latest()
            ->take(10)
            ->get();
            
        $completedProjectsCount = $completedProjects->count();
        $ongoingProjectsCount = $ongoingProjects->count();
        
        // Invoiced and Uninvoiced Properties
        $invoicedProperties = \App\Models\Property::whereIn('id', function($query) {
            $query->select('property_id')
                  ->from('invoice_details')
                  ->distinct();
        })->with(['project', 'category'])->latest()->take(10)->get();
        
        $uninvoicedProperties = \App\Models\Property::whereNotIn('id', function($query) {
            $query->select('property_id')
                  ->from('invoice_details')
                  ->distinct();
        })->with(['project', 'category'])->latest()->take(10)->get();
        
        $invoicedPropertiesCount = $invoicedProperties->count();
        $uninvoicedPropertiesCount = $uninvoicedProperties->count();
        
        // Project Cost and Revenue calculations
        try {
            $projectTotalCost = \App\Models\ProjectCosting::sum('actual_cost') ?? 0;
        } catch (\Exception $e) {
            $projectTotalCost = 0;
        }
        
        try {
            $projectTotalRevenue = \App\Models\ProjectCosting::sum('budget') ?? 0;
        } catch (\Exception $e) {
            $projectTotalRevenue = 0;
        }
        
        // Recent data for highlighting
        $recentCustomers = \App\Models\Customer::all();
        $recentInvoices = \App\Models\Invoice::latest()->take(5)->get();
        $recentPurchases = \App\Models\Purchase::with(['vendor', 'warehouse', 'status'])->latest()->take(5)->get();
        $recentPurchaseDetails = \App\Models\PurchaseDetail::with(['purchase', 'product', 'uom'])->latest()->take(5)->get();
        $recentMoneyReceipts = \App\Models\MoneyReceipt::with(['customer'])->latest()->take(5)->get();
        
        // Stock balance data
        try {
            $totalStockCount = \App\Models\Stock::sum('qty') ?? 0;
        } catch (\Exception $e) {
            $totalStockCount = 0;
        }
        
        try {
            $lowStockItems = \App\Models\Stock::where('qty', '<', 10)->count() ?? 0;
        } catch (\Exception $e) {
            $lowStockItems = 0;
        }
        
        try {
            $recentStockMovements = \App\Models\Stock::with(['product', 'warehouse'])->latest()->take(5)->get();
        } catch (\Exception $e) {
            $recentStockMovements = collect();
        }
        
        try {
            $stockValue = \App\Models\Stock::join('products', 'stocks.product_id', '=', 'products.id')
                ->selectRaw('SUM(stocks.qty * products.price) as total_value')
                ->first()->total_value ?? 0;
        } catch (\Exception $e) {
            $stockValue = 0;
        }
        
        // Revenue calculations (if you have price fields)
        try {
            $totalRevenue = \App\Models\Invoice::sum('amount') ?? 0;
        } catch (\Exception $e) {
            $totalRevenue = 0; // Set to 0 if column doesn't exist
        }
        
        try {
            $totalSales = \App\Models\Order::sum('total_amount') ?? 0;
        } catch (\Exception $e) {
            $totalSales = 0; // Set to 0 if column doesn't exist
        }
        
        // Scan for blade files in resources/views/pages
        $pages = collect();
        $basePath = resource_path('views/pages');
        $rii = new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($basePath));
        foreach ($rii as $file) {
            if ($file->isDir()) continue;
            if (str_ends_with($file->getFilename(), '.blade.php')) {
                $relativePath = str_replace($basePath . DIRECTORY_SEPARATOR, '', $file->getPathname());
                $relativePath = str_replace(['/', '\\'], '.', $relativePath);
                $relativePath = preg_replace('/\.blade\.php$/', '', $relativePath);
                $pages->push($relativePath);
            }
        }
        
        // Progress Overview
        $progressAverage = \App\Models\Progress::avg('percent');
        $progressByProject = \App\Models\Progress::with('project')
            ->selectRaw('project_id, AVG(percent) as avg_percent')
            ->groupBy('project_id')
            ->get()
            ->map(function($item) {
                return [
                    'project' => $item->project ? $item->project->name : 'Project #' . $item->project_id,
                    'percent' => round($item->avg_percent, 1)
                ];
            });
        
        // Payment statistics
        try {
            $totalCompletedPayments = \App\Models\MoneyReceipt::sum('paid_amount') ?? 0;
        } catch (\Exception $e) {
            $totalCompletedPayments = 0;
        }
        
        // Calculate due payments (invoice total - money receipt total)
        try {
            $totalInvoiceAmount = \App\Models\Invoice::sum('amount') ?? 0;
            $duePayments = max(0, $totalInvoiceAmount - $totalCompletedPayments);
        } catch (\Exception $e) {
            $duePayments = 0;
        }
        
        // Calculate total due amount from all money receipts
        try {
            $totalDueAmount = 0;
            $allMoneyReceipts = \App\Models\MoneyReceipt::with('details')->get();
            foreach ($allMoneyReceipts as $receipt) {
                $receiptDetails = $receipt->details;
                $totalAmount = $receiptDetails->sum('amount');
                $totalDiscount = $receiptDetails->sum('discount');
                $netTotal = $totalAmount - $totalDiscount;
                $dueAmount = max(0, $netTotal - ($receipt->paid_amount ?? 0));
                $totalDueAmount += $dueAmount;
            }
        } catch (\Exception $e) {
            $totalDueAmount = 0;
        }
        
        return view('pages.indexhome.home', compact('customers', 'pages', 'productsCount', 'vendorsCount', 'ordersCount', 'invoicesCount', 'purchasesCount', 'customersCount', 'propertiesCount', 'projectsCount', 'recentProperties', 'recentProjects', 'projectTotalCost', 'projectTotalRevenue', 'totalRevenue', 'totalSales', 'recentCustomers', 'recentInvoices', 'recentPurchases', 'recentPurchaseDetails', 'recentMoneyReceipts', 'totalCompletedPayments', 'duePayments', 'totalDueAmount', 'totalStockCount', 'lowStockItems', 'recentStockMovements', 'stockValue', 'invoicedProperties', 'uninvoicedProperties', 'invoicedPropertiesCount', 'uninvoicedPropertiesCount', 'completedProjects', 'completedProjectsCount', 'ongoingProjects', 'ongoingProjectsCount', 'contractorsCount', 'progressAverage', 'progressByProject'));
    }

}
