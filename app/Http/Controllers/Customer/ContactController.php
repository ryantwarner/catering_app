<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Customer\Contact;

class ContactController extends Controller
{
    public function store() {
        $contact = new Contact(Input::all());
        return response()->json($contact->save());
    }
    
    public function index() {
        return response()->json(Contact::all());
    }
    
    public function create() {
        return response()->json(new Contact());
    }
    
    public function destroy($id) {
        return response()->json(Contact::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Contact::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Contact::findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Contact::findOrFail($id));
    }
}
