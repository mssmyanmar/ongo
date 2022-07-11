@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h6 class="um-title">User Management</h6>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label active-or-not" for="defaultCheck1">
                    Active Only
                </label>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-group ml-4 mb-0">
                    <input type="text" class="form-control shadow" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group ml-2 mb-0">
                    <input type="text" class="form-control shadow" id="role" placeholder="Enter Role">
                </div>
                <div class="ml-4">
                    <button type="button" class="btn btn-dark px-3"><i class="fa-solid fa-magnifying-glass mr-2"></i>Search</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex align-items-center justify-content-between">
                    <h6 class="mt-2 font-weight-bold float-left ut-title">User Table</h6>
                    <div><a href="{{route('users.create')}}" type="button" class="btn" style="background-color: #72F573">
                            <i class="fa-solid fa-circle-plus txt-white mr-3"></i><span class="txt-white">Add new user</span></a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered v-center-th-td" id="myTable" width="100%" cellspacing="0">
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
                                        <div class="t-flex-center">
                                            <label class="switch my-auto">
                                                <input type="checkbox" @if($user->active_status==0) checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                            @if($user->active_status==0)
                                            <span class="my-auto">Active</span>
                                            @else
                                            <span class="my-auto">Inactive</span>
                                            @endif
                                        </div>
                                    </td>
                                    <td>{{$user->address}}</td>
                                    <th>
                                        <div class="t-flex-center">

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
    $(document).ready(function() {
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