<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <title>HMS</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <link rel="stylesheet" href="{{url('frontend/assets/css/maicons.css')}}">
  <link rel="stylesheet" href="{{url('frontend/assets/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{url('frontend/assets/vendor/owl-carousel/css/owl.carousel.css')}}">
  <link rel="stylesheet" href="{{url('frontend/assets/vendor/animate/animate.css')}}">
  <link rel="stylesheet" href="{{url('frontend/assets/css/theme.css')}}">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +880 173 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@incare-health.com.bd</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Incare</span>-Health</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="about.html">About Us</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{route('doctor.all')}}">Doctors</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="blog.html">News</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            @if(Route::has('login'))
            @auth
            <li class="nav-item ">
              <a class="btn btn-primary ml-lg-3" href="{{route('myAppointment')}}"> My Appointment</a>
            </li>
            <x-app-layout></x-app-layout>
            @else
                <li class="nav-item">
                  <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login</a>
                </li>
           
                <li class="nav-item">
                  <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Registration</a>
                </li>
              @endauth
              @endif
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>

    <div class="page-banner overlay-dark bg-image" style="background-image: url(frontend/assets/img/bg_image_1.jpg);">
    <div class="banner-section">
      <div class="container text-center wow fadeInUp">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb breadcrumb-dark bg-transparent justify-content-center py-0 mb-2">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Appointment</li>
          </ol>
        </nav>
        <h1 class="font-weight-normal">My Appointment List</h1>
      </div> <!-- .container -->
    </div> <!-- .banner-section -->
  </div> <!-- .page-banner -->

  <div class="page-section bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="row">
        
          <table class="table">
            
  <thead>
  <h1 style="text-align:center; padding:20px; background-color:aquamarine">Your Appointment List</h1>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Doctor Name</th>
      <th scope="col">Message</th>
      <th scope="col">Phone</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach($appointments as $key=>$appoint)
    <tr>

      <th scope="row">{{$key+1}}</th>
      <td>{{$appoint->doctor_name}}</td>
      <td>{{$appoint->message}}</td>
      <td>{{$appoint->phone}}</td>
      <td>{{$appoint->date}}</td>
      <td>{{$appoint->status}}</td>
      <td>
          <a type="button" style=" background-color:red" class="btn btn-danger" href="{{route('cancleAppointment',$appoint->id)}}" onclick="return confirm('Are you sure to Delete??')" >Cancle</a>
      </td>
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
    
            
    
    
  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
            <li><a href="#">Join as Doctors</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Our partner</h5>
          <ul class="footer-menu">
            <li><a href="#">One-Fitness</a></li>
            <li><a href="#">One-Drugs</a></li>
            <li><a href="#">One-Live</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
          <a href="#" class="footer-link">healthcare@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="{{url('frontend/assets/js/jquery-3.5.1.min.js')}}"></script>

<script src="{{url('frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

<script src="{{url('frontend/assets/vendor/owl-carousel/js/owl.carousel.min.js')}}"></script>

<script src="{{url('frontend/assets/vendor/wow/wow.min.js')}}"></script>

<script src="{{url('frontend/assets/js/theme.js')}}"></script>
  
</body>
</html>