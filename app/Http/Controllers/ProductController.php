<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    public function pagination(Request $request){
        $products = Product::latest()->paginate(5);
        return view('productview',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_product');
    }
    public function productview()
    {
        $products = Product::latest()->paginate(5);
        return view('productview',compact('products'));
    }

    // public function addProduct(){
    //     return view('addProduct_js');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|unique:products',
            'price'=>'required'
        ],
        [
            'name.required'=>'Name is Required',
            'name.unique'=>'Product name already exist',
            'price.required'=>'price is required',
        ]
    );
    $product = new Product();
    $product->name = $request->name;
    $product->price = $request->price;
    $product->save();
    return response()->json([
        'status'=>'success',
    ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }
    public function productSearch(Request $request){

        // $products = Product::where(function ($query) {
        //     $query->select('status')
        //         ->from('products')
        //         ->where('id', 'LIKE', '%'.$keyword.'%')
        //         ->orWhere('name', 'LIKE', '%'.$keyword.'%')

        $search_string = $request->input('search_string');
        // dd($search_string);
        // Perform the product search based on the search string
        $products = Product::where('name', 'like', '%' . $search_string . '%')
            ->orWhere('price', 'like', '%' . $search_string . '%')
            ->orderBy('id', 'desc')
            ->paginate(5);

        if($products->count() >= 1){
            return view('productview',compact('products'));
        }else{
            return response()->json([
                'status'=>'nothing found',
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        // $id = $request->input('id');

        $product = Product::findOrFail($id);

            return response()->json([
                'status' => 'success',
                'name' => $product->name,
                'price' => $product->price,
            ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $request->validate([
            'up_name'=>'required|unique:products,name,'.$request->up_id,
            'up_price'=>'required'
        ],
        [
            'up_name.required'=>'Name is Required',
            'up_name.unique'=>'Product name already exist',
            'up_price.required'=>'price is required',
        ]
    );

    Product::where('id',$request->up_id)->update([
        'name'=> $request->up_name,
        'price'=> $request->up_price,


    ]);

    return response()->json([
        'status'=>'success',
        // 'message' => 'Product updated successfully',
    ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // $product_id = $request->product_id;
        // dd($product_id);
        Product::find($request->product_id)->delete();
        return response()->json([
            'status'=>'success',


        ]);

    }
}
