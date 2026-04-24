<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pings = [
            [
                'author' => 'Fritz Harly',
                'message' => 'Heyy, good morning everyone!',
                'time' => '3 hours ago',
            ],
            [
                'author' => 'Christine Banega`',
                'message' => 'What\'s for lunch?',
                'time' => '5 minutes ago',
            ],
            [
                'author' => 'Reynaldo Tolentino',
                'message' => 'I\'m running late!',
                'time' => '10 minutes ago',
            ],
            [
                'author' => 'Harlyne Rose`',
                'message' => 'See you later at the meeting!',
                'time' => '15 minutes ago',
            ],
            [
                'author' => 'Renante',
                'message' => 'Let\'s go out later?',
                'time' => '3 hours ago',
            ],
        ];

        // making this index() recognie our home page 'home'
        // to pass the $pings data to the home page
        return view('home', ['pings' => $pings]);
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
