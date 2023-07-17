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
          <!-- <button type="button" class="btn btn-block btn-success">Success</button> -->
          <div class="col-md-12">
         
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
              <a href="{{ route('location.create')}}">
                <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Add New
                  </button>
              </a>
                
              </div>
              <!-- /.card-header -->
              <div class="card">
              
              <!-- /.card-header -->
              <div class="card-body">
                  <table id="list" class="table table-striped table-bordered data-table" style="width:100%">
                            <thead>
                          
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Link</th>
                                    <th>ADD-1</th>
                                    <th>ADD-2</th>
                                    <th>ADD-3</th>
                                    <th>ADD-4</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                  </table>
              </div>
              <!-- /.card-body -->
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

        var table;
        $(document).ready(function(e) {
            "use strict";
            var table = $('#list').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                scroller:   true,
                ajax: "@php route('location.index') @endphp",
                columns: [

                
                    {data: 'DT_RowIndex', name: 'id', orderable: false, searchable: false},
                    //{data: 'image', name: 'image', orderable: false, searchable: false},
                    {data: 'location_name', name: 'location_name'},
                    {data: 'loation_url', name: 'loation_url'},
                    {data: 'address_line_1', name: 'address_line_1'},
                    {data: 'address_line_2', name: 'address_line_2'},
                    {data: 'address_line_3', name: 'address_line_3'},
                    {data: 'address_line_4', name: 'address_line_4'},

                    {data: 'image', name: 'image', orderable: false, searchable: false},
                    //{data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

            table.on( 'draw.dt', function () {
                var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch-small-ajax'));
                elems.forEach(function(html) {
                    var init = new Switchery(html, { size: 'small', color: '{{ config("app.color") }}' });
                });
                //$('.image-link').magnificPopup(popupOptions);
            });
           // new $.fn.dataTable.FixedHeader( table );

            $(document).on('click', '.delete', function (e) {
              
                var $this = $(this);
                Swal.fire({
                    title: "Are you sure?",
                    text: "You will not be able to recover this record in future!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            url: $this.attr('href'),
                            type: 'post',
                            data: { '_method': 'delete' },
                            dataType: 'json',
                            success: function(result){
                                if(result.status == 'success')
                                    table.draw(false);
                                Swal.fire(result.title, result.message, result.status);
                            }
                        });
                    }

                })
                return false;
            });

   
        
        });

</script>
@endsection