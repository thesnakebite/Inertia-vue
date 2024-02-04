<?php

namespace App\Http\Controllers;

use App\Http\Resources\ChirpResource;
use Inertia\Inertia;
use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chirp = Chirp::with('user:id,name')
            ->latest()
            ->get();

        // return ChirpResource::collection($chirp);

        return Inertia::render('Chirps/Index', [
            'chirps' => ChirpResource::collection($chirp),
        ]);
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
        $request->validate([
            'message' => ['required', 'max:255'],
        ]);

        $request->user()->chirps()->create([
            'message' => $request->input('message')
        ]);

        return back()->with('status', __('Chirp created!'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        //
    }
}
