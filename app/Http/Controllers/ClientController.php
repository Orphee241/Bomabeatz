<?php

namespace App\Http\Controllers;

use App\Models\Beatmakers;
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
        $pageTitle = "Beats | BOMABEATZ";
        return inertia("Beats")->with("beatmakers", $beatmakers)->with("pageTitle", $pageTitle); 
    }

    public function categories(){
        return inertia("Categories", ["pageTitle" => "Bomabeatz | Categories"]); 
    }

    public function sellbeat(){
        return inertia("Sellbeat", ["pageTitle" => "Bomabeatz | Vendre un beat"]); 
    }

    public function signup(){
        return inertia("Signup", ["pageTitle" => "Bomabeatz | Inscription"]); 
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

}
