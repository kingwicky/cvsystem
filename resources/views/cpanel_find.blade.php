<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cpanel - Find</title>
</head>
<body>
    @extends('layouts.navbar_cpanel')


    @section('content')

    <br><br><br>
    
        <div class="container">

            
            <form id="form-search">

            @csrf


            <div class="col-md-12">

<div class="row">
        
        <div class="col-md-3">
            <div class="form-group">
                <label>Field</label>
                <select class="form-control" name="field">
                    <option value="0">Pick a field</option>

                    @if($fields->count() > 0)

                        @foreach($fields as $option)

                            <option value="{{$option}}">{{$option}}</option>

                        @endforeach


                    @endif


                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Qualification</label>
                <select class="form-control" name = "qualification">
                <option value="0">Pick a qualification</option>

                    @if($qualifications->count() > 0)

                        @foreach($qualifications as $option)

                            <option value="{{$option}}">{{$option}}</option>

                        @endforeach


                    @endif
                </select>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <label>Position</label>
                <select class="form-control" name="position">
                    <option value="0">Pick a position</option>

                    @if($positions->count() > 0)

                        @foreach($positions as $option)

                            <option value="{{$option}}">{{$option}}</option>

                        @endforeach


                    @endif


                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Language</label>
                <select class="form-control" name="language">
                    <option value="0">Pick a language</option>

                    @if($languages->count() > 0)

                        @foreach($languages as $lang)

                            <option value="{{$lang}}">{{$lang}}</option>

                        @endforeach


                    @endif


                </select>
            </div>
        </div>

        </div>



        <div class="row">
        
        <div class="col-md-9">
            
        </div>

        <div class="col-md-3">
           <div class="form-group">
                <button class="btn btn-success" style="width:100%">Search</button>
           </div>
        </div>



        </div>



</div>



            </form>


            
            <div class="container">

            <div class="row" id="area-result">

            
            </div>


            </div>


        </div>

    @endsection


 

    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    

   


<script>
    const img = new Image();
    img.src = '{{ asset('images/uploading.gif') }}';

$(document).ready(function(){


    $("#form-search").submit(function(e){
        e.preventDefault();

     

        var formData = new FormData(e.target);

          $.ajax({
            url:"{{route('cpanel.search')}}",
            type:"POST",
            data:formData,
            contentType:false,
            processData:false,
            beforeSend:function(){
              Swal.fire({
                  html: "<img src='{{asset('images/uploading.gif')}}' width='250'/><h4>Processing...</h4>",
                  showCancelButton:false,
                  showConfirmButton:false,
                  allowOutsideClick: false,
                  allowEscapeKey: false,
              });
            },success:function(response){

               

                if(response.result){
                    $("#area-result").html(response.data);
                }

                Swal.close();


            },error:function(xhr,status,error){
              console.log(error);
            }

          });

    });
});


</script>

</body>
</html>