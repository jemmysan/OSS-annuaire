<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Cache;
use Spatie\Permission\Models\Role;
use Hash;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = User::where([
                    ['name','!=', Null],
                    [ function($query) use ($request){
                        if(($nom = $request->nom)){
                            $query->orWhere('name','LIKE','%'.$nom.'%')->get();
                        }

                        }]
                    ])
                        ->orderBy("id","desc")
                        ->paginate(10);

            return view('user.index',compact('data'))
                ->with('i',(request()->input('page',1)-1)*10);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $role = Role::pluck('name','name')->all();
        return view('user.create',compact('role'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')
            ->with('success','User créé avec succés');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('user.show',compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('user.edit',compact('user','roles','userRole'));

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
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
        $input = $request->all();
        if(!empty($input['password'])){
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));
        }
        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('user.index')
            ->with('success','User modifié avec succés');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')
            ->with('success','User supprimé avec succés');

    }

    public function profil(){
        return view("profil.index");
    }
    public function postProfil(Request $request){
        $user=auth()->user();
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email|unique:users,email,'.$user->id,
        ]);
        $user->update($request->all());

        return redirect()->back()->with('success', 'Profil mis à jour avec succés');
    }

    public function getPassword(){
        return view('profil.password');
    }

    public function postPassword(Request  $request){
        $this->validate($request,[
            'newpassword' =>'required|min:6|confirmed',
        ]);
        $user= auth()->user();
        $user->update([
            'password' =>bcrypt($request->newpassword)
        ]);
        return redirect()->back()->with('success', 'Votre mot de passe a été modifié avec  succés');

    }


}
