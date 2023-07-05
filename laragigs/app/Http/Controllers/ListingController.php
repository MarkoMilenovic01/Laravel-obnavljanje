<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{

    public function index(){
        return view('listings.index',[
            'listings' => Listing::latest()->filter([request('tag'), request('search')])->paginate(5)
        ]);
    }

    public function show($id){
        return view('listings.show',[
            'listing' => Listing::find($id)
        ]);
    }
    
    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
     
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings', 'company')],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);


        Listing::create($formFields);

        return redirect('/')->with('message', 'Succesfully added item');
    }
}
