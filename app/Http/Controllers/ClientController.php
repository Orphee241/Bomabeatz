<?php

namespace App\Http\Controllers;

use App\Models\Beatmakers;
use App\Models\Beats;
use App\Models\Utilisateurs;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Inertia\Inertia;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    public function index()
    {
        $beatmakers = Beatmakers::all();
        $beats = Beats::all();
        
        return inertia("Index")
        ->with("beats", $beats)
        ->with("beatmakers", $beatmakers);
    }

    public function admin()
    {
        return inertia("Admin", ["pageTitle" => "Bomabeatz | Administration"]);
    }

    public function beats()
    {
        $beats = Beats::all();

        return inertia("Beats")->with("beats", $beats);
    }

    public function categories()
    {
        return inertia("Categories");
    }

    public function sellbeat()
    {
        return inertia("Sellbeat");
    }

    public function signup()
    {
        return inertia("Signup"); 
    }

    public function user_signup(Request $request)
    {

        $request->validate(
            [
                "pseudo" => "required|min:3|unique:Utilisateurs",
                "email" => "email|required|unique:Utilisateurs",
                "password" => "required|min:4",
                "password_confirm" => "required|min:4",
                "statut" => "required"

            ],
            [
                "pseudo.required" => "Veuillez entrer votre pseudo",
                "pseudo.unique" => "Ce pseudo a déjà été pris. Veuillez choisir un autre",
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


        if (isset($pseudo, $email, $password, $password_confirm, $statut)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $user = new Utilisateurs();

                if ($password == $password_confirm) {

                    $user->pseudo = htmlentities($pseudo);
                    $user->email = htmlentities($email);
                    $user->statut = $statut;
                    $user->mdp = htmlentities(Hash::make($password));
                    $user->confirmer_mdp = htmlentities(Hash::make($password));

                    $user->save();

                    //return back()->with("success", "Vous avez été inscrit avec succès");
                } else {
                    return back()->withErrors([
                        "msg" => "Les mots de passe ne sont pas identiques"
                    ]);
                }
            } else {
                return back()->withErrors([
                    "emailMsg" => "Veuiller entrer une adresse email valide"
                ]);
            }
        }
    }

    public function login()
    {
        return inertia("Login");
    }

    /* Authentification : connexion */
    public function authentikate(Request $request)
    {
        $credentials = $request->validate(
            [
                "email" => "required",
                "password" => "required|min:4",
            ],
            [
                "email.required" => "Veuillez entrer votre adresse email",
                "password.required" => "Veuillez entrer votre mot de passe",
                "password.min" => "Mot de passe incorrect",

            ]
        );

        $email = $request->email;
        $password = $request->password;


        if (isset($email, $password)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $utilisateurs = Utilisateurs::where('email', $email)->first();

                if(isset($utilisateurs->email)) {
                    
                    if ($utilisateurs->email == $email && password_verify($password, $utilisateurs->mdp)) {
                        

                        /* dispatch(function(){
                            sleep(3);
                        })->delay(now()->addSeconds(3)); */
                        

                        $request->session()->put("utilisateurs", $utilisateurs);
                        $request->session()->put("successMsg", "Vous êtes connecté");

                        //$defaulRoute = route("home");
                        //$intendedRoute = redirect()->intended($defaulRoute)->getTargetUrl();

                        //dd($request->session()->get("utilisateurs"), $request->session()->get("successMsg"));
                        return Inertia::location(route("home"));

                    } else {
                        return back()->withErrors([
                            "errorMsg" => "Adresse email ou mot de passe incorrecte"
                        ]);
                    }
                } else {
                    return back()->withErrors([
                        "errorMsg" => "Adresse email incorrecte"
                    ]);
                }
            } else {
                return back()->withErrors([
                    "errorMsg" => "Veuiller entrer une adresse email valide"
                ]);
            }
        }


    /*  $data = $request->only("email", "password");

        if (Auth::attempt($data)) {

            

            dd($data);
        } else {
            return back()->withErrors([
                "email" => "Adresse email ou mot de passe incorrecte",
            ]);
        }*/
    } 

    public function logout()
    {
        if(session()->has("successMsg")){
            session()->pull("successMsg");
        }

        return Inertia::location("login");
    }

    public function contact()
    {
        return inertia("Contact", ["pageTitle" => "Bomabeatz | Contact"]);
    }

    public function about()
    {
        return inertia("About", ["pageTitle" => "Bomabeatz | A propos"]);
    }

    public function vip()
    {
        return inertia("Vip", ["pageTitle" => "Bomabeatz | VIP"]);
    }

    public function pricing()
    {
        $utilisateurs = Utilisateurs::all();
        return inertia("Pricing")->with("utilisateur", $utilisateurs);
    }

    /* -----------Payment-------------- */
    public function payment(Request $request)
    {

        $client = new Client();

        $request->validate([
            "amount",
            "reference",
            "portfeuille",
            "disbursement",
            "redirect_success",
            "redirect_error"
        ]);

        $amount = $request->amount;
        $reference = $request->reference;
        $portfeuille = $request->portfeuille;
        $disbursement = $request->disbursement;
        $redirect_success = $request->redirect_success;
        $redirect_error = $request->redirect_error;

        try {

            $url = 'https://gateway.singpay.ga/v1/ext';

            $headers = [
                'accept' => '*/*',
                'x-client-id' => '3e4fdc12-5f05-4528-abf9-5e31d6fbab89',
                'x-client-secret' => '3b252661805e6b33a591c56ad8ed0534397978ea1f13dbe3c1fe3d7946f08488',
                'x-wallet' => '64493b08a2980dcdb93f5529',
                'Content-Type' => 'application/json',
            ];

            $data = [
                'portefeuille' => $portfeuille,
                'reference' => $reference,
                'redirect_success' => $redirect_success,
                'redirect_error' => $redirect_error,
                'amount' => $amount,
                'disbursement' => $disbursement,
                'logoURL' => '',
                'isTransfer' => true,
            ];


            $response = $client->request('POST', $url, [
                'headers' => $headers,
                'json' => $data
            ]);

            if ($response->getStatusCode() == 200) {
                $responseBody = $response->getBody()->getContents();

                $responseBodyObj = json_decode($responseBody);

                $link = $responseBodyObj->link;

                return Inertia::location($link);
            }
        } catch (Exception $e) {

            return back()->withErrors([
                "msg" => "Une erreur s'est produite : veuillez vous connecter à internet"
            ]);
        }
    }

    public function notif()
    {
        return inertia("Notification");
    }
}
