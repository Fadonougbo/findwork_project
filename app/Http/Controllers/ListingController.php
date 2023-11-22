<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index() {

        $listings=Listing::paginate(5);
        return view('laragigs.home',[
            'listings'=>$listings
        ]);
        
    }

    public function show(Listing $listing) {
        return view('laragigs.show',[
            'listing'=>$listing
        ]);
    }
}
