<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Status;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));

    }

    
    public function update(Request $request, Company $company, Status $status ) {
        $item_id=request()->input('item');
        $state_id = $request->state_id;
        $company->items()->updateExistingPivot($item_id, ['status_id' => $state_id]);
        return back();
    }



    public function attach(Request $request, Company $company, Status $status ) {
        $item_id = $request->item_id;
        $company_id = $request->company_id;
        $company = Company::find($company_id);

        $state_id = $request->state_id;
       

        $company->items()->attach($item_id, ['status_id' => $state_id]);
        return back();
    }



    public function detach(Request $request, Company $company) {
        $item_id=request()->input('item');
        $company->items()->detach($item_id);
        return back();
    }




}
