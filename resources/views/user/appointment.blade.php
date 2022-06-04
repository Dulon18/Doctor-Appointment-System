<div class="page-section">
    <div class="container">
      <h1 class="text-center wow fadeInUp">Make an Appointment</h1>
     
      <form class="main-form" action="{{route('appointment.store')}}" method="POST">
        @csrf
        <div class="row mt-5 ">
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
            <input type="text" class="form-control" name="name" placeholder="Full name">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight">
            <input name="email" type="text" class="form-control" placeholder="Email address..">
          </div>
          
          <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
            <input type="date" name="date" class="form-control">
          </div>
          <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
            <select name="doctor_name" id="departement" class="custom-select">
              <option value="">Select Doctor</option>
              @foreach($doctors as $doctor)
              <option value="{{$doctor->name}}">{{$doctor->name}} - {{$doctor->specility}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <input name="phone" type="number" class="form-control" placeholder="Number..">
          </div>
          <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
            <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message.."></textarea>
          </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3">Submit Request</button>
      </form>
  
    </div>
  </div>