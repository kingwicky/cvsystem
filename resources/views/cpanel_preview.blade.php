<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Cpanel - Preview & Download</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">


    <style>

* {
  font-family: "Lato", sans-serif;
}

/* -------- HEADER -------- */
/*--------------------------*/

.container.header {
  margin-top: 20px;
  /*   display: flex; */
  /*   justify-content: center; */
  /*  apparently Codepen does not support display flex, on original project it works perfectly. Therefore, there will be some imperfections  */
}

.photo {
  z-index: 1;
  margin-right: -13%;
}

img.perfil-photo {
  width: 200px;
  height:200px;
  border-radius: 50%;
  border: 10px solid #fff;
}

.title-name {
  background-color: #eee;
  height: 210px;
  width: auto;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  padding: 0 2em 0 8em;
}

.title-name h1 {
  font-family: "Lobster", cursive;
  font-size: 4em;
  letter-spacing: 0.02em;
}

.title-name h3 {
  color: #ff6c00;
  letter-spacing: 0.05em;
  margin-top: 0;
}

/* -------- GENERAL CONTENT -------- */
/*--------------------------*/

.container.content {
  margin-top: 5px;
}

i.fa {
  color: #ff6c00;
  font-size: 25px;
  line-height: 120%;
  vertical-align: middle;
  margin-top: -4px;
}

/* -------- EXPERIENCE CONTENT -------- */
/*--------------------------*/

.table.experience td {
  padding: 20px;
}

td.year {
  font-size: 12px;
}

/* -------- RIGHT SIDEBAR -------- */
/*--------------------------*/

.side-info {
  border-left: 1px solid #eee;
}

.contact,
.skills,
.about {
  margin-left: 10px;
}

.skills ul {
  list-style-type: none;
  margin: 5px 0 0 0;
  padding-left: 0;
}

.skills ul li {
  margin-bottom: 3px;
}

#level .fa {
  font-size: 14px;
  margin-right: 2px;
}

#development {
  border-right: 2px solid #eee;
}

.about > p {
  line-height: 1.5;
}

/* -------- FOOTER -------- */
/*--------------------------*/
.row.footer {
  margin-top: 10px;
}

.footer p {
  font-size: 14px;
}

/*-------- MEDIA QUERIES-------- */
/*------- as a small project, I've decided to add with the style.css ---------*/

@media only screen and (max-width: 1200px) {
  .title-name h1 {
    font-size: 3.2em;
    padding-left: 0.5em;
  }
}

@media only screen and (max-width: 991px) {
  .container.header .row {
    display: flex;
    flex-direction: column;
    text-align: center;
  }

  .photo {
    margin-right: 0;
  }

  img.perfil-photo {
    width: 205px;
    border: 10px solid #eee;
    margin-bottom: 1em;
  }

  .title-name {
    height: 140px;
    padding: 0 2em;
  }

  .title-name h1 {
    font-size: 3.2em;
  }
}

@media only screen and (max-width: 497px) {
  .photo {
    max-width: 319px;
  }

  img.perfil-photo {
    width: 150px;
  }

  .title-name h1 {
    font-size: 2em;
    padding-left: 0;
  }

  .title-name h3 {
    font-size: 1.2em;
  }

  .title-name {
    height: 110px;
  }
}

.print-divider{
  display:none;
}

@media print{
    #print-area{
        display:none!important;
    }

    .photo{
      display: flex;
      justify-content: center;
      align-items: center;
      margin-bottom:-50px;
    
    }

    .side-info{
      border: none!important;
    }

    .print-divider{
      display: block!important;
    }

}


    </style>



</head>
<body>

<!-- -------------------- -->


<html>
  
  <body>

  @if(!empty($info))


    <!--  ******* HEADER ******* -->
    <div class="container header">
      <div class="row">
        <div class="photo col-md-3 col-sm-12" id="image-area">

        @php
        $profileImageLink = 'images/profile.png';
        if($info->profile_image != 'N/A'){
          $profileImageLink = 'storage/'.$info->profile_image;
        }


      @endphp

          <img class="perfil-photo" src='{{url("$profileImageLink")}}' alt='{{$info->fname." ".$info->lname}}' />


        </div>
        <div class="title-name col-md-8 col-sm-12">
          <h1>{{$info->fname." ".$info->lname}}</h1>
          <h3>{{$info->title}}</h3>
        </div>
      </div>
    </div>

     


    <!-- ******* EXPERIENCE CONTENT******* -->
    <div class="container content">
      <div class="row">
        <div class="col-md-6 col-md-offset-1">
          <h2><i class="fa fa-suitcase" aria-hidden="true"></i> Experience</h2>
          <table class="table experience">
            <th>Job</th>
            <th>Year</th>



            @if(!empty($info->experiences))

                  @foreach($info->experiences as $exp)

                  <tr>
                    <td>{{$exp->position." at ".$exp->company}} <br>
                      
                    </td>
                    <td class="year">{{$exp->duration}}</td>
                  </tr>

                  @endforeach


            @endif


            
           
           
          </table>

          <hr>

          <!-- EXPERIENCE -->

          <!-- EDUCATION CONTENT -->


          <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> Education</h2>

          @if(!empty($info->educations))


            @foreach($info->educations as $edu)
            
            

            <p><strong>{{$edu->qualification." in ".$edu->field." at ".$edu->school}} </strong><br> {{$edu->status}} – {{$edu->year}}</p>
                

            @endforeach


            @endif


          
          

          <!-- EDUCATION -->



        </div>


        <hr class="print-divider">

        <!-- ******* RIGHT SIDE BAR INFO ******* -->
        <div class="col-md-4 side-info">
          <div class="contact">
            <h2><i class="fa fa-home" aria-hidden="true"></i> Contact</h2>
            <p class="contact">{{$info->address1." ".$info->address2." ".$info->state}}<br>
              Contact: +{{$info->country_code."".$info->mobile}}<br>
              E-mail: {{$info->email}}<br>
              {{$info->country}}
            </p>
          </div>

          <hr class="print-divider">

          <div class="skills">
            <h2><i class="fa fa-wrench" aria-hidden="true"></i> Skills</h2>
            <h3>Languages</h3>


            
              @if(!empty($info->languages))


                @foreach($info->languages as $lng)

              


                 <!-- LANGUAGE -->
                <div class="row">


                  <div class="col-md-5 col-xs-6">
                    <ul>


                      <li>{{$lng->language}}</li>
                      
                    </ul>
                  </div>
                  <div class="col-md-7 col-xs-6">
                    <ul id="level">
                      <li>
                        {{$lng->level}}
                      </li>
                    
                    </ul>
                  </div>
                </div>



<!-- LANGUAGE -->

                  

                @endforeach


              @endif

           

            <!-- <h3>Development</h3>
            <div class="row">
              <div class="col-md-5 col-xs-6" id="development">
                <ul>
                  <li>HTML</li>
                  <li>CSS3</li>
                  <li>Bootstrap</li>
                  <li>Git / Github</li>
                </ul>
              </div>
              <div class="col-md-7 col-xs-6">
                <ul>
                  <li>JavaScript</li>
                  <li>jQuery</li>
                  <li>SASS</li>
                  <li>Wordpress</li>
                </ul>
              </div>
            </div> -->


            <hr>

            <div class="about">
              <h2><i class="fa fa-user" aria-hidden="true"></i> About Me</h2>
              <p>{{$info->summary}}</p>
            </div>

            <hr class="print-divider">

          </div>
        </div>
      </div>

      <div class="row footer">
        <div class="col-md-11">


           <!-- button download PDF -->
            <div class="text-center" id="print-area">
              <a href="javascript:void(0);" title="Print & Donwload CV" class="btn btn-default btn-lg" onclick="window.print()">
                <i class="fa fa-download"></i>&nbsp; Print & Download CV
              </a>
            </div>
            <!--/ button download PDF -->

          <!-- <blockquote class="blockquote-reverse">
            <p>Far from what I once was but not yet what I'm going to be.</p>
            <footer>Unknown</footer>
          </blockquote> -->
        </div>
      </div>


      
    </div>
  

   

  @endif

 
<!-- ---------------------- -->
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>    






</body>
</html>