<?php

namespace App\Http\Controllers;

use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::all();
        return response()->json($parts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function show(Part $part)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function edit(Part $part)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Part  $part
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Part $part)
    {
        $validatedData = $request->validate([
            'number' => 'sometimes|required|string|max:255|unique:parts,number,' . $part->id,
            'price' => 'sometimes|required|numeric|min:0',
            'description' => 'nullable|string|max:255',
            'supplier_id' => 'sometimes|nullable|exists:suppliers,id',
            'category_id' => 'sometimes|nullable|exists:categories,id',
        ]);
    
        $part->update($validatedData);
    
        return response()->json([
            'message' => 'Part updated successfully.',
            'part' => $part
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $part = Part::find($id);

        if (!$part) {
            return response()->json([
                'message' => "Part with ID $id not found."
            ], 404);
        }

        $part->delete();

        return response()->json([
            'message' => "Part was deleted successfully.",
            'part' => $part,
        ], 200);
    }

    /**
     * Get all parts by supplier ID.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAllPartsBySupplierId($id)
    {
        $parts = Part::where('supplier_id', $id)->get();

        // Proverava da li postoje delovi za tog dobavljača
        if ($parts->isEmpty()) {
            return response()->json(['message' => 'No parts found for this supplier'], 404);
        }

        return response()->json($parts, 200);
    }
}
