<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use App\Models\Company;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('item.index', compact('items'));
    }





    public function attach(Request $request, Company $company) {
        // $itemId = request()->input('item');
        $item_id = $request->item_id;
        $company_id = $request->company_id;
        $company = Company::find($company_id);
       

        $company->items()->attach($item_id);
        return back();
    }



    public function detach(Request $request, Company $company) {
        // $item_id=$request->item_id;
        // $company_id = $request->company_id;
        // $company=Company::find($item_id);

        // $company->items()->detach($item_id);
        // return back();

        $item_id=request()->input('item');
        $company->items()->detach($item_id);
        return back();
    }

}
