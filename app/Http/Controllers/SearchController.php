<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Car;

class SearchController extends Controller
{
    public function index () {
        return view ('welcome');
    }

    public function query (Request $request) {
        $q = $request->q;

        if (!isset($q)) return redirect()->back()->with([
            'error' => "No Search Query Inputted"
        ]);

        $searchResults = Car::search($q)->paginate(10);

        return redirect()->back()->with ([
            'searchResults' => $searchResults,
            'query' => $q,
            'message' => 'Search Results for '.'"'.$q.'"'
        ]);
        
    }
}
