
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
                        <h2 class="post-title title-{{$blog->id}}">
                            {{$blog->title}}
                        </h2>
                    </a>
                    <a href="#">
                        <h3 class="post-subtitle">
                          {{ str_limit($blog->description, $limit = 100, $end = '') }}
                          <a  data-id="{{$blog->id}}" href="#" class="editBlog btn-xs btn-warning" style="padding:15px -1px;"><span class="glyphicon glyphicon-edit"></span> </a>
                          <a data-id="{{$blog->id}}" href="#" class="deleteBlog btn-xs btn-danger" style="padding:15px -1px;"><span class="glyphicon glyphicon-remove"></span> </a>
                        </h3>
                    </a>

                    <p class="post-meta">Posted by <a href="#">{{$blog->name}}</a> on {{$blog->created_at}}</p>
                </div>
                <textarea class="{{$blog->id}}" name="hide" style="display:none;">{{$blog->description}}</textarea>

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
    <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-edit"></span> Edit</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="title">Title</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Write Title">
            </div>
            <div class="form-group">
              <label for="description"><span class="glyphicon glyphicon-book"></span> Description</label>
              <textarea rows="5" class="form-control" name="description" id="description" placeholder="Write your story"></textarea>
            </div>
            <input type="hidden" id="blog-id" >
              <button type="button" id="saveBlog" class="btn btn-success btn-block"><span class="glyphicon glyphicon-floppy-disk"></span> Update</button>
          </form>
        </div>

      </div>

    </div>
  </div>

<!-- Confirmation Box -->
<div class="modal fade" id="confirmationModal" role="dialog">
<div class="modal-dialog">

  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header" style="padding:35px 50px;">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 id="confirmationHeader">
        <span class="glyphicon glyphicon-remove"></span>
        <!-- Header Goes here-->
      </h4>
      <input type="hidden" id="delete-blog-id" >
        <button type="button" id="deleteBlog" class="btn btn-danger btn-block"><span class="glyphicon glyphicon-remove"></span> DELETE</button>
    </div>
    <div class="modal-body deleteBlogBody">

    </div>

  </div>

</div>
</div>



    @endsection
