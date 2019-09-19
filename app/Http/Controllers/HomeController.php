<?php

namespace App\Http\Controllers;

use App\Pin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. All pins displayed
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /** Show the pin upload page*/
    public function create()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'max:50',
            'description' => 'max:100',
            'image' => 'required|image'
        ]);

        dd($request->image->store('uploads'));

        //$imagePath = request('image')->store('uploads', 'public');

        $pin = new Pin([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $request->get('image'),
        ]);
        
        Auth::user()->pins()->save($pin);

        return redirect('/home');
        
    }
}
