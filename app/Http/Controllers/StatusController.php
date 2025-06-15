<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;


class StatusController extends Controller
{


    public function index()
    {
        $statuses = Status::all();
        return view('status.index', compact('statuses'));
    }


    public function create()
    {
        return view('status.create');
    }


    public function store(Request $request)
    {
        $status = Status::create([
            'name' => $request->name,
        ]);

        return redirect()->route('status.index');
    }


    public function show(Status $status)
    {
        return view('status.show', compact('status'));
    }



    public function edit(Status $status)
    {
        return view('status.edit', compact('status'));
    }


    public function update(Request $request, Status $status)
    {
        $status->name = $request->name;
        $status->save();

        return redirect()->route('status.index', $status)->with('message', 'ステータスを更新しました');
    }
}
