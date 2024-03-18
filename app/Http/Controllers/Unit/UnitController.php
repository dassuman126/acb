<?php

namespace App\Http\Controllers\Unit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unit;

class UnitController extends Controller
{
    public function index(){
        return view('unit.dashboard');
    }

    public function fetchUnits(Request $request){
        try {
            $rangeId = $request->input('range_id');
            
            // Fetch units based on the provided range ID
            $units = Unit::where('range', $rangeId)->get();
    
            // Return units as JSON response
            return response()->json($units);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Error fetching units: ' . $e->getMessage());
            
            // Return an error response
            return response()->json(['error' => 'Failed to fetch units.'], 500);
        }
    }
}