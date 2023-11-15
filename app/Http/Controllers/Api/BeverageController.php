<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\BeverageRequest;
use App\Http\Resources\BeverageResource;
use App\Models\Beverage;

class BeverageController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Beverage::class);

        return BeverageResource::collection(Beverage::all());
    }

    public function store(BeverageRequest $request)
    {
        $this->authorize('create', Beverage::class);

        return new BeverageResource(Beverage::create($request->validated()));
    }

    public function show(Beverage $beverage)
    {
        $this->authorize('view', $beverage);

        return new BeverageResource($beverage);
    }

    public function update(BeverageRequest $request, Beverage $beverage)
    {
        $this->authorize('update', $beverage);

        $beverage->update($request->validated());

        return new BeverageResource($beverage);
    }

    public function destroy(Beverage $beverage)
    {
        $this->authorize('delete', $beverage);

        $beverage->delete();

        return response()->json();
    }
}
