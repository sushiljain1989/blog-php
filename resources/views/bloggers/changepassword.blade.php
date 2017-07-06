@extends('layouts.front')
@section('title', 'Home Page')

@section('maincontent')
    <!-- Main Content -->
    <div class="container">



         <div class="row">
             <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                 <p>Want to update your password</p>
                 @if ($errors->any())
                    <div class="alert alert-danger" style="display:block">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($msg))
                   <div class="alert alert-success" style="display:block">
                       <ul>
                           <li>{{ $msg }}</li>
                       </ul>
                   </div>
               @endif

                 <!-- Contact Form - Enter your email address on line 19 of the mail/contact_me.php file to make this form work. -->
                 <!-- WARNING: Some web hosts do not allow emails to be sent through forms to common mail hosts like Gmail or Yahoo. It's recommended that you use a private domain email address! -->
                 <!-- NOTE: To use the contact form, your site must be on a live web host with PHP! The form will not work locally! -->
                 <form name="change-password" id="change-password" method="post">
                   {{ csrf_field() }}

                     <div class="row control-group">
                         <div class="form-group col-xs-12 floating-label-form-group controls">
                             <label>Current Password</label>
                             <input type="password" name="old_password" class="form-control" placeholder="Old Password" id="old-password" required data-validation-required-message="Please enter current password.">
                             <p class="help-block text-danger"></p>
                         </div>
                     </div>
                     <div class="row control-group">
                         <div class="form-group col-xs-12 floating-label-form-group controls">
                             <label>New Password</label>
                             <input type="password" name="password" class="form-control" placeholder="New Password" id="n-password" required data-validation-required-message="Please enter new password.">
                             <p class="help-block text-danger"></p>
                         </div>
                     </div>

                     <div class="row control-group">
                         <div class="form-group col-xs-12 floating-label-form-group controls">
                             <label>Confirm New Password</label>
                             <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm New Password" id="cn-password" required data-validation-required-message="Confirm new password.">
                             <p class="help-block text-danger"></p>
                         </div>
                     </div>

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
