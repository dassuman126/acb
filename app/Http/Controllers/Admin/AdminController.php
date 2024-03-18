<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Range;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function user_list(){
        $user=User::orderBy('id','DESC')->get();
        return view('user.user_list',compact('user'));
    }
    public function add_user(){
        return view('user.add_user');
    }
    public function edit_user($id){
        $user=User::where('id',$id)->first();
        // dd($user);
        return view('user.edit_user',compact('user'));
    }
    public function update_user(Request $request){
        $data = $request->all();
        $user=User::where('id',$request->user_id)->first();
        $validator = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role_id' => ['required'],
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role_id=$request->role_id;
        $user->save();
    return redirect()->back()->with('message','User Updated Succesfully.');
    }
    public function create_user(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ]);
        $user=User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id'=>$request->role_id,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->back()->with('message','User Created Succesfully.');
    }
    public function add_range(){
        return view('range.add_range');
    }
    public function create_range(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'tilte_mr' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string'],
                'address_mr' => ['required', 'string'],
                'phone1' => ['required', 'string','max:15'],
                'fax' => ['required', 'string','max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            ]);
        $user=Range::create([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'address' => $request->address,
            'address_mr' => $request->address_mr,
            'address_hi' => $request->address_hi,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'fax' => $request->fax,
            'email'=>$request->email,
            'user_id'=>\Auth::user()->id,
        ]);
        return redirect()->back()->with('message','Range Created Succesfully.');
    }
    public function update_range(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'tilte_mr' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'address_mr' => ['required', 'string'],
            'phone1' => ['required', 'string','max:15'],
            'fax' => ['required', 'string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $range=Range::where('id',$request->range_id)->update([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'address' => $request->address,
            'address_mr' => $request->address_mr,
            'address_hi' => $request->address_hi,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'fax' => $request->fax,
            'email'=>$request->email,
            ]);
        
        return redirect()->back()->with('message','Range Updated Succesfully.');
    }
    public function add_unit(){
        $range=Range::all();
        return view('unit.add_unit',compact('range'));
    }
    public function create_unit(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
                'title' => ['required', 'string', 'max:255'],
                'tilte_mr' => ['required', 'string', 'max:255'],
                'address' => ['required', 'string'],
                'address_mr' => ['required', 'string'],
                'phone1' => ['required', 'string','max:15'],
                'fax' => ['required', 'string','max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'range' => ['required', 'string'],
            ]);
        $user=Unit::create([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'address' => $request->address,
            'address_mr' => $request->address_mr,
            'address_hi' => $request->address_hi,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'fax' => $request->fax,
            'email'=>$request->email,
            'range'=>$request->range,
            'user_id'=>\Auth::user()->id,
        ]);
        return redirect()->back()->with('message','Unit Created Succesfully.');
    }
    public function edit_unit($id){
        $range=Range::all();
        $unit=Unit::where('id',$id)->first();
        return view('unit.edit_unit', compact('range','unit'));
    }
    public function update_unit(Request $request){
        $data = $request->all();
        $validator = Validator::make($data, [
            'title' => ['required', 'string', 'max:255'],
            'tilte_mr' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string'],
            'range' => ['required', 'string'],
            'address_mr' => ['required', 'string'],
            'phone1' => ['required', 'string','max:15'],
            'fax' => ['required', 'string','max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $range=Unit::where('id',$request->unit_id)->update([
            'title' => $request->title,
            'title_mr' => $request->title_mr,
            'title_hi' => $request->title_hi,
            'address' => $request->address,
            'address_mr' => $request->address_mr,
            'address_hi' => $request->address_hi,
            'phone1' => $request->phone1,
            'phone2' => $request->phone2,
            'fax' => $request->fax,
            'email'=>$request->email,
            'range'=>$request->range,
            ]);
        
        return redirect()->back()->with('message','Unit Updated Succesfully.');
    }
    public function edit_range($id){
        $range=Range::where('id',$id)->first();
        return view('range.edit_range', compact('range'));
    }
    public function range_list(){
        $range=Range::orderBy('id','DESC')->get();
        return view('range.list',compact('range'));
    }
    public function unit_list(){
        $unit=Unit::orderBy('id','DESC')->get();
        return view('unit.list',compact('unit'));
    }
    public function destroy_user($id){
        $user=User::where('id',$id)->first();
        $user->delete();

        return redirect()->back()->with('message','User Deleted Succesfully.');
    }
    public function destroy_range($id){
        $user=Range::where('id',$id)->first();
        $user->delete();

        return redirect()->back()->with('message','Range Deleted Succesfully.');
    }
    public function destroy_unit($id){
        $user=Unit::where('id',$id)->first();
        $user->delete();

        return redirect()->back()->with('message','Unit Deleted Succesfully.');
    }
    
}
