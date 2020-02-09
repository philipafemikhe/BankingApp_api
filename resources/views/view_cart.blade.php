@extends('layouts.appAuth')
@section('content')
	<div class="container">
		<h2>My Shopping Cart</h2>
		<?php $cartTotal=0; ?>
		@foreach($cart as $item)
			<?php $prod = $item->products; ?>
			@foreach($prod as $rec)
				<div class="row storeProduct">
					<div class="col-md-4">
						<center><img src="{{asset($rec->image1)}}" width="100%" height="auto"></center>
						<input type="hidden" id="uPrice" name="uPrice" value="{{$rec->price}}">
					</div>
					<div class="col-md-8">
						<div class="col-md-12">
							<h2>{{$rec->name}}</h2>
							<p>{{$rec->description}}</p>
						</div>
						<div class="row">
							<div class="col-md-6" style="font-size: 1.5em; font-weight: bold;">
								&#8358;<input type="text" readonly="readonly" id="amount" value="{{number_format($item->amount, 2)}}" class="amountField">
								<?php $cartTotal += $item->amount; ?>
							</div>
							<div class="col-md-6">
								Qty: <button class="btn roundButton roundButtonGray" onclick="updateQty(-1)">-</button>
								<input type="text" size="1" name="qty" id="qty" value="{{$item->quantity}}" class="roundButton">
								<button class="btn roundButton roundButtonGray" onclick="updateQty(1)">+</button>
							</div>								
						</div>
					</div>
				</div>
			@endforeach
		@endforeach

		<div class="storeProduct">
			<h2>Cart Summary</h2>
			<div class="row" style="border-bottom: thin solid #f1f1f1">
				<div class="col-md-6">
					Sub Total ({{$cart->count()}})<br>
					Shipping
				</div>
				<div class="col-md-6" style="text-align: right;">
					&#8358;<input type="text" readonly="readonly" id="cartSumTotal" value="{{$cartTotal}}" class="amountField" style="width: 5em; text-align: right;">
					<br>&#8358;500
				</div>
			</div>
			<div class="row" style="margin-top: 2em">
				<div class="col-md-6">
					Total
				</div>
				<div class="col-md-6" style="text-align: right;">
					&#8358;<input type="text" readonly="readonly" id="cartTotalAmt" style="width: 5em; text-align: right;" value="<?php echo(number_format(($cartTotal + 500), 2));?>" class="amountField">


					
				</div>
			</div>

			<div class="row" style="margin-top: 2em">
				<div class="col-md-12" style="text-align: right;">
					<button id="checkoutButton">Checkout</button>
				</div>
			</div>
		</div>
	</div>

<script type="text/javascript">
	function updateQty(digit){
		var qtyField = document.getElementById("qty");
		if((digit == -1) && (qtyField.value == 1)){
			return;
		}	
		
		// var oldValue = 	document.getElementById('amount').value;

		var qtyVal = parseInt(qtyField.value) + digit;
		qtyField.value = qtyVal;

		var pr = document.getElementById('uPrice');
	  	var qt = document.getElementById('qty');
	  	var amt = parseInt(pr.value) * parseFloat(qt.value);
	  	document.getElementById('amount').value = amt;
	  	document.getElementById('cartSumTotal').value =  amt;
	  	document.getElementById('cartTotalAmt').value =  amt + 500;
	  	
	}
</script>
@endsection