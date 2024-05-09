<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CV System - Welcome</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
           @import url("https://fonts.googleapis.com/css?family=Montserrat|Quicksand");

* {
  font-family: "quicksand", Arial, Helvetica, sans-serif;
  box-sizing: border-box;
}

body {
  background: #fff;
}

.form-modal {
  position: relative;
  width: 450px;
  height: auto;
  margin-top: 4em;
  left: 50%;
  transform: translateX(-50%);
  background: #fff;
  border-top-right-radius: 20px;
  border-top-left-radius: 20px;
  border-bottom-right-radius: 20px;
  box-shadow: 0 3px 20px 0px rgba(0, 0, 0, 0.1);
}

.form-modal button {
  cursor: pointer;
  position: relative;
  text-transform: capitalize;
  font-size: 1em;
  z-index: 2;
  outline: none;
  background: #fff;
  transition: 0.2s;
}

.form-modal .btn {
  border-radius: 20px;
  border: none;
  font-weight: bold;
  font-size: 1.2em;
  padding: 0.8em 1em 0.8em 1em !important;
  transition: 0.5s;
  border: 1px solid #ebebeb;
  margin-bottom: 0.5em;
  margin-top: 0.5em;
}

.form-modal .login,
.form-modal .signup {
  background: #6f42c1;
  color: #fff;
}

.form-modal .login:hover,
.form-modal .signup:hover {
  background: #222;
}

.form-toggle {
  position: relative;
  width: 100%;
  height: auto;
}

.form-toggle button {
  width: 50%;
  float: left;
  padding: 1.5em;
  margin-bottom: 1.5em;
  border: none;
  transition: 0.2s;
  font-size: 1.1em;
  font-weight: bold;
  border-top-right-radius: 20px;
  border-top-left-radius: 20px;
}

.form-toggle button:nth-child(1) {
  border-bottom-right-radius: 20px;
}

.form-toggle button:nth-child(2) {
  border-bottom-left-radius: 20px;
}

#login-toggle {
  background: #6f42c1;
  color: #ffff;
}

.form-modal form {
  position: relative;
  width: 90%;
  height: auto;
  left: 50%;
  transform: translateX(-50%);
}

#login-form,
#signup-form {
  position: relative;
  width: 100%;
  height: auto;
  padding-bottom: 1em;
}

#signup-form {
  display: none;
}

#login-form button,
#signup-form button {
  width: 100%;
  margin-top: 0.5em;
  padding: 0.6em;
}

.form-modal input {
  position: relative;
  width: 100%;
  font-size: 1em;
  padding: 1.2em 1.7em 1.2em 1.7em;
  margin-top: 0.6em;
  margin-bottom: 0.6em;
  border-radius: 20px;
  border: none;
  background: #ebebeb;
  outline: none;
  font-weight: bold;
  transition: 0.4s;
}

.form-modal input:focus,
.form-modal input:active {
  transform: scaleX(1.02);
}

.form-modal input::-webkit-input-placeholder {
  color: #222;
}

.form-modal p {
  font-size: 16px;
  font-weight: bold;
}

.form-modal p a {
  color: #6f42c1;
  text-decoration: none;
  transition: 0.2s;
}

.form-modal p a:hover {
  color: #222;
}

.form-modal i {
  position: absolute;
  left: 10%;
  top: 50%;
  transform: translateX(-10%) translateY(-50%);
}

.fa-google {
  color: #dd4b39;
}

.fa-linkedin {
  color: #3b5998;
}

.fa-windows {
  color: #0072c6;
}

.-box-sd-effect:hover {
  box-shadow: 0 4px 8px hsla(210, 2%, 84%, 0.2);
}

@media only screen and (max-width: 500px) {
  .form-modal {
    width: 100%;
  }
}

@media only screen and (max-width: 400px) {
  i {
    display: none !important;
  }
}



/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}




        </style>
    </head>
    <body class="antialiased">
            @extends('layouts.app')

            <div class="form-modal">
    
    <div class="form-toggle">
        <button id="login-toggle" onclick="toggleLogin()">user log in</button>
        <button id="signup-toggle" onclick="toggleSignup()">user sign up</button>
    </div>

    <div id="login-form">
        <form id="form-login">
          @csrf
            <input type="email" name="username" placeholder="Enter email address"/>
            <input type="password" name="pwd" placeholder="Enter password"/>
            <button type="submit" class="btn login">login</button>
            <!-- <p><a href="javascript:void(0)">Forgotten account</a></p> -->
            <!-- <hr/>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign in with google</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign in with linkedin</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign in with microsoft</button> -->
        </form>
    </div>

    <div id="signup-form">
        <form id="form-register">
          @csrf
            <input type="text" placeholder="Enter your name" name="name"/>
            <input type="email" placeholder="Enter your e-mail address" name="email"/>
            <input type="password" placeholder="Enter a password" name="pwd" id="pwd"/>
            <input type="password" placeholder="Re-enter the password" name="repwd" id="re-pwd"/>

            <hr>

              <label>Show Password</label>
              <label class="switch" style="float: right;">
                <input type="checkbox" id="chk-pw-visible">
                <span class="slider round"></span>
              </label>



            <hr>

            <button type="submit" class="btn signup">create account</button>
            <p>Clicking <strong>create account</strong> means that you are agree to our <a href="javascript:void(0)">terms of services</a>.</p>
            <!-- <hr/>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-google fa-lg" aria-hidden="true"></i> sign up with google</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-linkedin fa-lg" aria-hidden="true"></i> sign up with linkedin</button>
            <button type="button" class="btn -box-sd-effect"> <i class="fa fa-windows fa-lg" aria-hidden="true"></i> sign up with microsoft</button> -->
        </form>
    </div>


    <a href="{{route('cpanel.login.view')}}" type="submit" class="btn signup" style="background-color:red;width: 90%;margin:20px;">Agency Login</a>

</div>




<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    
    
    <script>
      const img = new Image();
      img.src = '{{ asset('images/uploading.gif') }}';


    $(document).ready(function(){


        $('#chk-pw-visible').change(function(){
          var isChecked = $(this).is(':checked');
          if(isChecked){
            $('#pwd').attr('type', 'text');
            $('#re-pwd').attr('type', 'text');
          } else {
            $('#pwd').attr('type', 'password');
            $('#re-pwd').attr('type', 'password');
          }
        });



        $("#form-login").submit(function(e){
          e.preventDefault();


          var username = e.target.username.value;
          var pwd = e.target.pwd.value;
            

            if(username == '' || pwd == ''){
              Swal.fire({
                            title:"Warning!",
                            icon:'warning',
                            text:'Please enter valid e-mail address and password.'
                          });
            }else{

              var formData = new FormData(e.target);

          $.ajax({
            url:"{{route('user.login')}}",
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
                  location.href = "{{route('dashboard')}}";
               }else{
                Swal.fire({
                  icon: "warning",
                  title: "Warning!",
                  text:response.msg
                });
              }


            },error:function(xhr,status,error){
              console.log(error);
            }

          });


            }

            





          

          
        });

        

        $("#form-register").submit(function(e){
            e.preventDefault();


            var name = e.target.name.value;
            var email = e.target.email.value;
            var repwd = e.target.repwd.value;
            var pwd = e.target.pwd.value;

            if(name == '' || email == '' || pwd == '' || repwd == ''){
              Swal.fire({
                            title:"Warning!",
                            icon:'warning',
                            text:'Please fill all above fields.'
                          });
            }else if(pwd !== repwd){

              Swal.fire({
                            title:"Warning!",
                            icon:'warning',
                            text:'Failed to confirm the password, please check and try again.'
                          });



            }else{
              var formData = new FormData(e.target);

            

            $.ajax({
                url:"{{route('user.register')}}",
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
                            allowEscapeKey: false,
                          });
                },success:function(response){
                  
                    if(response.result){
                      Swal.fire({
                            title:"Success",
                            icon:'success',
                            text:response.msg
                          });
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
            }


            


        });
    });












function toggleSignup() {
  document.getElementById("login-toggle").style.backgroundColor = "#fff";
  document.getElementById("login-toggle").style.color = "#222";
  document.getElementById("signup-toggle").style.backgroundColor = "#6f42c1";
  document.getElementById("signup-toggle").style.color = "#fff";
  document.getElementById("login-form").style.display = "none";
  document.getElementById("signup-form").style.display = "block";
}

function toggleLogin() {
  document.getElementById("login-toggle").style.backgroundColor = "#6f42c1";
  document.getElementById("login-toggle").style.color = "#fff";
  document.getElementById("signup-toggle").style.backgroundColor = "#fff";
  document.getElementById("signup-toggle").style.color = "#222";
  document.getElementById("signup-form").style.display = "none";
  document.getElementById("login-form").style.display = "block";
}




    </script>
    </body>
</html>
