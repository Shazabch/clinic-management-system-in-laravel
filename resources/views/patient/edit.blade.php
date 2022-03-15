@extends('layouts.main')
@section('content')
<div class="breadcrumb">
     <h1 class="text-secondary">Update Patient Data</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <div style=" color:#CC9544; " class="card-title mb-1 border-bottom  text-center font-weight-bold font-25">Patient Data</div>
                <form action="{{route('patient.update',$patient->id)}}" method="POST">
                    @csrf
                    @method('put')
                <label class="mt-2" for="firstname">First name</label>
                <input value="{{$patient->first_name}}" class="form-control" name="first_name" type="text" placeholder="Enter patient first name" />
                <label class="mt-2" for="lastname">Last name</label>
                <input value="{{$patient->last_name}}" class="form-control" name="last_name" type="text" placeholder="Enter patient last name" />
                <label class="mt-2" for="age">Age</label>
                <input value="{{$patient->age}}" class="form-control" name="age" type="number" placeholder="Age" />
                <label class="mt-2" for="phone">Phone</label>
                <input value="{{$patient->phone}}" class="form-control" name="phone" type="text" placeholder="Phone Number" />
                <label class="mt-2" for="address">Address</label>
                <input value="{{$patient->address}}" class="form-control" name="address" type="text" placeholder="Address" />
                <button type="submit" style="background-color: #CC9544;" class="btn btn-block text-white mt-3">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection