<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct(){
        $this->middleware('permission:user-list|user-create|user-edit|user-delete', ['only' => ['index','show']]);
        $this->middleware('permission:user-create', ['only' => ['create','store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);

     }
    public function index()
    {
        $id = Auth::user()->id;

        $userAll = User::showUser($id);
        return view('pages.tables.showUser',compact('userAll'));
    }
    public function frontUser()
    {
        $frontendUser = User::showFrontUser();

        return view('pages.tables.showUser',compact('frontendUser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role =  Role::all();
        return view('pages.forms.addUser',compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            'adminroles' => 'required',

        ]);
         if(!$validated){
            return redirect()->back()->withErrors($validated);

         }else{
             $id = $request->id;
          $user =   User::updateOrCreate(['id'=>$request->id],[
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'role' => 1,
            ]);
            DB::table('model_has_roles')->where('model_id',$id)->delete();
            $user->assignRole($request->adminroles);

            return redirect()->back()->with('message','Data Inserted Successfully');
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
        $userEdit = User::find($id);
        $allRoles =Role::all();
        $assignRole  = User::datainsert($userEdit->id);
            foreach($assignRole as $roleName){
                $assignRoleId = $roleName->id;
            }



        return view('pages.forms.addUser',compact('userEdit','assignRoleId','allRoles'));

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   $id = $request->id;
        $delete_id = User::find($id);
        $delete_id->delete();
        return response()->json(['success'=>'data deleted successsfully']);

    }
}
