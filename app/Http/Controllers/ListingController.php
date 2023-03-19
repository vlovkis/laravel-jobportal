<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ListingController extends Controller
{
    //show all listings
   public function index() {
    
    return view('listings.index', [
        'listings' => Listing::latest()->filter(request(['tag', 'search']))->paginate(10)
    ]);

   }

   public function sort(Request $request)
{
    $sort = $request->input('sort', 'created_at');
    $order = $request->input('order', 'asc');
    $listings = Listing::orderBy($sort, $order)->paginate(10);

    return view('listings.index', compact('listings', 'sort', 'order'));
}

   //show single listing
   public function show(Listing $listing){
    return view('listings.show', [
        'listing' => $listing
    ]);
}

   //Show create form
   public function create(){
    return view('listings.create');
   }
   
   //Store listings data
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

    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    $formFields['user_id'] = auth()->id(); 

    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing Created');
   }

   public function edit(Listing $listing){
    return view('listings.edit', ['listing' => $listing]);
   }

      //update listings data
      public function update(Request $request, Listing $listing){

        //Make sure user is owner
        if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized action');
        }

        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
    
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        $listing->update($formFields);

        return back()->with('message', 'Listing updated successfully!');
       }

       //Delete listing
       public function destroy(Listing $listing){
         //Make sure user is owner
         if($listing->user_id != auth()->id()){
            abort(403, 'Unauthorized action');
        }

        if($listing->logo && Storage::disk('public')->exists($listing->logo)) {
            Storage::disk('public')->delete($listing->logo);
        }

        $listing->delete();
        return redirect('/')->with('message','Listing deleted successfully!');
       }

       //Manage Listings
       public function manage(){
        return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
       }
}
