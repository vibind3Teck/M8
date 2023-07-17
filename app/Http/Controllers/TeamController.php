<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Image;
use Validator;
use DataTables;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Team::select('*')->orderBy('created_at', 'desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($record){
       
                          // $btn = '<a href="'.route('admin.faq.show', $record->id).'" class="edit btn btn-info btn-sm">View</a>';
                           $btn = '<a href="'.route('team.edit', $record->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.'<a href="'.route('team.destroy', $record->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
         
                            return $btn;
                    }) 
                    ->addColumn('image', function($record){
                        if($record->image_url && file_exists(public_path('uploads/team/'.$record->image_url)))
                        $image = '<a href="'.asset('uploads/team/'.$record->image_url).'" class="avatar image-link">
                        <img src="'.asset('uploads/team/'.$record->image_url).'" style="height:30px;width:30px;"alt="..."></a>';
                        else
                            $image = '<span class="avatar"><img src="'.asset(AVATAR).'" alt="..."></span>';
                        return $image;
                    })
                    
                    ->rawColumns(['action', 'image'])

                    ->make(true);
        }
        $data['title']      = 'All-Team';
        $data['breadcrumb'] = 'ALL-Team';
        return view('dashboards.admins.team.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Add-Team';
        $data['breadcrumb'] = 'Add-Team';
        return view('dashboards.admins.team.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'designation'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','Team Data Failed To Add...!');
        }

        $objStudio = new Team();
        $objStudio->name = $request->name;
        $objStudio->designation = $request->designation;
       
        if($request->hasFile('image')){
            $file       = $request->file('image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/team');
            //$thumbpath  = public_path('uploads/project_thumbs');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 


            $objStudio->image_url =  $filename;
        }
        $objStudio->save();
        if($objStudio->id){
           // return back()->with('success','Team Data Added Successfully..!');
            return redirect('team')->with('success','Team Data Added Successfully..!');

        }

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
       

        $data['title']      = 'Edit-Team';
        $data['breadcrumb'] = 'Edit-Team';
        $data['team_data'] = Team::findOrFail($id);

        //dd( $data['faq'] );
        return view('dashboards.admins.team.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         //dd($request);
        $validator = Validator::make($request->all(), [
            'name'=>'required',
            'designation'=>'required',
            //'project_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','Team Data Failed To Update...!');
        }
        $objTeam = Team::findOrFail($id);
        $objTeam->name = $request->name;
        $objTeam->designation = $request->designation;
       
        if($request->hasFile('image')){
            $file       = $request->file('image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/team');
            //$thumbpath  = public_path('uploads/project_thumbs');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 


            $objTeam->image_url =  $filename;
        }
        else
        {
            //$temp_image_url = $objUser->image_url;
            $objTeam->image_url = $request->old_image_url;
        }
        //dd($objProject->image_url);
        $objTeam->save();
        if($objTeam->id){
            //return back()->with('success','Team Data Updated Successfully..!');
            return redirect('team')->with('success','Team Data Updated Successfully..!');

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projects  $projects
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objTeam = Team::findOrFail($id);
        $objTeam->delete();
        
        return json_encode(['status' => 'success', 'title' => 'Deleted!', 'message' => 'Team has been deleted.']);
    }
}
