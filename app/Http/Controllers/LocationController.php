<?php

namespace App\Http\Controllers;

use App\Models\Locations;
use Illuminate\Http\Request;
use Image;
use Validator;
use DataTables;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Locations::select('*')->orderBy('created_at', 'desc')->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($record){
       
                          // $btn = '<a href="'.route('admin.faq.show', $record->id).'" class="edit btn btn-info btn-sm">View</a>';
                           $btn = '<a href="'.route('location.edit', $record->id).'" class="edit btn btn-primary btn-sm">Edit</a>';
                           $btn = $btn.'<a href="'.route('location.destroy', $record->id).'" class="delete btn btn-danger btn-sm">Delete</a>';
         
                            return $btn;
                    }) 
                    ->addColumn('image', function($record){
                        if($record->image_url && file_exists(public_path('uploads/locations/'.$record->image_url)))
                        $image = '<a href="'.asset('uploads/locations/'.$record->image_url).'" class="avatar image-link">
                        <img src="'.asset('uploads/locations/'.$record->image_url).'" style="height:30px;width:30px;"alt="..."></a>';
                        else
                            $image = '<span class="avatar"><img src="'.asset(AVATAR).'" alt="..."></span>';
                        return $image;
                    })
                    
                    ->rawColumns(['action', 'image'])

                    ->make(true);
        }
        $data['title']      = 'All-Locations';
        $data['breadcrumb'] = 'ALL-Locations';
        return view('dashboards.admins.location.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title']      = 'Add-Location';
        $data['breadcrumb'] = 'Add-Location';
        return view('dashboards.admins.location.create',$data);
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
            'url'=>'required',
            'add_1'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','Location Data Failed To Add...!');
        }
        //location_name	loation_url	address_line_1	address_line_2	address_line_3	address_line_4	image_url
        $objlocations = new Locations();
        $objlocations->location_name = $request->name;
        $objlocations->loation_url = $request->url;
        $objlocations->address_line_1 = $request->add_1;
        $objlocations->address_line_2 = $request->add_2;
        $objlocations->address_line_3 = $request->add_3;
        $objlocations->address_line_4 = $request->add_4;
       
        if($request->hasFile('image')){
            $file       = $request->file('image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/locations');
            //$thumbpath  = public_path('uploads/project_thumbs');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 


            $objlocations->image_url =  $filename;
        }
        $objlocations->save();
        if($objlocations->id){
           // return back()->with('success','Location Data Added Successfully..!');
            return redirect('location')->with('success','Location Data Added Successfully..!');


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
    
        $data['title']      = 'Edit-Location';
        $data['breadcrumb'] = 'Edit-Location';
        $data['location_data'] = Locations::findOrFail($id);
        return view('dashboards.admins.location.edit',$data);
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
            'url'=>'required',
            'add_1'=>'required',
           
        ]); 
        if ($validator->fails()) { 
            return back()->with('error','Location Data Failed To Update...!');
        }

        $objlocations = Locations::findOrFail($id);

        $objlocations->location_name = $request->name;
        $objlocations->loation_url = $request->url;
        $objlocations->address_line_1 = $request->add_1;
        $objlocations->address_line_2 = $request->add_2;
        $objlocations->address_line_3 = $request->add_3;
        $objlocations->address_line_4 = $request->add_4;
       
        if($request->hasFile('image')){
            $file       = $request->file('image');
            $filename   = $file->hashName();
            $imagepath  = public_path('uploads/locations');
            //$thumbpath  = public_path('uploads/project_thumbs');
            $file->move($imagepath, $filename);
            $img        = Image::make($imagepath.'/'.$filename); 
            $img->fit(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(); 


            $objlocations->image_url =  $filename;
        }
        else
        {
            //$temp_image_url = $objUser->image_url;
            $objlocations->image_url = $request->old_image_url;
        }
        //dd($objProject->image_url);
        $objlocations->save();
        if($objlocations->id){
            //return back()->with('success','Location Data Updated Successfully..!');
            return redirect('location')->with('success','Location Data Updated Successfully..!');

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
        $objlocations = Locations::findOrFail($id);
        $objlocations->delete();
        
        return json_encode(['status' => 'success', 'title' => 'Deleted!', 'message' => 'Location has been deleted.']);
    }
}
