<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CitasCliente;

class CitasClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $citascliente = CitasCliente::all();
        return response()->json($citascliente, 200);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'Nombre' => 'required|string',
            'Apellido' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Modelo' => 'required|string',
            'Marca' => 'required|string',
            'Anio' => 'required|string',
            'Placas' => 'required|string',
            'FechaCita' => 'required|date_format:d-m-Y',
        ]);
    
        // Convert FechaCita to Y-m-d format for storage
        $validation['FechaCita'] = \Carbon\Carbon::createFromFormat('d-m-Y', $validation['FechaCita'])->format('Y-m-d');
    
        $citascliente = CitasCliente::create($validation);
    
        return response()->json($citascliente, 201);
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $citacliente = CitasCliente::find($id);
        return response()->json($citacliente, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validation = $request->validate([ //'Nombre', 'Apellido', 'Telefono', 'Email', 'Modelo', 'Marca', 'Año', 'Placas', 'FechaCita'
            'Nombre' => 'required|string',
            'Apellido' => 'required|string',
            'Telefono' => 'required|string',
            'Email' => 'required|email',
            'Modelo' => 'required|string',
            'Marca' => 'required|string',
            'Anio' => 'required|string',
            'Placas' => 'required|string',
            'FechaCita' => 'required|date_format:d-m-Y',
        ]);
    
        $validation['FechaCita'] = \Carbon\Carbon::createFromFormat('d-m-Y', $validation['FechaCita'])->format('Y-m-d');
        $citacliente = CitasCliente::find($id);
        $citacliente->update($validation);
        return response()->json($citacliente, 203);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $citacliente = CitasCliente::find($id);
        $citacliente->delete();
        return response()->json(null, 204);
    }
}
