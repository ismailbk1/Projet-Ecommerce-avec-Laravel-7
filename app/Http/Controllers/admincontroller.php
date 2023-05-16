<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    //
    public function dashborad(){
        return view('/admin.dashborad');

    }


    // function que ouvre le page de formulaire de modification
    public function editprofil(){


        return view('admin.editprofil');
    }



    // function de modification 

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

}
