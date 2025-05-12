<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use App\Models\Company;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all();
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Company $company)
    {
        return view('person.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $person = Person::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'position' => $request->position,
            'phone' => $request->phone,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('person.index')->with('message', '新規担当者を登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('person.show', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Person $person)
    {
        $person->name = $request->name;
        $person->department = $request->department;
        $person->position = $request->position;
        $person->email = $request->email;
        $person->company_id = $request->company_id;
        $person->phone = $request->phone;

        $person->save();

        return redirect()->route('person.show', $person)->with('message', '担当者を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('person.index', $person)->with('message', '担当者を削除しました');
    }

   
}
