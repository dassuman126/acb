<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Range;
use App\Models\Unit;
use App\Models\Fir;
use Illuminate\Support\Facades\Hash;

class FirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function fir_list(){
        $firs=Fir::where('user_id', \Auth::user()->id)->orderBy('id','DESC')->get();
        return view('fir.fir_list',compact('firs'));
    }
    public function add_fir(){
        $ranges=Range::all();
        return view('fir.add_fir',compact('ranges'));
    }

    public function create_fir(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'tilte_mr' => ['required', 'string', 'max:255'],
                'range' => ['required', 'string'],
                'unit' => ['required', 'string'],
                'file' => 'required|mimes:pdf,jpg,png|max:2048',
                'date' => ['required', 'string'],
            ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $fir=Fir::create([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'range'=>$request->range,
            'unit'=>$request->unit,
            'date'=>$request->date,
            'file'=>$filePath,
            'user_id'=>\Auth::user()->id,
        ]);
        return redirect()->back()->with('message','FIR Created Succesfully.');
    }

    public function edit_fir($id){
        $fir=Fir::where('id',$id)->first();
        $ranges=Range::all();
        $unit=Unit::where('range',$fir->range)->get();
        return view('fir.edit_fir', compact('ranges','unit', 'fir'));
    }

    public function update_fir(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'tilte_mr' => ['required', 'string', 'max:255'],
            'range' => ['required', 'string'],
            'unit' => ['required', 'string'],
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
            'date' => ['required', 'string'],
        ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $range=Fir::where('id',$request->fir_id)->update([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'range'=>$request->range,
            'unit'=>$request->unit,
            'file'=>$filePath,
            'date'=>$request->date,
            ]);
        
        return redirect()->back()->with('message','FIR Updated Succesfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy_fir($id){
        $fir=Fir::where('id',$id)->first();
        $fir->delete();

        return redirect()->back()->with('message','FIR Deleted Succesfully.');
    }
}
