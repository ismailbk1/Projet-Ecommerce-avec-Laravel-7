<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\commande;
class clientcontroller extends Controller
{
    //
    public function dashborad(){
        return view('/client.dashborad');
    }

   // function que ouvre le page de formulaire de modification
   public function editprofil(){


    return view('client.editprofil');
}
    public function update(Request $reqt){
        Auth::user()->name=$reqt->nom;
        Auth::user()->email=$reqt->email;
        
        if($reqt->password){
            Auth::user()->password=Hash::make($reqt->password);
        
        }
               if(Auth::user()->update()){
                return redirect()->back()->with('message', 'Profil modifier avec success ');
               }
                
            }
    


     public function carte(){
        $cmd=commande::where('client_id',Auth::user()->id)->where('etat' , "en cours")->get();
dd($cmd[0]->produit);
      return view('/visiteur.carte')->with('cmd' , $cmd);
        
     }

}