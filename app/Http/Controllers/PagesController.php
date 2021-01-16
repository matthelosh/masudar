<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $page)
    {
        if($page) {
            return view($page);
        } else {
            return 'Dada';
        }
    }

    public function index(Request $request, $page)
    {
        if($page) {
            return view($page);
        } else {
            return 'Hai';
        }
    }
}
