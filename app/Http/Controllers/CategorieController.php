<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;



class CategorieController extends Controller
{
    /////////////////////////////////
///////////////////////////////
                     // function pour aller au page liste categorie

    public function index(){
        $categs=Categorie::all();
        return view('/admin.index')->with('categs',$categs);
    }
    

    
    /////////////////////////////////////
    //////////////////////////////////

                          // function pour ajouter categorie
    public function store(Request $reqt){

          

            $reqt->validate([
             'nom' => 'required',
             'description' => 'required',

            ]);
            $categ=new Categorie();
            $categ->name=$reqt->nom;
            $categ->description=$reqt->description;
        if($categ->save()){
            return redirect()->back();
        }    
    }
    
    /////////////////////////////////////
    //////////////////////////////////
                         // function pour supprimer categorire
    public function destory($id){

    $categ=Categorie::find($id);

  if(  $categ->delete() ){
    return redirect()->back();
  }
  else{
    echo'Error';
  }


    }


    /////////////////////////////////////
    //////////////////////////////////
                   // function pour update categorie 
    public function update(Request $reqt){
        $reqt->validate([
            'nom' => 'required',
            'description' => 'required',

        ]);

        $id=$reqt->id;
        $categ=Categorie::find($id);
        $categ->name=$reqt->nom;
        $categ->description=$reqt->description;

        if($categ->update()){
            return redirect()->back();
        }
        else
        echo"Error";


    }

}
