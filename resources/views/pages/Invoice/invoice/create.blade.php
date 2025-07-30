<?php

use App\Models\Company;
use App\Models\Customer;
use App\Models\Property;
use Illuminate\Support\Facades\DB;

// Get properties that are NOT already invoiced
$properties = Property::whereNotIn('id', function($query) {
    $query->select('property_id')
          ->from('invoice_details')
          ->distinct();
})->get();

$customers = Customer::all();
$company = Company::find(1);
?>

@extends('layouts.master')
@section('title', 'Create Invoice')
@section('style')
<style>
    #customer_id {
        padding: 5px;
    }
</style>
@endsection

@section('page')
<a class='btn btn-success' href="{{route('invoices.index')}}">
    <i class="fas fa-arrow-up"></i>Check Invoices</a>

<script>
    const properties = @json($properties);
</script>

<div class="container py-4 invoice">
    <div class="card shadow-lg border-0 mb-4">
        <div class="card-body">
            <h1 class="mb-1 text-center text-info fw-bold" style="font-size: 3rem;">Invoice</h1>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <img src="{{ asset('img/' . $company->logo) }}" width="80" class="mb-2" />
                    <h4 class="mb-1">{{ $company->name }}</h4>
                    <p class="mb-0 text-muted">{{ $company->street_address }}, {{ $company->area }}, {{ $company->city }}</p>
                </div>
                <div class="text-end">
                    <p class="mb-1"><strong>Invoice ID:</strong> {{ \App\Models\Invoice::max('id') + 1 }}</p>
                    <p class="mb-1"><strong>Date:</strong> {{ date('d M Y') }}</p>
                </div>
            </div>

            <div class="row g-3 mb-4">
                <div class="col-md-6">
                    <label for="customer_id" class="form-label">Customer</label>
                    <select name="customer_id" id="customer_id" class="form-control" required>
                        <option value="select">Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <div id="customer-info" class="mt-2"></div>
                </div>
                <div class="col-md-3">
                    <label for="txtIssueDate" class="form-label">Issue Date</label>
                    <input type="text" name="issue_date" id="txtIssueDate" class="form-control" value="{{ date('Y-m-d') }}" />
                </div>
                <div class="col-md-3">
                    <label for="txtDueDate" class="form-label">Due Date</label>
                    <input type="date" name="due_date" id="txtDueDate" class="form-control" value="{{ date('Y-m-d') }}" />

                </div>
            </div>

            <div class="table-responsive mb-3">
                @if($properties->count() > 0)
                    <div class="alert alert-info mb-3">
                        <i class="fas fa-info-circle"></i>
                        <strong>Note:</strong> Only properties that haven't been invoiced yet are available for selection.
                    </div>
                @else
                    <div class="alert alert-warning mb-3">
                        <i class="fas fa-exclamation-triangle"></i>
                        <strong>No Available Properties:</strong> All properties have already been invoiced. Please check existing invoices or add new properties.
                    </div>
                @endif
                
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Property</th>
                            <th>ProjectId</th>
                            <th>Amount</th>
                            <th>Discount</th>
                            <th>Subtotal</th>

                            <td><button type="button" id="clearAll" class="btn btn-sm btn-danger">Clear All</button></td>

                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <select id="property_id" class="form-control form-control-sm" {{ $properties->count() == 0 ? 'disabled' : '' }}>
                                    <option value="select">Available Properties</option>
                                    @foreach($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->title }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td><input type="text" id="project_id" class="form-control form-control-sm" placeholder="project_id" {{ $properties->count() == 0 ? 'disabled' : '' }} /></td>
                            <td><input type="text" id="txtPrice" class="form-control form-control-sm" placeholder="Amount" {{ $properties->count() == 0 ? 'disabled' : '' }} /></td>
                            <td><input type="text" id="txtDiscount" class="form-control form-control-sm" placeholder="discount" {{ $properties->count() == 0 ? 'disabled' : '' }} /></td>
                            <td></td>
                            <th>
                                <button type="button" id="btnAdd" class="btn btn-sm btn-success" {{ $properties->count() == 0 ? 'disabled' : '' }}>Add</button>
                            </th>

                        </tr>
                    </thead>
                    <tbody id="items"></tbody>
                </table>
            </div>

            <div class="row g-4 mb-4 align-items-start">
                <!-- Remarks -->
                <div class="col-md-6">
                    <label for="txtRemark" class="form-label fw-semibold">Remarks</label>
                    <textarea name="remark" id="txtRemark" class="form-control" rows="4" placeholder="Write any notes or remarks here..."></textarea>
                </div>

                <!-- Status -->
                <div class="col-md-3">
                    <label for="status" class="form-label fw-semibold">Payment Status</label>
                    <select class="form-select" name="status" id="status">
                        <option value="Unpaid">Unpaid</option>
                        <option value="Paid">paid</option>
                        <option value="partial">Partial</option>
                    </select>
                </div>

                <!-- Totals -->
                <div class="col-md-3">
                    <div class="border rounded shadow-sm p-3 bg-light">
                        <table class="table table-borderless m-0">
                            <tr>
                                <th>Subtotal:</th>
                                <td class="text-end" id="subtotal">0.00</td>
                            </tr>
                            <tr class="border-top">
                                <th>Total:</th>
                                <td class="text-end fw-bold text-success" id="nettotal">0.00</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>


            <input type="hidden" name="cart_data" id="cart_data" />

            <div class="text-end">
                <button type="button" onclick="printInvoice()" class="btn btn-primary me-2">
                    <i class="fa fa-print"></i> Print
                </button>
                @csrf
                <button type="button" id="btnProcess" class="btn btn-success float-right">
                    <i class="far fa-credit-card"></i>Save Invoice.
                </button>
                <!-- <button type="button" id="btnProcessOrder" class="btn btn-success">
                    <i class="far fa-credit-card"></i> Save Invoice
                </button> -->
            </div>
        </div>
    </div>
</div>



{{-- Scripts --}}
<script>
    let cart = [];

    document.querySelector("#btnAdd").addEventListener("click", () => {
        const project_id = document.querySelector("#project_id").value.trim();
        const price = parseFloat(document.querySelector("#txtPrice").value);
        const issue_date = document.querySelector("#txtIssueDate").value;
        const due_date = document.querySelector("#txtDueDate").value;
        const remark = document.querySelector("#txtRemark").value;
        const status = document.querySelector("#status").value;
        const property_id = document.querySelector("#property_id").value;
        const property_name = document.querySelector("#property_id").options[document.querySelector("#property_id").selectedIndex].text;
        const discount = parseFloat(document.querySelector("#txtDiscount").value) || 0;

        if (property_id === "select" || !project_id || isNaN(price)) {
            alert("Please fill all fields correctly.");
            return;
        }

        // Check if property is already in cart
        const existingItem = cart.find(item => item.property_id === property_id);
        if (existingItem) {
            alert("This property is already added to the invoice. Please select a different property.");
            return;
        }

        const subtotal = price - discount;

        const item = {
            id: cart.length + 1,
            desc: property_name,
            property_id,
            project_id,
            amount: price,
            discount,
            subtotal
        };

        cart.push(item);
        printCart();
        updatePropertyDropdown();

        document.querySelector("#txtPrice").value = "";
        document.querySelector("#project_id").value = "";
        document.querySelector("#txtDiscount").value = "";
        document.querySelector("#property_id").value = "select";
    });

    document.querySelector("#clearAll").addEventListener("click", () => {
        cart = [];
        printCart();
        updatePropertyDropdown();
    });

    function del(id) {
        cart = cart.filter(item => item.id !== id);
        cart.forEach((item, index) => item.id = index + 1);
        printCart();
        updatePropertyDropdown();
    }

    function updatePropertyDropdown() {
        const propertySelect = document.querySelector("#property_id");
        const allOptions = propertySelect.querySelectorAll("option");
        
        // Reset all options to enabled
        allOptions.forEach(option => {
            if (option.value !== "select") {
                option.disabled = false;
            }
        });
        
        // Disable options for properties already in cart
        cart.forEach(item => {
            const option = propertySelect.querySelector(`option[value="${item.property_id}"]`);
            if (option) {
                option.disabled = true;
            }
        });
    }

    function printCart() {
        let html = "";
        let total = 0;

        cart.forEach((item, index) => {
            html += "<tr>";
            html += `<td>${index + 1}</td>`;
            html += `<td>${item.desc}</td>`;
            html += `<td>${item.project_id}</td>`;
            html += `<td>${item.amount}</td>`;
            html += `<td>${item.discount}</td>`;
            html += `<td>${item.subtotal.toFixed(2)}</td>`;
            html += `<td><input type="button" onclick="del(${item.id})" value="Del" class="btn btn-sm btn-danger" /></td>`;
            html += "</tr>";

            total += item.subtotal;
        });

        // const tax = total * 0.05;
        const netTotal = total;

        document.querySelector("#items").innerHTML = html;
        document.querySelector("#subtotal").innerHTML = total.toFixed(2);
        // document.querySelector("#tax").innerHTML = tax.toFixed(2);
        document.querySelector("#nettotal").innerHTML = netTotal.toFixed(2);
    }

    document.querySelector("#btnProcess").addEventListener("click", async function() {
        const customerId = document.querySelector("#customer_id").value;
        if (customerId === "select") {
            alert("Please select a customer.");
            return;
        }
        if (cart.length === 0) {
            alert("Please add at least one Property.");
            return;
        }

        if (!confirm("Are you sure you want to Save this Invoice?")) {
            return;
        }

        const invoiceData = {
            customer_id: document.querySelector("#customer_id").value,
            issue_date: document.querySelector("#txtIssueDate").value,
            due_date: document.querySelector("#txtDueDate").value,
            discount: parseFloat(document.querySelector("#txtDiscount").value) || 0,
            total_amount: parseFloat(document.querySelector("#nettotal").innerHTML) || 0,
            remark: document.querySelector("#txtRemark").value,
            status: document.querySelector("#status").value,
            items: cart,
            _token: document.querySelector("input[name='_token']").value,
        };

        try {
            const response = await fetch("http://localhost/Laravel/MyLaravelProject/public/api/invoices", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": invoiceData._token
                },
                body: JSON.stringify(invoiceData),
            });

            const result = await response.json();

            if (response.ok) {
                alert("Invoice Saved successfully.");
                window.location.reload(); // or redirect
            } else {
                console.error(result);
                alert("Failed to save Invoice.");
            }
        } catch (error) {
            console.error("Error:", error);
            alert("Something went wrong while processing.");
        }
    });


    document.querySelector("#property_id").addEventListener("change", function() {
        const selectedPropertyId = this.value;
        const selectedProperty = properties.find(p => p.id == selectedPropertyId);
        if (selectedProperty) {
            document.querySelector("#txtPrice").value = selectedProperty.price || "";
            // document.querySelector("#txtDiscount").value = selectedProperty.discount || "0";
            document.querySelector("#project_id").value = selectedProperty.project_id || "";
        } else {
            document.querySelector("#txtPrice").value = "";
            // document.querySelector("#txtDiscount").value = "";
            document.querySelector("#project_id").value = "";
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

    
</script>

<script>
    const customers = @json($customers);
    const basePath = "{{ asset('img/customers') }}/";

    document.getElementById('customer_id').addEventListener('change', function() {
        const customrId = this.value;
        const customer = customers.find(c => c.id == customrId);

        const customerDiv = document.getElementById('customer-info');
        if (customer) {
            customerDiv.innerHTML = `
                <strong>Type:</strong> ${customer.type ?? 'N/A'}<br>
                <strong>Phone:</strong> ${customer.phone ?? 'N/A'}<br>
                <strong>Email:</strong> ${customer.email ?? 'N/A'}<br>
                 
            `;
        } else {
            customerDiv.innerHTML = '';
        }
    });
</script>



@endsection