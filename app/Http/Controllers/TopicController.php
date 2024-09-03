<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    public function index(Request $request, int $id) {
        
        $topic = Topic::where('id', $id)->first();

        if($topic == null) abort(404);

        return view('question', ['topic' => $topic]);
    }

    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'categorie' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Menambahkan categories

        $categorie = Categorie::where('name', $request->input('categorie'))->first();

        if($categorie == null) {
            $categorie = new Categorie();
            $categorie->name = $request->input('categorie');
            $categorie->save();
        }

        // Menambahkan topic
        $topic = new Topic();
        $topic->user_id = Auth::user()->id;
        $topic->title = $request->input('title');
        $topic->body = $request->input('body');
        $topic->categorie_id = $categorie->id;
        $topic->save();

        return redirect()->route('index')->with('success', 'Pertanyaan kamu berhasil di tambahkan.');
    }
}
