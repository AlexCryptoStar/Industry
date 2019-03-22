<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\DataRegisterModel;
use Illuminate\Http\Request;

class PagesController extends Controller {

    public function getHome() {
        
        // Getting Data from table `data_registry`.
        $dataRegistry = new DataRegisterModel;
        $getData = $dataRegistry->get();
        $sorted = $getData->sortByDesc('created_at');

        return view('partials.app')->with( 'data', $sorted );
    }

}