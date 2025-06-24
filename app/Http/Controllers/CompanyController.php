<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\Item;
use App\Models\Status;
use App\Models\Comment;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
     

        if (isset($request->searchword)) {
            $searchword = $request->searchword;
            $companies = Company::
            orderBy('created_at', 'desc') //新しい順に表示
            ->Search($searchword)
            ->paginate(15);
            }

        else {
            $companies = Company::paginate(15);
        }

        return view('company.index', [
            'companies' => $companies,
            'searchword' => $request->searchword,
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
    public function show(Request $request , Company $company, Comment $comment)
    {
        if (isset($request->pullStatus)) {
            $pullStatus = $request->pullStatus;
            $selectItems = $company->items()->wherePivot('status_id', $pullStatus )->get();

            $items=Item::all();
            $statuses=Status::all();
            $comments=Comment::all();


        } else {
            $items=Item::all();
            $statuses=Status::all();
            $comments=Comment::all();
            $selectItems=Item::all();

        }
           
          
        return view('company.show',  
        [
        'items' => $items, 
        'comments' => $comments,
        'comment' => $comment,
        'statuses' => $statuses,
        'selectItems' => $selectItems,
        'pullStatus' => $request->pullStatus,
        ],
         compact('company'));
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


    public function statusFilter(Request $request) {
        $statusesSittyu = Status::SittyuFilter($request->stateName)->get();
        return view('company.show', ['statusesSittyu'=>$statusesSittyu]);
     }

  
}
