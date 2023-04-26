<?php

namespace App\Http\Controllers;

use App\Models\Beatmakers;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $beatmakers = Beatmakers::all();
        $pageTitle = "Accueil | BOMABEATZ";
        return inertia("Index")->with("beatmakers", $beatmakers)->with("pageTitle", $pageTitle); 
    }

    public function admin(){
        return inertia("Admin", ["pageTitle" => "Bomabeatz | Administration"]); 
    }

    public function beats(){
        $beatmakers = Beatmakers::all();
        return inertia("Beats")->with("beatmakers", $beatmakers); 
    }

    public function categories(){
        return inertia("Categories"); 
    }

    public function sellbeat(){
        return inertia("Sellbeat"); 
    }

    public function signup(){
        return inertia("Signup"); 
    }

    public function user_signup(Request $request){

        $request->validate([
            "pseudo" => "required|min:3|unique:Utilisateurs",
            "email" => "email|required|unique:Utilisateurs",
            "password" => "required|min:4",
            "password_confirm" => "required|min:4",
            "statut" => "required"

        ],
        [
            "pseudo.required" => "Veuillez entrer votre pseudo",
            "pseudo.unique" => "Ce pseudo a déjà été pris. Veuillez choisir avec un autre",
            "pseudo.min" => "Votre pseudo doit contenir au minimum 3 caractères",
            "email.email" => "Veuillez entrer une adresse email valide",
            "email.unique" => "Cette adresse email existe dejà. Entrez-en une autre svp",
            "password.required" => "Veuillez entrer un mot de passe",
            "password.min" => "Votre mot de passe doit contenir au minimum 4 caractères",
            "password_confirm.min" => "Votre mot de passe doit contenir au minimum 4 caractères",
            "password_confirm.required" => "Veuillez confirmer le mot de passe",
            "statut.required" => "Veuillez choisir votre statut"
        ]

        
    );

    $pseudo = $request->pseudo;
    $email = $request->email;
    $password = $request->password;
    $statut = $request->statut;
    $password_confirm = $request->password_confirm;


    if(isset($pseudo, $email, $password, $password_confirm, $statut)){

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $user = new Utilisateurs();

            if($password == $password_confirm){
                
                $user->pseudo = htmlentities($pseudo);
                $user->email = htmlentities($email);
                $user->statut = $statut;
                $user->mdp = htmlentities(password_hash($password, PASSWORD_DEFAULT));
                $user->confirmer_mdp = htmlentities(password_hash($password, PASSWORD_DEFAULT));

                $user->save();

                return back()->with("success", "Vous avez été inscrit avec succès");
    

                

            }
            else{
                return back()->with("error", "Les mots de passe ne sont pas identiques");
            }
     
        }
        

    }

    }

    public function login(){
        return inertia("Login", ["pageTitle" => "Bomabeatz | Connexion"]); 
    }

    public function contact(){
        return inertia("Contact", ["pageTitle" => "Bomabeatz | Contact"]); 
    }

    public function about(){
        return inertia("About", ["pageTitle" => "Bomabeatz | A propos"]); 
    }

    public function vip(){
        return inertia("Vip", ["pageTitle" => "Bomabeatz | VIP"]); 
    }

    public function pricing(){
        $utilisateurs = Utilisateurs::all();
        return inertia("Pricing")->with("utilisateur", $utilisateurs); 
    }

}
