<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    /**
     * passagem de parâmetro direto pela url
     * @param integer $p1
     * @param integer $p2
     */
    public function teste(int $p1, int $p2)
    {
        $soma = $p1+$p2;
        /**
         * metódo array associativo
         */
        // return view('site.teste', ['p1' => $p1, 'p2' => $p2, 'soma' => $soma]);

        /**
         * metódo compact -> similar ao array associativo
         */
        // return view('site.teste', compact('p1','p2','soma'));

        /**
         * metódo with, mais verboso que array associativo
         */
        return view('site.teste')->with('p1', $p1)->with('p2', $p2)->with('soma', $soma);
    }
}
