<?php

use App\Models\Sales\Customer;

$customers = Customer::all();

?>

@extends('layouts.master')

@section('page')
<div class="container py-5">
    <h2 class="mb-4 fw-bold text-center" style="letter-spacing: 1px;">
        <i class="fas fa-tachometer-alt text-primary me-2"></i>Dashboard Overview
    </h2>

    <!-- Stat Cards -->
    <div class="row g-4 mb-5">
        <!-- <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-dollar-sign fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($totalRevenue, 0) }}</h4>
                    <small class="text-muted">Total Revenue</small>
                </div>
            </div>
        </div> -->
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-money-bill-wave fa-2x text-danger"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($projectTotalCost, 0) }}</h4>
                    <small class="text-muted">Project Total Cost</small>
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
                    <small class="text-muted">Property Total Sales</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-chart-pie fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($projectTotalRevenue, 0) }}</h4>
                    <small class="text-muted">Project Total Revenue</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-box fa-2x text-primary"></i>
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
                        <i class="fas fa-industry fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $vendorsCount }}</h4>
                    <small class="text-muted">Vendors</small>
                </div>
            </div>
        </div>
        <!-- <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-shopping-cart fa-2x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $ordersCount }}</h4>
                    <small class="text-muted">Orders</small>
                </div>
            </div>
        </div> -->
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
                        <i class="fas fa-cash-register fa-2x text-danger"></i>
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
                        <i class="fas fa-users fa-2x text-secondary"></i>
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
                        <i class="fas fa-building fa-2x text-primary"></i>
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
                        <i class="fas fa-file-invoice fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $invoicedPropertiesCount }}</h4>
                    <small class="text-muted">Invoiced Properties</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-home fa-2x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $uninvoicedPropertiesCount }}</h4>
                    <small class="text-muted">Available Properties</small>
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
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-check-circle fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $completedProjectsCount }}</h4>
                    <small class="text-muted">Completed Projects</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-clock fa-2x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $ongoingProjectsCount }}</h4>
                    <small class="text-muted">Ongoing Projects</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-boxes fa-2x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $totalStockCount }}</h4>
                    <small class="text-muted">Total Stock</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-money-check-alt fa-2x text-success"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($totalCompletedPayments, 0) }}</h4>
                    <small class="text-muted">Completed Payments</small>
                </div>
            </div>
        </div>

        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-clock fa-2x text-warning"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($totalDueAmount, 0) }}</h4>
                    <small class="text-muted">Total Due Amount</small>
                </div>
            </div>
        </div>
        <!-- <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-exclamation-triangle fa-2x text-danger"></i>
                    </div>
                    <h4 class="fw-bold mb-0">{{ $lowStockItems }}</h4>
                    <small class="text-muted">Low Stock</small>
                </div>
            </div>
        </div>
        <div class="col-6 col-md-4 col-lg-2">
            <div class="card shadow-sm border-0 h-100 text-center hover-shadow">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-dollar-sign fa-2x text-info"></i>
                    </div>
                    <h4 class="fw-bold mb-0">${{ number_format($stockValue, 0) }}</h4>
                    <small class="text-muted">Stock Value</small>
                </div>
            </div>
        </div> -->
    </div>
    <!-- /Stat Cards -->

    
    <!-- Project Tracking Section -->
    <div class="row g-4 mb-5">
        <!-- Recent Properties -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-header bg-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-building me-2 text-primary"></i>Recent Properties
                    </h5>
                    <span class="text-muted small">Latest {{ $recentProperties->count() }} properties</span>
                    <span class="badge bg-primary rounded-pill pulse-badge">
                        <a href="{{ route('propertys.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All List
                        </a>
                    </span>

                </div>
                <div class="card-body p-0">
                    @if($recentProperties->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentProperties as $property)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">{{ $property->title ?? 'Property #' . $property->id }}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-map-marker-alt me-1"></i>
                                    {{ $property->location ?? 'No address' }}
                                </small>
                            </div>
                            <span class="badge bg-secondary rounded-pill">
                                <a href="{{ route('propertys.show', $property->id) }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-eye me-5"></i>View This
                                </a>
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
                    <span class="badge bg-primary rounded-pill pulse-badge">
                        <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All List
                        </a>
                    </span>
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
                            <span class="badge bg-secondary rounded-pill">
                                <a href="{{ route('projects.show', $project->id) }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-eye me-1"></i>View This
                                </a>
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

      <!-- Project Status Overview -->
    <div class="row g-4 mb-5">
        <div class="col-12">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-primary text-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-chart-bar me-2"></i>Project Status Overview
                            </h5>
                            <span class="small opacity-75">Complete breakdown of project completion status</span>
                        </div>
                        <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All Projects
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-3 text-center">
                            <div class="border-end">
                                <h3 class="text-primary fw-bold">{{ $projectsCount }}</h3>
                                <p class="text-muted mb-0">Total Projects</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="border-end">
                                <h3 class="text-success fw-bold">{{ $completedProjectsCount }}</h3>
                                <p class="text-muted mb-0">Completed Projects</p>
                                <small class="text-success">
                                    {{ $projectsCount > 0 ? round(($completedProjectsCount / $projectsCount) * 100, 1) : 0 }}%
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="border-end">
                                <h3 class="text-warning fw-bold">{{ $ongoingProjectsCount }}</h3>
                                <p class="text-muted mb-0">Ongoing Projects</p>
                                <small class="text-warning">
                                    {{ $projectsCount > 0 ? round(($ongoingProjectsCount / $projectsCount) * 100, 1) : 0 }}%
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div>
                                <h3 class="text-info fw-bold">{{ $contractorsCount ?? 0 }}</h3>
                                <p class="text-muted mb-0">Active Contractors</p>
                                <small class="text-info">Working</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Project Status Overview -->


    <!-- Project Status Section -->
    <div class="row g-4 mb-5">
        <!-- Completed Projects -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100 highlight-card">
                <div class="card-header bg-gradient-success text-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-check-circle me-2"></i>Completed Projects
                            </h5>
                            <span class="small opacity-75">{{ $completedProjectsCount }} projects successfully completed</span>
                        </div>
                        @if($completedProjectsCount > 0)
                        <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($completedProjects->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($completedProjects as $project)
                        <div class="list-group-item d-flex justify-content-between align-items-center project-item">
                            <div class="d-flex align-items-center">
                                <div class="project-icon me-3">
                                    <i class="fas fa-building fa-2x text-success"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $project->name ?? 'Project #' . $project->id }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-user-tie me-1"></i>
                                        {{ $project->contractor->name ?? 'No Contractor' }} |
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $project->end_date ? date('M Y', strtotime($project->end_date)) : 'No End Date' }}
                                    </small>
                                </div>
                            </div>
                            <span class="badge bg-success rounded-pill">
                                <i class="fas fa-check me-1"></i>Completed
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-check-circle fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No projects have been completed yet</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Ongoing Projects -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100 highlight-card">
                <div class="card-header bg-gradient-warning text-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-clock me-2"></i>Ongoing Projects
                            </h5>
                            <span class="small opacity-75">{{ $ongoingProjectsCount }} projects currently in progress</span>
                        </div>
                        @if($ongoingProjectsCount > 0)
                        <a href="{{ route('projects.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($ongoingProjects->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($ongoingProjects as $project)
                        <div class="list-group-item d-flex justify-content-between align-items-center project-item">
                            <div class="d-flex align-items-center">
                                <div class="project-icon me-3">
                                    <i class="fas fa-tools fa-2x text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $project->name ?? 'Project #' . $project->id }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-user-tie me-1"></i>
                                        {{ $project->contractor->name ?? 'No Contractor' }} |
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $project->end_date ? date('M Y', strtotime($project->end_date)) : 'No End Date' }}
                                    </small>
                                </div>
                            </div>
                            <span class="badge bg-warning rounded-pill">
                                <i class="fas fa-clock me-1"></i>In Progress
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-clock fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No ongoing projects at the moment</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Project Status Section -->


    <!-- Progress Overview Section -->
    <div class="row g-4 mb-5">
        <div class="col-12">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-info text-white border-bottom-0 d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">
                            <i class="fas fa-tasks me-2"></i>Progress Overview
                        </h5>
                        <span class="small opacity-75">Project progress summary and chart</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-3 text-center mb-3 mb-md-0">
                            <h1 class="display-4 fw-bold text-success mb-0">{{ round($progressAverage, 1) }}%</h1>
                            <div class="text-muted">Average Progress</div>
                        </div>
                        <div class="col-md-9">
                            <canvas id="progressOverviewChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Progress Overview Section -->

    <!-- Property Status Overview -->
    <div class="row g-4 mb-5">
        <div class="col-12">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-info text-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-chart-pie me-2"></i>Property Status Overview
                            </h5>
                            <span class="small opacity-75">Complete breakdown of property invoicing status</span>
                        </div>
                        @if($uninvoicedPropertiesCount > 0)
                        <a href="{{ route('invoices.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i>Create Invoice
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body">
                    <div class="row g-4">
                        <div class="col-md-3 text-center">
                            <div class="border-end">
                                <h3 class="text-primary fw-bold">{{ $propertiesCount }}</h3>
                                <p class="text-muted mb-0">Total Properties</p>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="border-end">
                                <h3 class="text-success fw-bold">{{ $invoicedPropertiesCount }}</h3>
                                <p class="text-muted mb-0">Invoiced Properties</p>
                                <small class="text-success">
                                    {{ $propertiesCount > 0 ? round(($invoicedPropertiesCount / $propertiesCount) * 100, 1) : 0 }}%
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div class="border-end">
                                <h3 class="text-warning fw-bold">{{ $uninvoicedPropertiesCount }}</h3>
                                <p class="text-muted mb-0">Available Properties</p>
                                <small class="text-warning">
                                    {{ $propertiesCount > 0 ? round(($uninvoicedPropertiesCount / $propertiesCount) * 100, 1) : 0 }}%
                                </small>
                            </div>
                        </div>
                        <div class="col-md-3 text-center">
                            <div>
                                <h3 class="text-info fw-bold">{{ $invoicesCount }}</h3>
                                <p class="text-muted mb-0">Total Invoices</p>
                                <small class="text-info">Generated</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Property Status Overview -->

    <!-- Property Status Section -->

    <div class="row g-4 mb-5">
        <!-- Invoiced Properties -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100 highlight-card">
                <div class="card-header bg-gradient-success text-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-file-invoice me-2"></i>Invoiced Properties
                            </h5>
                            <span class="small opacity-75">{{ $invoicedPropertiesCount }} properties already invoiced</span>
                        </div>
                        @if($invoicedPropertiesCount > 0)
                        <a href="{{ route('invoices.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($invoicedProperties->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($invoicedProperties as $property)
                        <div class="list-group-item d-flex justify-content-between align-items-center property-item">
                            <div class="d-flex align-items-center">
                                <div class="property-icon me-3">
                                    <i class="fas fa-building fa-2x text-success"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $property->title ?? 'Property #' . $property->id }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-project-diagram me-1"></i>
                                        {{ $property->project->name ?? 'No Project' }} |
                                        <i class="fas fa-dollar-sign me-1"></i>
                                        ${{ number_format($property->price ?? 0, 2) }}
                                    </small>
                                </div>
                            </div>
                            <span class="badge bg-success rounded-pill">
                                <i class="fas fa-check me-1"></i>Invoiced
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-file-invoice fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No properties have been invoiced yet</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Available (Uninvoiced) Properties -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100 highlight-card">
                <div class="card-header bg-gradient-warning text-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-home me-2"></i>Available Properties
                            </h5>
                            <span class="small opacity-75">{{ $uninvoicedPropertiesCount }} properties ready for invoicing</span>
                        </div>
                        @if($uninvoicedPropertiesCount > 0)
                        <a href="{{ route('invoices.create') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-plus me-1"></i>Create Invoice
                        </a>
                        @endif
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($uninvoicedProperties->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($uninvoicedProperties as $property)
                        <div class="list-group-item d-flex justify-content-between align-items-center property-item">
                            <div class="d-flex align-items-center">
                                <div class="property-icon me-3">
                                    <i class="fas fa-home fa-2x text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $property->title ?? 'Property #' . $property->id }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-project-diagram me-1"></i>
                                        {{ $property->project->name ?? 'No Project' }} |
                                        <i class="fas fa-dollar-sign me-1"></i>
                                        ${{ number_format($property->price ?? 0, 2) }}
                                    </small>
                                </div>
                            </div>
                            <span class="badge bg-warning rounded-pill">
                                <i class="fas fa-plus me-1"></i>Available
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-home fa-3x text-muted mb-3"></i>
                        <p class="text-muted">All properties have been invoiced</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Property Status Section -->

  
    <!-- Recent Activity Highlighting Section -->
    <div class="row g-4 mb-5">
        <!-- Recent Customers -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100 highlight-card">
                <div class="card-header bg-gradient-primary text-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-user-friends me-2"></i>Recent Customers
                    </h5>
                    <span class="small opacity-75">Latest {{ $recentCustomers->count() }} customers</span>
                    <span class="badge bg-primary rounded-pill pulse-badge">
                        <a href="{{ route('customers.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                    </span>
                </div>

                <div class="card-body p-0">
                    @if($recentCustomers->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentCustomers as $customer)
                        <div class="list-group-item d-flex justify-content-between align-items-center customer-item">
                            <div class="d-flex align-items-center">
                                <div class="customer-avatar me-3">
                                    <i class="fas fa-user-circle fa-2x text-primary"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $customer->name ?? 'Customer #' . $customer->id }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-envelope me-1"></i>
                                        {{ $customer->email ?? 'No email' }}
                                    </small>
                                </div>
                            </div>

                              <span class="badge bg-secondary rounded-pill">
                                <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-eye me-1"></i>View This
                                </a>
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

        <!-- Recent Invoices -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 h-100 highlight-card">
                <div class="card-header bg-gradient-success text-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-file-invoice-dollar me-2"></i>Recent Invoices
                    </h5>
                    <span class="small opacity-75">Latest {{ $recentInvoices->count() }} invoices</span>
                    <span class="badge bg-primary rounded-pill pulse-badge">
                        <a href="{{ route('invoices.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                    </span>
                </div>

                <div class="card-body p-0">
                    @if($recentInvoices->count() > 0)

                    <div class="list-group list-group-flush">
                        @foreach($recentInvoices as $invoice)
                        <div class="list-group-item d-flex justify-content-between align-items-center invoice-item">
                            <div class="d-flex align-items-center">
                                <div class="invoice-icon me-3">
                                    <i class="fas fa-receipt fa-2x text-success"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Invoice #{{ $invoice->id ?? 'N/A' }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $invoice->created_at ? $invoice->created_at->format('M d, Y') : 'No date' }}
                                    </small>
                                </div>
                            </div>
                             <span class="badge bg-secondary rounded-pill">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-light btn-sm">
                                    <i class="fas fa-eye me-1"></i>View This
                                </a>
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-file-invoice-dollar fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No invoices found</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Recent Activity Highlighting Section -->

    <!-- Recent Money Receipts Section -->
    <div class="row g-4 mb-5">
        <div class="col-12">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-success text-white border-bottom-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="mb-0 fw-bold">
                                <i class="fas fa-money-check-alt me-2"></i>Recent Money Receipts
                            </h5>
                            <span class="small opacity-75">Latest {{ $recentMoneyReceipts->count() }} payment receipts</span>
                        </div>
                        <a href="{{ route('moneyreceipts.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All Receipts
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    @if($recentMoneyReceipts->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentMoneyReceipts as $receipt)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="receipt-icon me-3">
                                    <i class="fas fa-receipt fa-2x text-success"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">Receipt #{{ $receipt->id }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-user me-1"></i>
                                        {{ $receipt->customer->name ?? 'No Customer' }} |
                                        <i class="fas fa-calendar me-1"></i>
                                        {{ $receipt->created_at ? $receipt->created_at->format('d M, Y') : 'No Date' }}
                                    </small>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-success rounded-pill">${{ number_format($receipt->paid_amount ?? 0, 2) }}</span>
                                @php
                                    $receiptDetails = \App\Models\MoneyReceiptDetail::where('money_receipt_id', $receipt->id)->get();
                                    $totalAmount = $receiptDetails->sum('amount');
                                    $totalDiscount = $receiptDetails->sum('discount');
                                    $netTotal = $totalAmount - $totalDiscount;
                                    $dueAmount = max(0, $netTotal - ($receipt->paid_amount ?? 0));
                                @endphp
                                @if($dueAmount > 0)
                                    <span class="badge bg-warning rounded-pill ms-1">Due: ${{ number_format($dueAmount, 2) }}</span>
                                @endif
                                <a href="{{ route('moneyreceipts.show', $receipt->id) }}" class="btn btn-light btn-sm ms-2">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-money-check-alt fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No money receipts found</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Recent Money Receipts Section -->

    <!-- Recent Purchases and Purchase Tracking Section -->
    <div class="row g-4 mb-5">
        <!-- Recent Purchases (Documents) -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-primary text-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-file-invoice me-2"></i>Recent Purchases
                    </h5>
                    <span class="small opacity-75">Latest {{ $recentPurchases->count() }} purchases</span>
                    <span class="badge bg-primary rounded-pill pulse-badge">
                        <a href="{{ route('purchases.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                    </span>
                </div>
                <div class="card-body p-0">
                    @if($recentPurchases->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentPurchases as $purchase)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Purchase #{{ $purchase->id }}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-user-tie me-1"></i>
                                    {{ $purchase->vendor->name ?? 'No Vendor' }} |
                                    <i class="fas fa-warehouse me-1"></i>
                                    {{ $purchase->warehouse->name ?? 'No Warehouse' }} |
                                    <i class="fas fa-calendar me-1"></i>
                                    {{ $purchase->purchase_date ? \Carbon\Carbon::parse($purchase->purchase_date)->format('d M, Y') : 'No Date' }}
                                </small>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-info rounded-pill">{{ number_format($purchase->purchase_total, 2) }} BDT</span>
                                <span class="badge {{ $purchase->status->name == 'Completed' ? 'bg-success' : ($purchase->status->name == 'Processing' ? 'bg-warning' : 'bg-secondary') }} rounded-pill ms-2">
                                    {{ $purchase->status->name ?? 'N/A' }}
                                </span>
                                <a href="{{ route('purchases.show', $purchase->id) }}" class="btn btn-light btn-sm ms-2">
                                    <i class="fas fa-eye me-1"></i>View
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-file-invoice fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No purchases found</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Recent Purchase Tracking (Details) -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-info text-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-clipboard-list me-2"></i>Recent Purchase Tracking
                    </h5>
                    <span class="small opacity-75">Latest {{ $recentPurchaseDetails->count() }} purchase details</span>
                    <span class="badge bg-primary rounded-pill pulse-badge">
                        <a href="{{ route('purchasedetails.index') }}" class="btn btn-light btn-sm">
                            <i class="fas fa-eye me-1"></i>View All
                        </a>
                    </span>
                </div>
                <div class="card-body p-0">
                    @if($recentPurchaseDetails->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentPurchaseDetails as $detail)
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">Purchase #{{ $detail->purchase->id ?? 'N/A' }}</h6>
                                <small class="text-muted">
                                    <i class="fas fa-box me-1"></i>
                                    {{ $detail->product->name ?? 'No Product' }} |
                                    <i class="fas fa-cubes me-1"></i>
                                    Qty: {{ $detail->qty }} |
                                    <i class="fas fa-money-bill me-1"></i>
                                    Tk: {{ number_format($detail->price, 2) }}
                                </small>
                            </div>
                            <a href="{{ route('purchases.show', $detail->purchase->id ?? 0) }}" class="btn btn-light btn-sm">
                                <i class="fas fa-eye me-1"></i>View Purchase
                            </a>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-clipboard-list fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No purchase details found</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- /Recent Purchases and Purchase Tracking Section -->

    <!-- Stock Balance Section -->
    <div class="row g-4 mb-5">
        <!-- Recent Stock Movements -->
        <div class="col-lg-8">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-warning text-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-exchange-alt me-2"></i>Recent Stock Movements
                    </h5>
                    <span class="small opacity-75">Latest {{ $recentStockMovements->count() }} stock transactions</span>
                </div>
                <div class="card-body p-0">
                    @if($recentStockMovements->count() > 0)
                    <div class="list-group list-group-flush">
                        @foreach($recentStockMovements as $stock)
                        <div class="list-group-item d-flex justify-content-between align-items-center stock-item">
                            <div class="d-flex align-items-center">
                                <div class="stock-icon me-3">
                                    <i class="fas fa-box fa-2x text-warning"></i>
                                </div>
                                <div>
                                    <h6 class="mb-1 fw-bold">{{ $stock->product->name ?? 'Unknown Product' }}</h6>
                                    <small class="text-muted">
                                        <i class="fas fa-warehouse me-1"></i>
                                        {{ $stock->warehouse->name ?? 'Unknown Warehouse' }} |
                                        <i class="fas fa-cubes me-1"></i>
                                        Qty: {{ $stock->qty }}
                                    </small>
                                </div>
                            </div>
                            <span class="badge bg-warning rounded-pill pulse-badge">
                                <i class="fas fa-arrow-right"></i> Movement
                            </span>
                        </div>
                        @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-boxes fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No stock movements found</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Low Stock Alerts -->
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 highlight-card">
                <div class="card-header bg-gradient-danger text-white border-bottom-0">
                    <h5 class="mb-0 fw-bold">
                        <i class="fas fa-exclamation-triangle me-2"></i>Low Stock Alerts
                    </h5>
                    <span class="small opacity-75">{{ $lowStockItems }} items need attention</span>
                </div>
                <div class="card-body p-0">
                    @if($lowStockItems > 0)
                    <div class="list-group list-group-flush">
                        @php
                        try {
                        $lowStockItemsList = \App\Models\Stock::where('qty', '<', 10)->with(['product', 'warehouse'])->take(5)->get();
                            } catch (\Exception $e) {
                            $lowStockItemsList = collect();
                            }
                            @endphp
                            @foreach($lowStockItemsList as $lowStock)
                            <div class="list-group-item d-flex justify-content-between align-items-center alert-item">
                                <div class="d-flex align-items-center">
                                    <div class="alert-icon me-3">
                                        <i class="fas fa-exclamation-circle fa-2x text-danger"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-1 fw-bold">{{ $lowStock->product->name ?? 'Unknown Product' }}</h6>
                                        <small class="text-muted">
                                            <i class="fas fa-warehouse me-1"></i>
                                            {{ $lowStock->warehouse->name ?? 'Unknown Warehouse' }}
                                        </small>
                                    </div>
                                </div>
                                <span class="badge bg-danger rounded-pill">
                                    {{ $lowStock->qty ?? 0 }} left
                                </span>
                            </div>
                            @endforeach
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                        <p class="text-muted">All stock levels are good!</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Optionally, add more modern widgets or charts here -->
</div>

<style>
    .hover-shadow:hover {
        box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, .15) !important;
        transform: translateY(-2px) scale(1.03);
        transition: all 0.2s;
    }

    /* Highlighting Section Styles */
    .highlight-card {
        border-radius: 15px;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .highlight-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, .2) !important;
    }

    .bg-gradient-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .bg-gradient-success {
        background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .customer-item,
    .invoice-item {
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
    }

    .customer-item:hover {
        background-color: rgba(102, 126, 234, 0.1);
        border-left-color: #667eea;
        transform: translateX(5px);
    }

    .invoice-item:hover {
        background-color: rgba(17, 153, 142, 0.1);
        border-left-color: #11998e;
        transform: translateX(5px);
    }

    .pulse-badge {
        animation: pulse 2s infinite;
        transition: all 0.3s ease;
    }

    .pulse-badge:hover {
        transform: scale(1.1);
        animation: none;
    }

    @keyframes pulse {
        0% {
            box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
        }

        70% {
            box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
        }

        100% {
            box-shadow: 0 0 0 0 rgba(102, 126, 234, 0);
        }
    }

    .customer-avatar,
    .invoice-icon {
        transition: all 0.3s ease;
    }

    .customer-item:hover .customer-avatar {
        transform: scale(1.1);
    }

    .invoice-item:hover .invoice-icon {
        transform: scale(1.1);
    }

    /* Stock Balance Section Styles */
    .stock-item,
    .alert-item {
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
    }

    .stock-item:hover {
        background-color: rgba(255, 193, 7, 0.1);
        border-left-color: #ffc107;
        transform: translateX(5px);
    }

    .alert-item:hover {
        background-color: rgba(220, 53, 69, 0.1);
        border-left-color: #dc3545;
        transform: translateX(5px);
    }

    .stock-icon,
    .alert-icon {
        transition: all 0.3s ease;
    }

    .stock-item:hover .stock-icon {
        transform: scale(1.1);
    }

    .alert-item:hover .alert-icon {
        transform: scale(1.1);
    }

    .bg-gradient-warning {
        background: linear-gradient(135deg, #ffc107 0%, #fd7e14 100%);
    }

    .bg-gradient-info {
        background: linear-gradient(135deg, #17a2b8 0%, #6f42c1 100%);
    }

    .bg-gradient-danger {
        background: linear-gradient(135deg, #dc3545 0%, #e83e8c 100%);
    }

    /* Enhanced card headers */
    .card-header {
        position: relative;
        overflow: hidden;
    }

    .card-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
        transition: left 0.5s;
    }

    .highlight-card:hover .card-header::before {
        left: 100%;
    }

    /* Property Status Section Styles */
    .property-item {
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
    }

    .property-item:hover {
        background-color: rgba(255, 193, 7, 0.1);
        border-left-color: #ffc107;
        transform: translateX(5px);
    }

    .property-icon {
        transition: all 0.3s ease;
    }

    .property-item:hover .property-icon {
        transform: scale(1.1);
    }

    /* Project Status Section Styles */
    .project-item {
        transition: all 0.2s ease;
        border-left: 4px solid transparent;
    }

    .project-item:hover {
        background-color: rgba(102, 126, 234, 0.1);
        border-left-color: #667eea;
        transform: translateX(5px);
    }

    .project-icon {
        transition: all 0.3s ease;
    }

    .project-item:hover .project-icon {
        transform: scale(1.1);
    }
</style>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    @php
        $progressLabels = $progressByProject->pluck('project');
        $progressData = $progressByProject->pluck('percent');
    @endphp
    const progressLabels = {!! json_encode($progressLabels) !!};
    const progressData = {!! json_encode($progressData) !!};

    const ctx = document.getElementById('progressOverviewChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: progressLabels,
            datasets: [{
                label: 'Progress (%)',
                data: progressData,
                backgroundColor: '#38ef7d',
                borderColor: '#11998e',
                borderWidth: 2,
                borderRadius: 8,
                maxBarThickness: 40
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: false
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            }
        }
    });
</script>
@endsection