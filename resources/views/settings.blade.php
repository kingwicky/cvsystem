<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CV System - Settings</title>


    <style>

.mainDiv {
  display: flex;
  min-height: 100%;
  align-items: center;
  justify-content: center;
  background-color: #f9f9f9;
  font-family: "Open Sans", sans-serif;
}
.cardStyle {
  width: 500px;
  border-color: white;
  background: #fff;
  padding: 36px 0;
  border-radius: 4px;
  margin: 30px 0;
  box-shadow: 0px 0 2px 0 rgba(0, 0, 0, 0.25);
}
#signupLogo {
  max-height: 100px;
  margin: auto;
  display: flex;
  flex-direction: column;
}
.formTitle {
  font-weight: 600;
  margin-top: 20px;
  color: #2f2d3b;
  text-align: center;
}
.inputLabel {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
  margin-top: 24px;
}
.inputDiv {
  width: 70%;
  display: flex;
  flex-direction: column;
  margin: auto;
}
input {
  height: 40px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  border: solid 1px #ccc;
  padding: 0 11px;
}
input:disabled {
  cursor: not-allowed;
  border: solid 1px #eee;
}
.buttonWrapper {
  margin-top: 40px;
}
.submitButton {
  width: 70%;
  height: 40px;
  margin: auto;
  display: block;
  color: #fff;
  background-color: #065492;
  border-color: #065492;
  text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
  box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
  border-radius: 4px;
  font-size: 14px;
  cursor: pointer;
}
.submitButton:disabled,
button[disabled] {
  border: 1px solid #cccccc;
  background-color: #cccccc;
  color: #666666;
}

#loader {
  position: absolute;
  z-index: 1;
  margin: -2px 0 0 10px;
  border: 4px solid #f3f3f3;
  border-radius: 50%;
  border-top: 4px solid #666666;
  width: 14px;
  height: 14px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}



    </style>


</head>
<body>
    @extends('layouts.navbar')





    @section('content')
    
    <div class="mainDiv">
  <div class="cardStyle">


    <form id="update-password">
        @csrf
      
      <img src="" id="signupLogo"/>
      
      <h2 class="formTitle">
        Update your password
      </h2>

      <div class="inputDiv">
      <label class="inputLabel" for="cpassword">Current Password</label>
      <input type="password" id="cpassword" name="cpassword" placeholder="xxxxxxxxxx" required>
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="password">New Password</label>
      <input type="password" id="newpassword" name="newpassword" placeholder="xxxxxxxxxx" required>
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Confirm Password</label>
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="xxxxxxxxxx" required>
    </div>
    
    <div class="buttonWrapper">
      <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary">
        <span>Continue</span>
        <!-- <span id="loader"></span> -->
      </button>
    </div>
      
  </form>


  </div>
</div>


    @endsection


 

    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    




    <script>


        $(document).ready(function(){

         

      $("#update-password").submit(function(e){
              e.preventDefault();

              var formData = new FormData(e.target);
              var csrfToken = $('meta[name="csrf-token"]').attr('content');

            

              $.ajax({
                url:"{{route('user.updatepwd')}}",
                type:'POST',
                data:formData,
                contentType: false,
                processData: false,
                beforeSend:function(){
                  Swal.fire({
                            html: "<img src='{{asset('images/uploading.gif')}}' width='250'/><h4>Processing...</h4>",
                            showCancelButton:false,
                            showConfirmButton:false,
                            allowOutsideClick: false,
                            allowEscapeKey: true,
                          });
                },headers: {
                    'X-CSRF-TOKEN': csrfToken
                },success:function(response){

                    swal.close();
                  
                    if(response.result){
                        location.href = '{{route("welcome")}}';
                    }else{
                        Swal.fire({
                            title:"Warning!",
                            icon:'warning',
                            text:response.msg
                          });
                    }

                    
                  

                },error: function(xhr, status, error) {
                console.error(error);
                }

            });

             




            });

       




        });



    </script>


</body>
</html>