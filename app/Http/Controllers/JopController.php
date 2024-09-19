<?php

namespace App\Http\Controllers;

use App\Models\Jop;
use App\Http\Requests\StoreJopRequest;
use App\Http\Requests\UpdateJopRequest;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Validation\Rule;

class JopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jops = Jop::latest()->with(['employer', 'tags'])->get()->groupBy('featured');

        return view('jops.index', [

            'featuredJops' => $jops[0],
            'jops' => $jops[1],
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request -> validate([
            'title' => ['required'],
            'salary' => ['required'],
            'location' => ['required'],
            'schedule' => ['required', Rule::in(['Part Time', 'Full Time'])],
            'url' => ['required', 'active_url'],
            'tags' => ['nullable'],
        ]);

        $attributes['featured'] = $request->has('featured');



        $jop= FacadesAuth::user() ->employer->jops()->create(Arr::except($attributes, 'tags'));

        if ($attributes['tags'] ?? false) {
            foreach (explode(',', $attributes['tags']) as $tag) {
                $jop->tag($tag);
            }
        }

        return redirect('/');



    }

    /**
     * Display the specified resource.
     */
    public function show(Jop $jop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jop $jop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJopRequest $request, Jop $jop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jop $jop)
    {
        //
    }
}
