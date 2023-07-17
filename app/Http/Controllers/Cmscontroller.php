<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Banners;
use App\Models\About;
use App\Models\Projects;
use Illuminate\Support\Facades\File;
use Image;
use Validator;
use DataTables;

class Cmscontroller extends Controller
{

    //Locations::select('*')->orderBy('created_at', 'desc')->get();
    function AboutBannerSection(){
        $banner = Banners::select('*')->orderBy('created_at', 'desc')->first();
        if (!$banner){
            $data['banner_ttile'] ='No Title Added..!';
            $data['banner_desc'] ='No description Added..!';
            $data['banner_image'] = 0;
        }else{
            $data['banner_ttile'] = $banner->title;
            $data['banner_desc'] =  $banner->description;
            $data['banner_image'] = $banner->image_url;
        }

        $about = About::select('*')->orderBy('created_at', 'desc')->first();
        if (!$about){
            $data['about_ttile'] ='No Title Added..!';
            $data['about_desc'] ='No description Added..!';
            $data['about_image'] = 'null';
        }else{
            $data['about_ttile'] = $about->title;
            $data['about_desc'] =  $about->description;
            $data['about_image'] = $about->image_url;
        }
      // dd( $data['banner_image']);
    
        
        $data['title']      = 'About-Banner';
        $data['breadcrumb'] = 'About-Banner';
        return view('dashboards.admins.settings',$data);
    }  

    public function addBannerData(Request $request){
        //dd($request);
        //return $request;
        $validator = Validator::make($request->all(), [
            'banner_title'=>'required',
            'banner_description'=>'required',
            'banner_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','Banner Data Failed To Add...!');
        }
        $objBanners = new Banners();
        $objBanners->title = $request->banner_title;
        $objBanners->description = $request->banner_description;
        if($request->hasFile('banner_image')){
            $file       = $request->file('banner_image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/banner');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 

            $objBanners->image_url =  $filename;
        }
        $objBanners->save();
        if($objBanners->id){
            return back()->with('success','Banner Data Added Successfully..!');
        }
    }
    public function addAboutData(Request $request){

        $validator = Validator::make($request->all(), [
            'about_title'=>'required',
            'about_description'=>'required',
            'about_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','About Data Failed To Add...!');
        }

        $objAbout = new About();
        $objAbout->title = $request->about_title;
        $objAbout->description = $request->about_description;

        if($request->hasFile('about_image')){
            $file       = $request->file('about_image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/about');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 

            $objAbout->image_url =  $filename;
        }
        $objAbout->save();
        if($objAbout->id){
            return back()->with('success','About Data Added Successfully..!');

        }
        
    }
 
}
