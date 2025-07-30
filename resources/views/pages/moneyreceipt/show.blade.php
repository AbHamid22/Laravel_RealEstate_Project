<?php

use App\Models\Customer;
use App\Models\Property;
use App\Models\Company;
use App\Models\MoneyReceiptDetail;

$customer = Customer::find($moneyreceipt->customer_id); // Assuming invoice has customer_id
$items = MoneyReceiptDetail::where('money_receipt_id', $moneyreceipt->id)->get();
$company = Company::find(1);

$sl = 1;
$subtotal = 0;

?>
@extends("layouts.master")
@section("page")

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f4f6f9;
        padding: 20px;
    }

    .receipt-container {
        max-width: 960px;
        margin: auto;
        background: white;
        padding: 30px 40px;
        border-radius: 12px;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.08);
    }

    .receipt-header {
        border-bottom: 2px solid #198754;
        padding-bottom: 10px;
        margin-bottom: 30px;
    }

    .receipt-header img {
        height: 60px;
    }

    .company-info {
        text-align: right;
    }

    .section-title {
        font-weight: 600;
        color: #198754;
        text-transform: uppercase;
        margin-bottom: 10px;
    }

    .info-box {
        background: #f9f9f9;
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 30px;
    }

    .info-box p {
        margin: 3px 0;
    }

    .table thead th {
        background-color: #343a40;
        color: white;
    }

    .table td,
    .table th {
        vertical-align: middle;
    }

    .summary-box {
        background-color: #f1f5f8;
        border-radius: 8px;
        padding: 20px;
        font-size: 15px;
    }

    .summary-box table {
        width: 100%;
    }

    .summary-box td {
        padding: 6px 0;
    }

    @media print {
        .no-print {
            display: none;
        }

        .receipt-container {
            box-shadow: none;
            border: none;
            margin: 0;
        }

        body {
            background-color: white !important;
        }
    }
</style>

<div class="text-end no-print mb-3">
    <button class="btn btn-dark btn-sm" onclick="window.print()">
        🖨️ Print
    </button>
</div>

<div class="receipt-container">
              
    <div class="d-flex justify-content-between align-items-center receipt-header">
        <img src="{{ asset('/assets/images/hami-logo.png') }}" alt="Logo">
        <div class="company-info">
            <h4 class="mb-0">{{ $company->name }}</h4>
            <small>{{ $company->street_address }}, {{ $company->area }}, {{ $company->city }}</small>
        </div>
    </div>

    <div class="info-box">
        <div class="row">
            <div class="col-md-6">
                <h6 class="section-title">Customer Information</h6>
                <p><strong>{{ $customer->name }}</strong></p>
                <p>📧 <a href="mailto:{{ $customer->email }}">{{ $customer->email }}</a></p>
                <p>📞 <a href="tel:+880{{ $customer->phone }}">+880{{ $customer->phone }}</a></p>
                @if ($customer->photo)
                <img src="{{ asset('img/customers/' . $customer->photo) }}" alt="Customer Photo" width="80" class="mt-2 border rounded" />
                @else
                <p class="text-muted mt-2">No Photo</p>
                @endif
            </div>

            <div class="col-md-6 text-md-end">
                <h6 class="section-title">Receipt Info</h6>
                <p>MR #: <strong>{{ $moneyreceipt->id }}</strong></p>
                <p>Date: <strong>{{ date('d M Y', strtotime($moneyreceipt->created_at)) }}</strong></p>
            </div>
        </div>
    </div>

    <h6 class="section-title text-center">Property Details</h6>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>Property</th>
                <th>Project</th>
                <th class="text-end">Amount</th>
                <th class="text-end">Discount</th>
                <th class="text-end">Total</th>
            </tr>
        </thead>
        <tbody>
            @php $sl = 1; $subtotal = 0; $totalDiscount = 0; @endphp
            @forelse ($items as $item)
            @php
            $property = \App\Models\Property::find($item->property_id);
            $project = \App\Models\Project::find($item->project_id);
            $amount = $item->amount;
            $discount = $item->discount ?? 0;
            $subtotal += $amount;
            $totalDiscount += $discount;
            @endphp
            <tr>
                <td>{{ $sl++ }}</td>
                <td>{{ $property->title ?? 'N/A' }}</td>
                <td>{{ $project->name ?? 'N/A' }}</td>
                <td class="text-end">{{ number_format($amount, 2) }}</td>
                <td class="text-end text-danger">-{{ number_format($discount, 2) }}</td>
                <td class="text-end fw-bold">{{ number_format($amount - $discount, 2) }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-danger">No Property Found</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @php $total = $subtotal - $totalDiscount; @endphp


        <div class="card-body p-3">
            <h6 class="text-end text-uppercase fw-semibold">Payment Summary</h6>
            <table class="table table-sm table-borderless text-end mb-0">
                <tr>
                    <th>Subtotal:</th>
                    <td>{{ number_format($subtotal, 2) }} BDT</td>
                </tr>
                <tr>
                    <th>Total Discount:</th>
                    <td class="text-danger">-{{ number_format($totalDiscount, 2) }} BDT</td>
                </tr>
                <tr class="border-top">
                    <th class="fw-bold">Total:</th>
                    <td class="fw-bold">{{ number_format($total, 2) }} BDT</td>
                </tr>
                <tr class="border-top">
                    <th class="fw-bold">Paid Amount:</th>
                    <td class="fw-bold">{{ number_format($moneyreceipt->paid_amount, 2) }} BDT</td>
                </tr>
                <tr class="border-top">
                    <th class="fw-bold">Due Amount:</th>
                    <td class="fw-bold">{{ number_format($total - $moneyreceipt->paid_amount, 2) }} BDT</td>
                </tr>
                <tr>
                    <th class="border-top text-success fw-bold">To Be Paid</th>
                    <td class="fw-bold">{{ number_format($total - $moneyreceipt->paid_amount, 2) }} BDT</td>
                </tr>

            </table>
        </div>
</div>

@endsection