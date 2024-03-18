<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Range;
use App\Models\Unit;
use App\Models\Legal;
use Illuminate\Support\Facades\Hash;

class LegalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function legal_list(){
        $stats=Legal::where('user_id', \Auth::user()->id)->orderBy('id','DESC')->get();
        return view('legal.legal_list',compact('stats'));
    }
    public function add_legal(){
        // $ranges=Range::all();
        return view('legal.add_legal');
    }

    public function create_legal(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'tilte_mr' => ['required', 'string', 'max:255'],
                'link' => ['required', 'string'],
                'file' => 'required|mimes:pdf,jpg,png|max:2048',
                'year' => ['required', 'string'],
            ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $stat=Legal::create([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'link'=>$request->link,
            'file'=>$filePath,
            'year'=>$request->year,
            'user_id'=>\Auth::user()->id,
        ]);
        return redirect()->back()->with('message','Legal Created Succesfully.');
    }

    public function edit_legal($id){
        $stat=Legal::where('id',$id)->first();
        // $ranges=Range::all();
        // $unit=Unit::where('range',$stat->range)->get();
        return view('legal.edit_legal', compact('stat'));
    }

    public function update_legal(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'tilte_mr' => ['required', 'string', 'max:255'],
            'link' => ['required', 'string'],
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
            'year' => ['required', 'string'],
        ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');
        
        $range=Legal::where('id',$request->legal_id)->update([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'link'=>$request->link,
            'file'=>$filePath,
            'year'=>$request->year,
            ]);
        
        return redirect()->back()->with('message','Legal Updated Succesfully.');
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
    public function destroy_legal($id){
        $stat=Legal::where('id',$id)->first();
        $stat->delete();

        return redirect()->back()->with('message','Legal Deleted Succesfully.');
    }
}
