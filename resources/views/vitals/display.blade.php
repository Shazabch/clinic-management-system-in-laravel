@extends('layouts.main')

@section('content')


                <div class="row justify-content-center">
                    <div class="col-md-12 mb-3">
                        <div class="card mb-4" style="border: 1px solid #00C897;">
                            <div class="card-body">
                            <div class="text-center p-3 font-weight-bold" style="font-size: 23px; color:#CC9544;" >
                                <span>{{$patient->first_name}}&nbsp;{{$patient->last_name}}</span><br>
                                <span>{{$patient->phone}}</span><br>
                                </div>
                            </div>
                        </div>
                        <div class="breadcrumb ">
                    <h1>Patient History</h1>
                    <a type="button" style="background-color: #CC9544;" 
                    class="btn ml-3 text-white" href="{{route('home')}}">Back</a>
 </div>
 <div class="separator-breadcrumb border-top"></div>

                        <div class="card text-left">
                            <div class="card-body">
                                
                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead style="background-color:#00C897;" class="text-white">
                                      
                                           <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Blood Pressure</th>
                                                <th scope="col">Sugar</th>
                                                <th scope="col">History</th>
                                                <th scope="col">Date Visited</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($vitals as $vital)
                                                <tr>
                                                    <td>{{$vital->id}}</td>
                                                    <td>{{$vital->blood_pressure}}</td>
                                                    <td>{{$vital->sugar}}</td>
                                                    <td>{{$vital->remarks}}</td>
                                                    <td style="min-width:150px;">{{$vital->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="breadcrumb mt-4">
                    <h1>Patient Reports</h1>
                    <a type="button" style="background-color: #CC9544;" 
                    class="btn ml-3 text-white" href="{{route('home')}}">Back</a>
 </div>
                        <div class="separator-breadcrumb border-top"></div>

                       <div class="row justify-content-center">
                       <div class="col">
                       <div class="card text-left">
                            <div class="card-body">
                            @if (session('danger'))
                                <div class="alert alert-danger" role="alert">
                                    <b><i>{{ session('danger') }}</i></b>
                                </div>
                            @endif
                                <div class="table-responsive table-hover">
                                    <table class="table">
                                        <thead style="background-color:#00C897;" class="text-white">
                                      
                                           <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Reports</th>
                                                <th style="max-width: 150px  !important;">Date Added</th>
                                                <th>Actions</th>
                                                <th>&nbsp;</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($attachments as $attachment)
                                                <tr>
                                                   <td>{{$attachment->id}}</td>
                                                   <td>{{$attachment->location}}</td>
                                                   <td>{{$attachment->created_at}}</td>
                                                   <td><a  href="{{route('attachment.download',$attachment->id)}}" class="btn btn-primary">Download</a></td>
                                                   <td><a  href="{{route('attachment.destroy',$attachment->id)}}" style="background-color:#E83A14;" class="btn text-white">Destroy</a></td>
                                                 </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div> 
                       </div> 
                       </div>
                    </div>
                </div>
                
@endsection