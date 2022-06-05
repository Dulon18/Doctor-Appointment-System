@extends('admin.home')
@section('content')
<div class="row">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Create Doctor</h4>
                    <!-- message Show start -->
                    @if($errors->any())
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif

              @if(session()->has('success'))
                <p class="alert alert-success">{{session()->get('success')}}</p>
              @endif
                <!-- message Show end -->
                <!-- form start -->
                    <form action="{{route('doctor.update',$doctor->id)}}" method="POST" class="forms-sample" enctype="multipart/form-data">
                   
                      @csrf
                      @method('put')
                      <div class="form-group">
                        <label for="exampleInputName1">Name</label>
                        <input name =name type="text" class="form-control"  value="{{$doctor->name}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Specility</label>
                        <input type="text" name="specility" class="form-control"  value="{{$doctor->specility}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Phone</label>
                        <input type="number" name="phone" class="form-control"  value="{{$doctor->phone}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Room</label>
                        <input type="text" name="room" class="form-control"  value="{{$doctor->room_number}}">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail3">Image Upload</label>
                        <input type="file" name="image" class="form-control" placeholder="Choose image">
                        <img style="border-radius: 4px;" width="200px;" src=" {{url('/storage/'.$doctor->image)}}" alt="product">
                      </div>

                      <button type="submit" class="btn btn-outline-info me-2">Save</button>
                      <a href="{{route('doctor.list')}}" type="button" class="btn btn-outline-danger">Back</a>
                    </form>
                  </div>
                </div>
              </div>
</div>
@endsection