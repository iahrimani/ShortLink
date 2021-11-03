<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\link;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shortenLink', [
            'shortLinks' => Link::latest()->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|url'
        ]);

        Link::create([
            'link' => $request->link,
            'code' => rand(10,99) . str_random(4)
        ]);

        return redirect()->route('generate.shorten.link');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function shortenLink($code)
    {
        $find = Link::where('code', $code)->first();
        $find->count++;
        $find->save();

        return redirect($find->link);

    }
}
