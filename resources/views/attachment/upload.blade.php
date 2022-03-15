@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{route('attachment.upload',$patient->id)}}" id="upload" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                <div style="font-size:20px; color:#00C897;" class="card-header text-center font-weight-bold ">
                    Upload Your Files Here !
                </div>
                <div class="card-body">
                        <input type="file" class="@error('attachments') is-invalid @enderror" name="file[]" multiple accept=".pdf,.doc,.xlsx,.docx">
                </div>
                    <button style="background-color: #00C897; outline:none; border:none; float:right;" type="submit" class="btn btn-primary m-3 ">Upload</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection


