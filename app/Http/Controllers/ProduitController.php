<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Categorie;
class ProduitController extends Controller
{
    //
    // liste produit
    public function index(){
      $cat=Categorie::all();
        $prod=Produit::all();
       
        return view('admin.produit')->with('prod' ,$prod)->with('cat' , $cat);

    }

// ajout de produit
 public function store(Request $reqt){
  
 $reqt->validate([
    'nom' => 'required',
    'description' => 'required',
    'prix' => 'required',
    'image' => 'required',
     'qt' => 'required',
   ]);
$destination='uploads';
$image=$reqt->file('image');
$newname=uniqid();

$newname .="." .$image->getClientOriginalExtension(); //donner un niveau nom a l'image
$image->move($destination ,$newname);  // badel il image vers dossier uplode dans le dossier public
$prod=new Produit() ;
$prod->name=$reqt->nom;
$prod->categorie_id=$reqt->cat;
$prod->description=$reqt->description;
$prod->image=$newname;


$prod->prix=$reqt->prix;
$prod->quantite=$reqt->qt;

$prod->save();
return redirect()->back();
 }


// function supprimer un produuit 

  public function destore($id){
 $prod=Produit::find($id);
 $path=public_path()."/uploads/".$prod->image;
unlink($path);
 $prod->delete();
return redirect()->back();

  }


  // function update produit 

  public function update(Request $reqt){
$id=$reqt->id;
$destination='uploads';
$prod=Produit::find($id);
//dd($prod->image);
if($reqt->file('image')){
    $path=public_path()."/uploads/".$prod->image;
  //  dd($path);
    unlink($path);

    $image=$reqt->file('image');
    $newname=uniqid();
    $newname .="." .$image->getClientOriginalExtension(); //donner un niveau nom a l'image
    $image->move($destination ,$newname); 
    $prod->image=$newname;
}

  

$prod->name=$reqt->nom;
$prod->description=$reqt->description;
$prod->prix=$reqt->prix;
$prod->quantite=$reqt->qt;
$prod->update();
return redirect()->back();

  }
}
