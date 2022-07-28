<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validator = $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'password'       => ['required','min:6','max:6'],
            'phone_number'   => ['required','unique:users'],
            'address'        => ['required','string'],
            'role'           => ['required'],
            'active_status'  => ['required','boolean'],
            'nrc'            => ['string','unique:users'],
        ]);
        if($validator){
            $user                = new User;
            $user->name          = $request->name;
            $user->phone_number  = $request->phone_number;
            $user->password      = $request->password;
            $user->address       = $request->address;
            $user->active_status = $request->active_status;
            $user->nrc           = $request->nrc;
            if(isset($request->code)){
                $user->code = $request->code;
            }else{
                $user->code = null;
            }
            $user->save();
            if($request->role=="1"){
                $user->assignRole('admin');
            }else if ($request->role=="2"){
                $user->assignRole('supervisor');
            }else if ($request->role=="3"){
                $user->assignRole('staff');
            }else if ($request->role=="4"){
                $user->assignRole('agent');
            }else if ($request->role=="5"){
                $user->assignRole('office_staff');
            }   
            return redirect()->route('users.index')->with("successMsg",'New User is ADDED in your data');
        }
        else
        {
            return redirect::back()->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $validator = $request->validate([
            'name'           => ['required', 'string', 'max:255'],
            'password'       => ['required','min:6','max:6'],
            'phone_number'   => ['required'],
            'address'        => ['required','string'],
            'role'           => ['required'],
            'active_status'  => ['required','boolean'],
            'nrc'            => ['string'],
        ]);
        if($validator){
            $user                = User::find($id);
            $user->name          = $request->name;
            $user->phone_number  = $request->phone_number;
            $user->password      = $request->password;
            $user->address       = $request->address;
            $user->active_status = $request->active_status;
            $user->nrc           = $request->nrc;
            if(isset($request->code)){
                $user->code = $request->code;
            }else{
                $user->code = null;
            }
            $user->save();
            DB::table('model_has_roles')->where('model_id',$user->id)->delete();
            if($request->role=="1"){
                $user->assignRole('admin');
            }else if ($request->role=="2"){
                $user->assignRole('supervisor');
            }else if ($request->role=="3"){
                $user->assignRole('staff');
            }else if ($request->role=="4"){
                $user->assignRole('agent');
            }else if ($request->role=="5"){
                $user->assignRole('office_staff');
            }   
            return redirect()->route('users.index')->with("successMsg",'New User is ADDED in your data');
        }
        else
        {
            return redirect::back()->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        DB::table('model_has_roles')->where('model_id',$user->id)->delete();
        $user->delete();
        return redirect()->route('users.index')->with('successMsg','Existing User is DELETED in your data');
    }

    public function changeStatus(Request $request){
        $user=User::find($request->user_id);
        if($user->active_status==0){
            $user->active_status=1;
        }else{
            $user->active_status=0;
        }
        $user->save();
        return response()->json([
            'success'       => 'change status successfully',
            'active_status' => $user->active_status,
            'user_id'       => $user->id,
        ]);
    }

    public function activeUser(Request $request){
        $users = User::select('users.*','roles.name as role_name')
                 ->where('users.active_status',1)
                 ->join('model_has_roles', 'users.id', '=', 'model_has_roles.model_id')
                 ->join('roles', 'roles.id', '=', 'model_has_roles.role_id')
                 ->get();
        return Datatables::of($users)->addIndexColumn()->toJson();
    }
}