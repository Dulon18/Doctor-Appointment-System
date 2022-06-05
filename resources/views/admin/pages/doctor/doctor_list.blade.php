@extends('admin.home')
@section('content')
<div class="row">
              <div class="col-12 grid-margin">
                
              @if(session()->has('success'))
                <p class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  {{session()->get('success')}}</p>
              @endif
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Doctor List </h4>
                    <a href="{{route('doctor.add')}}" class="btn btn-outline-primary m-2 fs-5"> +  Add
                    </a>
                    <hr>
                    
                    <div class="table-responsive">
                      <table class="table">
                        <thead>

                          <tr>
                            <th>No.</th>
                            <th> Doctor Name </th>
                            <th> Specility </th>
                            <th> Room </th>
                            <th> Image </th>
                            <th> Status</th>
                            <th> Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($doctors as $key=>$doctor)
                          <tr>
                            <td>{{$key+1}}</td>
                            <td>
                            {{$doctor->name}}
                            </td>
                            <td> {{$doctor->specility}} </td>
                            <td>
                            {{$doctor->room_number}}   
                            </td>
                            <td>
                              <img src="{{url('/storage/'.$doctor->image)}}" alt="Image not found">
                  
                            </td>
                            <td>
                            @if($doctor->status==1)
                  
                                <a href="{{route('doctor.status',$doctor->id)}}" onclick="return confirm('Are you sure???')" class="btn btn-success">Active</a>
                        
                            @else
                              <a href="{{route('doctor.status',$doctor->id)}}" class="btn btn-danger">Inactive</a>
                            @endif
                            </td>
                            <td>
                              <a type="button" href="{{route('doctor.edit',$doctor->id)}}" class="btn btn-outline-info">Edit</a>
                              <a type="button" href="{{route('deleteDoctor',$doctor->id)}}" class="btn btn-outline-danger">Delete</a>
                              <a type="button" href="{{route('viewDoctor',$doctor->id)}}" class="btn btn-outline-primary">View</a>
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
@endsection