<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'topic_id' => 'required',
            'body' => 'required|string',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comment = new Comment();
        $comment->topic_id = $request->input('topic_id');
        $comment->user_id = Auth::user()->id;
        $comment->body = $request->input('body');
        $comment->save();

        return redirect()->back()->with('success', 'Tanggapan kamu berhasil di tambahkan.');
    }

    public function vote(Request $request) {
        $validator = Validator::make($request->all(), [
            'comment_id' => 'required',
            'vote' => 'required',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $vote = Votes::where([
            'comment_id' => $request->input('comment_id'),
            'user_id' => Auth::user()->id,
        ])->first();

        var_dump($vote);

        if($vote != null) {
            $vote->vote = $request->input('vote');
            $vote->save();
        }else{
            $vote = new Votes();
            $vote->comment_id = $request->input('comment_id');
            $vote->user_id = Auth::user()->id;
            $vote->vote = $request->input('vote');
            $vote->save();
        }

        return redirect()->back();
    }

    public function delete(Request $request, string $id) {
        $comment = Comment::find($id);

        if($comment == null) return abort(404);

        if($comment->user_id != Auth::user()->id) {
            return abort(403);
        }

        $comment->delete();

        return 'success';
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            'id' => 'required|string',
            'body' => 'required|string',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $comment = Comment::find($request->input('id'));

        if($comment == null) abort(404);
        if($comment->user_id != Auth::user()->id) abort(403);

        $comment->body = $request->input('body');
        $comment->save();

        return redirect()->route('question', $comment->topic->id)->with('success', 'Comment telah diperbarui');
    }
}
