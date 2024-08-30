<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqQuestion;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $search = $request->input('search');
        $results = FaqQuestion::where('name', 'like', "%$search%")->get();
        // echo "<pre>";
        // print_r($results);
        // echo "</pre>";
        // die();
        return view('products.index', ['results' => $results]);
    }
}
