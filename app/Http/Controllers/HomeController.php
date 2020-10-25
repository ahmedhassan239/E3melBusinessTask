<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Therapist;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $therapist = Therapist::orderBy('id', 'desc')->get();
        return view('home')->withTherapist($therapist);
    }

     public function search(Request $request)
    {
        
        $query = $request->input('search');
        
        if(!empty($query)){
            $therapist = Therapist::where('title','LIKE',"%{$query}%")
                                  ->orWhere('name','LIKE',"%{$query}%")
                                  ->take(20)
                                  ->orderBy('id', 'desc')
                                  ->get();                                                                                                                          
            return view('search')->withTherapist($therapist);

        }else{
            return redirect('/');
        }
    }


}
