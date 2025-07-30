@extends('layouts.master')
@section('title','Show Purchase')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('purchases.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$purchase->id}}</td></tr>
		<tr><th>Vendor Id</th><td>{{$purchase->vendor_id}}</td></tr>
		<tr><th>Warehouse Id</th><td>{{$purchase->warehouse_id}}</td></tr>
		<tr><th>Purchase Date</th><td>{{$purchase->purchase_date}}</td></tr>
		<tr><th>Delivery Date</th><td>{{$purchase->delivery_date}}</td></tr>
		<tr><th>Purchase Total</th><td>{{$purchase->purchase_total}}</td></tr>
		<tr><th>Paid Amount</th><td>{{$purchase->paid_amount}}</td></tr>
		<tr><th>Status Id</th><td>{{$purchase->status_id}}</td></tr>
		<tr><th>Discount</th><td>{{$purchase->discount}}</td></tr>
		<tr><th>Vat</th><td>{{$purchase->vat}}</td></tr>
		<tr><th>Created At</th><td>{{$purchase->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$purchase->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection










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


//    $items=purchase_details::find($purchase->id);
$products = Product::all();
$company = Company::find(1);

//    print_r($items);
$sl = 1;
$subtotal = 0;

?>
@extends("layouts.master")
@section("page")

<style>
    th {
        background-color: transparent !important;
    }
</style>

<div class="card mb-3">
    <div class="card-body">
        <div class="row justify-content-between align-items-center">
            <div class="col-md">
                <h5 class="mb-2 mb-md-0">Purchase No: {{$purchase->id}}</h5>
            </div>
            <div class="col-auto">
                <!-- <button class="btn btn-success btn-sm me-1 mb-2 mb-sm-0" type="button"><span
                        class="fas fa-arrow-down me-1"> </span>Download (.pdf)</button> -->
                <button class="btn btn-warning btn-sm me-1 mb-2 mb-sm-0" type="button" onclick="window.print()">
                    <span class="fas fa-print me-1"></span>Print
                </button>

                <!-- <button class="btn btn-danger btn-sm mb-2 mb-sm-0" type="button"><span
                        class="fas fa-dollar-sign me-1"></span>Receive Payment</button> -->
            </div>
        </div>
    </div>
</div>

<div class="card mb-3 shadow" style=" width: 85%; margin: 0 auto;">
    <div class="card-body">
        <h2 class="mb-3 text-center text-uppercase mt-4">Purchase Document</h2>

        <div class="row align-items-center text-center mb-3">
            <div class="col-sm-6 text-sm-start"><img src="{{asset('/assets/images/hami-logo.png')}}" alt="invoice"
                    width="100" /></div>
            <div class="col text-sm-end mt-3 mt-sm-0">
                <!-- <h2 class="mb-3">Purchase Invoice</h2> -->
                <h5>{{$company->name}}</h5>
                <p class="fs--1 mb-0">{{$company->street_address}}<br />{{$company->area}}, {{$company->city}}</p>
            </div>
            <div class="col-12">
                <hr />
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
                <h2 class="text-500">vendor:</h2>
                <h5>{{$vendors->name}}</h5>
                <p class="fs--1">{{$vendors->address}}</p>
                <p class="fs--1"><a href="mailto:example@gmail.com">{{$vendors->email}}</a><br /><a
                        href="tel:444466667777">+880 {{$vendors->mobile}}</a></p>
            </div>
            <div class="col-sm-auto ms-auto">
                <div class="table-responsive">
                    <table class="table table-sm table-borderless fs--1">
                        <tbody>
                            <tr>
                                <th class="text-sm-end">Purchase No:</th>
                                <td>{{$purchase->id}}</td>
                            </tr>
                            <!-- <tr>
                <th class="text-sm-end">Order Number:</th>
                <td>AD20294</td>
                </tr> -->
                            <tr>
                                <th class="text-sm-end">Purchase Date:</th>
                                <?php $date = date('Y-m-d', strtotime($purchase->created_at)); ?>
                                <td>{{$date}}</td>
                            </tr>
                            <!-- <tr>
                <th class="text-sm-end">Payment Due:</th>
                <td>Upon receipt</td>
                </tr> -->
                            <tr class="alert alert-success fw-bold">
                                <th class="text-sm-end">Purchase Total:</th>
                                <td>{{$purchase->purchase_total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="table-responsive scrollbar mt-4 fs--1">
            <table class="table table-striped border-bottom">
                <thead class="light">
                    <tr class="bg-success text-white dark__bg-1000">
                        <th class="border-0">Products</th>
                        <th class="border-0 text-center">Quantity</th>
                        <th class="border-0 text-end">Rate</th>
                        <th class="border-0 text-end">Amount (BDT)</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)

                    <tr>
                        <td class="align-middle">
                            <h6 class="mb-0 text-nowrap">
                                <?php
                                $data = Product::find($item->product_id);
                                // $product = json_decode($data);
                                if ($data) {
                                    echo $sl . ". " . $data->name; // Works if product exists
                                } else {
                                    echo $sl . ". Product not found!";
                                }
                                $sl++;
                                ?>

                            </h6>

                        </td>
                        <td class="align-middle text-center">{{$item->qty}}</td>
                        <td class="align-middle text-end">{{$item->price}}</td>
                        <?php
                        $amount = $item->qty * $item->price;
                        $subtotal += $amount;
                        ?>
                        <td class="align-middle text-end">{{$amount}}</td>
                    </tr>

                    @empty
                    <tr>
                        <td>No Product</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        <div class="row justify-content-end">
            <div class="col-auto">
                <table class="table table-sm table-borderless fs--1 text-end">
                    <tr>
                        <th class="text-900">Subtotal:</th>
                        <td class="fw-semi-bold">{{$subtotal}} </td>
                    </tr>
                    <tr>
                        <th class="text-900">Tax 5%:</th>
                        <td class="fw-semi-bold"><?php $tax = $subtotal * 0.05;
                                                    echo $tax; ?></td>
                    </tr>
                    <tr class="border-top">
                        <th class="text-900">Total:</th>
                        <td class="fw-semi-bold">{{$purchase->purchase_total}}</td>
                    </tr>
                    <!-- <tr class="border-top border-top-2 fw-bolder text-900">
            <th>Amount Due:</th>
            <td>$19688.40</td>
            </tr> -->
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer bg-light">
        <!-- <p class="fs--1 mb-0"><strong>Notes: </strong>We really appreciate your business and if there’s anything
            else we can do, please let us know!</p> -->
        <p>This Invoice is Totally Dynamic</p>
    </div>
</div>
@endsection