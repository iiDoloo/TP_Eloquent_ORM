<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Company::query();
        if($request->take){
           $query->take(3);
        }
        if($request->skip){
            $query->take(3)->skip($request->skip);
        }
        if($request->search_query){
            $query->where('name', 'like', '%' . $request->search_query . '%');
        }
        if($request->company_filter){
            $query->where('company_id', $request->company_filter);
        }
            $company =$query->get();

        return view('contact_app.company.company',['companies'=>$company]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact_app.company.company_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $company = Company::firstOrCreate([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'website' => $request->website,
            ]);
            return redirect()->route('companies.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $company = Company::find($id);
        return view('contact_app.company.edit_company_form',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $company = Company::find($id);
        $company = $company->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'website' => $request->website,
            ]);
            return redirect()->route('companies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::find($id);
        $company->delete();
        return redirect()->route('companies.index');
    }

    public function trashed(){
        $companies = Company::onlyTrashed()->get();
        return view('contact_app.company.trashed_company',['companies'=>$companies]);
    }

    public function destroyTrashed($id){
        $trashed_company = Company::onlyTrashed()->find($id);
        $trashed_company->forceDelete();
        return redirect()->route('trashed_companies');
    }

    public function restoreTrashed($id){
        $trashed_company = Company::onlyTrashed()->find($id);
        $trashed_company->restore();
        return redirect()->route('trashed_companies');
    }
}
