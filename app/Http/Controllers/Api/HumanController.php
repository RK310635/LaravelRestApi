<?php

namespace App\Http\Controllers\Api;

use App\Models\Human;
use App\Http\Resources\HumanCollection;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreHumanRequest;
use App\Http\Requests\UpdateHumanRequest;
use App\Http\Resources\HumanResource;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class HumanController extends Controller
{
    public function index()
    {
        $humans = Human::all();
        return response()->json($humans, 200);
    }

    public function store(Request $request)
    {
        $humans = Human::create($request->all());
        return response()->json(["status" => "Created new human"], 200);
    }

    public function show(Human $human)
    {
        return response()->json($human, 200);
    }

    public function update(UpdateHumanRequest $request, Human $human)
    {
        $human->update(["firstName" => $request["firstName"]]);
        $human->update(["lastName" => $request["lastName"]]);
        $human->update(["telephoneNumber" => $request["telephoneNumber"]]);
        $human->update(["country" => $request["country"]]);
        $human->update(["street" => $request["street"]]);
        $human->update(["city" => $request["city"]]);
        return response()->json(["status" => "Human updated"], 200);
    }

    public function destroy(Human $human)
    {
        $human->delete();
        return response(["status" => "Human deleted"], 200);
    }
}
