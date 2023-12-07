<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Validation\Rule;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd(request());
        $attributes = request()->validate([
            's_name' => ['required','min:3','max:255'],
            't_name'=> ['required','min:3','max:255'],
            'category'=> ['required','min:3','max:255'],
            'company_name'=> ['required','min:3','max:255'],
            'amount'=> ['required'],
            'ending_date'=> ['required'],
            'price'=> ['required']
        ]);
       // dd($attributes);
        Product::create($attributes);
        return response()->json(['message' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $product = Product::firstWhere('id',$id);
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
