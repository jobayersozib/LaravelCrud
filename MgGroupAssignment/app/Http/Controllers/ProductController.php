<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        if($request->session()->has('user')){
            $products=Product::orderBy('name','asc')->get();
        
            return view('productViews.products',['products'=>$products]);
        }else{
            return redirect('/login');
        }
        
            
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)

    {   if($request->session()->has('user')){
            return view('productViews.addproduct');
        }else{
            return redirect('\login');
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->session()->has('user')){
            $validator = Validator::make($request->all(), [
            'pname' => 'required|max:255',
            'pprice'=>'required',
        ]);
         if($validator->fails()){
            return redirect('/products/create')->withInput()
            ->withErrors($validator);
         }

         $product = new Product;
         $product->name=$request->input('pname');
         $product->price=$request->input('pprice');
         $product->type=$request->input('ptype');
         $product->stock=$request->input('pstock');
         
         $product->save();

         return redirect('/products');
        }else{
            return redirect('/login');
        }
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product,Request $request)

    {  if($request->session()->has('user')){
                return view('productViews.singleProduct',['product'=>$product]);
        }else{
            return redirect('/login');
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Request $request)

    {   if($request->session()->has('user')){
            return view('productViews.editproduct',['product'=>$product]);
        }else{
            return redirect('/login');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->session()->has('user')){
                $product->name=$request->input('pname');
                $product->price=$request->input('pprice');
                $product->stock=$request->input('pstock');

                $product->update();

                return redirect('/products');
        }else{
            return redirect('/login');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   //if($request->session()->has('user')){
            $product->delete();
            return redirect('/products');
        //}else{
            //return redirect('/login');
        //}
        
    }
}
