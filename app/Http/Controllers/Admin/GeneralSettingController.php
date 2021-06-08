<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GSetting;
class GeneralSettingController extends Controller
{
    public function index(){
        return view('pages.forms.firstModal');
    }
    public function sliderStore(Request $request){
    //   return $request;
        $title1 =  $request->khan;
          $hmaza = json_encode($title1);
          return $hmaza;
    }

    public function show(){
        $generalAlls = GSetting::all();
        return view('pages.tables.generalSetting',compact('generalAlls'));
    }
    
    public function home_slider1(Request $request){
       
        $setting = GSetting::find($request->id);
        $content = json_decode($setting->content);
               
        $image= $content->image;
        if($request->has('image')){
            $imageName=$request->file('image')->getClientOriginalName();
            $file_name = time().rand(100,999).$imageName;
            $request->file('image')->move(public_path().'/setting/home_slider', $file_name);  
            $image = url('/setting/home_slider'.$file_name);   
        }
        $array = array(
            'title'=>$request->title,
            'description'=>$request->description,
            'button_title'=>$request->button_title,
            'button_link'=>$request->button_link,
            'image'=>$image,
           
        );
        $json = json_encode($array);
        $setting->content = $json;
        $setting->update();
        return redirect()->back()->with('success','Data is updated');
    }
    public function slider_status_inactive(Request $request)
    {
        $id = $_GET['id'];
        $data = GSetting::where('id',$id)->update(array('status'=>'0'));
        return response()->json([
            'success' => 'true',
            'message' => 'Slider has been Deactivated',
        ],200);
    }

    public function slider_status_active(Request $request)
    {
        $id = $_GET['id'];
        $data = GSetting::where('id',$id)->update(array('status'=>'1'));
        return response()->json([
            'success' => 'true',
            'message' => 'Slider has been Activated',
            
        ],200);
    }

}

