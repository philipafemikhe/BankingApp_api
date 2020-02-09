@extends('layouts.appAuth')

@section('content')
	<div class="container storeContent">
		@foreach($stock as $product)
			<div class="row">
				<div class="col-md-12" style="text-align: right; background-color: #f1f1f1">
					<a onclick="event.preventDefault();showMorePictures()"><img src="{{asset('/resources/view_more_button.png')}}" style="float: right;"></a>
					<div id="morePicsDropdown" style="display: none;">
						<div class="miniPicture">
							<img src="{{$product->image1}}" onclick="previewImg('<?php echo $product->image1; ?>')">
						</div>
						<div class="miniPicture">
							<img src="{{$product->image2}}" onclick="previewImg('<?php echo $product->image2; ?>')">
						</div>
						<div class="miniPicture">
							<img src="{{$product->image3}}" onclick="previewImg('<?php echo $product->image3; ?>')">
						</div>
						<div class="miniPicture">
							<img src="{{$product->image4}}" onclick="previewImg('<?php echo $product->image4; ?>')">
						</div>
					</div>
				</div>
			</div>
			<div class="storeProduct">
				<div class="row">
					<center><img src="{{$product->image1}}" id="img1" width="100%" height="auto"></center>
				</div>

				<div class="row">
					<div class="col-md-6">
						<button class="categoryFlag">{{$product->category}}</button>
					</div>
					
					<div class="col-md-6" style="text-align: right; margin-top: 2em">
						Qty: <button class="btn roundButton roundButtonGray" onclick="updateQty(-1)">-</button>
						<input type="text" size="1" name="qty" id="qty" value="1" class="roundButton">
						<button class="btn roundButton roundButtonGray" onclick="updateQty(1)">+</button>

					</div>				
				</div>

				<div class="row" style="width:100%; margin-top: 2em; padding: 2em">
					<h1>{{$product->name}}</h1>
					<p>{{$product->description}}</p>
				</div>

				<div class="row" style="padding: 2em">
					<div class="col-md-6" style="font-size: 1.5em">						
						&#8358;<input name="amount" id="amount" type="text" readonly="readonly" class="btn roundButton" value="{{$product->price}}" class="amountField" style="text-align: left;">
						<input type="hidden" name="uPrice" id="uPrice" value="{{$product->price}}">

					</div>

					<div class="col-md-6">
						<button type="button" id="buyNowButton">Buy Now</button>
						<button type="button" id="addTocartButton" onclick="addTocart(<?php echo $product->id;?>)">Add To Cart</button>
						<div id="successFlag" style="float: left;text-align: right;color: #ff644c; font-size: 1em"></div>
						
					</div>
				</div>
			</div>
		@endforeach
	</div>

<script type="text/javascript">
	function updateQty(digit){
		var qtyField = document.getElementById("qty");
		if((digit == -1) && (qtyField.value == 1)){
			return;
		}			
		var qtyVal = parseInt(qtyField.value) + digit;
		qtyField.value = qtyVal;

		var pr = document.getElementById('uPrice');
	  	var qt = document.getElementById('qty');
	  	var amt = parseInt(pr.value) * parseFloat(qt.value);
	  	document.getElementById('amount').value = amt;
	}

	function showMorePictures(){
		var container = document.getElementById('morePicsDropdown');
		var flg = container.style.display;
		if(flg=="block"){
			console.log("block");
			container.style.display = "none";
		}else if(flg=="none"){
			console.log("none");
			container.style.display = "block";
		}else{
			console.log("neither block nor none");
			container.style.display = "block";
		}
		
	}

	function previewImg(picUrl){
		console.log(picUrl);
		document.getElementById("img1").src = picUrl;
	}

	function addTocart(id){
		console.log("Adding element to cart id " + id);
		var xmlhttp=false;

	    try{
	        xmlhttp=new ActiveXObject("Msxml2.XMLHTTP");
	    //  alert("You are using IE");
	    }
	    catch(e){
	        
	            try{
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	                //alert("You are using IE");
	            }
	            catch(E){
	            xmlhttp = false;    
	            }
	    }
	    if(!xmlhttp && typeof XMLHttpRequest != 'undefined'){
	        xmlhttp = new XMLHttpRequest();
	        //alert("You  are not using IE");
	    }
	    //serverPage = "getLGA.php?state_id=" + state;
	    var serverPage = "/cart/add/" + id + "/" + document.getElementById('qty').value;
	    //alert(serverPage);
	    objID = "successFlag";
	    var obj = document.getElementById(objID);
	   

	    xmlhttp.open("GET", serverPage);
	    xmlhttp.onreadystatechange = function() {   
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	            obj.innerHTML = xmlhttp.responseText;
	            var curCount = document.getElementById('cartCount').innerHTML;
	            console.log(curCount);
	            document.getElementById('cartCount').innerHTML = parseInt(curCount) + 1;
	            console.log("card updated");
	        }
	        else{
	            obj.innerHTML = "Unable to load";
	        }
	    }
	    //alert("form validation");
	    xmlhttp.send(null);


	}
	</script>

@endsection