@extends('layouts.app')

@section('content')

		<!-- form  method=post button type=hidden-->
	 <form method="POST" action="{{route('books.update', $book)}}">
        {{csrf_field()}}
       	{{method_field('PUT')}}

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">title:</label>
            <input type="text" class="form-control" name="title" value="{{$book->title}}">
          </div>
        </div>


          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">author:</label>
              <input type="text" class="form-control" name="author" value="{{$book->author}}">
              
            </div>
          </div>

          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">category:</label>
              <input type="text" class="form-control" name="category" value="{{$book->category}}">
             
            </div>
          </div>
       
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="price">resume:</label>
              <input type="text" class="form-control" name="resume" value="{{$book->resume}}">
          
            </div>
          </div>
          
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <button type="submit" class="btn btn-success" >Update Book</button>
          </div>

         <a " href="{{ route('homeBooks') }}"> Retry</a>
        </div>
      </form>

	<!-- buttton retry -->
@stop