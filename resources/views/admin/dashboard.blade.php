@extends('layouts.master')

@section('page')
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-center" style="letter-spacing: 1px;">
        <i class="fas fa-shield-alt text-primary me-2"></i>Admin Dashboard
    </h2>

    <!-- Stat Cards -->
    <div class="row g-4 mb-5">
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($totalRevenue, 0) }}</h4>
                    <small class="text-muted">Total Revenue</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-chart-line fa-2x text-info"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($totalSales, 0) }}</h4>
                    <small class="text-muted">Total Sales</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-users fa-2x text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $usersCount }}</h4>
                    <small class="text-muted">Users</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-box fa-2x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $productsCount }}</h4>
                    <small class="text-muted">Products</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-industry fa-2x text-secondary"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $vendorsCount }}</h4>
                    <small class="text-muted">Vendors</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-shopping-cart fa-2x text-danger"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $ordersCount }}</h4>
                    <small class="text-muted">Orders</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-file-invoice-dollar fa-2x text-info"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $invoicesCount }}</h4>
                    <small class="text-muted">Invoices</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-cash-register fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $purchasesCount }}</h4>
                    <small class="text-muted">Purchases</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-user-friends fa-2x text-primary"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $customersCount }}</h4>
                    <small class="text-muted">Customers</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-building fa-2x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $propertiesCount }}</h4>
                    <small class="text-muted">Properties</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-project-diagram fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $projectsCount }}</h4>
                    <small class="text-muted">Projects</small>
                </div>
            </div>
        </div>
    </div>
    <!-- /Stat Cards -->

    <!-- Recent Activity Section -->
    <div class="row g-4 mb-5">
        <!-- Recent Orders -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-shopping-cart me-2 text-danger"></i>Recent Orders
                    </h5>
                    <span class="text-muted small">Latest {{ $recentOrders->count() }} orders</span>
                </div>
                <div class="card-body p-0">
                    @if($recentOrders->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentOrders as $order)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">Order #{{ $order->id ?? 'N/A' }}</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $order->created_at ? $order->created_at->format('M d, Y') : 'No date' }}
                                        </small>
                                    </div>
                                    <span class="badge bg-danger rounded-pill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-shopping-cart fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No orders found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Customers -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-user-friends me-2 text-primary"></i>Recent Customers
                    </h5>
                    <span class="text-muted small">Latest {{ $recentCustomers->count() }} customers</span>
                </div>
                <div class="card-body p-0">
                    @if($recentCustomers->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentCustomers as $customer)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $customer->name ?? 'Customer #' . $customer->id }}</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-envelope me-1"></i>
                                            {{ $customer->email ?? 'No email' }}
                                        </small>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-user-friends fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No customers found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Recent Activity Section -->

    <!-- Project Tracking Section -->
    <div class="row g-4 mb-5">
        <!-- Recent Properties -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-building me-2 text-warning"></i>Recent Properties
                    </h5>
                    <span class="text-muted small">Latest {{ $recentProperties->count() }} properties</span>
                </div>
                <div class="card-body p-0">
                    @if($recentProperties->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentProperties as $property)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $property->name ?? 'Property #' . $property->id }}</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-map-marker-alt me-1"></i>
                                            {{ $property->address ?? 'No address' }}
                                        </small>
                                    </div>
                                    <span class="badge bg-warning rounded-pill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-building fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No properties found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Projects -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-project-diagram me-2 text-success"></i>Recent Projects
                    </h5>
                    <span class="text-muted small">Latest {{ $recentProjects->count() }} projects</span>
                </div>
                <div class="card-body p-0">
                    @if($recentProjects->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentProjects as $project)
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $project->name ?? 'Project #' . $project->id }}</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>
                                            {{ $project->start_date ?? 'No start date' }}
                                        </small>
                                    </div>
                                    <span class="badge bg-success rounded-pill">
                                        <i class="fas fa-eye me-1"></i>View
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-4">
                            <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                            <p class="text-muted">No projects found</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Project Tracking Section -->

    <!-- System Overview -->
    <div class="row g-4">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-cogs me-2 text-info"></i>System Overview
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-primary">{{ $pages->count() }}</h4>
                                <small class="text-muted">Total Pages</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-success">{{ $usersCount }}</h4>
                                <small class="text-muted">Active Users</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-warning">{{ $productsCount + $vendorsCount + $customersCount }}</h4>
                                <small class="text-muted">Total Records</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="text-center">
                                <h4 class="text-info">{{ $propertiesCount + $projectsCount }}</h4>
                                <small class="text-muted">Active Projects</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /System Overview -->
</div>

<style>
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1.5rem rgba(0,0,0,.15)!important;
        transform: translateY(-2px) scale(1.03);
        transition: all 0.2s;
    }
</style>
@endsection