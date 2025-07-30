<?php

use App\Models\Customer;
use App\Models\Property;
use App\Models\Company;
use App\Models\InvoiceDetail;

$customer = Customer::find($invoice->customer_id); // Assuming invoice has customer_id
$items = InvoiceDetail::where('invoice_id', $invoice->id)->get();
$company = Company::find(1);

$sl = 1;
$subtotal = 0;

?>
@extends("layouts.master")
@section("page")

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .invoice-box {
        max-width: 900px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        background: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 14px;
    }

    .invoice-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
    }

    .invoice-header img {
        max-height: 60px;
    }

    .invoice-header .company-details {
        text-align: right;
    }

    .invoice-details,
    .customer-details {
        margin-bottom: 30px;
    }

    .table thead th {
        background-color: #198754;
        color: white;
        font-weight: 600;
    }

    .summary-table td,
    .summary-table th {
        padding: 8px;
    }

    @media print {
        .no-print {
            display: none;
        }

        .invoice-box {
            box-shadow: none;
            border: none;
        }
    }
</style>

<div class="text-end no-print mb-3">
    <button class="btn btn-sm btn-primary" onclick="window.print()">
        <i class="fas fa-print me-1"></i> Print Invoice
    </button>
</div>

<div class="invoice-box">
    <div class="invoice-header">
        <div>
            <img src="{{ asset('/assets/images/hami-logo.png') }}" alt="Company Logo">
        </div>
        <div class="company-details">
            <h4 class="fw-bold mb-0">{{ $company->name }}</h4>
            <p class="mb-0">{{ $company->street_address }}, {{ $company->area }}, {{ $company->city }}</p>
        </div>
    </div>

    <div class="row invoice-details">
        <div class="col-md-6 customer-details">
            <h6 class="text-uppercase text-muted fw-semibold">Customer</h6>
            <p class="mb-1 fw-semibold">{{ $customer->name }}</p>
            <p class="mb-1">📧 <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></p>
            <p>📞 <a href="tel:+880{{ $customer->phone }}">+880 {{ $customer->phone }}</a></p>

            <strong>Photo:</strong>
            @if ($customer->photo)
            <img src="{{ asset('img/customers/' . $customer->photo) }}" alt="Customer Photo" width="80" class="mt-2 border rounded" />
            @else
            No Photo
            @endif
        </div>

        <div class="col-md-6 text-md-end">
            <table class="table table-sm table-borderless">
                <tr>
                    <th>Invoice #</th>
                    <td>{{ $invoice->id }}</td>
                </tr>
                <tr>
                    <th>Date</th>
                    <td>{{ date('d M Y', strtotime($invoice->created_at)) }}</td>
                </tr>
            </table>
        </div>
    </div>

    <h6 class="text-uppercase text-center fw-bold mb-3">Property Details</h6>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Property</th>
                <th class="text-end">Project Name</th>
                <th class="text-end">Amount</th>

                <th class="text-end">Discount</th>
                <th class="text-end">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $sl = 1; $subtotal = 0; $totalDiscount = 0; @endphp
            @forelse ($items as $item)
            @php
            $data = \App\Models\Property::find($item->property_id);
            $propertyName = $data ? $data->title : 'Property not found!';
            $project = \App\Models\Project::find($item->project_id);
            $projectName = $project ? $project->name : 'N/A';

            $amount = $item->amount;
            $discount = $item->discount ?? 0;
            $subtotal += $amount;
            $totalDiscount += $discount;
            @endphp
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $propertyName }}</td>
                <td class="text-end">{{ $projectName }}</td>
                <td class="text-end">{{ number_format($amount, 2) }}</td>
                <td class="text-end">{{ $discount }}</td>
                <td class="text-end">{{ number_format($amount - $discount, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-danger">No Property Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @php $total = $subtotal - $totalDiscount; @endphp

    <div class="row mt-4">
        <div class="col-md-6 offset-md-6">
            <table class="table summary-table table-bordered">
                <tr>
                    <th>Subtotal</th>
                    <td class="text-end">{{ number_format($subtotal, 2) }} BDT</td>
                </tr>
                <tr>
                    <th>Total Discount</th>
                    <td class="text-end text-danger">-{{ number_format($totalDiscount, 2) }} BDT</td>
                </tr>
                <tr>
                    <th class="fw-bold">Total</th>
                    <td class="fw-bold text-end">{{ number_format($total, 2) }} BDT</td>
                </tr>
                <tr>
                    <th class="text-success fw-bold">To Be Paid</th>
                    <td class="fw-bold text-success text-end fs-5">{{ number_format($total, 2) }} BDT</td>
                </tr>
            </table>
        </div>
    </div>

</div>
<div class="text-center mt-4 no-print">
    <a href="{{ route('moneyreceipts.create', ['invoice_id' => $invoice->id]) }}" class="btn btn-success">
        <i class="bi bi-plus-circle"></i> Create Money Receipt
    </a>
</div>

@endsection