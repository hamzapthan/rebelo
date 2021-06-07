<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
}
