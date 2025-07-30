<?php

use App\Models\Company;
use App\Models\Customer;
use App\Models\Property;

$properties = Property::all();
$customers = Customer::all();
$company = Company::find(1);
?>

@extends('layouts.master')
@section('title', 'Create Money Receipt')

@section('page')
<style>
    .receipt-container { max-width: 1000px; margin: auto; border: 1px solid #ccc; padding: 2px; background: #fff; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    .header { text-align: center; margin-bottom: 20px; }
    .receipt-details table, .items-table { width: 100%; border-collapse: collapse; }
    .receipt-details td, .items-table th, .items-table td { padding: 5px; border: 1px solid #ccc; }
    .total { float: right; width: 400px; margin-top: 20px; }
    .signature { text-align: center; margin-top: 50px; }
    .signature-line { border-top: 1px solid #000; width: 200px; margin: auto; padding-top: 5px; }
    .btn-delete { background: #e74c3c; color: #fff; border: none; padding: 4px 8px; border-radius: 3px; cursor: pointer; }
</style>

<div class="receipt-container">
    <a class='btn btn-success' href="{{ route('moneyreceipts.index') }}">
        <i class="fas fa-arrow-up"></i> See Money Receipts
    </a>

    <div class="header">
        <img src="{{ asset('img/' . $company->logo) }}" alt="{{ $company->name }}" style="max-height: 80px;" />
        <h4>{{ $company->name }}</h4>
        <p>{{ $company->address }}</p>
        <p>Phone: {{ $company->phone }} | Email: {{ $company->email }}</p>
        <h3>Money Receipt</h3>
    </div>

    <div class="receipt-details">
        <table>
            <tr>
                <td colspan="2" style="text-align: center;">
                    <form name="f" class="d-inline-flex align-items-center">
                        <label for="invoice_id" class="form-label me-2 mb-0"><strong>Invoice ID:</strong></label>
                        <input type="text" id="invoice_id" name="invoice_id" class="form-control form-control-sm me-2" style="width: 80px;" value="{{ request()->get('invoice_id') }}">
                        <input type="button" id="go" value="Go" class="btn btn-sm btn-primary">
                    </form>
                </td>
            </tr>
            <tr>
                <td><strong>Receipt No:</strong> <span id="receiptNo">{{ \App\Models\MoneyReceipt::max('id') + 1 }}</span></td>
                <td><strong>Date:</strong> <span id="date">{{ date('d M, Y') }}</span></td>
            </tr>
            <tr>
                <td><strong>Invoice No: {{ request()->get('invoice_id') }}</strong> <span id="invoiceNo"></span></td>
                <td><strong>Issue Date:</strong> <span id="issueDate"></span></td>
            </tr>
            <tr>
                <td colspan="2"><strong>Due Date:</strong> <span id="dueDate"></span></td>
            </tr>
            <tr>
                <td>
                    <strong>Received From:</strong>
                    <h3>Customer</h3>
                    <select name="customer_id" id="customer_id" class="form-control">
                        <option value="select">Select Customer</option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                    <div id="customer-info" style="margin-top: 10px;"></div>
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
                <th>Property</th>
                <th>Project Name</th>
                <th>Amount</th>
                <th>Discount</th>
                <th>Subtotal</th>
                <th><button id="btnClearAll" class="btn btn-sm btn-danger">Clear All</button></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <select id="property_id" class="form-control">
                        <option value="select">Select Property</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}">{{ $property->title }}</option>
                        @endforeach
                    </select>
                </td>
                <td><input type="text" id="project_id" class="form-control form-control-sm" placeholder="Project" /></td>
                <td><input type="text" id="amount" class="form-control form-control-sm" placeholder="Amount" /></td>
                <td><input type="text" id="discount" class="form-control form-control-sm" placeholder="Discount" /></td>
                <td><span id="lineTotal"></span></td>
                <td><input type="button" id="btnAdd" class="btn btn-sm btn-primary" value="Add" /></td>
            </tr>
        </tbody>
        <tbody id="tbody"></tbody>
    </table>

    <div class="total">
        <table>
            <tr><td>Subtotal:</td><td style="text-align:right"><strong id="subtotal">0.00</strong></td></tr>
            <tr><td>Total Discount:</td><td style="text-align:right"><strong id="total_discount">0.00</strong></td></tr>
            <tr><td>Total:</td><td style="text-align:right"><strong id="total">0.00</strong></td></tr>
            <tr><td>Paid Amount:</td><td><input type="number" id="paid_amount" class="form-control" value="" /></td></tr>
            <tr><td>Due Amount:</td><td style="text-align:right"><strong id="due_amount">0.00</strong></td></tr>
        </table>
    </div>
    <div style="clear: both;"></div>

    <input type="button" class="btn btn-primary mt-3 float-right" onclick="createMoneyReceipt()" value="Save Money Receipt" />

    <div class="footer">
        <div class="signature"><div class="signature-line">Authorized Signature</div></div>
    </div>
</div>

<script>
    const base_url = "http://hamid.intelsofts.com/MyLaravelProject/RealEstate/public/api";
    const customers = @json($customers);
    let cart = [];

    document.addEventListener("DOMContentLoaded", () => {
        const invoiceId = document.getElementById('invoice_id').value;
        if (invoiceId) loadReceipt(invoiceId);

        document.getElementById("btnAdd").addEventListener("click", addToCart);
        document.getElementById("go").addEventListener("click", () => loadReceipt(document.f.invoice_id.value));
        document.getElementById("btnClearAll").addEventListener("click", () => {
            if (confirm("Are you sure to clear all items?")) {
                cart = []; printCart();
            }
        });

        document.getElementById("amount").addEventListener("input", calculateLineTotal);
        document.getElementById("discount").addEventListener("input", calculateLineTotal);
        document.getElementById("paid_amount").addEventListener("input", updateDueAmount);

        document.getElementById('customer_id').addEventListener('change', function () {
            const customer = customers.find(c => c.id == this.value);
            document.getElementById('customer-info').innerHTML = customer ? `
                <strong>Type:</strong> ${customer.type ?? 'N/A'}<br>
                <strong>Phone:</strong> ${customer.phone ?? 'N/A'}<br>
                <strong>Email:</strong> ${customer.email ?? 'N/A'}<br>
            ` : '';
        });

        calculateLineTotal();
    });

    function calculateLineTotal() {
        const amount = parseFloat(document.getElementById("amount").value) || 0;
        const discount = parseFloat(document.getElementById("discount").value) || 0;
        const total = amount - discount;
        document.getElementById("lineTotal").textContent = total >= 0 ? total.toFixed(2) : "";
    }

    function addToCart() {
        const amount = parseFloat(document.getElementById("amount").value) || 0;
        const discount = parseFloat(document.getElementById("discount").value) || 0;
        const propertyId = document.getElementById("property_id").value;
        const propertyName = document.getElementById("property_id").selectedOptions[0].text;
        const projectId = document.getElementById("project_id").value;

        if (propertyId === "select" || !projectId || amount <= 0 || discount < 0 || discount > amount) {
            return alert("Please fill out valid item details.");
        }

        const lineTotal = amount - discount;
        cart.push({
            id: Date.now(),
            desc: propertyName,
            project: "", 
            project_id: projectId,
            property_id: propertyId,
            discount,
            amount,
            lineTotal
        });

        resetForm(); printCart();
    }

    function resetForm() {
        document.getElementById("property_id").value = "select";
        document.getElementById("project_id").value = "";
        document.getElementById("amount").value = "";
        document.getElementById("discount").value = "";
        document.getElementById("lineTotal").textContent = "";
    }

    function printCart() {
        let html = "", subtotal = 0, totalDiscount = 0;
        cart.forEach(item => {
            html += `
                <tr>
                    <td>${item.desc}</td>
                    <td>${item.project ?? 'N/A'}</td>
                    <td>${item.amount.toFixed(2)}</td>
                    <td>${item.discount.toFixed(2)}</td>
                    <td>${item.lineTotal.toFixed(2)}</td>
                    <td><button class="btn-delete" onclick="delItem(${item.id})">×</button></td>
                </tr>`;
            subtotal += item.amount;
            totalDiscount += item.discount;
        });

        document.getElementById("tbody").innerHTML = html;
        document.getElementById("subtotal").textContent = subtotal.toFixed(2);
        document.getElementById("total_discount").textContent = totalDiscount.toFixed(2);
        document.getElementById("total").textContent = (subtotal - totalDiscount).toFixed(2);
        updateDueAmount();
    }

    function updateDueAmount() {
        const total = parseFloat(document.getElementById("total").textContent) || 0;
        const paid = parseFloat(document.getElementById("paid_amount").value) || 0;
        const due = paid - total;
        document.getElementById("due_amount").textContent = due >= 0 ? `Extra Paid: ${due.toFixed(2)}` : Math.abs(due).toFixed(2);
    }

    window.delItem = id => {
        cart = cart.filter(item => item.id !== id);
        printCart();
    };

    async function loadReceipt(invoiceId) {
        if (!invoiceId) return alert("Please enter a valid invoice ID");

        try {
            const res = await fetch(`${base_url}/invoices/${invoiceId}`);
            if (!res.ok) throw new Error("Invoice not found");

            const data = await res.json();
            const { invoice, items, customer } = data;

            document.getElementById("invoiceNo").textContent = invoice.invoice_no ?? '';
            document.getElementById("issueDate").textContent = invoice.issue_date ?? '';
            document.getElementById("dueDate").textContent = invoice.due_date ?? '';

            document.getElementById("customer_id").value = invoice.customer_id;
            document.getElementById("payment_method").value = invoice.payment_method ?? '';
            document.getElementById("paid_amount").value = invoice.paid_amount ?? 0;

            document.getElementById("customer-info").innerHTML = `
                <strong>Type:</strong> ${customer.type ?? 'N/A'}<br>
                <strong>Phone:</strong> ${customer.phone ?? 'N/A'}<br>
                <strong>Email:</strong> ${customer.email ?? 'N/A'}<br>
            `;

            cart = items.map(item => ({
                id: Date.now() + Math.random(),
                desc: item.property?.title ?? 'N/A',
                project: item.project?.name ?? 'N/A',
                project_id: item.project_id,
                property_id: item.property_id,
                discount: parseFloat(item.discount),
                amount: parseFloat(item.amount),
                lineTotal: parseFloat(item.amount) - parseFloat(item.discount),
            }));

            printCart();
        } catch (e) {
            console.error(e);
            alert("Not Found This ID. Please check the invoice List.");
        }
    }

    window.createMoneyReceipt = async function () {
        if (cart.length === 0) return alert("Please add at least one item");
        const customerId = document.getElementById("customer_id").value;
        if (customerId === "select") return alert("Please select a customer");

        if (!confirm("Are you sure you want to save this money receipt?")) return;

        const receipt = {
            customer_id: customerId,
            payment_method: document.getElementById("payment_method").value,
            receipt_date: document.getElementById("date").textContent,
            total_amount: parseFloat(document.getElementById("total").textContent),
            paid_amount: parseFloat(document.getElementById("paid_amount").value) || 0,
            items: cart
        };

        try {
            const res = await fetch(`${base_url}/moneyreceipts`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify(receipt)
            });

            if (!res.ok) throw new Error("Failed to save receipt");
            const result = await res.json();
            alert("Money Receipt saved successfully!");
            cart = [];
            printCart();
        } catch (e) {
            console.error(e);
            alert("Error creating receipt.");
        }
    };
</script>
@endsection
