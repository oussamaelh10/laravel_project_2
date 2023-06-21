<?php




namespace App\Http\Middleware;




use Closure;

use Illuminate\Http\Request;




class AdminMiddleware

{

    public function handle(Request $request, Closure $next)

    {

        // Voer hier de logica uit om te controleren of de gebruiker een admin is

        // Als de gebruiker geen admin is, kun je een redirect of een foutmelding weergeven




        return $next($request);

    }

}



