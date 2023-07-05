<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

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
    
}
