<?php

namespace App\Http\Controllers;

use App\Models\Pingme;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PingController extends Controller
{
    use AuthorizesRequests;
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
        // adding ping message
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5', // validation rules
        ]);

        // The "Pingme" must same of the model file for this
        /** @var User $user*/
        $user = $request->user();
        $user->pingme()->create($validated);
        return redirect('/')->with('success', 'Ping succesfully created');
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
    public function edit(Pingme $ping)
    {
        $this->authorize('update',$ping);
        return view('pings.edit', compact('ping'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pingme $ping)
    {
        $this->authorize('update',$ping);
        // validating ping message
        $validated = $request->validate([
            'message' => 'required|string|max:255|min:5', // validation rules
        ]);

        // Update the existing ping instead of creating a new one
        $ping->update([
            'message' => $validated['message'],
        ]);

        return redirect('/')->with('success', 'Ping succesfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pingme $ping)
    {
        $this->authorize('delete',$ping);
        $ping->delete();

        return redirect('/')->with('success', 'Your ping has been deleted!');
    }
}
