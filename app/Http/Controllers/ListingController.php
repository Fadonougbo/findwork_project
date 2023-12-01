<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingFormRequest;
use App\Models\Listing;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request) {

        $tagQuery=$request->query('tag');

        $listings=Listing::filterByTagName($tagQuery)->paginate(5)->withQueryString();
        
        return view('laragigs.home',[
            'listings'=>$listings
        ]);
        
    }

    public function show(string $slug,Listing $listing) {

        $trueSlug=$listing->slug;
 /* 
        if($slug!==$trueSlug) {
          return redirect()->route('listings.show',['slug'=>$trueSlug,'listing'=>$listing->id]);
        }  */

        return view('laragigs.show',[
            'listing'=>$listing
        ]);
    }

    public function create() {
        
        return view('laragigs.create');
    }

    public function store(ListingFormRequest $request) {
        $data=$request->validated();
        $element=Listing::create($data);

        return redirect()->route('listings.show',['slug'=>$element->slug,'listing'=>$element->id]);
    }
}
