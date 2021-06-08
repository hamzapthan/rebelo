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
use Yajra\DataTables\DataTables as DataTablesDataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

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
                $data = Product::with('proproduct')->orderBy('status', 'DESC')->get();
                
            return DataTables::of($data)
                    ->addColumn('action1', function($data){
                        return $data->proName;
                    })
                    ->addColumn('action2', function($data){
                        return $data->proBrnad;
                    })
                    ->addColumn('action3', function($data){
                        return $data->categories->catName;
                    })
                    ->addColumn('action4', function($data){
                      if($data->status == 1){
                        $actionbtn =  '<div id="switch_'.$data->id.'"><label class="switch">
                        <input type="checkbox" checked onchange="change_status_inactive('.$data->id.')">
                        <span class="slider round"></span>
                    </label></div>';
                         return $actionbtn;
                      }else{
                        $actionbtn =  '<div id="switch_'.$data->id.'"><label class="switch">
                        <input type="checkbox"  onchange="change_status_active( '.$data->id.' )">
                        <span class="slider round"></span>
                    </label></div>';
                        return  $actionbtn;
                     
                    }

                    })
                    ->addColumn('action5', function($data){
                        $actions = '<a href="'. route('pro.subpro',$data->id) .'">Product('. count($data->product) .') </a>';
                       return $actions;
                    })
                    ->editColumn('action6', function($data){
                        $actions = '<a href="/user/edit/'. $data->id .'"><button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-sm">Edit</button></a>';
                       return $actions;
                    })
                    
                    ->rawColumns(['action1','action2','action3','action4','action5','action6'])
                    ->make(true);
            }

    
         return view('pages.admin.subProduct');
            
       }

    }


   

