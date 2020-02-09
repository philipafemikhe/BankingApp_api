<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function saveProduct(Request $request){
        $prodImg1 = "";
        $prodImg2 = "";
        $prodImg3 = "";
        $prodImg4 = "";
        // $imageDir ="{{asset('/images/store/')}}";

        $imageDir = "./resources/store/"; // public_path("resources\store" . DIRECTORY_SEPARATOR);
        if(isset($request->image1)){
            $fn=explode('.',$_FILES['image1']['name']);
            if(count($fn) > 1){
                $imgfile = time() . $fn[0] .  "." . $fn[1];
                $prodImg1 = $imageDir . $imgfile;
            }
        }

        if(isset($request->image2)){
            $fn=explode('.',$_FILES['image2']['name']);
            if(count($fn) > 1){
                $imgfile = time() . $fn[0] .  "." . $fn[1];
                $prodImg2 = $imageDir . $imgfile;                
            }
        }

        if(isset($request->image3)){
            $fn=explode('.',$_FILES['image3']['name']);
            if(count($fn) > 1){
                $imgfile = time() . $fn[0] .  "." . $fn[1];
                $prodImg3 = $imageDir . $imgfile;
                
            }
        }

        if(isset($request->image4)){
            $fn=explode('.',$_FILES['image4']['name']);
            if(count($fn) > 1){
                $imgfile = time() . $fn[0] .  "." . $fn[1];
                $prodImg4 = $imageDir . $imgfile;                
            }
        }

        $newProduct = Product::create([
            'name' => $request->productName,
            'description' => $request->description,
            'category' => $request->category,
            'price' => $request->productPrice,
            'quantity' => $request->productQty,
            'image1' => $prodImg1,
            'image2' => $prodImg2,
            'image3' => $prodImg3,
            'image4' => $prodImg4,
        ]);
        if($newProduct){
            move_uploaded_file($_FILES['image2']['tmp_name'],$prodImg2) or die("");
            move_uploaded_file($_FILES['image3']['tmp_name'],$prodImg3) or die("");
            move_uploaded_file($_FILES['image4']['tmp_name'],$prodImg4) or die("");
            move_uploaded_file($_FILES['image1']['tmp_name'],$prodImg1) or die("");
        }
        return redirect()->to('/store');
    }

    public function getStoreView(){
        $stock = Product::all();
        return view('store', compact('stock'));
    }

    public function addToCart($id, $qty){
        $uPrice = Product::where('id', $id)->first()->price;
        $cart = Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $id,
            'quantity' => $qty,
            'amount' => $qty * $uPrice,
            'status' => 'unpaid'
        ]);
        return "Product " . $id . " added " . $qty . " to cart ";
    }

    public function viewCart(){
        $cart = Cart::where('user_id',Auth::id())->where('status','unpaid')->with('products')->get();
        //dd($cart);
        return view('view_cart', compact('cart'));
    }
}
