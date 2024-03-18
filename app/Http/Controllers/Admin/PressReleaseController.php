<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Range;
use App\Models\Unit;
use App\Models\PressReleaseType;
use App\Models\PressRelease;
use Illuminate\Support\Facades\Hash;

class PressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function pr_list(){
        $prs=PressRelease::where('user_id', \Auth::user()->id)->orderBy('id','DESC')->get();
        return view('press_release.pressRelease_list',compact('prs'));
    }
    public function add_pr(){
        $ranges=Range::all();
        $pr_type=PressReleaseType::all();
        return view('press_release.add_pressRelease',compact('ranges', 'pr_type'));
    }

    public function create_pr(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'tilte_mr' => ['required', 'string', 'max:255'],
                'type' => ['required', 'string'],
                'range' => ['required', 'string'],
                'unit' => ['required', 'string'],
                'file' => 'required|mimes:pdf,jpg,png|max:2048',
                'date' => ['required', 'string'],
            ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $pr=PressRelease::create([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'type' => $request->type,
            'range'=>$request->range,
            'unit'=>$request->unit,
            'file'=>$filePath,
            'date'=>$request->date,
            'user_id'=>\Auth::user()->id,
        ]);
        return redirect()->back()->with('message','Press Release Created Succesfully.');
    }

    public function edit_pr($id){
        $pr=PressRelease::where('id',$id)->first();
        $pr_type=PressReleaseType::all();
        $ranges=Range::all();
        $unit=Unit::where('range',$pr->range)->get();
        return view('press_release.edit_pressRelease', compact('pr_type', 'ranges','unit', 'pr'));
    }

    public function update_pr(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'tilte_mr' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'range' => ['required', 'string'],
            'unit' => ['required', 'string'],
            'file' => 'required|mimes:pdf,jpg,png|max:2048',
            'date' => ['required', 'string'],
        ]);

        // Store the file in storage\app\public folder
        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $filePath = $file->store('uploads', 'public');

        $range=PressRelease::where('id',$request->pr_id)->update([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'type' => $request->type,
            'range'=>$request->range,
            'unit'=>$request->unit,
            'file'=>$filePath,
            'date'=>$request->date,
            ]);
        
        return redirect()->back()->with('message','Unit Updated Succesfully.');
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
    public function destroy_pr($id){
        $pr=PressRelease::where('id',$id)->first();
        $pr->delete();

        return redirect()->back()->with('message','Press Release Deleted Succesfully.');
    }
}
