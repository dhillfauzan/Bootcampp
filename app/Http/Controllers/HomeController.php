<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $makanan = Produk::where('katagori_id', 1)->where('status', 1)->get();
        $minuman = Produk::where('katagori_id', 2)->where('status', 1)->get();
        $snack = Produk::where('katagori_id', 3)->where('status', 1)->get();
        
        return view('frontend.beranda.index', compact('makanan', 'minuman', 'snack'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Home $home)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Home $home)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Home $home)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Home $home)
    {
        //
    }
}
