<?php

namespace App\Http\Controllers;

use App\Models\Beverage;
use Illuminate\Http\Request;

class BeverageController extends Controller
{

    public function index()
    {
        $beverages = Beverage::all();

        return view('beverages.index', compact('beverages'));
    }

    public function create()
    {
        return view('beverages.create');
    }

    public function store(Request $request)
    {
        //
    }

##
    public function show(Beverage $beverage)
    {
        return view('beverages.show', compact('beverage'));
    }

    public function edit(Beverage $beverage)
    {
        //
    }

    public function update(Request $request, Beverage $beverage)
    {
        return view('beverages.index', compact('beverage'));
    }

    public function destroy(Beverage $beverage)
    {
        //
    }
}
