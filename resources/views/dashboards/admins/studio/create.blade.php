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
              <li class="breadcrumb-item"><a href="{{ route('studio.index')}}">Home</a></li>
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
              <form id="form1" name="form1" onsubmit="return validateMyForm_1();" action="{{ route('studio.store')  }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="studio_title" name="studio_title" 
                    placeholder="Enter Studio Title">
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="studio_image">Slider Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="studio_image" name="studio_image">
                        <label class="custom-file-label" for="studio_image">Choose studio image file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
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
    if($("#studio_title").val() == ''){
        Swal.fire({icon: 'error',text: 'Enter Studio Title!',})
        return false;
    }
   
    else if($("#studio_image").val() == ''){
        Swal.fire({icon: 'error',text: 'Choose Image!',})
        return false;
    }else{
        return true;
    }
    
}
</script>
@endsection