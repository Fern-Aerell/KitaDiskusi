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
        $topics = Topic::where('id', '!=', $id)->limit(10)->get();

        if($topic == null) abort(404);

        return view('question', [
            'topics' => $topics,
            'topic' => $topic
        ]);
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

        return redirect()->back()->with('success', 'Pertanyaan kamu berhasil di tambahkan.');
    }

    public function delete(Request $request, string $id) {
        $topic = Topic::find($id);

        if($topic == null) return abort(404);

        if($topic->user_id != Auth::user()->id) {
            return abort(403);
        }

        $topic->delete();

        return 'success';
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $topic = Topic::find($request->input('id'));

        if($topic == null) abort(404);
        if($topic->user_id != Auth::user()->id) abort(403);

        $topic->title = $request->input('title');
        $topic->body = $request->input('body');
        $topic->save();

        return redirect()->route('question', $topic->id)->with('success', 'Diskusi telah diperbarui');
    }
}
