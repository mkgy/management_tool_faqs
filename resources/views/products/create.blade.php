@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Create New Answer
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </h2>
            </div>
        </div>
    </div>

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- <div class="row ">
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Question:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Answer:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div> -->


        <div class="container mt-5 ">
        <div class="row">
            <div class="col-xl-8 col-lg-8 col-sm-12 col-12 m-auto">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ Session::get('success') }}
                    </div>
                @elseif(Session::has('failed'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ Session::get('failed') }}
                    </div>
                @endif
                <div class="card shadow">
                    <div class="card-header">
                        <h4 class="card-title"> FAQs </h4>
                    </div>
        <br>
                    <!-- ######################################## -->
                    <div class="card-body">
                        <div class="col-xs-12 mb-3">
                            <div class="form-group">
                                    <label for="">Categories</label>
                                    <select class="form-control input-sm" name="category_id" id="category"> 
                                    @foreach ($faqCategory as $category)
                        <option value="{{$category->id}}">  {{$category->category}}  </option>
                                     @endforeach
                                    </select>
                            </div>

                        </div>
                        <div class="form-group ">
                            <!-- <label> Title </label> -->
                            <strong>Question</strong>
                            <input type="text" class="form-control" name="question" placeholder="Enter the Question">
                        </div>
                        <div class="form-group">
                            <!-- <label> Body </label> -->
                            <strong>Answer</strong>
                            <textarea class="form-control" id="body" placeholder="Detail" name="answer"></textarea>
                        </div>
                    </div>
                    <div class="card-footer"> 
                        <button type="submit" class="btn btn-success"> Save </button>
                    </div>
                </div>
            </div>
        </div>
</div>
    </form>

@endsection
