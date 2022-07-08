@extends('template')

@section('content')
<div class="container">
   <div class="row">
        <div class="col-12 d-flex">
            <h6 class="" style="font-weight: 800;color:black;margin-top: 8px">User Management</h6>
            <div class="form-check" style="margin-top: 5px;margin-left:30px;">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1"  style="font-weight: 800;color:black;font-size:13px;">
                  Active Only
                </label>
            </div>   
            <div class="form-group ml-4">
                <input type="text" class="form-control shadow" id="name" placeholder="Enter Name">
            </div>
            <div class="form-group ml-2">
                <input type="text" class="form-control shadow" id="role" placeholder="Enter Role">
            </div>
            <div class="ml-4">
                <button type="button" class="btn btn-dark"><i class="fa-solid fa-magnifying-glass"></i>Search</button>
            </div>
        </div>
   </div>
   <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="mt-2 font-weight-bold text-primary float-left">User Table</h6>
                    <div class="m-0 float-right"><a href="{{route('users.create')}}" type="button" class="btn" style="background-color: #72F573">
                        <i class="fa-solid fa-circle-plus"></i>Add new user</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>User Name</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Nrc</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                                @foreach($users as $user)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->roles->pluck('name')[0]}}</td>
                                    <td>5/khaoota(n)091303</td>
                                    <td>
                                        <label class="switch my-auto">
                                            <input type="checkbox" @if($user->active_status==0) checked @endif>
                                            <span class="slider round"></span>
                                        </label>
                                        @if($user->active_status==0)
                                            <span class="my-auto">Active</span>
                                        @else
                                            <span class="my-auto">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{$user->address}}</td>
                                    <th>
                                        <a class="btn" href="{{route('users.edit',$user->id)}}"><i class="fa-solid fa-pen-to-square" style="color:#72F573"></i></a>
                                        <form action="{{ route('users.destroy',$user->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">

                                            @csrf
                                            @method('DELETE')
                                        <button class="btn" type="submit"><i class="fa-solid fa-trash" style="color:#72F573"></i></button>
                                        </form>
                                    </th>
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
@endsection
@section('script')

<script type="text/javascript">
  $(document).ready(function(){
    $('#myTable').dataTable({
                "bFilter": false,
                "bSort": false,
                language: {
                    oPaginate: {
                        sNext: '>',
                        sPrevious: '<',
                    }
                }
    });
  })
</script>
@endsection



                        