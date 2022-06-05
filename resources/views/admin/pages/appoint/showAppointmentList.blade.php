@extends('admin.home')
@section('content')
<div class="row">
<div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title" style="text-align:center; background-color: purple; color:aliceblue;padding:20px">AppointMents List</h4>
                    <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Patient Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Doctor Name</th>
                                <th scope="col">Date</th>
                                <th scope="col">Message</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appoints as $key=>$appoint)
                                <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$appoint->name}}</td>
                                <td>{{$appoint->email}}</td>
                                <td>{{$appoint->doctor_name}}</td>
                                <td>{{$appoint->date}}</td>
                                <td>{{$appoint->message}}tto</td>
                                <td>{{$appoint->status}}</td>
                                <td>
                                    <a type="button" class="btn btn-success" style="color: black;"  href="{{route('approvedStatus',$appoint->id)}}">Approved</a>
                                    <a type="button" class="btn btn-danger" style="color: black;" href="{{route('cancledStatus',$appoint->id)}}">Cancled</a>
                                </td>
                                </tr>
                          @endforeach
                            </tbody>
                            </table>
                  </div>
                </div>
</div>
</div>
@endsection