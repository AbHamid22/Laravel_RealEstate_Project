<?php

use App\Models\Product;
use App\Models\Uom;
use App\Models\Vendor;
use App\Models\Warehouse;

$products = Product::all();
$warehouses = Warehouse::all();
$vendors = Vendor::all();
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

    #vendor-info {
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

    #tbody {
        max-height: 300px;
        overflow-y: auto;
        display: block;
    }
</style>
@endsection

@section('page')

<script>
    const products = @json($products);
</script>

<a class='btn btn-success' href="{{route('purchases.index')}}">
    <i class="fas fa-arrow-up"></i> Go to Purchase Invoice
</a>

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
            <label for="warehouse_id" class="form-label">Warehouse</label>
            <select name="warehouse_id" id="warehouse_id" class="form-select">
                <option value="">-- Select Warehouse --</option>
                @foreach ($warehouses as $warehouse)
                <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                @endforeach
            </select>
            <div id="warehouse-info" class="mt-2 text-sm text-gray-600"></div>
        </div>


        <div class="col-md-4 invoice-col form-group">
            <label for="vendor_id" class="form-label">Vendor</label>
            <select name="vendor_id" id="vendor_id" class="form-select">
                <option value="">-- Select Vendor --</option>
                @foreach ($vendors as $vendor)
                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                @endforeach
            </select>
            <div id="vendor-info" class="mt-2 text-sm text-gray-600"></div>
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
                        <th>UnitPrice</th>
                        <th>Qty</th>
                        <th>UoM_Id</th>
                        <th>Discount(%)</th>
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
                        <th><input type="text" id="uom" class="form-control form-control-sm" placeholder="UoM_Id" /></th>
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
        <div class="col-md-8">
            <div class="form-group">
          
            </div>
        </div>

        <div class="col-md-4">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th style="width:50%">Total UnitPrice:</th>
                        <td id="subtotal" class="text-end">0.00</td>
                    </tr>

                    <tr>
                        <th style="width:50%">Total Discount(-):</th>
                        <td id="totaldisc" class="text-end">0.00</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td id="nettotal" class="text-end">0.00</td>
                    </tr>
                    <tr>
                        <th>Paid Amount:</th>
                        <td>
                            <input type="text" id="paidamount" class="form-control form-control-sm text-end" value="" />
                        </td>
                    </tr>
                    <tr>
                        <th>Due Amount:</th>
                        <td id="dueamount" class="text-end">0.00</td>
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

    document.querySelector("#btnAdd").addEventListener("click", function() {
        let qty = document.querySelector("#txtQty").value;
        let price = document.querySelector("#txtPrice").value;
        let product_id = document.querySelector("#product_id").value;
        let product_name = document.querySelector("#product_id").options[document.querySelector("#product_id").selectedIndex].text;
        let vat = 5;
        let uom = document.querySelector("#uom").value || 0;

        let discountpercent = document.querySelector("#txtDiscount").value || 0;
        let discount = (price * qty) * (discountpercent / 100);
        let lineTotal = (price * qty) - discount;

        let json = {
            id: cart.length + 1,
            desc: product_name,
            product_id: product_id,
            qty: qty,
            price: price,
            uom_id: uom,
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
        let subtotal = 0;
        let totalDiscount = 0;

        cart.forEach((item) => {
            html += "<tr>";
            html += `<td class="align-middle">${item.id}</td>`;
            html += `<td class="align-middle">${item.desc}</td>`;
            html += `<td class="align-middle text-end">${item.price}</td>`;
            html += `<td class="align-middle text-center">${item.qty}</td>`;
            html += `<td class="align-middle text-center">${item.uom_id}</td>`;
            html += `<td class="align-middle text-center">${item.discount}</td>`;
            html += `<td class="align-middle text-end">${item.lineTotal.toFixed(2)}</td>`;
            html += `<td class="align-middle"><button class="btn btn-danger btn-sm" onclick="del(${item.id})"><i class="fas fa-trash"></i></button></td>`;
            html += "</tr>";

            subtotal += parseFloat(item.price) * parseFloat(item.qty);
            totalDiscount += parseFloat(item.discount);
        });

        const netTotal = subtotal - totalDiscount;
        const paidAmount = parseFloat(document.querySelector("#paidamount").value) || 0;
        const dueAmount = netTotal - paidAmount;

        document.querySelector("#tbody").innerHTML = html;
        document.querySelector("#subtotal").innerHTML = subtotal.toFixed(2);
        document.querySelector("#totaldisc").innerHTML = totalDiscount.toFixed(2);
        document.querySelector("#nettotal").innerHTML = netTotal.toFixed(2);
        document.querySelector("#dueamount").innerHTML = dueAmount.toFixed(2);
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
            document.querySelector("#txtPrice").value = selectedProduct.price || "";
            document.querySelector("#txtDiscount").value = selectedProduct.discount || "0";
            document.querySelector("#uom").value = selectedProduct.uom_id || "";
        } else {
            document.querySelector("#txtPrice").value = "";
            document.querySelector("#txtDiscount").value = "";
            document.querySelector("#uom").value = "";
        }
    });


    function printInvoice() {
        const originalContents = document.body.innerHTML;
        const invoiceContent = document.querySelector('.invoice').innerHTML;
        const printWindow = window.open('', '', 'height=600,width=800');

        printWindow.document.write('<html><head><title>Purchase Invoice</title>');
        printWindow.document.write('<style>');
        printWindow.document.write(`
            body { font-family: Arial, sans-serif; padding: 20px; }
            table { width: 100%; border-collapse: collapse; margin-bottom: 1rem; }
            th, td { border: 1px solid #dee2e6; padding: 8px; }
            .text-center { text-align: center; }
            .text-end { text-align: right; }
            .table-striped tbody tr:nth-of-type(odd) { background-color: rgba(0,0,0,.05); }
            .btn { display: none; }
            .no-print { display: none; }
        `);
        printWindow.document.write('</style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(invoiceContent);
        printWindow.document.write('</body></html>');
        printWindow.document.close();
        printWindow.focus();
        setTimeout(() => {
            printWindow.print();
            printWindow.close();
        }, 500);
    }




    document.querySelector("#btnProcess").addEventListener("click", function() {
 
        const warehouseId = document.querySelector("#warehouse_id").value;
        const vendorId = document.querySelector("#vendor_id").value;
        const purchaseDate = document.querySelector("#txtPurchaseDate").value;
        const deliveryDate = document.querySelector("#txtDeliveryDate").value;

        if (!warehouseId) {
            alert("Please select a warehouse.");
            return;
        }
        if (!vendorId) {
            alert("Please select a vendor.");
            return;
        }
        if (!purchaseDate) {
            alert("Please select a purchase date.");
            return;
        }
        if (!deliveryDate) {
            alert("Please select a delivery date.");
            return;
        }
        if (cart.length === 0) {
            alert("Please add at least one product.");
            return;
        }

        if (!confirm("Are you sure you want to process this purchase?")) {
            return;
        }

        const purchaseData = {
            warehouse_id: warehouseId,
            vendor_id: vendorId,
            purchase_date: purchaseDate,
            delivery_date: deliveryDate,
            paid_amount: parseFloat(document.querySelector("#paidamount").value) || 0,
            discount: parseFloat(document.querySelector("#txtDiscount").value) || 0,
            uom_id: document.querySelector("#uom").value,
            purchase_total: parseFloat(document.querySelector("#nettotal").innerHTML) || 0,
            items: cart,
        };

        fetch("http://localhost/Laravel/MyLaravelProject/public/api/purchases", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                },
                body: JSON.stringify(purchaseData),
            })
            .then(response => response.json())
            .then(result => {
                if (result.id) {
                    alert("Purchase saved successfully.");
                    window.location.href = "{{ route('purchases.index') }}";
                } else {
                    console.error(result);
                    alert(result.messege || "Failed to save purchase. Please check the console for details.");
                }
            })

    });
</script>


<script>
    const vendors = @json($vendors);
    const warehouses = @json($warehouses);
    const basePath = "{{ asset('img') }}/";

    document.getElementById('vendor_id').addEventListener('change', function() {
        const vendorId = this.value;
        const vendor = vendors.find(v => v.id == vendorId);

        const vendorDiv = document.getElementById('vendor-info');
        if (vendor) {
            vendorDiv.innerHTML = `
                <strong>Address:</strong> ${vendor.address ?? 'N/A'}<br>
                <strong>Phone:</strong> ${vendor.mobile ?? 'N/A'}<br>
                <strong>Email:</strong> ${vendor.email ?? 'N/A'}<br>
                <strong>Photo:</strong> ${vendor.photo ? `<img src="${basePath}${vendor.photo}"
                 alt="vendor Photo" width="80" class="mt-2 border rounded" />` : 'No Photo'}
                
            `;
        } else {
            vendorDiv.innerHTML = '';
        }
    });

    document.getElementById('warehouse_id').addEventListener('change', function() {
        const warehouseId = this.value;
        const warehouse = warehouses.find(w => w.id == warehouseId);

        const warehouseDiv = document.getElementById('warehouse-info');
        if (warehouse) {
            warehouseDiv.innerHTML = `
                <strong>Address:</strong> ${warehouse.city ?? 'N/A'}<br>
                <strong>Phone:</strong> ${warehouse.contact ?? 'N/A'}
            `;
        } else {
            warehouseDiv.innerHTML = '';
        }
    });
</script>


@endsection