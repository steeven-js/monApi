<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // On récupère tous les images
        $users = Carousel::all();

        // On retourne les informations des images en JSON
        return response()->json($users);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // La validation de données
        $this->validate($request, [
            'image' => 'required|min:8',
        ]);

        // On crée un nouvel utilisateur
        $image = Carousel::create([
            'image' => $request->image,
        ]);

        // On retourne les informations du nouvel image en JSON
        return response()->json($image, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Carousel $image)
    {
        // On retourne les informations de l'image en JSON
        return response()->json($image);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carousel $image)
    {
        // La validation de données
        $this->validate($request, [
            'image' => 'required|min:8',
        ]);
    
        // On modifie les informations de l'image
        $image->update([
            "image" => $request->image,
        ]);
    
        // On retourne la réponse JSON
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carousel $image)
    {
        // On supprime l'image
        $image->delete();
    
        // On retourne la réponse JSON
        return response()->json();
    }
}
