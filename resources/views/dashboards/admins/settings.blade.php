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
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
           
          <div class="col-md-6">
          
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Add Banner Section</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form1" name="form1" onsubmit="return validateMyForm_1();" action="{{ route('addBannerData')  }}" method="post" enctype="multipart/form-data">
               @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="banner_title" name="banner_title"
                    
                     placeholder="Enter Banner Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                  
                    <textarea class="form-control" id="banner_description" name="banner_description" rows="10" cols="200"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="banner_image">Slider Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="banner_image" name="banner_image">
                        <label class="custom-file-label" for="banner_image">Choose banner image file</label>
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
             
          <div class="col-md-6">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Present Banner VIew</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="banner_title" name="banner_title"
                    value="{{ $banner_ttile }}"
                     placeholder="Enter Banner Title" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                  
                    <textarea class="form-control" id="banner_description" name="banner_description" rows="10" cols="200"disabled>{{ $banner_desc }} </textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="banner_image">Slider Image</label>
                    <div class="input-group">
                    @if ($banner_image === 0)
                     <p>No Banner Image Added...!</p>
                    @else
                    <img src="{{ asset('uploads/banner/'.$banner_image) }}" style="height:100px;width:100px;"alt="...">
                    @endif
                    
                    </div>
                  </div>
                </div>
            </div>
          </div>



          <div class="col-md-6">

          
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Add About Section</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form id="form2" name="form2" onsubmit="return validateMyForm_2();" action="{{ route('addAboutData')  }}" method="post" enctype="multipart/form-data">
               @csrf
                
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control required" 
                    id="about_title" name="about_title" 
                    
                    placeholder="Enter About Title" require>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                   
                    <textarea class="form-control" id="about_description" 
                    name="about_description" rows="10" cols="200"></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="about_image">About Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="about_image" name="about_image">
                        <label class="custom-file-label" for="about_image">Choose about image file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                   
                  </div>
                 
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Present About VIew</h3>
              </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Title</label>
                    <input type="text" class="form-control" id="about_title" name="banner_title"
                    value="{{ $about_ttile }}"
                     placeholder="Enter Abo Title" disabled>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                  
                    <textarea class="form-control" id="about_description" name="about_description" rows="10" cols="200"disabled>{{ $about_desc}} </textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="about_image">Slider Image</label>
                    <div class="input-group">
                    @if ($about_image == 'null')
                     <p>No About Image Added...!</p>
                    @else
                    <img src="{{ asset('uploads/about/'.$about_image) }}" style="height:100px;width:100px;"alt="...">
                    @endif
                    </div>
                  </div>
                </div>
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
    if($("#banner_title").val() == ''){
        Swal.fire({icon: 'error',text: ' Enter Banner Title!',})
        return false;
    }
    else if($("#banner_description").val() == ''){
        Swal.fire({icon: 'error',text: ' Enter Banner Description!',})
        return false;
    }
    else if($("#banner_image").val() == ''){
        Swal.fire({icon: 'error',text: ' Choose Banner Image!',})
        return false;
    }else{
        return true;
    }
    
}
 function validateMyForm_2(){
    if($("#about_title").val() == ''){
        Swal.fire({icon: 'error',text: ' Enter about Title!',})
        return false;
    }
    else if($("#about_description").val() == ''){
        Swal.fire({icon: 'error',text: ' Enter about Description!',})
        return false;
    }
    else if($("#about_image").val() == ''){
        Swal.fire({icon: 'error',text: ' Choose About Image!',})
        return false;
    }else{
        return true;
    }
    
}
</script>
@endsection