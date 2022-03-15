@extends('layouts.main')

@section('content')
<div class="breadcrumb">
     <h1 class="text-secondary">Add Vitals</h1>
</div>
<div class="separator-breadcrumb border-top"></div>
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
            <form action="{{route('vitals.store',$patient->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
            <div class="form-group mb-2">
                <label for="blood_pressure">Blood Pressure</label>
                <input name="blood_pressure" type="text" class="form-control" placeholder="BP">
                <span class="text-danger">@error ('blood_pressure'){{$message}}@enderror</span>
            </div>
            <div class="form-group mb-2">
                <label for="sugar">Sugar</label>
                <input name="sugar" type="text" class="form-control" placeholder="sugar">
                <span class="text-danger">@error ('sugar'){{$message}}@enderror</span>
            </div>
            <div class="form-group mb-2">
                <label for="sugar">Add History</label>
                <textarea name="remarks" class="form-control" name="" id="" cols="30" rows="4"></textarea>
                <span class="text-danger">@error ('remarks'){{$message}}@enderror</span>
            </div>
        <button class="btn savebtn2 " type="submit">Save Vital</button>
</form>
            </div>
        </div>
    </div>
</div>

@endsection