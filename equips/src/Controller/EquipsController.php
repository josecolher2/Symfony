<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EquipsController
{
    private $equips = array(
        array("codi" => "1", "nom" => "Equip Roig", "cicle" =>"DAW",
            "curs" =>"22/23", "membres" =>
            array("Jose","Alejandro","David","Jaume")),
        array("codi" => "2", "nom" => "Equip Azul", "cicle" =>"DAW",
            "curs" =>"22/23", "membres" =>
            array("Pablo","Alvaro","Ivan","Marcos")),
        array("codi" => "3", "nom" => "Equip Verde", "cicle" =>"DAW",
            "curs" =>"22/23", "membres" =>
            array("Miguel","Sergio","Yazmine","Kiko")),
        array("codi" => "4", "nom" => "Equip Amarillo", "cicle" =>"DAW",
            "curs" =>"22/23", "membres" =>
            array("Elena","Vicent","Joan","Maria"))
    );
    #[Route('/equips/{codi}', name: 'app_equips')]
    public function index($codi)
    {
        $resultat = array_filter($this->equips,
            function($equip) use ($codi)
            {
                return $equip["codi"] == $codi;
            });
        if (count($resultat) > 0)
        {
            $resposta = "";
            $resultat = array_shift($resultat); #torna el primer element
            $resposta .= "<ul><li>" . $resultat["nom"] . "</li>" .
                "<li>" . $resultat["cicle"] . "</li>" .
                "<li>" . $resultat["curs"] . "</li></ul>";
            $resposta.= "<h3>" . "MEMBRES"."</h3>";
            $resposta .= "<ul>";
            foreach($resultat['membres'] as $miembro) {
                $resposta .= "<li>" . $miembro . "</li>";
            }
            $resposta .= "</ul>";
            return new Response("<html><body>$resposta</body></html>");
        }
        else
            return new Response("No s'ha trobat l'equip: {$codi}");
    }
}
