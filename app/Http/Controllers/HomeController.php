<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Pin;
use App\Comment;
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
        $pins = DB::table('pins')->orderBy('created_at','desc')->get();
        return view('home', ['pins' => $pins]);
    }

    /** Show the pin upload page*/
    public function create()
    {
        return view('upload');
    }

    /**handle the pin post form */

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'title' => 'max:50',
            'description' => 'max:100',
            'image' => 'required|image|dimensions:min_height=100'
        ]);

        $imagePath =($request->image->store('uploads', 'public'));

        
        $pin = new Pin([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $imagePath,
        ]);
        
        Auth::user()->pins()->save($pin);

        return redirect('/home');
        
    }

    public function show($id)
    {
        $pin = DB::table('pins') 
            ->join('users', 'pins.user_id', '=', 'users.id')
            ->where('pins.id', $id)
            ->select('users.id', 'users.name', 'pins.*')
            ->get();

        $comments = DB::table('comments')
            ->join('users', 'comments.user_id', '=', 'users.id')
            ->where('comments.pin_id', $id)
            ->select('users.id', 'users.name', 'comments.*')
            ->get();

        return view('pin', ['pin' => $pin, 'comments' => $comments]);
    }

    public function storeComment(Request $request){
        
        $validatedData = $request->validate([
            'comment_text' => 'required|max:200',
        ]);
        
        $comment = new Comment([
            'comment' => $request->get('comment_text'),
        ]);
        $comment->user()->associate(Auth::user());
        $pin = Pin::find($request->get('pin_id'));
        $comment->pin()->associate($pin);

        $comment->save();

        return redirect('/home'.'/'.$request->get('pin_id'));
        
    }

    public function destroy(Request $request){
        $deletedCommentRows = Comment::where('pin_id', $request->get('pin_id'))->delete();
        $deletedPinRows = Pin::where([['user_id', Auth::id()],['id', $request->get('pin_id')]])->delete();
        return redirect('/home');
    }
}
