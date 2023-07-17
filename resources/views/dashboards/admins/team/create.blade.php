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
              <li class="breadcrumb-item"><a href="{{ route('team.index')}}">Home</a></li>
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
              <form id="form1" name="form1" onsubmit="return validateMyForm_1();" action="{{ route('team.store')  }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" id="name" name="name" 
                    placeholder="Enter Name">
                  </div>

                 
                  <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" class="form-control" id="designation" name="designation" 
                    placeholder="Enter Designation">
                  </div>
                  
                  
                  <div class="form-group">
                    <label for="image"> Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
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
    if($("#name").val() == ''){
        Swal.fire({icon: 'error',text: 'Enter Name!',})
        return false;
    }
    else if($("#designation").val() == ''){
        Swal.fire({icon: 'error',text: 'Enter Designation!',})
        return false;
    }
   
    else if($("#image").val() == ''){
        Swal.fire({icon: 'error',text: 'Choose Image!',})
        return false;
    }else{
        return true;
    }
    
}
</script>
@endsection