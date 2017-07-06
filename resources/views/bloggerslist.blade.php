@extends('layouts.app')
@section('title', 'Bloggers List')
@section('content')
<div class="container">
<table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Change Status</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
@foreach($bloggers as $blogger)
  @if($blogger->is_activated == 1)
      <tr class="success">
        <td>{{$blogger->name}}</td>
        <td>{{$blogger->email}}</td>
        <td><a href="#" class="changeactivationstatus" data-id="{{$blogger->id}}" >Deactivate</a></td>
        <td><a href="#" class="deleteblogger" data-id="{{$blogger->id}}">Delete</a></td>
      </tr>
  @else
      <tr class="danger">
        <td>{{$blogger->name}}</td>
        <td>{{$blogger->email}}</td>
        <td><a href="#" class="changeactivationstatus" data-id="{{$blogger->id}}" >Activate</a></td>
        <td><a href="#" class="deleteblogger" data-id="{{$blogger->id}}">Delete</a></td>
      </tr>
  @endif
@endforeach

  </table>
  <ul class="pager">
    {{$bloggers->links()}}
  </ul>
</div>

@endsection
