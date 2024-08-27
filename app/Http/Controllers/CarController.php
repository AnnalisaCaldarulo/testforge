<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{

    public function carIndex()
    {
        $cars = [
            ['name' => 'Polo', 'condition' => 'Nuova', 'img' => '/media/polo.jpg'],
            ['name' => 'Panda', 'condition' => 'Usata', 'img' => '/media/panda.jpg'],
            ['name' => 'Golf', 'condition' => 'Nuova', 'img' => '/media/golf.jpg'],
            ['name' => 'Alfa Giulia', 'condition' => 'Usata', 'img' => '/media/giulia.jpg'],

        ];
        return view('car.index', ['cars' => $cars]);
    }
}
