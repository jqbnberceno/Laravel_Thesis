<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expenses;


class Expenses_Controller extends Controller
{
    public function create()
    {
        return view ('add_expenses');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vendor_name'        => 'required',
            'product'            => 'required',
            'cost'               => 'required',
            'order_total'        => 'required|integer',
            'purchase_date'      => 'required',
        ]);
    
        $expense = new Expenses;
        $expense->vendor_name        = $request->vendor_name;
        $expense->product            = $request->product;
        $expense->cost               = $request->cost;
        $expense->order_total        = $request->order_total;
        $expense->purchase_date      = $request->purchase_date;
        $expense->save();
    
        return redirect()->route('expensePage')->with('success', 'Detail Added Successfully!');
    }

   
    public function show($id)
    {

    $data = Expenses::find($id);
    return view('display_exp', compact('data'));

    }

    public function edit ($id)
    {

    $data = Expenses::find($id);
    return view('edit_expenses', compact('data'));

    }
    
    public function update(Request $request, $id)
{
    $request->validate([
        'vendor_name'        => 'required',
        'product'            => 'required',
        'cost'               => 'required',
        'order_total'        => 'required|integer',
        'purchase_date'      => 'required',
    ]);

    $expense = Expenses::findOrFail($id);
    $expense->vendor_name        = $request->vendor_name;
    $expense->product            = $request->product;
    $expense->cost               = $request->cost;
    $expense->order_total        = $request->order_total;
    $expense->purchase_date      = $request->purchase_date;

    $expense->save();

    return redirect()->route('expensePage')->with('success', 'Information Updated Successfully!');
}

    
    public function destroy ($id)
    {
        $data = Expenses::find($id);
        $data->delete();

        return redirect()->route('expensePage')->with('success', 'Information Deleted Successfully!');

    }

}

    
