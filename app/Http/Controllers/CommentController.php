<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Person;
use App\Models\Item;
use App\Models\User;

class CommentController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('comment.index', compact('comments'));
    }

    public function show(Comment $comment)
    {
        return view('comment.show', compact('comment'));
    }

    public function create(Comment $comment ,Company $company, Item $item)
    {
        return view('comment.create', compact('comment', 'company', 'item'));
    }

    public function store(Request $request)
    {
        $comment = Comment::create([
            'title' => $request->title,
            'detail' => $request->detail,
            'company_id' => $request->company_id,
            'item_id' => $request->item_id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('comment.index');
    }

}
