@extends('user.layouts.app')

@section('content')
<div class="container mt-5">

<div class="row">
@include('user.layouts.usersidebar')
        
        <div class="col-md-9">
		    <div class="card">
		        <div class="card-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <h4>{{$userdata->fname}} {{$userdata->lname}}</h4>
		                    <hr>
		                </div>
		            </div>
		            <div class="row">
		                <div class="col-md-12">
		                    <form>
                              <div class="form-group row">
                                <label for="username" class="col-4 col-form-label">User Name</label> 
                                <div class="col-8">
                                  <input id="username" name="username" placeholder="Username" value="{{$userdata->username}}" class="form-control here" required="required" type="text" readonly>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="name" class="col-4 col-form-label">First Name</label> 
                                <div class="col-8">
                                  <input id="name" name="name" placeholder="First Name" value="{{$userdata->fname}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="lastname" class="col-4 col-form-label">Last Name</label> 
                                <div class="col-8">
                                  <input id="lastname" name="lastname" placeholder="Last Name" value="{{$userdata->lname}}" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="text" class="col-4 col-form-label">Phone</label> 
                                <div class="col-8">
                                  <input id="phone" name="phone" placeholder="phone" value="{{$userdata->phone}}" class="form-control here" required="required" type="number">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="email" class="col-4 col-form-label">Email</label> 
                                <div class="col-8">
                                  <input id="email" name="email" placeholder="Email" value="{{$userdata->email}}" class="form-control here" required="required" type="text">
                                </div>
                              </div>
                              {{-- <div class="form-group row">
                                <label for="website" class="col-4 col-form-label">Website</label> 
                                <div class="col-8">
                                  <input id="website" name="website" placeholder="website" class="form-control here" type="text">
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="publicinfo" class="col-4 col-form-label">Public Info</label> 
                                <div class="col-8">
                                  <textarea id="publicinfo" name="publicinfo" cols="40" rows="4" class="form-control"></textarea>
                                </div>
                              </div>
                              <div class="form-group row">
                                <label for="newpass" class="col-4 col-form-label">New Password</label> 
                                <div class="col-8">
                                  <input id="newpass" name="newpass" placeholder="New Password" class="form-control here" type="text">
                                </div>
                              </div>  --}}
                              <div class="form-group row">
                                <div class="offset-4 col-8">
                                  <button name="submit" type="submit" class="btn btn-primary">Update My Profile</button>
                                </div>
                              </div>
                            </form>
		                </div>
		            </div>
		            
		        </div>
		    </div>
        </div>
@endsection        