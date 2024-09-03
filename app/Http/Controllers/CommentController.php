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
}
