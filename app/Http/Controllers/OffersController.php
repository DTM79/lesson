<?php
namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    public function offers()
    {
        $offers = Offer::orderBy('id', 'DESC')->paginate(12);
        return view('offer/offers', compact('offers'));
    }
    public function add()
    {
        return view('offer/offers-add');
    }
    public function submit(OfferRequest $request)
    {
        $offer = new Offer();
        $offer->title = $request->input('title');
        $offer->description = $request->input('description');
        $offer->user_id = Auth::user()->id;
        $offer->price = $request->input('price');
        $offer->save();
        if($request->hasFile('images')) {
            $files = $request->file('images');
            $offerFileNames = '';
            $path = 'public/offerImg/' . $offer->id;
            if(!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(storage_path("app/$path"), $name);
                $offerFileNames .= $name.',';
            }
            $offer->image = $offerFileNames;
            $offer->save();
        }
        return redirect()->route('offers');
    }
    public function edit(Offer $offer)
    {
        return view ('offer/offers-edit', compact('offer'));
    }
    public function submitedit(OfferRequest $request, Offer $offer)
    {
        $offer->title = $request->input('title');
        $offer->price = $request->input('price');
        $offer->description = $request->input('description');
        $offer->save();
        if($request->hasFile('images')) {
            $files = $request->file('images');
            $offerFileNames = '';
            $path = 'public/offerImg/' . $offer->id;
            if(!Storage::exists($path)) {
                Storage::makeDirectory($path);
            }
            else{
                Storage::deleteDirectory($path);
                Storage::makeDirectory($path);
            }
            foreach ($files as $file) {
                $name = $file->getClientOriginalName();
                $file->move(storage_path("app/$path"), $name);
                $offerFileNames .= $name.',';
            }
            $offer->image = $offerFileNames;
            $offer->save();
        }
        return redirect()->route('offers');
    }
    public function remove(Offer $offer)
    {
        $path = 'public/offerImg/' . $offer->id;
        if(Storage::exists($path)){
            Storage::deleteDirectory($path);
        }
        $offer->delete();
        return redirect ()->route ('offers');
    }
    public function view(Offer $offer)
    {
        return view('offer/offer', compact('offer'));
    }
    public function search(Request $request)
    {
        $search = true;
        $offers = Offer::where('title', 'like', '%'.$request->input('search').'%')->get();
        return view('offer/offers', compact('offers', 'search'));
    }
}
