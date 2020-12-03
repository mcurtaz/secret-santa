<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Identity;
use App\Wish;

class ApiController extends Controller
{
   public function getWS($id){
        
        $identity = Identity::find($id);

        if($identity){

            $wishes = Wish::where('author', '=', $id)
                            -> where('target','=', $id)
                            -> get();
            
            $suggestions = Wish::where('author', '!=', $id)
                            -> where('target','=', $id)
                            -> get();
            
            foreach ($suggestions as $suggestion) {
                $suggestion['whom'] = Identity::find( $suggestion -> author) -> name;
            }

            return response() -> json([
                'success' => 'success',
                'response' => [
                    'identity' => $identity,
                    'wishes' => $wishes,
                    'suggestions' => $suggestions
                ]
            ]);
        } else {

            return response() -> json([
                'success' => 'error',
                'response' => [
                    'error' => 'identity not found'
                ]
            ]);
        }
   }
}
