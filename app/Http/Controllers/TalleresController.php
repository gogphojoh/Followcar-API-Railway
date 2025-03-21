<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talleres;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class TalleresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $talleres = Talleres::all();
        return response()->json($talleres, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'Nombre' => 'required|string|unique:Talleres,Nombre',
            'Latitud' => 'required|string', 
            'Longitud' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Horario' => 'required|string', 
            'Rescate' => 'nullable|string',
            'Logo' => 'nullable|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        // Subir la imagen si se adjunta un archivo
        if ($request->hasFile('Logo')) {
            Configuration::instance(getenv('CLOUDINARY_URL'));
            $uploadedImage = (new UploadApi())->upload($request->file('Logo')->getRealPath());
            $validated['Logo'] = $uploadedImage['secure_url'];
        } else {
            $validated['Logo'] = null;
        }
    
        $taller = Talleres::create($validated);
        return response()->json($taller, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $taller = Talleres::where('Nombre', $id)->first();
        return response()->json($taller, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'Nombre' => 'required|string',
            'Latitud' => 'required|string', 
            'Longitud' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Horario' => 'required|string',
            'Rescate' => 'nullable|string',
            'Logo' => 'nullable|file|mimes:jpeg,png,jpg,gif',
        ]);
     
        $taller = Talleres::where('Nombre', $id)->first();
     
        // Si hay una nueva imagen, subirla a Cloudinary
        if ($request->hasFile('Logo')) {
            Configuration::instance(getenv('CLOUDINARY_URL'));
            $uploadedImage = (new UploadApi())->upload($request->file('Logo')->getRealPath());
            $validated['Logo'] = $uploadedImage['secure_url'];
        }
        else {
            $validated['Logo'] = $taller->Logo;
        }
     
        $taller->update($validated);
        return response()->json($taller, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $taller = Talleres::where('Nombre', $id)->first();
        $taller->delete();
        return response()->json(null, 204);
    }
}
