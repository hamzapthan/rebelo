<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sample_data;
use App\Models\User;
use App\Models\Product;
use App\Models\SubProduct;
use Auth;
use DataTables;
use Validator;


class UsersController extends Controller
{
    // public function index(Request $request){
    //     //  $id =   Auth::user()->id; 
    //     if($request->ajax())
    //     {
    //         $data = User::latest()->get();
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
    // }

    // public function destroy($id)
    //        {
    //         $data = User::findOrFail($id);
    //         $data->delete();
    //     }
       



        public function hamza(Request $request){
      
            if($request->ajax())
            {
                $data = Product::all();
                // foreach($datas as $data){
                //     $pro_id = $data->id;
                //     $getdatas = Product::find($pro_id)->backcatproduct;
                // }
            return DataTables::of($data)
                    ->addColumn('actions', function($data){
                        $actions = '<a href="/user/edit/'. $data->id .'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button></a>';
                       return $actions;
                    })

                    ->editColumn('action', function($data){
                        $actions = '<a href="/user/edit/'. $data->id .'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button></a>';
                       return $actions;
                    })
                    
                    ->rawColumns(['action','actions'])
                    ->make(true);
            }

    
         return view('pages.admin.subProduct');
            
       }

    }


   

