<?php

use App\Models\Customer;
use App\Models\Product;
use App\Models\Company;
use App\Models\Vendor;
use App\Models\Purchase\purchase;
use App\Models\PurchaseDetail;

$customers = Customer::all();
$vendors = Vendor::find($purchase->vendor_id);
$items = PurchaseDetail::where('purchase_id', $purchase->id)->get();
$products = Product::all();
$company = Company::find(1);

$sl = 1;
$subtotal = 0;

?>
@extends("layouts.master")
@section("page")

<style>
    th {
        background-color: transparent !important;
    }

    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<div class="card mb-4 shadow-sm no-print">
    <div class="card-body d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Purchase Invoice #{{$purchase->id}}</h5>
        <button class="btn btn-sm btn-warning" onclick="window.print()">
            <i class="fas fa-print me-1"></i> Print Invoice
        </button>
    </div>
</div>

<div class="card shadow-lg" style="max-width: 900px; margin: 0 auto;">
    <div class="card-body p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <img src="{{asset('/assets/images/hami-logo.png')}}" alt="Logo" width="100" />
            </div>
            <div class="text-end">
                <h4 class="fw-bold mb-1">{{$company->name}}</h4>
                <p class="mb-0 fs-sm">{{$company->street_address}}, {{$company->area}}, {{$company->city}}</p>
            </div>
        </div>

        <hr>

        <div class="row mb-4">
            <div class="col-md-6">
                <h6 class="fw-semibold text-uppercase text-muted">Vendor Information</h6>
                <p class="mb-1 fw-semibold">{{$vendors->name}}</p>
                <p class="mb-1">{{$vendors->address}}</p>
                <p class="mb-1">📧 <a href="mailto:{{$vendors->email}}">{{$vendors->email}}</a></p>
                <p>📞 <a href="tel:+880{{$vendors->mobile}}">+880 {{$vendors->mobile}}</a></p>
                <strong>Photo:</strong>
                @if ($vendors->photo)
                <img src="{{ asset('img/' . $vendors->photo) }}" alt="Vendor Photo" width="80" class="mt-2 border rounded" />
                @else
                No Photo
                @endif
            </div>
            <div class="col-md-6 text-md-end mt-4 mt-md-0">
                <table class="table table-sm table-borderless">
                    <tr>
                        <th class="text-muted">Purchase No:</th>
                        <td>{{$purchase->id}}</td>
                    </tr>
                    <tr>
                        <th class="text-muted">Date:</th>
                        <td>{{ date('d M Y', strtotime($purchase->created_at)) }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <h6 class="text-uppercase fw-semibold text-center mb-3">Products</h6>

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-success text-white">
                    <tr>
                        <th>SL</th>
                        <th>Product</th>
                        <th class="text-center">Qty</th>
                        <th class="text-end">Price</th>
                        <th class="text-end">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sl = 1; $subtotal = 0; @endphp
                    @forelse ($items as $item)
                    @php
                    $data = \App\Models\Product::find($item->product_id);
                    $productName = $data ? $data->name : 'Product not found!';
                    $amount = $item->qty * $item->price;
                    $subtotal += $amount;
                    @endphp
                    <tr>
                        <td>{{ $sl++ }}</td>
                        <td>{{ $productName }}</td>
                        <td class="text-center">{{ $item->qty }}</td>
                        <td class="text-end">{{ number_format($item->price, 2) }}</td>
                        <td class="text-end">{{ number_format($amount, 2) }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-danger">No Products Found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @php
        $discountRate = 0.05;
        $discount = $subtotal * $discountRate;
        $total = $subtotal - $discount;

        @endphp

        <div class="card mt-4 bg-light border-0">
            <div class="card-body p-3">
                <h6 class="text-end text-uppercase fw-semibold">Purcahse Summary</h6>
                <table class="table table-sm table-borderless text-end mb-0">
                    <tr>
                        <th>Subtotal:</th>
                        <td>{{ number_format($subtotal, 2) }} BDT</td>
                    </tr>
                    <tr>
                        <th>Discount (5%):</th>
                        <td class="text-danger">-{{ number_format($discount, 2) }} BDT</td>
                    </tr>
                    <tr class="border-top">
                        <th class="fw-bold">Total:</th>
                        <td class="fw-bold">{{ number_format($total, 2) }} BDT</td>
                    </tr>
                    <tr class="border-top">
                        <th class="fw-bold">Paid Amount:</th>
                        <td class="fw-bold">{{ number_format($purchase->paid_amount, 2) }} BDT</td>
                    </tr>
                    <tr class="border-top">
                        <th class="fw-bold">Due Amount:</th>
                        <td class="fw-bold">{{ number_format($total - $purchase->paid_amount, 2) }} BDT</td>
                    </tr>
                    <tr>
                        <th class="border-top text-success fw-bold">To Be Paid</th>
                        <td class="fw-bold">{{ number_format($total - $purchase->paid_amount, 2) }} BDT</td>
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <div class="card-footer bg-white text-center">
        <small class="text-muted">This invoice is system-generated and fully dynamic.</small>
    </div>
</div>

@endsection