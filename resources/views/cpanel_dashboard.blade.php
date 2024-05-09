<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cpanel - Dashboard</title>
</head>
<body>
    @extends('layouts.navbar_cpanel')





    @section('content')
    <div class="alert alert-success">
        <center><h5>Welcome, {{session('CPANEL_NAME')}}, to the Cpanel. We are delighted to have you on board <i class="fa fa-heart" aria-hidden="true" style="color:red"></i></h5></center>
    </div>

        @if($cvData->count() > 0)

        <div class="container">
            <div class="row">

        @foreach($cvData as $info)

                    

            <div class="col-md-4">

                <div class="card">
                    <div class="card-header">
                        <h4>{{$info->title}}</h4>
                    </div>

                    <div class="card-body">


                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-4">
                                    <span>Name</span>
                                </div>
                                <div class="col-md-8">
                                    <p>{{$info->fname." ".$info->lname}}</p>
                                </div>


                            </div>
                        </div>

<hr>

                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-4">
                                    <span>E-mail Address</span>
                                </div>
                                <div class="col-md-8">
                                    <p>{{$info->email}}</p>
                                </div>


                            </div>
                        </div>

                        <hr>

                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-4">
                                    <span>Contact No</span>
                                </div>
                                <div class="col-md-8">
                                    <p>{{$info->country_code."".$info->mobile}}</p>
                                </div>


                            </div>
                        </div>

                        <hr>


                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-4">
                                    <span>Gender</span>
                                </div>
                                <div class="col-md-8">
                                    <p>{{$info->gender}}</p>
                                </div>


                            </div>
                        </div>

                        <hr>


                        <div class="col-md-12">
                            <div class="container">
                              <div class="row">

                                    @if($info->languages->count() > 0)

                                        @foreach($info->languages as $lang)
                                            <span style="margin-right:5px;margin-bottom:5px;padding:7px;color:white;background-color:green;
                                            border-radius:6px">{{$lang->language}}</span>
                                        @endforeach
                                        
                                    @endif

                               </div>
                            </div>
                        </div>

                        <hr>


                        <a href="{{ route('cpanel.preview',['uid'=>$info->id]) }}" class="btn btn-secondary">View Details</a>

                    </div>

                </div>

            </div>


            



        @endforeach
            </div>
        </div>
        



        @else
        <center><h2>No data found!</h2></center>
        @endif

        

    

    @endsection


 

    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    

   


</body>
</html>