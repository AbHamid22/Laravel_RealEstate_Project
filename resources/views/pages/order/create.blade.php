<?php

use App\Models\Company;
use App\Models\Customer;
use App\Models\Property;

$properties = Property::all();
$customers = Customer::all();
$company = Company::find(1);
?>

@extends('layouts.master')
@section('title','Create Order')
@section('style')


@endsection

@section('page')
<style>
    #customer_id {
        padding: 5px;
    }
</style>

<div class="invoice p-3 mb-3">
    <div class="row">
        <div class="col-6">
            <h4>
              <small class="float-right"> <b>Date:</b>  {{ date("d M Y") }}</small>
            </h4>
        </div>
    </div>
    
    <br>

    <div class="row invoice-info">
        <div class="row align-items-center text-center mb-3">
            <div class="col text-sm-end mt-3 mt-sm-0">
                <img src="{{ asset('img/' . $company->logo) }}" width="100" />
                <h2 class="mb-3">Order Invoice</h2>
                <h5>{{ $company->name }}</h5>
                <p class="fs--1 mb-0">{{ $company->street_address }}<br>{{ $company->area }}, {{ $company->city }}</p>
            </div>
            <div class="col-12">
                <hr />
            </div>
        </div>

        <div class="col-md-4 invoice-col form-group">
            <label>Customer</label>
            <select name="customer_id" id="customer_id" class="form-control">
                <option value="select">Select Customer</option>
                @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                @endforeach
            </select>
            <div id="customer-info" class="mt-2"></div>

                 </div>

        <div class="col-sm-4 invoice-col">
            <table>
                <tr>
                    <td><b>Order ID:</b></td>
                    <td><input type="text" style="width:60px" value="{{ \App\Models\Order::max('id') + 1 }}" readonly /></td>
                </tr>
                <tr>
                    <td><b>Order Date:</b></td>
                    <td><input type="text" id="txtOrderDate" value="{{ date('d-m-Y') }}" /></td>
                </tr>
                <tr>
                    <td><b>Handover Date:</b></td>
                    <td><input type="text" id="txtDueDate" value="{{ date('d-m-Y') }}" /></td>
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
                        <th>Property</th>
                        <th>Total Amount</th>
                        <th>Flat No</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th><input type="button" id="clearAll" value="Clear" /></th>
                    </tr>
                    <tr>
                        <th></th>
                        <th>
                            <select name="property_id" id="property_id" class="form-control form-control-sm">
                                <option value="select">Select Property</option>
                                @foreach($properties as $property)
                                <option value="{{ $property->id }}">{{ $property->title }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th><input type="text" id="txtPrice" /></th>
                        <th><input type="text" id="flat_no" /></th>
                        <th><input type="text" id="txtDiscount" /></th>
                        <th></th>
                        <th><input type="button" id="btnAdd" value=" + " /></th>
                    </tr>
                </thead>
                <tbody id="items"></tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <strong>Remark</strong><br>
            <textarea id="txtRemark"></textarea>
        </div>
        <div class="col-6">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal">0</td>
                    </tr>
                    <tr>
                        <th>Tax (5%):</th>
                        <td id="tax">0</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td id="nettotal">0</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="row no-print">
        <div class="col-12">
            <button type="button" onclick="printInvoice()" class="btn btn-primary">
                <i class="fas fa-print"></i> Print Order
            </button>

            <button type="button" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Save Order</button>
            <!-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                <i class="fas fa-download"></i> Generate PDF
            </button> -->
        </div>
    </div>
</div>
<script>
    let cart = [];

    document.querySelector("#btnAdd").addEventListener("click", () => {
        const flat_no = document.querySelector("#flat_no").value.trim();
        const price = parseFloat(document.querySelector("#txtPrice").value);
        const property_id = document.querySelector("#property_id").value;
        const property_name = document.querySelector("#property_id").options[document.querySelector("#property_id").selectedIndex].text;
        const discount = parseFloat(document.querySelector("#txtDiscount").value) || 0;

        if (property_id === "select" || !flat_no || isNaN(price)) {
            alert("Please fill all fields correctly.");
            return;
        }

        const subtotal = price - discount;

        const item = {
            id: cart.length + 1,
            desc: property_name,
            property_id,
            flat_no,
            price,
            discount,
            subtotal
        };

        cart.push(item);
        printCart();

      
        document.querySelector("#txtPrice").value = "";
        document.querySelector("#flat_no").value = "";
        document.querySelector("#txtDiscount").value = "";
        document.querySelector("#property_id").value = "select";
    });

    document.querySelector("#clearAll").addEventListener("click", () => {
        cart = [];
        printCart();
    });

    function printCart() {
        let html = "";
        let total = 0;

        cart.forEach((item, index) => {
            html += "<tr>";
            html += `<td>${index + 1}</td>`;
            html += `<td>${item.desc}</td>`;
            html += `<td>${item.price}</td>`;
            html += `<td>${item.flat_no}</td>`;
            html += `<td>${item.discount}</td>`;
            html += `<td>${item.subtotal.toFixed(2)}</td>`;
            html += `<td><input type="button" onclick="del(${item.id})" value="del" /></td>`;
            html += "</tr>";

            total += item.subtotal;
        });

        const tax = total * 0.05;
        const netTotal = total + tax;

        document.querySelector("#items").innerHTML = html;
        document.querySelector("#subtotal").innerHTML = total.toFixed(2);
        document.querySelector("#tax").innerHTML = tax.toFixed(2);
        document.querySelector("#nettotal").innerHTML = netTotal.toFixed(2);
    }

    function del(id) {
        cart = cart.filter(item => item.id !== id);
    
        cart.forEach((item, index) => item.id = index + 1);
        printCart();
    }
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