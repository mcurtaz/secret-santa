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

                $identity['santa'] = Identity::where('id', '=', $santa -> to) -> first();

                $identity['wishes'] = Wish::where('target', '=', $santa -> to) -> where('author', '=', $santa -> to) -> get();

                $identity['suggestion'] = Wish::where('target', '=', $santa -> to) -> where('author', '!=', $santa -> to) -> get();

            } else{

                $identity['santa'] = $santa;
            }
            
        }
        
        return view('home', compact('identities'));
    }

    public function setSanta(Request $request){

        $id = $request -> id;

        $user = Identity::where('id', '=', $id) -> first() -> users() -> first();

        $identities = $user -> identities() -> get();

        $ids = [];

        foreach ($identities as $identity) {
            $ids[] = $identity -> id;
        }

        $santa = Santa::where('from', '=', $id) -> first();

        if($santa){

            return redirect() -> route('home') -> with('error', 'Hai già un regalo assegnato!');
        }else{

            $randomAvailableSanta = Santa::rightjoin('identities', 'identities.id', '=', 'santas.to')
                                        -> where('santas.to', '=', NULL)
                                        -> whereNotIn('identities.id', $ids)
                                        -> inRandomOrder()
                                        -> first();

            // ATTENZIONE: QUA CI VA UN IF CHE INFICIA L?ESTRAZIONE DI TUTTI SE NON CI SONO SANTA AVAILABLE (MI TOCCHEREBBE ESTRARRE UN NOME MIO)
            
            Santa::create([
                'from' => $id,
                'to'   => $randomAvailableSanta -> id
            ]);

            return redirect() -> route('home');
        }
    }

    public function myWS(){

        $identities = Auth::user() -> identities() -> get();
        foreach ($identities as $identity) {
            $wishes = Wish::where('author', '=', $identity -> id)
            -> where('target', '=', $identity -> id)
            -> get();
            
            $suggestions = Wish::where('author', '=', $identity -> id)
            -> where('target', '!=', $identity -> id)
            -> get();
            
            $identity['wishes'] = $wishes;
            $identity['suggestions'] = $suggestions;
            
        }
        
        return view('myWS', compact('identities'));
    }

}
