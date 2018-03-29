@extends('layouts.app')
@section('content')

    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
        <h1 class="display-4">Book Library</h1>
        <p class="lead">The enjoyment of read.</p>

        <!-- Start Modal -->
        
         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">To Record New Book</button>

          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">New Book</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">

                <form action="{{route('books.store')}}" method="POST">
                  {{ csrf_field() }}

                  <div class="form-group {{ $errors->has('title') ? 'has-error' :'' }}">
                    <label for="recipient-name" class="col-form-label">Title:</label>
                    <input type="text" class="form-control" id="recipient-name" name="title" value="{{ old('title') }}">
                            <!-- message error -->
                        {!! $errors->first('title','<span class="text-danger">:message</span>') !!}

                  </div>

                  <div class="form-group">
                    <label for="recipient-name1" class="col-form-label">Borrow:</label>
                    <input type="text" class="form-control" id="recipient-name1" name="borrow" value="{{ old('Borrow') }}">

                  </div>

                  <div class="form-group">
                    <label for="recipient-name2" class="col-form-label">Author:</label>
                    <input type="text" class="form-control" id="recipient-name2" name="author" value="{{ old('author') }}">
                     {!! $errors->first('author','<span class="text-danger">:message</span>') !!}
                  </div>

                  <div class="form-group">
                    <label for="recipient-name3" class="col-form-label">Category:</label>
                    <input type="text" class="form-control" id="recipient-name3" name="category" value="{{ old('category') }}">
                       {!! $errors->first('category','<span class="text-danger">:message</span>') !!}
                  </div>


                  <div class="form-group">
                    <label for="message-text" class="col-form-label">Resume:</label>
                    <textarea class="form-control" id="message-text" name="resume"></textarea>
                       {!! $errors->first('resume','<span class="text-danger">:message</span>') !!}
                  </div>

                    <button type="submit" class="btn btn-default">Record</button>
                </form>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>



          
        <div class="container text-center">

          
                <!-- verify books -->
        @if ($books->isEmpty())
          <p>aucun évennement</p>
        @else
        <table class=" table table-responsive-lg table-hover table-bordered ">

          <!-- plural book-->
          <caption>Number of {{str_plural('book',$books->count())}} : {{  $books->count() }}
           {{$books->links('vendor.pagination.bootstrap-4')}}</caption>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Titel</th>
              <th scope="col">Resum</th>
              <th scope="col">Author</th>
              <th scope="col">Category</th>
              <th scope="col">Borrow</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>

              @foreach ($books as  $book)

          <tr>
              <th scope="row">.</th>
              <td><a href="{{route('books.show',$book)}}">{{$book->title}}</a></td>
              <td>{{$book->resume}}</td>
              <td>{{$book->author}}</td>
              <td>{{$book->category}}</td>
              <td>{{$book->borrow}}</td>              

            <td>
              <a class="btn btn-small btn-success" href="{{route('books.show',$book)}}">Show</a>
              <a class="btn btn-small btn-info" href="{{route('books.edit',$book)}}">Edit</a>

               <form
                action="{{route('books.destroy',$book)}}"
                method="POST"
                onsubmit ="return confirm('Are your sur');">
                    {{csrf_field()}}

                   {{method_field('DELETE')}}
                 <input type="submit" class="btn btn-small btn-danger" value="Delete"/>
                 
              </form> 
            </td>
          </tr>
              @endforeach 
           

          </tbody>
        </table>
      
      @endif
       

       
        </div>
        @stop