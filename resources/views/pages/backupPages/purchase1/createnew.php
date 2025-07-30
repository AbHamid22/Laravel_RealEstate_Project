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
	select {
		padding: 5px;
		min-width: 200px;
	}

	textarea {
		width: 100%;
	}
</style>
@endsection

@section('page')
<div class="invoice p-3 mb-3">
	<div class="row">
		<div class="col-12">
			<h4>
				<i class="fas fa-globe"></i>SHOP.
				<small class="float-right">Date: {{ date("d M Y") }}</small>
			</h4>
		</div>
	</div>

	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			Warehouse<br>
			<select name="warehouse_id" id="warehouse_id ">
				<option value="select">select</option>
				@foreach($warehouses as $w)
				<option value="{{ $w->id }}">{{ $w->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="col-sm-4 invoice-col">
			Supplier
			<address>
				<select name="supplier_id" id="supplier_id">
					<option value="select">select</option>
					@foreach($suppliers as $supplier)
					<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
					@endforeach
				</select>
				<div id="supplier-info"></div>
			</address>
			<div>
				Shipping Address:<br>
				<textarea id="txtShippingAddress"></textarea>
			</div>
		</div>

		<div class="col-sm-4 invoice-col">
			<table>
				<tr>
					<td><b>Purchase ID:</b></td>
					<td><input type="text" style="width:60px" value="{{\App\Models\Purchase::max('id') + 1 }}" readonly /></td>

				</tr>
				<tr>
					<td><b>Purchase Date:</b></td>
					<td><input type="date" id="txtPurchaseDate" value="{{ date('Y-m-d') }}" /></td>
				</tr>
				<tr>
					<td><b>Delivery Date:</b></td>
					<td><input type="date" id="txtDeliveryDate" value="{{ date('Y-m-d') }}" /></td>
				</tr>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-12 table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>SN</th>
						<th>Product</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Discount</th>
						<th>Subtotal</th>
						<!-- <th><input type="button" id="clearAll" value="Clear" class="btn btn-warning btn-sm" /></th> -->
					</tr>
					<tr>
						<th></th>
						<th>
							<select name="product_id" id="product_id">
								<option value="select">select</option>
								@foreach($products as $product)
								<option value="{{ $product->id }}">{{ $product->name }}</option>
								@endforeach
							</select>
						</th>
						<th><input type="text" id="txtPrice" /></th>
						<th><input type="text" id="txtQty" /></th>
						<th><input type="text" id="txtDiscount" /></th>
						<th></th>
						<th><input type="button" id="btnAdd" name="btnAdd" value="+" class="btn btn-success btn-sm" /></th>
					</tr>
				</thead>
				<tbody id="tbody">


				</tbody>
			</table>
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			<strong>Remark</strong><br>
			<textarea id="txtRemark"></textarea>
		</div>

		<div class="col-6">
			<p class="lead">Amount Due</p>
			<div class="table-responsive">
				<table class="table">
					<tr>
						<th style="width:50%">Subtotal:</th>
						<td id="subtotal">0.00</td>
					</tr>
					<tr>
						<th>Total:</th>
						<td id="nettotal">0.00</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	<div class="row no-print">
		<div class="col-12">
			@csrf
			<button type="button" id="btnProcess" class="btn btn-success float-right">
				<i class="far fa-credit-card"></i> Process Purchase
			</button>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	// let base_url = "http://localhost/intellect8/api";
	let cart = [];


	document.querySelector("#btnAdd").addEventListener("click", (e) => {

		// let desc=document.querySelector("#description").value;
		let qty = document.querySelector("#txtQty").value;
		let price = document.querySelector("#txtPrice").value;
		let product_id = document.querySelector("#product_id").value;
		let product_name = document.querySelector("#product_id").options[document.querySelector("#product_id").selectedIndex].text;
		let vat = 0;
		let discount = 0;
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
		// console.log(printCart);
	});


	function printCart() {
		let html = "";
		let total = 0;
		cart.forEach((item) => {
			html += "<tr>";
			html += `<td class="align-middle"><h6 class="mb-0 text-nowrap">${item.desc}</h6><p class="mb-0">${item.id}</p></td>`;
			html += `<td class="align-middle text-center">${item.qty}</td>`;
			html += `<td class="align-middle text-end">${item.price}</td>`;
			html += `<td class="align-middle text-end">${item.lineTotal}</td>`;
			html += `<td><input type="button" onclick="del(${item.id})" value="del" /></td>`;
			html += "</tr>";
			total += item.lineTotal;
		});

		document.querySelector("#tbody").innerHTML = html;
		document.querySelector("#subtotal").innerHTML = total;
		document.querySelector("#nettotal").innerHTML = total;

	}


	function del(id) {
		let index = cart.findIndex((item) => {
			return item.id == id;
		});
		cart.splice(index, 1);
		printCart();
	}



	// async function CreateInvoice() {

	// 	if (confirm("Are you sure?")) {
	// 		let date = document.querySelector("#date").innerHTML;
	// 		let customer_id = document.querySelector("#customer_id").value;
	// 		let total = document.querySelector("#netTotal").innerHTML;


	// 		let jsonData = {
	// 			created_at: date,
	// 			updated_at: date,
	// 			customer_id: customer_id,
	// 			remark: "Na",
	// 			payment_term: "CASH",
	// 			invoice_total: total,
	// 			paid_total: total,
	// 			previous_due: 0,
	// 			items: cart
	// 		}

	// 		console.log(jsonData);

	// 		let response = await fetch(`${base_url}/invoice/save`, {
	// 			method: "POST",
	// 			headers: {
	// 				"Content-Type": "application/json"
	// 			},
	// 			body: JSON.stringify(jsonData)
	// 		});

	// 		let json = response.json();
	// 		console.log(json);

	// 		cart = [];
	// 		printCart();

	// 	}

	// }
</script>
@endsection