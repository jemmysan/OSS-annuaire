<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
        $this->middleware(['auth']);
        //$this->middleware(['auth', 'role_or_permission:admin|create role|create permission']);

    }

    public function index(Request $request)
    {
        $permissions = $this->permission::paginate(10);
        //$permissions= Permission::paginate(8);
        return view("permission.index", ['permissions' => $permissions]);



    }

    public function getAllPermissions(){
        $permissions = $this->permission::all();

        return response()->json([
            'permissions' => $permissions
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("permission.create");
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
            'name' => 'required'
        ]);

        $this->permission->create([
            'name' => $request->name
        ]);

        return redirect()->route('permission.index')->with('success', 'Permission créée');
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
   /* public function getAll(){
        $permissions = $this->permission->all();
        return response()->json([
            'permissions' => $permissions
        ], 200);
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);

        return view('permission.edit', compact('permission'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request  $request,$id)
    {
        $permission = Permission::findOrFail($id);
        $this->validate($request, [
            'name'=>'required',
        ]);
        $input = $request->all();
        $permission->fill($input)->save();

        return redirect()->route('permission.index')
            ->with('flash_message',
                'Permission'. $permission->name.' Mise à jour effectuée!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $id)
    {

        $id->delete();

        return redirect()->route('accompagnement.index')
            ->with('success','Permission supprimée avec succés');

    }
}
