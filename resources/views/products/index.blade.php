
@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-left">
                <h2>FAQs                  
            <div class="float-end">
                <!-- <form action="{{ route('products.index') }}" method="GET">
                    <input type="text" name="search" placeholder="Search Products" >
                    <button type="submit">Search</button>
                </form> -->
              @can('product-create')
              <a class="btn btn-success" href="{{ route('products.create') }}"> Create New FAQ</a>
              @endcan

          </div>
                </h2>
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-striped table-hover">
    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Id
                        </th>
                        <th>
                            Category
                        </th>
                        <th>
                            Question
                        </th>
                        <th>
                            Answer
                        </th>
                        <th>
                            &nbsp;
                        </th>
                        <th>
                           Action
                        </th>
                    </tr>
       
	    @foreach($faqQuestions as $key => $faqQuestion)
            <tr data-entry-id="{{ $faqQuestion->id }}">
                    <td>

                    </td>
                    <td>
                        {{ $faqQuestion->id ?? '' }}
                    </td>
                    <td>
                        {{ $faqQuestion->category->category ?? '' }}
                    </td>
                    <td>
                        {{ $faqQuestion->question ?? '' }}
                    </td>
                    <td>
                        {{ $faqQuestion->answer ?? '' }}
                    </td>
                    <td>
                    </td>
                <td>
                    <form action="{{ route('products.destroy',$faqQuestion->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('products.show',$faqQuestion->id) }}">Show</a>
                        @can('product-edit')
                        <a class="btn btn-primary" href="{{ route('products.edit',$faqQuestion->id) }}">Edit</a>
                        @endcan


                        @csrf
                        @method('DELETE')
                        @can('product-delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                        @endcan
                    </form>
                </td>
            </tr>
	    @endforeach
    </table>

@endsection 