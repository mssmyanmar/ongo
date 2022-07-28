@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h6 class="um-title">User Management</h6>
            <div class="form-check">
                <input class="form-check-input active_only" type="checkbox" id="active_only" value="active">
                <label class="form-check-label active-or-not" for="defaultCheck1">
                    Active Only
                </label>
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="form-group ml-4 mb-0">
                    <input type="text" class="form-control shadow userName" id="name" placeholder="Enter Name">
                </div>
                <div class="form-group ml-2 mb-0">
                    <select class="form-control shadow userType">
                        <option value="">Choose Role</option>
                    @foreach($roles as $row)
                        <option value="{{$row->id}}">{{$row->name}}</option>
                    @endforeach
                    </select>
                </div>
                <div class="ml-4">
                    <a  class="btn btn-dark px-3 btn_search"><i class="fa-solid fa-magnifying-glass mr-2"></i>Search</a>
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
                                    <td>{{$user->nrc}}</td>
                                    <td>
                                        <div class="t-flex-center">
                                            <label class="switch my-auto">
                                                <input type="checkbox" disabled="disabled" class="btn_status" @if($user->active_status==1) checked @endif>
                                                <span class="slider round"></span>
                                            </label>
                                            @if($user->active_status==1)
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
                                                <button class="btn" type="submit"><i class="fa-solid fa-trash trash-icon-red"></i></button>
                                            </form>
                                        </div>
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

        $('.btn_search').click(function() {
            var checkVal;
            $('.active_only:checked').each(function(i){
                checkVal = $(this).val();
            }); 
            var userName = $(".userName").val();
            var userType = $(".userType").val();
            var table = $('#myTable').DataTable();
                table.destroy();
                $('#myTable').dataTable({
                    "pageLength": 10,
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        [10, 25, 50, 100],
                    ],
                    language: {
                        oPaginate: {
                            sNext: '>',
                            sPrevious: '<',
                        }
                    },
                    "bPaginate": true,
                    "bLengthChange": true,
                    "bFilter": false,
                    "bSort": false,
                    "bInfo": true,
                    "bAutoWidth": true,
                    "bStateSave": true,
                    "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [-1]
                    }, ],
                    "bserverSide": true,
                    "bprocessing": true,
                    "ajax": {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "{{ route('serachUser') }}",
                        type: 'POST',
                        dataType: 'json',
                        data:{
                          "checkVal" : checkVal,
                          "userName" : userName,
                          "userType" : userType,
                        },
                        global: false,
                        async: true,
                    },
                    "columns": [{
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.DT_RowIndex;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.name
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.phone_number
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.role_name
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.nrc
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                if(data.active_status==1){
                                    return `<div class="t-flex-center">
                                                <label class="switch my-auto">
                                                    <input type="checkbox" class="btn_status" disabled="disabled" checked>
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="my-auto">Active</span>
                                            </div>`  
                                }else{
                                    return `<div class="t-flex-center">
                                                <label class="switch my-auto">
                                                    <input type="checkbox" class="btn_status" disabled="disabled">
                                                    <span class="slider round"></span>
                                                </label>
                                                <span class="my-auto">Inactive</span>
                                            </div>`
                                }          
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.address
                            }
                        },
                        {
                        "data":null,
                        render:function(data, type, full, meta){
                            var userdelete="{{route('users.destroy',":id")}}"
                            userdelete=userdelete.replace(':id',data.id);
                            var userediturl="{{route('users.edit',":id")}}"
                            userediturl=userediturl.replace(':id',data.id);
                            return `
                            <div class="t-flex-center">
                            <a href="${userediturl}" class="btn"><i class="fa-solid fa-pen-to-square" style="color:#72F573"></i></a>
                            <form action="${userdelete}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn" type="submit"><i class="fa-solid fa-trash trash-icon-red"></i></button>
                            </form>
                            </div>`
                        }
                        }
                    ],
                    "info": true
                });
        });
    })
    $.fn.dataTable.ext.classes.sPageButton = 'pagi-btn-green';
</script>
@endsection