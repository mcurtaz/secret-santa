<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WishAction;
use App\Mail\Annunciazione;
use App\Identity;
use App\Santa;
use App\Wish;
use App\User;
use Carbon\Carbon;

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



    public function index(){
        $userId = Auth::user() -> id;
        $identities = Identity::where('user_id', '=', $userId) -> get();

        foreach ($identities as $identity) {

            $santa = Santa::where('from', '=', $identity -> id) -> first();
            
            if($santa){

                $identity['santa'] = Identity::where('id', '=', $santa -> to) -> first();

                $identity['wishes'] = Wish::where('target', '=', $santa -> to) 
                                            -> where('author', '=', $santa -> to) 
                                            -> get();

                $identity['suggestions'] = Wish::select('wishes.*', 'identities.name AS whom')
                                                -> where('target', '=', $santa -> to) 
                                                -> where('author', '!=', $santa -> to) 
                                                -> join('identities', 'identities.id', '=', 'wishes.author') 
                                                -> get();

                $identity['annunciazione'] = $santa;

            } else{

                $identity['santa'] = $santa;
            }
            
        }

        return view('home', compact('identities'));
    }





    public function setSanta(Request $request){

        $id = $request -> id;
        $userId = Identity::findOrFail($id) -> user_id;

        $identities = Identity::where('user_id', '=', $userId) -> get();

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
            if($randomAvailableSanta == NULL){

                aMonte();

                //mail di avviso
                $users = User::all();
                $annunciazione = 'aMonte';

                foreach ($users as $user) {
    
                    Mail::to($user) -> send(new Annunciazione($annunciazione, ''));

                }
                return redirect() -> route('home') -> with('error', 'A MONTE!!! Tutto da rifare: annullate tutte le estrazioni con effetto immediato. RIFA');
            
            }else{

                Santa::create([
                    'from' => $id,
                    'to'   => $randomAvailableSanta -> id
                ]);

                $allDone = checkAllSantaSet();

                if($allDone){

                     //mail di avviso
                    $users = User::all();
                    $annunciazione = 'estrazioneOk';

                    foreach ($users as $user) {
    
                        Mail::to($user) -> send(new Annunciazione($annunciazione, ''));
    
                    }
                }
    
                return redirect() -> route('home');

            }
            
        }
    }





    public function myWS(){

        $userId = Auth::user() -> id;

        $identities = Identity::where('user_id', '=', $userId) -> get();

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




    public function createWish($id, $wish){

        $identities = Identity::where('id', '!=', $id) -> get();
        
        return view('wish', compact('id', 'wish', 'identities'));
    }




    public function storeWish(Request $request){

        $data = $request -> validate([
            'author' => 'required',
            'target' => 'required',
            'name'  => 'required|min:3|max:60',
            'description' => 'nullable|min:3|max:1000',
            'price' => 'nullable|min:1|max:1000',
            'link'  => 'nullable|min:5'
        ]);

        $wish = Wish::create($data);


        // dati per mail

        $mail = $wish;
        $author = Identity::findOrFail($wish -> author);
        $target = Identity::findOrFail($wish -> target);

        $mail['a_name'] = $author -> name;
        $mail['t_name'] = $target -> name;
        $mail['action'] = 'create';

        $subject = 'Nuovo Desiderio/Suggerimento';

        $santa = Santa::where('to', '=', $target -> id) -> first();

        if($santa){
            
            $santaId = Identity::findOrFail($santa -> from) -> user_id;
            $sendTo = User::findOrFail($santaId);
            
            Mail::to($sendTo) -> send(new WishAction($mail, $subject));

        }

        return redirect() -> route('myWS') -> with('status', 'Desiderio/Suggerimento creato correttamente');
    }



    public function deleteWish(Request $request){

        $wish = Wish::findOrFail($request -> id);

        $author = Identity::findOrFail($wish -> author);

        $userId = Auth::user() -> id;
        
        if($author -> user_id == $userId){

            // dati per email
            $mail = $wish;
            $target = Identity::findOrFail($wish -> target);

            $mail['a_name'] = $author -> name;
            $mail['t_name'] = $target -> name;
            $mail['action'] = 'delete';

            $subject = 'Desiderio/Suggerimento eliminato';

            $santa = Santa::where('to', '=', $target -> id) -> first();

            if($santa){
                
                $santaId = Identity::findOrFail($santa -> from) -> user_id;
                $sendTo = User::findOrFail($santaId);
                
                Mail::to($sendTo) -> send(new WishAction($mail, $subject));

            }


            $wish -> delete();

            return redirect() -> route('myWS') -> with('status', 'Desiderio/Suggerimento eliminato correttamente');

        } else{

            return redirect() -> route('myWS') -> with('error', 'Autorizzazione negata');
        }
    }




    public function santaDone(Request $request){

        $userId = Auth::user() -> id;

        $identity = Identity::findOrFail($request -> id);

        if($identity -> user_id == $userId){

            $santa = Santa::where('from', '=', $identity -> id) -> first();

            $santa -> update([
                'done' => 1,
                'done_at' => Carbon::now()
            ]);

            $undoneSanta = Santa::where('done', '=', 0) -> get();

            if(checkAllSantaSet() && $undoneSanta -> isEmpty()){
                
                //mail di avviso tutti i regali fatti
                $annunciazione = 'allDone';

                foreach ($users as $user) {

                    Mail::to($user) -> send(new Annunciazione($annunciazione, ''));
                }

            }else{

                //mail di avviso regalo fatto

                $name = Identity::where('id', '=', $santa -> to) -> first() -> name;
                $users = User::all();
                $annunciazione = 'regaloOk';

                foreach ($users as $user) {

                    Mail::to($user) -> send(new Annunciazione($annunciazione, $name));

                }
            }
            
            

            return redirect() -> route('home');

        } else {

            return redirect() -> route('home') -> with('error', 'Accesso negato');

        }
    }

}


function aMonte(){

    $allSantas = Santa::all();

    foreach ($allSantas as $santa) {
       $santa -> delete();
    }
}

function checkAllSantaSet(){

    $identitiesId = Identity::pluck('id') -> toArray();

    $santasId = Santa::pluck('from')-> toArray();

    $diff = array_diff( $identitiesId, $santasId);

    return !$diff;
    
}