@extends('layouts.main')
@section('content')
<div class="breadcrumb">
     <h1 class="text-secondary">Add New Patient</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <div style=" color:#CC9544; " class="card-title mb-1 border-bottom  text-center font-weight-bold font-25">Patient Data</div>
                <form action="{{route('patient.store')}}" method="POST">
                    @csrf
               <div class="form-group">
               <label  for="firstname">First name</label>
                <input class="form-control" name="first_name" type="text" placeholder="Enter patient first name" />
                <span class="text-danger">@error('first_name'){{$message}}  @enderror</span>
               </div>
                
               <div class="form-group">
               <label  for="lastname">Last name</label>
                <input class="form-control" name="last_name" type="text" placeholder="Enter patient last name" />
                <span class="text-danger">@error('last_name'){{$message}}  @enderror</span>
               </div>
                
                <div class="form-group">
                <label  for="age">Age</label>
                <input class="form-control" name="age" type="number" placeholder="Age" />
                <span class="text-danger">@error('age'){{$message}}  @enderror</span>
                </div>

                <div class="form-group">
                <label  for="age">Phone</label>
                <input class="form-control" name="phone" type="text" placeholder="Phone Number" />
                <span class="text-danger">@error('phone'){{$message}}  @enderror</span>
                </div>

                <div class="form-group">
                <label  for="age">Address</label>
                <input class="form-control" name="address" type="text" placeholder="Address" />
                <span class="text-danger">@error('address'){{$message}}  @enderror</span>
                </div>

                <button type="submit" style="background-color: #CC9544;" class="btn btn-block text-white mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection