@extends('layouts.appAuth')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <form method="POST" action="{{ url('/product') }}" onsubmit="return validateForm()" id="form1" name="form1" enctype="multipart/form-data">
         @csrf                         
            <div class="col-md-12">
                <div class="row productFormRow">
                    <div class="col-md-12">
                        <h2>Product Image</h2>
                    </div>
                    <div class="col-md-4">
                        <button type="button" id="btnImg1" style="border:none;" onClick="loadImage(1)">
                            <img id="img1" src="{{asset('/resources/Place-holder@2x.png')}}" width="100%" height="100%">
                        </button>
                        <input type="file" class="productPic" name="image1" id="image1" onchange="readURL(this, 1)" style="display: none;">

                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-4">
                                <button type="button" id="btnImg2" style="border:none;" onclick="loadImage(2)">
                                    <img id="img2" src="{{asset('/resources/Place-holder.png')}}" width="90%" height="auto">
                                </button>
                                <input type="file" class="productPic" name="image2" id="image2" onchange="readURL(this, 2)" style="display: none;">
                            </div>
                            <div class="col-md-4">
                                <button type="button" id="btnImg3" style="border:none;" onclick="loadImage(3)">
                                    <img id="img3" src="{{asset('/resources/Place-holder.png')}}" width="90%" height="auto">
                                </button>
                                <input type="file" class="productPic" name="image3" id="image3" onchange="readURL(this, 3)" style="display: none;">
                            </div>
                            <div class="col-md-4">
                               <button type="button" id="btnImg4" style="border:none;" onclick="loadImage(4)">
                                    <img id="img4" src="{{asset('/resources/Place-holder.png')}}" width="90%" height="auto">
                                </button>
                                <input type="file" class="productPic" name="image4" id="image4" onchange="readURL(this, 4)" style="display: none;">
                            </div>
                        </div>

                        <div class="row" style="margin-top: 2em">
                             <div class="col-md-6">
                                <input type="text" id="productName" name="productName"  style="width:100%" placeholder="productName">
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="productQty" name="productQty" placeholder="Quantity">
                            </div>
                            <div class="col-md-3">
                                <input type="text" id="productPrice" name="productPrice" placeholder="N Price">
                            </div>
                        </div>

                        <div class="row" style="margin-top: 2em">
                             <div class="col-md-4">
                                <input type="radio" name="category" value="Most Rated" style="size: 20px"> Most Rated
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="category" value="Best Selling"> Best Selling
                            </div>
                            <div class="col-md-4">
                                <input type="radio" name="category" value="New Arrival"> New Arrival
                            </div>
                        </div>

                    </div>

                </div>

                 <div class="row productFormRow">
                    <div class="col-md-12">
                        <h2>Product Description</h2>
                    </div>

                    <div class="col-md-12">
                        <textarea id="description" name="description" rows="10" style="width: 100%"></textarea>
                    </div>
                    <div class="col-md-12" style="margin-top: 2em">
                        <button type="Submit" class="btn btn-primary" style="float: right;width: 20%; padding: 1em; font-weight: bold; border-radius: 25px">Upload</button>
                    </div>  
                </div>
            </div>
        </form>
    </div>
</div>

<script type="text/javascript" language="javascript">

function validateForm() {
     var x = document.forms["form1"]["txtState"].value;
    if (x == "-1") {
        alert("Please select your state of origin");
        return false;
    }
    var x = document.forms["form1"]["lga"].value;
    if (x == "-1") {
        alert("Local Govt Area not selected");
        return false;
    }
    var program = document.getElementById('course').value;
    if (program == "-1") {
        alert("Please select the course you want to apply for");
        return false;
    }
    var dob = document.getElementById('dob').value;
    if (dob == "-1") {
        alert("Please select your date of birth");
        return false;
    }
}

function loadImage(fileIndex){
    console.log("Image " + fileIndex + " selected");
    document.getElementById('image' + fileIndex).click();
    //readURL()
}

function readURL(input, imageIndex) {
    console.log("processing img url");
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    
    reader.onload = function(e) {
      $('#img' + imageIndex).attr('src', e.target.result);
    }
    
    reader.readAsDataURL(input.files[0]);
  }
}

$("image1").change(function() {
  readURL(this, 1);
});

$("image2").change(function() {
  readURL(this, 2);
});

$(".productPic").change(function() {
    console.log(this.id);
  //readURL(this);
});
</script>

<!-- <form runat="server">
  <input type='file' id="imgInp" />
  <img id="blah" src="#" alt="your image" />
</form> -->
@endsection
