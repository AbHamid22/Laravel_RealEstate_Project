
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
    :root {
        --primary-color: #3498db;
        --secondary-color: #2c3e50;
        --accent-color: #e74c3c;
        --light-gray: #f8f9fa;
        --dark-gray: #6c757d;
    }
    
   

    .header {
        text-align: center;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #eee;
    }

    .header img {
        max-height: 80px;
        margin-bottom: 1rem;
    }

    .header h2 {
        margin: 0.5rem 0;
        color: var(--secondary-color);
        font-weight: 600;
    }

    .header h4 {
        color: var(--primary-color);
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .header p {
        margin: 0.3rem 0;
        color: var(--dark-gray);
        font-size: 0.9rem;
    }

    .header h3 {
        margin-top: 1.5rem;
        color: var(--secondary-color);
        font-size: 1.5rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .receipt-details {
        margin-bottom: 2rem;
        background: var(--light-gray);
        padding: 1.5rem;
        border-radius: 6px;
    }

    .receipt-details table {
        width: 100%;
    }

    .receipt-details td {
        padding: 0.5rem 0;
        vertical-align: top;
    }

    .receipt-details strong {
        color: var(--secondary-color);
        font-weight: 500;
    }

    .form-control {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 0.5rem 0.75rem;
        width: 100%;
        font-size: 0.9rem;
        margin-top: 0.3rem;
    }

    .form-control:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px rgba(52, 152, 219, 0.2);
    }

    .items-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 1.5rem;
    }

    .items-table thead {
        background-color: var(--primary-color);
        color: white;
    }

    .items-table th {
        padding: 0.75rem;
        text-align: left;
        font-weight: 500;
    }

    .items-table td {
        padding: 0.75rem;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
    }

    .items-table tr:last-child td {
        border-bottom: none;
    }

    .items-table input[type="text"] {
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 0.5rem;
        width: 100%;
        font-size: 0.9rem;
    }

    .items-table input[type="button"] {
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 4px;
        padding: 0.5rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .items-table input[type="button"]:hover {
        background-color: #2980b9;
    }

    .total {
        text-align: right;
        font-size: 1.1rem;
        margin: 1.5rem 0;
        padding: 1rem;
        background-color: var(--light-gray);
        border-radius: 6px;
    }

    .total strong {
        font-size: 1.3rem;
        color: var(--accent-color);
        margin-left: 1rem;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 4px;
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s;
        display: block;
        width: 100%;
        margin: 1.5rem 0;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .btn-primary:hover {
        background-color: #2980b9;
    }

    .footer {
        margin-top: 2.5rem;
    }

    .signature {
        text-align: center;
        margin-top: 3rem;
    }

    .signature-line {
        border-top: 1px solid #000;
        width: 250px;
        margin: 0 auto;
        padding-top: 0.5rem;
        color: var(--dark-gray);
        font-size: 0.9rem;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .receipt-container {
            padding: 1.5rem;
        }
        
        .header h3 {
            font-size: 1.3rem;
        }
        
        .receipt-details {
            padding: 1rem;
        }
    }
</style>

<div class="receipt-container">
    <div class="header">
        <img src="{{ asset('img/' . $company->logo) }}" alt="{{ $company->name }}" />
        <div>
            <h4>{{ $company->name }}</h4>
            <p>{{ $company->address }}</p>
            <p>Phone: {{ $company->phone }} | Email: {{ $company->email }}</p>
            <h3>Money Receipt</h3>
        </div>
    </div>

    <div class="receipt-details">
        <table>
            <tr>
                <td width="50%">
                    <strong>Receipt No:</strong> <span id="receiptNo">MR-{{ str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT) }}</span>
                </td>
                <td width="50%">
                    <strong>Date:</strong> <span id="date">{{ date("d M, Y") }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Received From:</strong>
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="select">Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </td>
                <td>
                    <strong>Payment Method:</strong>
                    <select name="payment_method" id="payment_method" class="form-control">
                        <option value="Cash">Cash</option>
                        <option value="Bank Transfer">Bank Transfer</option>
                        <option value="Credit Card">Credit Card</option>
                        <option value="Check">Check</option>
                    </select>
                </td>
            </tr>
        </table>
    </div>

    <table class="items-table">
        <thead>
            <tr>
                <th width="40%">Description</th>
                <th width="15%">Unit</th>
                <th width="20%">Price</th>
                <th width="15%">Amount</th>
                <th width="10%"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select name="property_id" id="property_id" class="form-control">
                        <option value="select">Select Property</option>
                        @foreach($properties as $property)
                        <option value="{{ $property->id }}">{{ $property->title }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="number" name="unit" id="unit" value="1" min="1" step="1" /></td>
                <td><input type="number" name="price" id="price" min="0" step="0.01" placeholder="0.00" /></td>
                <td><span id="lineTotal">0.00</span></td>
                <td><input type="button" value="Add" name="btnAdd" id="btnAdd" /></td>
            </tr>
        </tbody>
        <tbody id="tbody">
        </tbody>
    </table>
    
    <input type="button" class="btn btn-primary" onclick="CreateMr()" name="btnProcess" value="Create Money Receipt" />
    
    <div class="total">
        Total Amount: <strong id="total">0.00</strong>
    </div>

    <div class="footer">
        <div class="signature">
            <div class="signature-line">Authorized Signature</div>
        </div>
    </div>
</div>

<script>
    // Your existing JavaScript remains the same
    let base_url = "http://localhost/intellect8/api";
    let cart = [];
    document.querySelector("#btnAdd").addEventListener("click", (e) => {
        let unit = document.querySelector("#unit").value;
        let price = document.querySelector("#price").value;
        let property_id = document.querySelector("#property_id").value;
        let property_name = document.querySelector("#property_id").options[document.querySelector("#property_id").selectedIndex].text;

        let lineTotal = unit * price;

        let json = {
            id: cart.length + 1,
            desc: property_name,
            property_id: property_id,
            qty: unit,
            price: price,
            lineTotal: lineTotal
        };

        cart.push(json);
        printCart();
    });

    function printCart() {
        let html = "";
        let total = 0;
        cart.forEach((item) => {
            html += "<tr>";
            html += `<td>${item.desc}</td>`;
            html += `<td>${item.qty}</td>`;
            html += `<td>${item.price.toFixed(2)}</td>`;
            html += `<td>${item.lineTotal.toFixed(2)}</td>`;
            html += `<td><button class="btn-delete" onclick="del(${item.id})">×</button></td>`;
            html += "</tr>";
            total += item.lineTotal;
        });

        document.querySelector("#tbody").innerHTML = html;
        document.querySelector("#total").innerHTML = total.toFixed(2);
    }

    function del(id) {
        let index = cart.findIndex((item) => {
            return item.id == id;
        });
        cart.splice(index, 1);
        printCart();
    }

    // Calculate line total when price or unit changes
    document.querySelector("#price").addEventListener("input", calculateLineTotal);
    document.querySelector("#unit").addEventListener("input", calculateLineTotal);

    function calculateLineTotal() {
        let unit = parseFloat(document.querySelector("#unit").value) || 0;
        let price = parseFloat(document.querySelector("#price").value) || 0;
        document.querySelector("#lineTotal").textContent = (unit * price).toFixed(2);
    }
</script>
@endsection