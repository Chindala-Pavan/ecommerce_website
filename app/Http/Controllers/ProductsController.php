<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Session;
use DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $products=Product::inRandomOrder()->get();
       //$categories=Category::all()->pluck('category_name')->toArray();
        //DB::table('categories')->select('id')->get();
        //return view('create',['categories'=>$categories]);
        return view('footer',['products'=>$products]); 
        //return $products;
    }
     function mobile()
    {
        $products=Category::select('id')->where('category_name','mobile')->get()->toArray();
       $categories=Product::where('category_id',$products)->get();
        //DB::table('categories')->select('id')->get();
        //return view('create',['categories'=>$categories]);
        return view('footer',['products'=>$categories]); 
        //return $categories;
    }
    function laptop()
    {
        $products=Category::select('id')->where('category_name','laptop')->get()->toArray();
       $categories=Product::where('category_id',$products)->get();
        //DB::table('categories')->select('id')->get();
        //return view('create',['categories'=>$categories]);
        return view('footer',['products'=>$categories]); 
        //return $categories;
    }
    function watch()
    {
        $products=Category::select('id')->where('category_name','watch')->get()->toArray();
       $categories=Product::where('category_id',$products)->get();
        //DB::table('categories')->select('id')->get();
        //return view('create',['categories'=>$categories]);
        return view('footer',['products'=>$categories]); 
        //return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $product= new Product;
        $product->product_name=$req->product_name;
        $product->description=$req->description;
        $product->price=$req->price;
        $product->category_id=$req->category_id;
        $product->image=$req->image;
        $product->save();
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formInput=$request->all();
        //upload image
        $image = $request->image;
        if($image)
        {
            $imageName = $image->getClientOriginalName();
            $image->move('image',$imageName);
            $formInput['image'] = $imageName;
        }
        Product::create($formInput);
        return redirect('create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
       return view('details',compact('product'));
       // return $product;
        //return view('details',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    function addToCart(Request $req)
    {
        $cart = new Cart;
        $cart->product_id=$req->product_id;
        $cart->save();
        return redirect('/');
    }
    static  function cartList()
    {
        $products=DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->select('products.*','cart.id as cart_id')
        ->get();
        return view('cartlist',['products'=>$products]);
        //echo $products;
    }
    function removeItem($id)
    {
        DB::delete('delete from cart where id = ?',[$id]);
        //$item=Cart::find($id);
        //echo $item->delete();
        return redirect('/cartlist');
    }

}
