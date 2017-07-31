<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Coordinate;

class CoordinatesController extends Controller
{

    public function index()
    {
        $coordinates = Coordinate::where('user_id', Auth::user()->id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return $coordinates;
    }


    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $coordinate = Coordinate::create($request->all() + ['user_id' => $user_id]);

        return $coordinate;
    }


    public function show($id)
    {
        $coordinate = Coordinate::find($id);

        if(count($coordinate) > 0)
            return response()->json($coordinate);

        return response()->json(['error' => 'Coordinate not found'], 404);
    }


    public function update(Request $request, $id)
    {
        $coordinate = Coordinate::find($id);

        if(count($coordinate) > 0) {
            $coordinate->update($request->all());
            return response()->json($request);
        }

        return response()->json(['error' => 'Coordinate not found'], 404);
    }

    public function destroy($id)
    {
        try {
            Coordinate::destroy($id);
            return response([], 204);

        } catch (\Exception $e) {
            return response(['Probleme deleting coordinates'], 500);
        }
    }



}
