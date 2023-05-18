<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products_table;

class Product_Controller extends Controller
{
    //

    public function create()
    {
        return view ('add_product');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name'        => 'required',
            'product_description' => 'required',
            'product_quantity'    => 'required|integer',
            'product_price'       => 'required',
            'product_image'       => 'image|mimes:jpeg,png,jpg,gif,svg,jfif'
        ]);
    
        $file_name = time() . '.' . $request->product_image->getClientOriginalExtension();
        request()->product_image->move(public_path('images'), $file_name);
    
        $product = new products_table;
        $product->product_name        = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_quantity    = $request->product_quantity;
        $product->product_price       = $request->product_price;
        $product->product_image       = $file_name;
        $product->save();
    
        return redirect()->route('productPage')->with('success', 'Product Added Successfully!');
    }

    public function show($id)
    {

    $data = products_table::find($id);
    return view('display', compact('data'));

    }

    public function edit ($id)
    {

    $data = products_table::find($id);
    return view('edit', compact('data'));

    }
    
    public function update(Request $request, products_table $product)
    {

        $request->validate([
            'product_name'        => 'required',
            'product_description' => 'required',
            'product_quantity'    => 'required|integer',
            'product_price'       => 'required',
            'product_image'       => 'image|mimes:jpeg,png,jpg,gif,svg,jfif'
        ]);

        $product_image =  $request->hidden_product_image;

        if($request->product_image != '')
        {
            $product_image = time(). '.' . $request->product_image->getClientOriginalExtension();
            request()->product_image->move(public_path('images'), $product_image);
    
        }

        $product = products_table::find($request->hidden_id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_quantity = $request->product_quantity;
        $product->product_price = $request->product_price;
        $product->product_image = $request->product_image;

        $product->save();

        return redirect()->route('productPage')->with('success', 'Product Updated Successfully!');

    }
    
    public function destroy ($id)
    {
        $data = products_table::find($id);
        $data->delete();

        return redirect()->route('productPage')->with('success', 'Product Deleted Successfully!');

    }


}
