<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Todolist;
use Illuminate\Http\Request;

class TodolistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les utilisateurs
        $todolists = Todolist::all();
    
        // On retourne les informations des utilisateurs en JSON
        return response()->json($todolists);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // La validation de données
        $this->validate($request, [
            'tache' => 'required|max:100',
            'etat' => 'required',
        ]);
    
        // On crée un nouvel utilisateur
        $todolist = Todolist::create([
            'tache' => $request->tache,
            'etat' => $request->etat,
        ]);
    
        // On retourne les informations du nouvel utilisateur en JSON
        return response()->json($todolist, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todolist $todolist)
    {
        // On retourne les informations de l'utilisateur en JSON
        return response()->json($todolist);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todolist $todolist)
    {
        // La validation de données
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
    
        // On modifie les informations de l'utilisateur
        $todolist->update([
            'tache' => $request->tache,
            'etat' => $request->etat,
        ]);
    
        // On retourne la réponse JSON
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todolist $todolist)
    {
        // On supprime l'utilisateur
        $todolist->delete();
    
        // On retourne la réponse JSON
        return response()->json();
    }
}
