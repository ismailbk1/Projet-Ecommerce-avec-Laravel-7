<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Categorie;
class visiteurcontroller extends Controller
{
    //
    public function visiteur(){
        
        $cat=Categorie::all();
        $prod=Produit::all();

        return view('visiteur.home')->with('cat',$cat)->with('prod',$prod);

    }


    // function search 
public function search(Request $requette){
    $cat=Categorie::all();
      $prod=Produit::where('name','LIKE','%'.$requette->search.'%' )->get();
    
      return view('visiteur.home')->with('cat',$cat)->with('prod',$prod);
}

// function filtre categories


public function categorie($id_categorie){
   
$cat=Categorie::all();


$prod=Produit::where('categorie_id',$id_categorie)->get();

return view('visiteur.home')->with('cat',$cat)->with('prod',$prod);



}


public function details($id){
 $prod=Produit::find($id);

 $cat=Categorie::all();

 $categ=Categorie::find($prod->id);
 
$prodrelative=Produit::where('categorie_id','!=',$prod->id)->get();
// dd($prod);
 return view('visiteur.details')->with('cat', $cat)->with('categ' , $categ)->with('prod' , $prod)->with('prodre' , $prodrelative );


}





}
