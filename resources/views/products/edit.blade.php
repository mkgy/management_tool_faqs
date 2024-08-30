@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>Edit FAQs
                    <div class="float-end">
                        <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                    </div>
                </h2>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<!-- products.update will tell Laravel index.php to visit ProductController's update() method with the id: $faqQuestions->id -->
<!-- PUT tells Laravel we want to call the update() method inside ProductController -->
<!-- POST is a way for me to transfer all the data inside the form to the Laravel index.php  -->
    <form action="{{ route('products.update', $id) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="row">
     
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Question:</strong>
                    
                    <textarea class="form-control" style="height:150px" name="question" placeholder="Detail">{{ $question }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 mb-3">
                <div class="form-group">
                    <strong>Answer:</strong>
                   
                    <textarea class="form-control" style="height:150px" name="answer" placeholder="Detail">{{ $answer }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 mb-3 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          
        </div>
    </form>
@endsection
