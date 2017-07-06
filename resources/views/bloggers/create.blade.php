
@extends('layouts.front')

@section('title', 'Home Page')

@section('maincontent')


    <!-- Main Content -->
    <div class="container">
      @if(isset($msg))
      
    <div class="row">
         <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            <div class=" alert-success">
              <strong>Success!</strong> Your article has been published.
            </div>
          </div>
      </div>
      @endif
         <div class="row">
             <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                 <p>Want to post a new blog? Just fill-in the details and hit Post button</p>
                 <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                 <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                 <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                 <form name="sentMessage" id="createblog" method="post">
                   {{ csrf_field() }}

                     <div class="row control-group">
                         <div class="form-group col-xs-12 floating-label-form-group controls">
                             <label>Title</label>
                             <input type="text" name="title" class="form-control" placeholder="Write Title" id="blog-title" required data-validation-required-message="Please enter title.">
                             <p class="help-block text-danger"></p>
                         </div>
                     </div>

                     <div class="row control-group">
                         <div class="form-group col-xs-12 floating-label-form-group controls">
                             <label>Description</label>
                             <textarea name="description" rows="5" class="form-control" placeholder="Write Story here" id="blog-description" required data-validation-required-message="Can not be empty."></textarea>
                             <p class="help-block text-danger"></p>
                         </div>
                     </div>
                     <br>
                     <div id="success"></div>
                     <div class="row">
                         <div class="form-group col-xs-12">
                             <button type="submit" class="btn btn-default">Post</button>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </div>

     <hr>

    @endsection
