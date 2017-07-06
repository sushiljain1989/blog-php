
@extends('layouts.front')

@section('title', 'Home Page')

@section('maincontent')


    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                @foreach ($blogs as $blog)



                <div class="post-preview">
                    <a href="blog/{{$blog->id}}">
                        <h2 class="post-title">
                            {{$blog->title}}
                        </h2>
                        <h3 class="post-subtitle">
                          {{ str_limit($blog->description, $limit = 100, $end = '... Read More') }}
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">{{$blog->name}}</a> on {{$blog->created_at}}</p>
                </div>
                <hr>
                  @endforeach

<!--
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            I believe every human has a finite number of heartbeats. I don't intend to waste any of mine.
                        </h2>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on September 18, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Science has not yet mastered prophecy
                        </h2>
                        <h3 class="post-subtitle">
                            We predict too much for the next year and yet far too little for the next ten.
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on August 24, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            Failure is not an option
                        </h2>
                        <h3 class="post-subtitle">
                            Many say exploration is part of our destiny, but it’s actually our duty to future generations.
                        </h3>
                    </a>
                    <p class="post-meta">Posted by <a href="#">Start Bootstrap</a> on July 8, 2014</p>
                </div>
                <hr>
                Pager -->
                <ul class="pager">
                  {{$blogs->links()}}
                </ul>
            </div>
        </div>
    </div>
    @endsection
