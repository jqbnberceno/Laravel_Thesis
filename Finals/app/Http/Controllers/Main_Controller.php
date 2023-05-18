<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products_table;
use App\Models\expenses;

class Main_Controller extends Controller
{
    //
  

    public function homePage(){

        // \Log::info(json_encode($request->all()));

        return view ('welcome');
    }

    public function dashboard(){

        return view('dashboard');

    }

    public function expenses(){

        return view('expenses');

    }


    public function addProduct(){

        // \Log::info(json_encode($request->all()));

        return view ('add_product');
    }

    

    public function productPage(){

        // \Log::info(json_encode($request->all()));
        

        $data = products_table::latest()->paginate(3);
        return view('products', compact('data'))->with('page', (request()->input('page', 1) -1 ) *3 );
    }
    
    public function expense(){

        // \Log::info(json_encode($request->all()));
        
        $data = Expenses::latest()->paginate(3);
        return view('expenses', compact('data'))->with('page', (request()->input('page', 1) -1 ) *3 );
    }

    


}
