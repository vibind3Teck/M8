<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Image;
use Validator;
use DataTables;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Projects::select('*')->orderBy('created_at', 'desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($record){
       
                          // $btn = '<a href="'.route('admin.faq.show', $record->id).'" class="edit btn btn-info btn-sm">View</a>';
                           $btn = '<a href="'.route('project.edit', $record->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.'<a href="'.route('project.destroy', $record->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
         
                            return $btn;
                    }) 
                    ->addColumn('image', function($record){
                        if($record->image_url && file_exists(public_path('uploads/project/'.$record->image_url)))
                        $image = '<a href="'.asset('uploads/project/'.$record->image_url).'" class="avatar image-link">
                        <img src="'.asset('uploads/project/'.$record->image_url).'" style="height:30px;width:30px;"alt="..."></a>';
                        else
                            $image = '<span class="avatar"><img src="'.asset(AVATAR).'" alt="..."></span>';
                        return $image;
                    })
                    
                    ->rawColumns(['action', 'image'])
                   
                
                    ->make(true);
        }
        $data['title']      = 'All-Project';
        $data['breadcrumb'] = 'ALL-Projects';
        return view('dashboards.admins.projects.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Add-Project';
        $data['breadcrumb'] = 'Add-Projects';
        return view('dashboards.admins.projects.create',$data);
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
            'project_title'=>'required',
            'project_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','Project Data Failed To Add...!');
        }

        $objProject = new Projects();
        $objProject->title = $request->project_title;
       
        if($request->hasFile('project_image')){
            $file       = $request->file('project_image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/project');
            //$thumbpath  = public_path('uploads/project_thumbs');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 


            $objProject->image_url =  $filename;
        }
        $objProject->save();
        if($objProject->id){
           
            return redirect('project')->with('success','Project Data Added Successfully..!');


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
       

        $data['title']      = 'Edit-Project';
        $data['breadcrumb'] = 'Edit-Projects';
        $data['project_data'] = Projects::findOrFail($id);

        //dd( $data['faq'] );
        return view('dashboards.admins.projects.edit',$data);
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
            'project_title'=>'required',
            //'project_image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','Project Data Failed To Update...!');
        }
        $objProject = Projects::findOrFail($id);
        $objProject->title = $request->project_title;
       
        if($request->hasFile('project_image')){
            $file       = $request->file('project_image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/project');
            //$thumbpath  = public_path('uploads/project_thumbs');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 


            $objProject->image_url =  $filename;
        }
        else
        {
            //$temp_image_url = $objUser->image_url;
            $objProject->image_url = $request->old_image_url;
        }
        //dd($objProject->image_url);
        $objProject->save();
        if($objProject->id){
          
            return redirect('project')->with('success','Project Data Updated Successfully..!');

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
        $objProject = Projects::findOrFail($id);
        $objProject->delete();
        
        return json_encode(['status' => 'success', 'title' => 'Deleted!', 'message' => 'Project has been deleted.']);
    }
}
