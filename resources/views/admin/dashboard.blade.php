@extends('layouts.main')

@section('content')
<div class="breadcrumb">
                    <h1 class="text-secondary">Doctor Panel</h1>
                    <ul>
                        <li><a class="text-dark" href="">( All Patients )</a></li>
                    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>

                
<div class="card">
    <div class="card-body">
    @if (session('added'))
        <div class="alert alert-success" role="alert">
            <b><i>{{ session('added') }}</i></b>
        </div>
    @endif
    @if (session('danger'))
        <div class="alert alert-danger" role="alert">
            <b><i>{{ session('danger') }}</i></b>
        </div>
    @endif
    @if (session('updated'))
        <div class="alert alert-warning" role="alert">
            <b><i>{{ session('updated') }}</i></b>
        </div>
    @endif
    <livewire:patient-table/>
    </div>
</div>
@endsection