<?php

use App\Models\Product;
use App\Models\Uom;
use App\Models\Vendor;
use App\Models\Warehouse;

$products = Product::all();
$warehouses = Warehouse::all();
$suppliers = Vendor::all();
$uoms = Uom::all();
?>

@extends('layouts.master')

@section('style')
<style>
    /* Your existing CSS remains unchanged */
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

<script>
    const products = @json($products);
</script>

<div class="page-title-box text-center my-4">
    <h2 class="display-5 fw-bold text-uppercase" style="letter-spacing: 1px;">
        <i class="fas fa-truck text-primary me-2"></i>Purchase Invoice
    </h2>
    <p class="text-muted">{{ date("l, d M Y") }}</p>
</div>

<div class="invoice p-3 mb-3">
    <div class="row invoice-title">
        <div class="col-12">
            <h4><small class="float-right">Date: {{ date("d M Y") }}</small></h4>
        </div>
    </div>

    <div class="row invoice-title">
        <div class="col-6">
            <h1><i class="fas fa-warehouse"></i></h1>
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
            <label>Vendor</label>
            <select name="supplier_id" id="supplier_id" class="form-control">
                <option value="select">Select Vendor</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                @endforeach
            </select>
            <div id="supplier-info" class="mt-2"></div>
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
                        <th>Qty</th>
                        <th>UoM</th>
                        <th>Discount</th>
                        <th>Subtotal</th>
                        <th>
                            <button type="button" id="clearAll" class="btn btn-warning btn-sm">
                                <i class="fas fa-trash"></i> Clear All
                            </button>
                        </th>
                    </tr>
                    <tr>
                        <th>SL</th>
                        <th>
                            <select name="product_id" id="product_id" class="form-control form-control-sm">
                                <option value="select">Select Product</option>
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </th>
                        <th><input type="text" id="txtPrice" class="form-control form-control-sm" placeholder="Price" /></th>

                        <th><input type="text" id="txtQty" class="form-control form-control-sm" placeholder="Qty" value="1" /></th>
                        <th>
                            <select name="uom_id" id="uom_id" class="form-control form-control-sm">
                                <option value="select">Select UoM</option>
                                @foreach($uoms as $uom)
                                <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                                @endforeach
                            </select>
                        </th>
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
                <!-- <label class="address-title">Remark</label>
                <textarea id="txtRemark" class="form-control"></textarea> -->
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
                        <th style="width:50%">Total Disc:</th>
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
    let cart = [];

    document.querySelector("#btnAdd").addEventListener("click", () => {
        let qty = document.querySelector("#txtQty").value;
        let price = document.querySelector("#txtPrice").value;
        let uom_id = document.querySelector("#uom_id").value;
        let uom_name = document.querySelector("#uom_id").options[document.querySelector("#uom_id").selectedIndex].text;
        let product_id = document.querySelector("#product_id").value;
        let product_name = document.querySelector("#product_id").options[document.querySelector("#product_id").selectedIndex].text;
        let vat = 0;
        let discount = document.querySelector("#txtDiscount").value || 0;
        let lineTotal = qty * price - discount + vat;

        let json = {
            id: cart.length + 1,
            desc: product_name,
            des: uom_name,
            product_id: product_id,
            qty: qty,
            price: price,
            discount: discount,
            vat: vat,
            lineTotal: lineTotal
        };

        cart.push(json);
        printCart();
        document.querySelector("#txtQty").value = 1;
    });

    function printCart() {
        let html = "";
        let total = 0;
        cart.forEach((item) => {
            html += "<tr>";
            html += `<td class="align-middle"><p class="mb-0">${item.id}</p></td>`;
            html += `<td class="align-middle"><h6 class="mb-0 text-nowrap">${item.desc}</h6></td>`;
            html += `<td class="align-middle text-end">${item.price}</td>`;
            html += `<td class="align-middle text-center">${item.qty}</td>`;
            html += `<td class="align-middle"><h6 class="mb-0 text-nowrap">${item.des}</h6></td>`;
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
        let index = cart.findIndex((item) => item.id == id);
        cart.splice(index, 1);
        printCart();
    }

    document.querySelector("#clearAll").addEventListener("click", () => {
        if (confirm("Are you sure you want to clear all items?")) {
            cart = [];
            printCart();
        }
    });

    document.querySelector("#product_id").addEventListener("change", function() {
        const selectedProductId = this.value;
        const selectedProduct = products.find(p => p.id == selectedProductId);
        if (selectedProduct) {
            document.querySelector("#txtPrice").value = selectedProduct.price;
        } else {
            document.querySelector("#txtPrice").value = "";
        }
    });

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

    // let paidAmount = parseFloat(document.querySelector("#paidamount").value) || 0;

    // let jsonData = {
    //     // your other fields
    //     invoice_total: netTotal,
    //     paid_total: paidAmount,
    //     due_total: netTotal - paidAmount,
    //     items: cart
    // };



    // async function CreatePurchase() {

    //     if (confirm("Are you sure?")) {

    //         let date = document.querySelector("#date").innerHTML;
    //         let customer_id = document.querySelector("#customer_id").value;
    //         let total = document.querySelector("#nettotal").innerHTML;


    //         let jsonData = {
    //             created_at: date,
    //             updated_at: date,
    //             customer_id: customer_id,
    //             remark: "Na",
    //             payment_term: "CASH",
    //             invoice_total: total,
    //             paid_total: total,
    //             previous_due: 0,
    //             items: cart
    //         }

    //         console.log(jsonData);

    //         let response = await fetch(`http://localhost/Laravel/MyLaravelProject/public/purchases/save`, {
    //             method: "POST",
    //             headers: {
    //                 "Content-Type": "application/json"
    //             },
    //             body: JSON.stringify(jsonData)
    //         });

    //         let json = response.json();
    //         console.log(json);

    //         cart = [];
    //         printCart();

    //     }

    // }

    // async function CreatePurchase() {

    //     if (confirm("Are you sure?")) {

    //         let date = document.querySelector("#date").innerHTML;
    //         let customer_id = document.querySelector("#customer_id").value;
    //         let total = document.querySelector("#nettotal").innerHTML;


    //         let jsonData = {
    //             created_at: date,
    //             updated_at: date,
    //             customer_id: customer_id,
    //             remark: "Na",
    //             payment_term: "CASH",
    //             invoice_total: total,
    //             paid_total: total,
    //             previous_due: 0,
    //             items: cart
    //         }

    //         console.log(jsonData);

    //         let response = await fetch(`http://localhost/Laravel/MyLaravelProject/public/purchases/save`, {
    //             method: "POST",
    //             headers: {
    //                 "Content-Type": "application/json"
    //             },
    //             body: JSON.stringify(jsonData)
    //         });

    //         let json = response.json();
    //         console.log(json);

    //         cart = [];
    //         printCart();

    //     }

    // }





    // document.querySelector("#btnProcess").addEventListener("click", async () => {
    //     if (!cart.length) {
    //         alert("No items in the cart!");
    //         return;
    //     }

    //     const confirmProcess = confirm("Are you sure you want to process this purchase?");
    //     if (!confirmProcess) return;

    //     const warehouse_id = document.querySelector("#warehouse_id").value;
    //     const supplier_id = document.querySelector("#supplier_id").value;
    //     const purchase_date = document.querySelector("#txtPurchaseDate").value;
    //     const delivery_date = document.querySelector("#txtDeliveryDate").value;
    //     const paid = parseFloat(document.querySelector("#paidamount").value);
    //     const total = parseFloat(document.querySelector("#nettotal").innerHTML);

    //     const purchaseData = {
    //         warehouse_id,
    //         supplier_id,
    //         purchase_date,
    //         delivery_date,
    //         total,
    //         paid,
    //         items: cart
    //     };

    //     const response = await fetch("/purchases/save", {
    //         method: "POST",
    //         headers: {
    //             "Content-Type": "application/json",
    //             "X-CSRF-TOKEN": document.querySelector("input[name=_token]").value
    //         },
    //         body: JSON.stringify(purchaseData)
    //     });

    //     const result = await response.json();
    //     if (result.success) {
    //         alert("Purchase saved successfully!");
    //         location.reload(); // or redirect to invoice
    //     } else {
    //         alert("Error saving purchase.");
    //     }
    // });
</script>
@endsection