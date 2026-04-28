<?php

namespace App\Http\Controllers;

use App\Models\Pingme;
use Illuminate\Http\Request;

class PingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pings = Pingme::with('user')
            ->latest()
            ->take(50)
            ->get();

        // making this index() recognie our home page 'home'
        // to pass the $pings data to the home page
        return view('home', ['pings' => $pings]);
        // 'pings' - this will be the name of the variable you will use on blade file
        // $pings -
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
    public function show(string $id)
    {
        //
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
