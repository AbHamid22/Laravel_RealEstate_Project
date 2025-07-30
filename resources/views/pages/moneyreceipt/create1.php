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
  .receipt-container {
    max-width: 1000px;
    margin: auto;
    border: 1px solid #ccc;
    padding: 2px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    background-color: #fff;
  }

  .header {
    text-align: center;
    margin-bottom: 20px;
  }

  .header h2 {
    margin: 0;
  }

  .receipt-details {
    margin-bottom: 30px;
  }

  .receipt-details table {
    width: 100%;
    border-collapse: collapse;
  }

  .receipt-details td {
    padding: 5px;
  }

  .items-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  .items-table th,
  .items-table td {
    border: 1px solid #ccc;
    padding: 8px;
    text-align: left;
  }

  .total {
    text-align: right;
    font-size: 18px;
    margin-top: 10px;
  }

  .footer {
    margin-top: 40px;
    display: flex;
    justify-content: space-between;
  }

  .signature {
    text-align: center;
    margin-top: 50px;
  }

  .signature-line {
    border-top: 1px solid #000;
    width: 200px;
    margin: auto;
    padding-top: 5px;
  }
</style>
<div class="receipt-container">
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
                   <div><strong>Received From:</strong> <h3>Customer</h3></div> 
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
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const base_url = "{{ url('/api') }}";
        let cart = [];

        // DOM Elements
        const btnAdd = document.querySelector("#btnAdd");
        const btnProcess = document.querySelector("[name='btnProcess']");
        const tbody = document.querySelector("#tbody");
        const unitInput = document.querySelector("#unit");
        const priceInput = document.querySelector("#price");
        const propertySelect = document.querySelector("#property_id");
        const customerSelect = document.querySelector("#customer_id");

        // Event Listeners
        btnAdd.addEventListener("click", addToCart);
        btnProcess.addEventListener("click", createMoneyReceipt);
        priceInput.addEventListener("input", calculateLineTotal);
        unitInput.addEventListener("input", calculateLineTotal);

        // Functions
        function calculateLineTotal() {
            const unit = parseFloat(unitInput.value) || 0;
            const price = parseFloat(priceInput.value) || 0;
            document.querySelector("#lineTotal").textContent = (unit * price).toFixed(2);
        }

        function addToCart() {
            const unit = parseFloat(unitInput.value);
            const price = parseFloat(priceInput.value);
            const propertyId = propertySelect.value;
            const propertyName = propertySelect.options[propertySelect.selectedIndex].text;

            // Validation
            if (propertyId === "select") {
                alert("Please select a property");
                return;
            }

            if (isNaN(unit) || unit <= 0) {
                alert("Please enter a valid quantity");
                return;
            }

            if (isNaN(price) || price <= 0) {
                alert("Please enter a valid price");
                return;
            }

            const lineTotal = unit * price;

            cart.push({
                id: Date.now(), // Unique ID
                desc: propertyName,
                property_id: propertyId,
                qty: unit,
                price: price,
                lineTotal: lineTotal
            });

            printCart();
            resetForm();
        }

        function printCart() {
            let html = "";
            let total = 0;

            cart.forEach((item) => {
                html += `
                    <tr>
                        <td>${item.desc}</td>
                        <td>${item.qty}</td>
                        <td>${item.price.toFixed(2)}</td>
                        <td>${item.lineTotal.toFixed(2)}</td>
                        <td><button class="btn-delete" onclick="delItem(${item.id})">×</button></td>
                    </tr>
                `;
                total += item.lineTotal;
            });

            tbody.innerHTML = html;
            document.querySelector("#total").textContent = total.toFixed(2);
        }

        function resetForm() {
            unitInput.value = 1;
            priceInput.value = "";
            propertySelect.value = "select";
            calculateLineTotal();
        }

        function delItem(id) {
            cart = cart.filter(item => item.id !== id);
            printCart();
        }

        async function createMoneyReceipt() {
            if (cart.length === 0) {
                alert("Please add at least one item");
                return;
            }

            if (customerSelect.value === "select") {
                alert("Please select a customer");
                return;
            }

            const receiptData = {
                customer_id: customerSelect.value,
                payment_method: document.querySelector("#payment_method").value,
                receipt_date: document.querySelector("#date").textContent,
                items: cart,
                total_amount: parseFloat(document.querySelector("#total").textContent)
            };

            try {
                const response = await fetch(`${base_url}/moneyreceipt/save`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify(receiptData)
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                alert("Receipt created successfully!");
                console.log("Receipt ID:", result.receipt_id);

                // Reset form
                cart = [];
                printCart();
                customerSelect.value = "select";

            } catch (error) {
                console.error("Error:", error);
                alert("Error creating receipt. Please try again.");
            }
        }

        // Make delItem available globally
        window.delItem = delItem;
    });
</script>


@endsection