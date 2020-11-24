<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Identity;
use App\Santa;
use App\Wish;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $identities = Auth::user() -> identities() -> get();

        foreach ($identities as $identity) {

            $santa = Santa::where('from', '=', $identity -> id) -> first();

            
            if($santa){

                $identity['santa'] = $santa -> join('identities', 'identities.id', '=', 'santas.to') -> first();

                $identity['wishes'] = Wish::where('target', '=', $santa -> to) -> where('author', '=', $santa -> to) -> get();

                $identity['suggestion'] = Wish::where('target', '=', $santa -> to) -> where('author', '!=', $santa -> to) -> get();

            } else{

                $identity['santa'] = $santa;
            }
            
        }
        
        return view('home', compact('identities'));
    }
}
