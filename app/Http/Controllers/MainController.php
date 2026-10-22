<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class MainController extends Controller
{

    function about(): View{
        return view('about');
    }
    
    //function aboutMetodo(){
    //    return view('about');
    //}

    function array(): View{
        //array prehistorico
        $array1 = array();
        //array actual
        $array2 = [];
        $array2 = ['juan'];
        $array2 = ['pepe'];
        $array2[10] = 'elizabeth';  
        $array2[] = 'paco';   //lo mete en la posición 11
        $array3 = ['juan','pepe', 'maria'];
        $alumnos = [
            ['nombre' => 'Burgos Tomé, Adrián','edad => 19'],
            ['nombre' => 'Ajarif Saika, Fátima','edad => 20'],
            ['nombre' => 'Albarrán Joya, Antonio','edad => 21'],
            ['nombre' => 'Carrascosa Delgado, Pablo','edad => 20'],
            ['nombre' => 'Castillo García, Joaquín','edad => 20'],
            ['nombre' => 'El Issmail Al Assaf, Amara','edad => 20'],
            ['nombre' => 'Fernández Álvarez, Adrián','edad => 20'],
            ['nombre' => 'Galdón Fernández, Abraham','edad => 20'],
            ['nombre' => 'García González, Ignacio','edad => 20'],
            ['nombre' => 'García López, Pilar','edad => 20'],
            ['nombre' => 'Gorlat Castro, Raúl','edad => 20'],
            ['nombre' => 'Hernández Recio, Iván','edad => 29'],
            ['nombre' => 'Kordass Rjaf-Allah, Noussayr','edad => 19'],
            ['nombre' => 'Maldonado Navarro, Manuel','edad => 22'],
            ['nombre' => 'Montero Pelegrina, Pedro','edad => 21'],
            ['nombre' => 'Montoro Ruiz, Alba','edad => 19'],
            ['nombre' => 'Pérez Montalbán, Christian','edad => 19'],
            ['nombre' => 'Sánchez Sorroche, José','edad => 19'],
            ['nombre' => 'Serrano Rodríguez, Pablo','edad => 21'],
            ['nombre' => 'Vereda Orozco, Gonzalo Jesús','edad => 19'],
            ['nombre' => 'Vicaria García, Francisco Javier','edad => 24'],
            ['nombre' => 'Vilar Martín, Blas','edad => 18'],
            ['nombre' => 'Villegas Rivera, Luis','edad => 19'],
        ];

        $grupo = 'Segundo de desarrollo de aplicaciones web A';

        return view('array', [
            'grupo' => $grupo,
            'alumnos' => $alumnos,
            'profesor' => 'Carmelo'

        ]);
    }
    function index(): View{
        return view('index');
    }

    function portfolio(): View{
        return view('portfolio');
    }


}
