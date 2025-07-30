<?php

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Warehouse;

$products = Product::all();
$warehouses = Warehouse::all();
$suppliers = Supplier::all();
?>
@extends('layouts.master')
@section('title','Create Purchase')

@section('style')
<style>
    .invoice {
        background: #fff;
        border: 1px solid #f4f4f4;
        padding: 20px;
        position: relative;
    }

    .invoice-title {
        margin-bottom: 20px;
    }

    select.form-control {
        height: 38px;
        border-radius: 4px;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .table {
        width: 100%;
        margin-bottom: 1rem;
        background-color: transparent;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table thead th {
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        background: #f8f9fa;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .btn-sm {
        padding: 0.25rem 0.5rem;
        font-size: 0.875rem;
        line-height: 1.5;
        border-radius: 0.2rem;
    }

    .btn-success {
        color: #fff;
        background-color: #28a745;
        border-color: #28a745;
    }

    .btn-warning {
        color: #212529;
        background-color: #ffc107;
        border-color: #ffc107;
    }

    textarea.form-control {
        min-height: 80px;
        border-radius: 4px;
        padding: 10px;
    }

    input[type="text"],
    input[type="date"] {
        padding: 6px 12px;
        border: 1px solid #ced4da;
        border-radius: 4px;
    }

    .lead {
        font-size: 1.25rem;
        font-weight: 300;
    }

    .no-print {
        margin-top: 20px;
    }

    #supplier-info {
        margin-top: 10px;
        font-style: italic;
        color: #6c757d;
    }

    .address-title {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .align-middle {
        vertical-align: middle !important;
    }

    .text-nowrap {
        white-space: nowrap;
    }
</style>
@endsection

@section('page')
<div class="invoice p-3 mb-3">
    <div class="row invoice-title">
        <div class="col-12">
            <h4>
                <i class="fas fa-warehouse"></i> SHOP.
                <small class="float-right">Date: {{ date("d M Y") }}</small>
            </h4>
        </div>
    </div>

    <div class="row invoice-info mb-4">
        <div class="col-md-4 invoice-col form-group">
            <label>Warehouse</label>
            <select name="warehouse_id" id="warehouse_id" class="form-control">
                <option value="select">Select Warehouse</option>
                @foreach($warehouses as $w)
                <option value="{{ $w->id }}">{{ $w->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 invoice-col form-group">
            <label>Supplier</label>
            <select name="supplier_id" id="supplier_id" class="form-control">
                <option value="select">Select Supplier</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            <div id="supplier-info" class="mt-2"></div>

            <div class="form-group mt-3">
                <label class="address-title">Shipping Address</label>
                <textarea id="txtShippingAddress" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-4 invoice-col">
            <table class="table table-sm table-borderless">
                <tr>
                    <td><strong>Purchase ID:</strong></td>
                    <td><input type="text" class="form-control form-control-sm" style="width:80px" value="{{ \App\Models\Purchase::max('id') + 1 }}" readonly /></td>
                </tr>
                <tr>
                    <td><strong>Purchase Date:</strong></td>
                    <td><input type="date" id="txtPurchaseDate" class="form-control form-control-sm" value="{{ date('Y-m-d') }}" /></td>
                </tr>
                <tr>
                    <td><strong>Delivery Date:</strong></td>
                    <td><input type="date" id="txtDeliveryDate" class="form-control form-control-sm" value="{{ date('Y-m-d') }}" /></td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty/Weight</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th>
                            <button type="button" id="clearAll" class="btn btn-warning btn-sm">
                                <i class="fas fa-trash"></i> Clear All
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>
                            <select name="product_id" id="product_id" class="form-control form-control-sm">
                                <option value="select">Select Product</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th><input type="text" id="txtPrice" class="form-control form-control-sm" placeholder="Price" /></th>
                        <th><input type="text" id="txtQty" class="form-control form-control-sm" placeholder="Qty/Weight" /></th>
                        <th><input type="text" id="txtDiscount" class="form-control form-control-sm" placeholder="Discount" /></th>
                        <th></th>
                        <th>
                            <button type="button" id="btnAdd" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Add
                            </button>
                        </th>
                    </tr>
                </thead>
                <tbody id="tbody"></tbody>
            </table>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="form-group">
                <label class="address-title">Remark</label>
                <textarea id="txtRemark" class="form-control"></textarea>
            </div>
        </div>

        <div class="col-md-6">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal" class="text-end">0.00</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td id="nettotal" class="text-end">0.00</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row no-print mt-4">

        <div class="col-12">
            <button type="button" onclick="printInvoice()" class="btn btn-primary">
                <i class="fas fa-print"></i> Print Order
            </button>
            @csrf
            <button type="button" id="btnProcess" class="btn btn-success float-right">
                <i class="far fa-credit-card"></i> Process Purchase
            </button>
        </div>
    </div>
</div>

<script>
    // Your existing JavaScript remains unchanged
    let cart = [];

    document.querySelector("#btnAdd").addEventListener("click", (e) => {
        let qty = document.querySelector("#txtQty").value;
        let price = document.querySelector("#txtPrice").value;
        let product_id = document.querySelector("#product_id").value;
        let product_name = document.querySelector("#product_id").options[document.querySelector("#product_id").selectedIndex].text;
        let vat = 0;
        let discount = document.querySelector("#txtDiscount").value || 0;
        let lineTotal = qty * price - discount + vat;

        let json = {
            id: cart.length + 1,
            desc: product_name,
            product_id: product_id,
            qty: qty,
            price: price,
            discount: discount,
            vat: vat,
            lineTotal: lineTotal
        };

        cart.push(json);
        console.log(cart);
        printCart();
    });

    function printCart() {
        let html = "";
        let total = 0;
        cart.forEach((item) => {
            html += "<tr>";
            html += `<td class="align-middle"><p class="mb-0">${item.id}</p></td>`
            html += `<td class="align-middle"><h6 class="mb-0 text-nowrap">${item.desc}</h6></td>`;
            html += `<td class="align-middle text-end">${item.price}</td>`;
            html += `<td class="align-middle text-center">${item.qty}</td>`;
            html += `<td class="align-middle text-center">${item.discount}</td>`;
            html += `<td class="align-middle text-end">${item.lineTotal.toFixed(2)}</td>`;
            html += `<td class="align-middle"><button class="btn btn-danger btn-sm" onclick="del(${item.id})"><i class="fas fa-trash"></i></button></td>`;
            html += "</tr>";
            total += item.lineTotal;
        });

        document.querySelector("#tbody").innerHTML = html;
        document.querySelector("#subtotal").innerHTML = total.toFixed(2);
        document.querySelector("#nettotal").innerHTML = total.toFixed(2);
    }

    function del(id) {
        let index = cart.findIndex((item) => {
            return item.id == id;
        });
        cart.splice(index, 1);
        printCart();
    }

    document.querySelector("#clearAll").addEventListener("click", () => {
        if (confirm("Are you sure you want to clear all items?")) {
            cart = [];
            printCart();
        }
    });
</script>

<script>
    function printInvoice() {
        const originalContents = document.body.innerHTML;
        const invoiceContent = document.querySelector('.invoice').innerHTML;
        const printWindow = window.open('', '', 'height=600,width=800');
        printWindow.document.write('<html><head><title>Invoice</title>');
        printWindow.document.write(`<link rel="stylesheet" href="{{ asset('css/app.css') }}">`);
        printWindow.document.write('<style>body{font-family:sans-serif;padding:20px;} table{width:100%;border-collapse:collapse;} th,td{border:1px solid #ccc;padding:8px;} .text-center{text-align:center;}</style>');
        printWindow.document.write('</head><body >');
        printWindow.document.write(invoiceContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        setTimeout(() => {
            printWindow.print();
            printWindow.close();
        }, 500);
    }
</script>
@endsection