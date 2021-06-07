<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use DataTables;
use Validator;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use DB;
use Illuminate\Support\Arr;

class UsersController extends Controller
{
   
    // public function index(Request $request){
       
    //     if($request->ajax())
    //     {
    //         $data = User::latest()->get();
    //         return DataTables::of($data)
                
    //                 ->addColumn('action', function($data){
    //                     $actionBtn = '<a href="/user/edit/'. $data->id .'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button></a>';
    //                     $actionBtn .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
                       
    //                    return $actionBtn;
    //                 })
    //                 ->addColumn('actions', function($data){
    //                    if($data->role == 1){
    //                     $actionBtn = '<span class="badge badge-success">Admin</span>';
    //                     return $actionBtn;
    //                    }else{
    //                     $actionBtn = '<span class="badge badge-danger">Front</span>';
    //                     return $actionBtn;
    //                    }
                       
    //                 })
    //                 ->editColumn('edit', function($data){
    //                     $actionBtn = '<a href="/user/edit/'. $data->id .'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button></a>';
    //                     return $actionBtn;
    //                 })
                    
    //                 ->rawColumns(['action','actions','edit'])
                    
    //                 ->make(true);
                   
    //     }
    //     return view('pages.admin.sample_data');
    // }
      

    public function frontUserIndex(Request $request){
      
        if($request->ajax())
        {
        $data = User::showFrontUser();
        return DataTables::of($data)
                ->editColumn('edit', function($data){
                    $actionBtn = '<a href="/user/edit/'. $data->id .'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button></a>';
                   return $actionBtn;
                })
                ->rawColumns(['edit'])
                ->make(true);

        }

    return view('pages.admin.subProduct');
        
   }


//     public function frontUser(Request $request){
     
//         if($request->ajax())
//     {
//         $data = User::showFrontUser();
//         return DataTables::of($data)
//                ->addIndexColumn()
//                 ->addColumn('action', function($data){
//                     $actionBtn = '<a href="/user/edit/'. $data->id .'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button></a>';
//                     $actionBtn .= '&nbsp;&nbsp;&nbsp;<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-sm">Delete</button>';
//                     // $actionBtn .='<h6>Edit</h6>';
//                    return $actionBtn;
//                 })
//                 ->rawColumns(['action'])
//                 ->make(true);

               
//     }
//     return view('pages.admin.sample_data');
//    }

    public function store(Request $request)
    {
        
       
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            'adminroles' => 'required',
            
        ]);
         if(!$validated){
            return Redirect::back()->withErrors($validated);

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

            return redirect()->back()->with('message','data inserted successfully');
             }
    }


    public function edit($id)
    {
        $userEdit = User::find($id);
        
        return view('pages.forms.addUser',compact('userEdit'));   
    
    }
        public function destroy($id)
           {
            $data = User::findOrFail($id);
            $data->delete();
        }
       
       
}
