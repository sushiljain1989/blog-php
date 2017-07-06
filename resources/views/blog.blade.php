
@extends('layouts.front')

@section('title', str_limit($blog->title, $limit = 35, $end = ''))

@section('maincontent')
<article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                  <h2 class="section-heading">{{$blog->title}}</h2>
                  <p>  {{$blog->description}} </p>
                </div>
            </div>
        </div>
</article>
<hr>
<ul class="pager">
  <a href="/" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-home"></span> Home</a>
</ul>

@endsection
