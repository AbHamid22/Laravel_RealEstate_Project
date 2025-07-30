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
				<i class="fas fa-globe"></i> I-SHOP.
				<small class="float-right">Date: {{ date("d M Y") }}</small>
			</h4>
		</div>
	</div>

	<div class="row invoice-info">
		<div class="col-sm-4 invoice-col">
			Warehouse<br>
			<select name="warehouse_id" id="cmbWarehouse">
				<option value="select">select</option>
				@foreach($warehouses as $w)
					<option value="{{ $w->id }}">{{ $w->name }}</option>
				@endforeach
			</select>
		</div>

		<div class="col-sm-4 invoice-col">
			Supplier
			<address>
				<select name="supplier_id" id="cmbSupplier">
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
					<td><input type="text" style="width:60px" value="10" readonly /></td>
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
						<th><input type="button" id="clearAll" value="Clear" class="btn btn-warning btn-sm" /></th>
					</tr>
					<tr>
						<th></th>
						<th>
							<select name="product_id" id="cmbProduct">
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
						<th><input type="button" id="btnAddToCart" value="+" class="btn btn-success btn-sm" /></th>
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
			<p class="lead">Amount Due</p>
			<div class="table-responsive">
				<table class="table">
					<tr><th style="width:50%">Subtotal:</th><td id="subtotal">0.00</td></tr>
					<tr><th>Total:</th><td id="net-total">0.00</td></tr>
				</table>
			</div>
		</div>
	</div>

	<div class="row no-print">
		<div class="col-12">
			@csrf
			<button type="button" id="btnProcessPurchase" class="btn btn-success float-right">
				<i class="far fa-credit-card"></i> Process Purchase
			</button>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>

	  let base_url=`http://localhost/intellect8/api`;
	class Cart {
		constructor(key) {
			this.key = key;
			this.items = JSON.parse(localStorage.getItem(this.key)) || [];
		}
		save(item) {
			let index = this.items.findIndex(i => i.item_id == item.item_id);
			if (index !== -1) {
				this.items[index].qty += item.qty;
				this.items[index].total_discount += item.total_discount;
				this.items[index].subtotal += item.subtotal;
			} else {
				this.items.push(item);
			}
			this._sync();
		}
		delItem(id) {
			this.items = this.items.filter(i => i.item_id != id);
			this._sync();
		}
		clearCart() {
			this.items = [];
			this._sync();
		}
		getCart() {
			return this.items;
		}
		_sync() {
			localStorage.setItem(this.key, JSON.stringify(this.items));
		}
	}

	document.addEventListener("DOMContentLoaded", function () {
		const cart = new Cart("purchase");
		printCart();

		document.getElementById("cmbSupplier").addEventListener("change", function () {
			let supplierId = this.value;
			if (supplierId !== "select") {
				fetch(`/supplier/${supplierId}`)
					.then(res => res.json())
					.then(data => {
						document.getElementById("supplier-info").innerHTML = `${data.mobile}<br>${data.email}`;
					});
			}
		});

		document.getElementById("cmbProduct").addEventListener("change", function () {
			let productId = this.value;
			if (productId !== "select") {
				fetch(`/product/${productId}`)
					.then(res => res.json())
					.then(data => {
						document.getElementById("txtPrice").value = data.offer_price || 0;
						document.getElementById("txtQty").value = 1;
						document.getElementById("txtDiscount").value = 0;
					});
			}
		});

		document.getElementById("btnAddToCart").addEventListener("click", function () {
			let productSelect = document.getElementById("cmbProduct");
			let productId = productSelect.value;
			let productName = productSelect.selectedOptions[0].text;
			let price = parseFloat(document.getElementById("txtPrice").value);
			let qty = parseFloat(document.getElementById("txtQty").value);
			let discount = parseFloat(document.getElementById("txtDiscount").value) || 0;

			if (productId === "select" || isNaN(price) || isNaN(qty) || qty <= 0) {
				alert("Please select a valid product and enter price and quantity.");
				return;
			}

			let item = {
				item_id: productId,
				name: productName,
				price: price,
				qty: qty,
				discount: discount,
				total_discount: discount * qty,
				subtotal: (price * qty) - (discount * qty)
			};

			cart.save(item);
			printCart();
		});

		document.getElementById("clearAll").addEventListener("click", function () {
			cart.clearCart();
			printCart();
		});

		document.body.addEventListener("click", function (e) {
			if (e.target.classList.contains("delete")) {
				let id = e.target.getAttribute("data-id");
				cart.delItem(id);
				printCart();
			}
		});

		document.getElementById("btnProcessPurchase").addEventListener("click", function () {
			let token = document.querySelector('input[name="_token"]').value;
			let products = cart.getCart();
			if (products.length === 0) {
				alert("Cart is empty.");
				return;
			}

			fetch("${base_url}/purchase/save", {
				method: "POST",
				headers: {
					"Content-Type": "application/json",
					"X-CSRF-TOKEN": token
				},
				body: JSON.stringify({
					warehouse_id: document.getElementById("cmbWarehouse").value,
					supplier_id: document.getElementById("cmbSupplier").value,
					purchase_date: document.getElementById("txtPurchaseDate").value,
					delivery_date: document.getElementById("txtDeliveryDate").value,
					shipping_address: document.getElementById("txtShippingAddress").value,
					remark: document.getElementById("txtRemark").value,
					discount: 0,
					vat: 0,
					purchase_total: parseFloat(document.getElementById("net-total").textContent),
					products: products
				})
			})
			.then(res => res.json())
			.then(data => {
				alert("Purchase saved successfully.");
				cart.clearCart();
				printCart();
			});
		});

		function printCart() {
			let orders = cart.getCart();
			let bill = '';
			let subtotal = 0;
			orders.forEach((item, index) => {
				subtotal += item.subtotal;
				bill += `
					<tr>
						<td>${index + 1}</td>
						<td>${item.name}</td>
						<td>${item.price.toFixed(2)}</td>
						<td>${item.qty}</td>
						<td>${item.total_discount.toFixed(2)}</td>
						<td>${item.subtotal.toFixed(2)}</td>
						<td><button class="btn btn-danger btn-sm delete" data-id="${item.item_id}">-</button></td>
					</tr>
				`;
			});
			document.getElementById("items").innerHTML = bill;
			document.getElementById("subtotal").textContent = subtotal.toFixed(2);
			document.getElementById("net-total").textContent = (subtotal * 1.05).toFixed(2);
		}
	});
</script>
@endsection