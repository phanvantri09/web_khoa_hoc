@extends('admin.master')
@section('content')
<div class="content-body">
    <div class="container-fluid">

        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active"><a href="javascript:void(0)"> Product</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Add  Product</a></li>
            </ol>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session()->has('massage'))

                        <div class="alert alert-success">
                            {{ session()->get('massage') }}
                        </div>
                        @endif
                        <div class="email-box ms-0 ms-sm-0 ms-sm-0">
                            <div class="p-0">
                                <a href="email-compose.html" class="btn btn-primary ">Add Product</a>
                            </div>
                            <br>
                            <div class="basic-form">


                                <form action="{{route('Course.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>

                                    <input type="hidden" name="views" class="form-control" value="0" required="">
                                    <div class="compose-content">
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Name</label>
                                            <div class="col-lg-6">
                                                <input type="name" name="name" class="form-control" placeholder="name" required="">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Category </label>
                                            <div class="col-lg-6">
                                                <select class="default-select  form-control wide" name="cate_name">
                                                    @foreach ($cate as $cate)
                                                    <option value="{{ $cate -> id}}" required="">{{ $cate -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Image </label>
                                            <div class="col-lg-6">
                                                <div class="form-file">
                                                    <input type="file" value="{{}}" name="image" class="form-file-input form-control" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Teacher </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" name="teacher" id="validationCustom10"  required="">

                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Link </label>
                                            <div class="col-lg-6">
                                                <input type="text" name="link" class="form-control" required="" >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Decription </label>
                                            <div class="col-lg-6">
                                                <div class="card-body custom-ekeditor">
                                                <textarea style="resize: none" rows="8" class="form-control" name="decription"  id="ckeditor" placeholder="Nội dung " required=""></textarea>
                                                         
                                                   
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="text-start mt-4 mb-3">
                                        <button class="btn btn-primary btn-sl-sm me-2" type="submit"><span class="me-2"><i class="fa fa-paper-plane"></i></span>Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @endsection