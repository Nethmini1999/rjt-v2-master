@extends('layouts.admin')

@section('title')
Import Yearly Registration
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="/admin/registration/view-year-registration">Registration Management</a></li>
<li class="breadcrumb-item">Import Year Registration</li>
@endsection

@section('custom-css')
<link href="{{ asset('plugins/datepicker/bootstrap-datepicker.standalone.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="card mb-1 ">
    <div class="card-body">
        <h4 class="text-secondary mb-3 mt-3"><i data-feather="user" class="mr-0 pb-1"></i> Import Yearly Student Registration</h4>
        <diV class="alert bg-gray-200 mt-3">
            <a href="#" class="float-right " data-toggle="collapse" data-target="#instructions" >
                <i data-feather="chevron-down"></i>
            </a>
            <h4 class="text-info mb-1"><i class="fa fa-comments"></i> Instructions</h4>
           <div id="instructions" class="collapse">
                <hr class="mb-1 mt-0 border-info"/>        
                <div class="row">            
                    <div class="col-md-12">
                        <p class="mb-0">
                            Upload a <strong>Excel</strong> file with the fields in the given order as shown below.<br/>
                        </p>
                        <p class="ml-3">[Registration Number],[Acc Year (Ex: 2020)],[New Study Year(Ex: 1,2,3,4)], [Paid Amount], [Need Hostel (Y|N)]</p>
                        
                    </div>
                </div>
            </div>
        </diV>       
        
        {{ Form::open(['url'=>url('/admin/registration/upload-year-registration'),'method'=>'post','enctype'=>'multipart/form-data','id'=>'frmUpload']) }} 
        <div class="row"> 
            <div class="col-md-8 col-lg-4">
                <label> Registration File </label>
                <div class="input-group">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="list" name="list" accept='.xlsx,.csv'>
                      <label class="custom-file-label" for="list" id="list_label">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-3">
                <div class="form-group">
                    {!!Form::label('update', 'Update Existing Records',['class'=>'d-block'])!!}
                    <div class="custom-control custom-radio custom-control-inline">
                        {!! Form::radio('update','0', true, ['class'=>'custom-control-input','id'=>'update_0']) !!}
                        {!!Form::label('update_0', 'No',['class'=>'custom-control-label'])!!}
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        {!! Form::radio('update','1', false, ['class'=>'custom-control-input','id'=>'update_1']) !!}
                        {!!Form::label('update_1', 'Yes',['class'=>'custom-control-label'])!!}
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-2">
                <div class="form-group">
                    <label class="d-block">&nbsp; </label>
                    <button type="submit" class="btn btn-primary btn-grey-overlay btn-sm btn-icon-split" id="btnFormSubmit"><span class="icon"><i data-feather="upload"></i></span><span class="text">Upload Records</span></button>              
                </div>  
            </div>
        </div>
        {{ Form::close() }}        
    </div>
</div>
@endsection



@section('custom-js')
{{-- <script src="{{ asset('plugins/datepicker/bootstrap-datepicker.min.js') }}"></script> --}}
<script src="{{ asset('plugins/sweetalert/sweetalert2.all.min.js') }}"></script>

<script>
$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    

    $('#list').change(function(e){
        var fileName = e.target.files[0].name;
        $('#list_label').html(fileName);
    });

  

    $('#frmUpload').on('submit',function(e){
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url : $(this).attr("action"),
            type: "POST",
            data : formData,
            processData: false,
            contentType: false,
            success:function(data, textStatus, jqXHR){
                if(data==1){
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'File was Uploaded',
                        showConfirmButton: false,
                        timer: 3000,
                        width: 250,
                        toast:true,
                    });
                    $('#list_label').html('Choose file');
                    $('#list').val('');

                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                //if fails     
            }
        });
    });

    

});
</script>
@endsection