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


                                <form action="{{route('Course.show', $pro->id)}}" >
                                    @csrf
                                   
                                    <div class="toolbar mb-4" role="toolbar">
                                    </div>


                                    <div class="compose-content">
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Name</label>
                                            <div class="col-lg-6">
                                                <input type="name" value="{{$pro -> name}}" class="form-control" placeholder="name">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Category </label>
                                            <div class="col-lg-6">
                                                <select class="default-select  form-control wide" name="cate_name">
                                                    @foreach ($cate as $cate)
                                                    <option {{$cate ->id == $pro ->id_category ? 'selected':''}}  value="{{ $cate -> id}}">{{ $cate -> name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Image </label>
                                            <div class="col-lg-6">
                                              
                                                <br>
                                                <img src="{{asset('public/admin/uploads/product/' .$pro-> image)}}" alt="" class="col-lg-6">
                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Teacher </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" value="{{$pro ->teacher}}" name="teacher">

                                            </div>
                                        </div>

                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Link </label>
                                            <div class="col-lg-6">
                                                <input type="text" value="{{$pro ->link}}" name="link" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-1 col-form-label">Decription </label>
                                            <div class="col-lg-6">
                                                <div class="card-body custom-ekeditor">
                                                <textarea rows="8" class="form-control"   name="decription"  id="ckeditor">{{$pro ->decription}}</textarea>
                                                         
                                               
                                                </div>
                                            </div>
                                        </div>


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