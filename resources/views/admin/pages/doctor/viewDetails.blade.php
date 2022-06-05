@extends('admin.home')
@section('content')
<div class="row">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Doctor Details</h4>
                    <img width="200px;" src=" {{url('/storage/'.$doctor->image)}}" alt="product">
                    <br>
                    <p>Name : {{$doctor->name}}</p>
                    <p>Specility : {{$doctor->specility}}</p>
                    <p>Room : {{$doctor->room_number}}</p>
                    <br>
                    <a href="{{route('doctor.list')}}" type="button" class="btn btn-outline-danger">Back</a>
                  </div>
                </div>
</div>
</div>
@endsection