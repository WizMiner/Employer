<?php

namespace App\Http\Controllers;
use App\Models\Jop;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        $jops = Jop::query()
            ->with(['employer', 'tags'])
            ->where('title', 'LIKE', '%'.request('q').'%')
            ->get();

        return view('results', ['jops' => $jops]);
    }
}