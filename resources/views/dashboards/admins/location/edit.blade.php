@extends('dashboards.admins.layouts.admin-dash-layout')


@section('title','Settings')

@section('content')
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>{{ $title }}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('location.index')}}">Home</a></li>
              <li class="breadcrumb-item active">{{ $breadcrumb }}</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<section class="content">
      <div class="container-fluid">
          @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>    
                <strong>{{ $message }}</strong>
            </div>
          @endif
          @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>	
                    <strong>{{ $message }}</strong>
            </div>
          @endif
        <div class="row">
          <!-- left column banner section-->
           
          <div class="col-md-12">
          
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form1" name="form1" onsubmit="return validateMyForm_1();" 
              action="{{ route('location.update', $location_data->id)}}" method="post" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <input type="hidden" name="old_image_url" value="{{ $location_data->image_url }}">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                    value="{{ $location_data->location_name }}"
                    placeholder="Enter City Name">
                  </div>

                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Url</label>
                    <input type="text" class="form-control" id="url" name="url" 
                     value="{{ $location_data->loation_url }}"
                    placeholder="Enter  Url Link">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Address-Line-1</label>
                    <input type="text" class="form-control" id="add_1" name="add_1" 
                    value="{{ $location_data->address_line_1 }}"
                    placeholder="Enter  Address Line">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address-Line-2</label>
                    <input type="text" class="form-control" id="add_2" name="add_2" 
                    value="{{ $location_data->address_line_2 }}"
                    placeholder="Enter  Address Line">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address-Line-3</label>
                    <input type="text" class="form-control" id="add_3" name="add_3" 
                    value="{{ $location_data->address_line_3 }}"
                    placeholder="Enter  Address Line">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Address-Line-4</label>
                    <input type="text" class="form-control" id="add_4" name="add_4" 
                    value="{{ $location_data->address_line_4 }}"
                    placeholder="Enter  Address Line">
                  </div>
                  
                  
                  
                  <div class="form-group">
                    <label for="image"> Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image"
                        value="{{ $location_data->image_url }}">
                      
                        <label class="custom-file-label" for="image">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                    <img src="{{ asset('uploads/locations/'.$location_data->image_url) }}" style="height:75px;width:75px;"alt="...">
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" id="form-1" class="btn btn-primary">Submit</button>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
     </div>
</section>

@endsection

@section('page-script')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>


 function validateMyForm_1(){
    if($("#name").val() == ''){
        Swal.fire({icon: 'error',text: 'Enter  City Name!',})
        return false;
    }
    else if($("#url").val() == ''){
        Swal.fire({icon: 'error',text: 'Enter  Url Link!',})
        return false;
    }
    else if($("#add_1").val() == ''){
        Swal.fire({icon: 'error',text: 'Enter  Address Landmark!',})
        return false;
    }
   
   else{
        return true;
    }
    
}
</script>
@endsection