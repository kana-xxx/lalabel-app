<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Person;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        

        if (isset($request->keyword)) {
            $companies = Company::
                where('name', "LIKE", "%$request->keyword%")->get();

                if ($companies->isEmpty()) {
                    redirect('company.index')->with('message', '検索結果はなし');
                    $request->keyword = $request->input('');
                }
            }

        else {
            $companies = Company::get();
        }

        return view('company.index', [
            'companies' => $companies,
            'keyword' => $request->keyword
        ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->note = $request->note;

        $company->save();
        return redirect()->route('company.index')->with('message', '新規企業を登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('company.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $company->name = $request->name;
        $company->address = $request->address;
        $company->phone = $request->phone;
        $company->note = $request->note;

        $company->save();

        return redirect()->route('company.show', $company)->with('message', '企業を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index', $company)->with('message', '企業を削除しました');
    }



    public function register(Request $request , Company $company)
    {
        $company->id = $request->input('company_id');
        return view('person.create', compact('company'));
    }

}
