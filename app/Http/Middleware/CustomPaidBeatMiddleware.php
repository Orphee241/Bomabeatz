<?php

namespace App\Http\Middleware;

use App\Models\Beat;
use Closure;
use Illuminate\Http\Request;
use App\Models\Paiement;
use App\Models\Utilisateur;
use Inertia\Inertia;

class CustomPaidBeatMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        //Nousrécupérons l'id du beat sur la route
        $id = $request->route("id");

        //Nous récupérons le paiement effectué sur l'utilisateur connecté
        $paiement = Paiement::where("nom_utilisateur", session()->get("userLogged"))->first();

        //Si le nom de l'utilisateur existe dans la table paiement
        if (isset($paiement->nom_utilisateur)) {

            /* 
            Si l'utilisateur connecté correspond à l'utilisateur du paiement
            et que le montant est disponible dans la paiement
            */
            if (session()->get("userLogged") == $paiement->nom_utilisateur) {

                return $next($request);
            } else {

                return back()->withErrors([
                    "msg" => "Une erreur s'est produite : veuillez réessayer"
                ]);
            }
        } else {

            return back()->withErrors([
                "msg" => "Une erreur s'est produite : veuillez réessayer"
            ]);
        }
    }
}
