<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request) {

        $tagQuery=$request->query('tag');

        $listings=Listing::tagname($tagQuery)->paginate(5)->withQueryString();

        return view('laragigs.home',[
            'listings'=>$listings
        ]);
        
    }

    public function show(string $slug,Listing $listing) {

        $trueSlug=$listing->slug;
/* 
        if($slug!==$trueSlug) {

          return redirect()->route('listings.show',['slug'=>$trueSlug,'listing'=>$listing->id]);
        } */

        return view('laragigs.show',[
            'listing'=>$listing
        ]);
    }
}
