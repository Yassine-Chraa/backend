<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tache;
use Illuminate\Http\Request;

class TacheController extends Controller
{
    public function index()
    {
        $taches = Tache::all();
        return $taches;
    }

    public function store(Request $request)
    {
        $tache = Tache::create($request->all(['titre', 'description', 'done']));
        return response()->json(["message" => "tache created"], 200);
    }
    public function show($id)
    {
        $tache = Tache::findOrFail($id);
        return response()->json($tache);
    }
    public function update(Request $request, $id)
    {
        $tache = Tache::findOrFail($id);
        $tache->done = $request->get('done');
        $tache->save();
        return response()->json(["message" => "tache updated"]);
    }
    public function destroy($id)
    {
        $tache = Tache::findOrFail($id);
        $tache->delete();
        return response()->json(["message" => "tache deleted"]);
    }
}
