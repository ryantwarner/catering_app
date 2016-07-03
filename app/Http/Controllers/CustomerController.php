<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Customer;

class CustomerController extends Controller
{
    public function store() {
        $customer = new Customer(Input::all());
        return response()->json($customer->save());
    }
    
    public function index() {
        return response()->json(Customer::all());
    }
    
    public function create() {
        return response()->json(new Customer());
    }
    
    public function destroy($id) {
        return response()->json(Customer::findOrFail($id)->delete());
    }
    
    public function update($id) {
        return response()->json(Customer::findOrFail($id)->update(Input::all()));
    }
    
    public function show($id) {
        return response()->json(Customer::with(['guests', 'guests.contact', 'guests.dietary_restrictions', 'contacts'])->findOrFail($id));
    }
    
    public function edit($id) {
        return response()->json(Customer::with(['guests','contacts'])->findOrFail($id));
    }
}
