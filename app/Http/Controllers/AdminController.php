<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Vendor;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\Purchase;
use App\Models\Sales\Customer;
use App\Models\Property;
use App\Models\Project;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Business metrics
        $productsCount = Product::count();
        $vendorsCount = Vendor::count();
        $ordersCount = Order::count();
        $invoicesCount = Invoice::count();
        $purchasesCount = Purchase::count();
        $customersCount = Customer::count();
        
        // Property and Project tracking
        $propertiesCount = Property::count();
        $projectsCount = Project::count();
        $usersCount = User::count();
        
        // Recent data for tracking
        $recentProperties = Property::latest()->take(5)->get();
        $recentProjects = Project::latest()->take(5)->get();
        $recentOrders = Order::latest()->take(5)->get();
        $recentCustomers = Customer::latest()->take(5)->get();
        
        // Revenue calculations (if you have price fields)
        try {
            $totalRevenue = Invoice::sum('amount') ?? 0;
        } catch (\Exception $e) {
            $totalRevenue = 0; // Set to 0 if column doesn't exist
        }
        
        try {
            $totalSales = Order::sum('total_amount') ?? 0;
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
        
        return view('admin.dashboard', compact(
            'productsCount', 'vendorsCount', 'ordersCount', 'invoicesCount', 
            'purchasesCount', 'customersCount', 'propertiesCount', 'projectsCount', 
            'usersCount', 'recentProperties', 'recentProjects', 'recentOrders', 
            'recentCustomers', 'totalRevenue', 'totalSales', 'pages'
        ));
    }
} 