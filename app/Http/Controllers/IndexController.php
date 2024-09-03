<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Topic;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request) {
        return view('index', [
            'topics' => Topic::all(),
            'categories' => Categorie::all()
        ]);
    }
}
