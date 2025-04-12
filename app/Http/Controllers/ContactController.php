<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $companies = Company::all();
        $query = Contact::query();
        if($request->take){
           $query->take(3);
        }
        if($request->skip){
            $query->take(3)->skip($request->skip);
        }
        if($request->search_query){
            $query->where('first_name', 'like', '%' . $request->search_query . '%')
            ->orWhere('last_name', 'like', '%' . $request->search_query . '%');
        }
        if($request->company_filter){
            $query->where('company_id', $request->company_filter);
        }
            $contacts =$query->get();
        
        return view('contact_app.contacts.contacts',['contacts'=>$contacts,'companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();

        return view('contact_app.contacts.contacts_form',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /**
     * Avec create et save.
     */

        // $contact = new Contact;
        // $contact->first_name = $request->first_name;
        // $contact->last_name = $request->last_name;
        // $contact->phone = $request->phone;
        // $contact->email = $request->email;
        // $contact->address = $request->address;
        // $contact->company_id = $request->company_id;
        // $contact->save();

        $contact = Contact::firstOrCreate([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address,
        'company_id' => $request->company_id,
        ]);
        return redirect()->route('contacts.index');
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
        $contact = Contact::with('company')->find($id);
        $companies = Company::all();
        return view('contact_app.contacts.edit_contacts_form',['contact'=>$contact,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         /**
     * Avec update et save.
     */

        $contact = Contact::find($id);
        // $contact->first_name = $request->first_name;
        // $contact->last_name = $request->last_name;
        // $contact->phone = $request->phone;
        // $contact->email = $request->email;
        // $contact->address = $request->address;
        // $contact->company_id = $request->company_id;
        // $contact->save();

        $contacts = $contact->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'company_id' => $request->company_id,
            ]);
            return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('contacts.index');
    }

    public function trashed(){
        $contacts = Contact::onlyTrashed()->get();
        return view('contact_app.contacts.trashed_contacts',['contacts'=>$contacts]);
    }

    public function destroyTrashed($id){
        $trashed_contact = Contact::onlyTrashed()->find($id);
        $trashed_contact->forceDelete();
        return redirect()->route('trashed');
    }

    public function restoreTrashed($id){
        $trashed_contact = Contact::onlyTrashed()->find($id);
        $trashed_contact->restore();
        return redirect()->route('trashed');
    }
}
