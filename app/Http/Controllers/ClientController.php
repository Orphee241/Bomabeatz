<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Beatmaker;
use App\Models\Beat;
use App\Models\Paiement;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Inertia\Inertia;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class ClientController extends Controller
{
    public function index()
    {
        $beatmakers = Beatmaker::all();
        $beats = Beat::all();

        return inertia("Index")
            ->with("beats", $beats)
            ->with("beatmakers", $beatmakers);
    }

    /*   public function drop(){
        
        return Storage::disk('dropbox')->files();
    } */

    public function admin()
    {
        return inertia("Admin", ["pageTitle" => "Bomabeatz | Administration"]);
    }

    public function beats()
    {

        $beats = Beat::all();

        return inertia("Beats")->with("beats", $beats);
    }

    public function beat_detail($id)
    {


        $beat = Beat::find($id);

        return inertia("Beat_detail")->with("beat", $beat);
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

    /* Inscription */
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

                $user = new Utilisateur();

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
                "password" => "required", "min:4",
            ],
            [
                "email.required" => "Veuillez entrer votre adresse email",
                "password.required" => "Veuillez entrer votre mot de passe",
            ]

        );

        $email = $request->email;
        $password = $request->password;

        if (isset($email, $password)) {

            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                $utilisateur = Utilisateur::where('email', $email)->first();

                if (isset($utilisateur->email)) {

                    if ($utilisateur->email == $email && password_verify($password, $utilisateur->mdp)) {


                        /* dispatch(function(){
                            sleep(3);
                        })->delay(now()->addSeconds(3)); */

                        $request->session()->put("userId", $utilisateur->id);
                        $request->session()->put("loggedMsg", "Vous êtes connecté");
                        $request->session()->put("successMsg", "Vous êtes connecté");
                        $request->session()->put("userLogged", $utilisateur->pseudo);

                        $defaulRoute = route("home");
                        $intendedRoute = redirect()->intended($defaulRoute)->getTargetUrl();

                        //dd($request->session()->get("utilisateurs"), $request->session()->get("successMsg"));
                        return redirect($intendedRoute);
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
    }

    public function logout()
    {
        if (session()->has("successMsg") || session()->has("loggedMsg") || session()->has("userLogged")) {
            session()->pull("successMsg");
            session()->pull("loggedMsg");
            session()->pull("userLogged");

            return redirect("login");
        }
    }


    public function contact()
    {
        return inertia("Contact");
    }

    public function about()
    {
        return inertia("About");
    }

    public function donation()
    {
        return inertia("Donation");
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
            "redirect_error",
            "name_user",
            "beat_name",
            "beat_id",
            "utilisateur_id"
        ]);



        $amount = $request->amount;
        $reference = $request->reference;
        $portfeuille = $request->portfeuille;
        $disbursement = $request->disbursement;
        $redirect_success = $request->redirect_success;
        $redirect_error = $request->redirect_error;

        $nom_utilisateur = $request->name_user;
        $beat_id = $request->beat_id;
        $utilisateur_id = $request->utilisateur_id;
        $nom_beat = $request->beat_name;


        /* Enregistrement de la référence */
        try {
            //code...
        

        if (session()->has("userLogged")) {
           // $paiementRetrieve = Paiement::where("nom_utilisateur", session()->get("userLogged"))->first();
      
            $paiementRetrieve = Paiement::find($beat_id);

            

            $paiement = new Paiement();

            //Si la personne connectée == personne qui a fait le paiement, on met à jour la référence et la date
            //dans la table paiement, dans le cas contraire, on insère toutes les données dans la table paiement


            if (
                isset($paiementRetrieve->id_beat)
            ) {

                dd("1");

                if( $paiementRetrieve->id_beat == $beat_id){
                    
                    dd("2");
                    $paiement::where("id_beat", $beat_id)->update(["reference" => $reference]);

                }

                /* dd(session()->get("userLogged"). " oh"); */
                
            }else{

                $paiement->reference = $reference;
                //$paiement->montant = $amount;
                $paiement->nom_beat = $nom_beat;
                $paiement->id_beat = $beat_id;
                $paiement->id_utilisateur = $utilisateur_id;
                $paiement->date = now();
                $paiement->nom_utilisateur = $nom_utilisateur;
                $paiement->save();
                
            }
        }

    } catch (Exception $e) {

        return back()->withErrors([
            "errorMsg" => "Une erreur s'est produito"
        ]);
    }


        try {
            //code...


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

                $paymentLink = $responseBodyObj->link;

                return Inertia::location($paymentLink);
            }
        } catch (Exception $e) {

            return back()->withErrors([
                "errorMsg" => "Une erreur s'est produite"
            ]);
        }
    }

    /* Lorque le paiement du beat s'est effectué */

    public function beat_paid_verify($id)
    {

        $client = new Client();

        $beat = Beat::find($id);

        //return inertia("Beat_detail")->with("beat", $beat);

        $reference = "ref" . now();
    }

    public function verify()
    {

        $client = new Client();

        //return inertia("Beat_detail")->with("beat", $beat);

        $reference = "ref" . time();


        $url = 'https://gateway.singpay.ga/v1/transaction/api/search/by-reference/' . $reference;

        $headers = [
            'accept' => '*/*',
            'x-client-id' => '3e4fdc12-5f05-4528-abf9-5e31d6fbab89',
            'x-client-secret' => '3b252661805e6b33a591c56ad8ed0534397978ea1f13dbe3c1fe3d7946f08488',
            'x-wallet' => '64493b08a2980dcdb93f5529',
            'Content-Type' => 'application/json',
        ];

        $response = $client->request('GET', $url, [
            'headers' => $headers
        ]);

        if ($response->getStatusCode() == 200) {

            $responseBody = $response->getBody()->getContents();
            $responseBodyObj = json_decode($responseBody);

            //dd($responseBodyObj);

            if ($responseBodyObj->result == "Success") {

                $paiement = new Paiement();

                //$paiement->reference = $reference;
                //$paiement->date = now();
                //$paiement->nom_utilisateur = $nom_utilisateur;
                //$paiement->update();

                $paiementRetrieve = Paiement::where("nom_utilisateur", session()->get("userLogged"))->first();

                /* if (isset($paiement->montant) && $paiementRetrieve->nom_utilisateur == session()->get("userLogged")) {

                    
                } else {

                    $paiement::where("reference", $responseBodyObj->reference)->update(["montant" => $responseBodyObj->amount]);

                    
                } */
            }


            //$paymentLink = $responseBodyObj->link;

            //return Inertia::location($paymentLink);
        }



        //return inertia("Beat_paid_verify");
    }

    public function beat_paid($id)
    {

        $beat = Beat::find($id);
        $paiement = Paiement::where("nom_utilisateur", session()->get("userLogged"))->first();

        return inertia("Beat_paid")->with("beat", $beat)
            ->with("paiement", $paiement);
    }

    public function notif()
    {
        return inertia("Notification");
    }

    public function infos_payment(Request $request, $id)
    {

        $request->validate([
            "amount",
            "id_user",
            "beat_name",
            "reference"
        ]);

        $montant = $request->amount;
        $id_utilisateur = $request->id_user;
        $nom_beat = $request->beat_name;
        $reference = $request->reference;
        $nom_utilisateur = $request->name_user;
        $id_utilisateur = $request->id_user;


        /* Enregistrement de la référence */
        $paiement = new Paiement();

        $paiement->reference = $reference;
        $paiement->date = now();
        $paiement->nom_utilisateur = $nom_utilisateur;
        $paiement->id_utilisateur = $id_utilisateur;
        $paiement->nom_beat = $nom_beat;
        $paiement->montant = $montant;
        $paiement->update();
    }
}