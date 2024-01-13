<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $phones = Phone::all();
        return view('phones/index',['phones'=> $phones]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('phones/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make( $request->all(),[
            'seller' => 'required|max:255',
            'brand' => 'required|max:255',
            'version' => 'required',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
        ]);

        if ($validatedData->fails()) {
            return redirect('phones/create')->withErrors($validatedData)->withInput();
        }

        $phone = new Phone;
        $phone->seller =  $request->seller;
        $phone->brand =  $request->brand;
        $phone->version =  $request->version;
        $phone->purchase_price =  $request->purchase_price;
        $phone->sale_price =  $request->sale_price;
        $phone->save();
        return redirect('phones');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $phone = Phone::find($id);
        return view('phones/edit',['phone'=>$phone]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validatedData = $request->validate([
            'seller' => 'required|max:255',
            'brand' => 'required|max:255',
            'version' => 'required',
            'purchase_price' => 'required|numeric',
            'sale_price' => 'required|numeric',
        ]);

        $phone = Phone::find($id);
        $phone->seller =  $request->seller;
        $phone->brand =  $request->brand;
        $phone->version =  $request->version;
        $phone->purchase_price =  $request->purchase_price;
        $phone->sale_price =  $request->sale_price;
        $phone->save();
        return redirect('phones');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $phone = Phone::find($id);
        $phone->delete();
        return redirect('phones');
    }
}
