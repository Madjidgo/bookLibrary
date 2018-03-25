@extends('layouts.app')

@section('content')

<div class="container text-center">
  <h1> {{$book->title}}</h1>
<table class=" table table-responsive-lg   ">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titel</th>
      <th scope="col">Resum</th>
      <th scope="col">Author</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>

  

    <tr>
      <th scope="row">.</th>
      <td>{{$book->title}}</td>
      <td>{{$book->resume}}</td>
      <td>{{$book->author}}</td>
      

    <td>
  
     
      <a class="btn btn-small btn-danger" href="">delette</a>
      <a  class="btn btn-small btn-info" href="{{route('homeBooks')}}">Retry</a>
     

      
   
    
    </td>
  </tr>

  </tbody>
</table>
</div>

@stop