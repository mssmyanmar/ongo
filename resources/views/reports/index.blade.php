@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex">
            <h6 class="um-title">Reports Management / </h6><span class="mt-1 spanMessage">&nbsp;User Reports</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <ul class="nav nav-pills">
                <li class="nav-item active">
                  <a class="nav-link active btnUser report-btn-width" data-toggle="pill" href="#userReport" style="color:white">
                    User Reports
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btnTransaction report-btn-width" data-toggle="pill" href="#transaction" style="color:black;font-weight:bold">
                    Transaction Reports
                  </a>
                </li>
              </ul>

              <div class="tab-content">
                <div id="userReport" class="tab-pane active">
                    <div class="mt-3"> 
                        <div class="form-check-label active-or-not in-blk">Choose App User Type:</div>
                        <div class="in-blk">
                            <select class="form-control shadow userType ch-p">
                                <option>Choose Type</option>
                                <option value="all">ALLL</option>
                                <option value="staff">Staff</option>
                                <option value="agent">Agent</option>
                            </select>
                        </div>  
                    </div>
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-body">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered v-center-th-td" id="userTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Staff/Agent Name</th>
                                            <th>Staff/Agent ID</th>
                                            <th>Type</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no=1; @endphp
                                        @foreach($users as $row)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>{{$row->code}}D</td>
                                                <td>{{$row->roles->pluck('name')[0]}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="transaction" class="tab-pane">
                    <div class="d-flex mt-3 justify-content-between">
                        {{-- <div class="d-flex"> --}}
                            <div class="form-check">
                                <input class="form-check-input tranBox mt-2" type="checkbox" id="icrc" value="1">
                                <label class="form-check-label active-or-not mt-1" for="icrc">
                                ICRC
                                </label>
                            </div>
                            <div class="form-check ml-3">
                                <input class="form-check-input tranBox mt-2" type="checkbox" id="lolc" value="2">
                                <label class="form-check-label active-or-not mt-1" for="lolc">
                                    LOLC
                                </label>
                            </div>
                        {{-- </div> --}}

                        {{-- <div class="d-flex"> --}}
                            <div class="form-group ml-3">
                                <p class="form-check-label active-or-not">Start Date: <input type="text" id="startDate" class="date-w"></p>
                            </div>
                            <div class="form-group ml-3">
                                <p class="form-check-label active-or-not">End Date: <input type="text" id="endDate" class="date-w"></p>
                            </div>
                        {{-- </div> --}}

                        <div>
                            <button class="btn btn-primary btn-search">Search</button>
                        </div>
                    </div>
                    <div class="card shadow mb-4 mt-3">
                        <div class="card-body">
                            <div class="table-responsive mt-3">
                                <table class="table table-bordered v-center-th-td" id="transactionTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th style="width: 60px;">Date</th>
                                            <th>Time</th>
                                            <th>Unique Pin</th>
                                            <th style="width: 60px;">Client Name</th>
                                            <th>Staff</th>
                                            <th>Amount</th>
                                            <th>Branch</th>
                                            <th>Loan ID</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($transactions as $row)
                                            <tr>
                                                <td>{{Carbon\Carbon::parse($row->collected_date)->format('d-m-Y')}}</td>
                                                <td>{{Carbon\Carbon::parse($row->collected_date)->timezone('Asia/Yangon')->format('h:i A');}}</td>
                                                <td>{{$row->merchant_id}}</td>
                                                <td>{{$row->company_name}}</td>
                                                <td>{{$row->staff_name }}</td>
                                                <td>{{$row->amount}}</td>
                                                @if($row->branch_name)
                                                    <td>{{$row->branch_name}}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
                                                @if($row->loan_id)
                                                    <td>{{$row->loan_id}}</td>
                                                @else
                                                    <td>-</td>
                                                @endif
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
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        $("#startDate").datepicker({ dateFormat: 'dd-mm-yy' });
        $("#endDate").datepicker({ dateFormat: 'dd-mm-yy' });

        $('#userTable').dataTable({
            "bFilter": false,
            "bSort": false,
            language: {
                oPaginate: {
                    sNext: '>',
                    sPrevious: '<',
                }
            }
        });

        $('#transactionTable').dataTable({
            "bFilter": false,
            "bSort": false,
            language: {
                oPaginate: {
                    sNext: '>',
                    sPrevious: '<',
                }
            }
        });

        $(".btnUser").click(function(){
            $(".spanMessage").html("&nbsp;User Reports");
            $(this).css({"color": "white"});
            $(".btnTransaction").css({"color":"black","font-weight":"bold"});
        })
        $(".btnTransaction").click(function(){
            $(".spanMessage").html("&nbsp;Transactions Reports");
            $(this).css({"color": "white"});
            $(".btnUser").css({"color":"black","font-weight":"bold"});
        })

        $(".btn-search").click(function(){
            var checkVal = [];
            $('.tranBox:checked').each(function(i){
                checkVal[i] = $(this).val();
            });
            var startDate = $("#startDate").val();
            var endDate   = $("#endDate").val();
            var table = $('#transactionTable').DataTable();
            table.destroy();
            $('#transactionTable').dataTable({
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
                    "bAutoWidth": false,
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
                        url: "{{ route('searchTransaction') }}",
                        type: 'POST',
                        dataType: 'json',
                        data:{
                          "checkVal" : checkVal,
                          "startDate": startDate,
                          "endDate"  : endDate,
                        },
                        global: false,
                        async: true,
                    },
                    "columns": [
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                const d = new Date(data.collected_date);
                                return  changeDate(d.toLocaleDateString());
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                const d = new Date(data.collected_date);
                                return formatAMPM(d);
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.merchant_id;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.company_name;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.staff_name;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.amount;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                if(data.branch_name){
                                    return data.branch_name
                                }else{
                                    return "-"
                                }
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                if(data.loan_id){
                                    return data.loan_id
                                }else{
                                    return "-"
                                }
                            }
                        },
                    ],
                    "info": true
                });
        })

        function changeDate(date){
           var dateArray = date.split("/");
           return `${dateArray[1]}-0${dateArray[0]}-${dateArray[2]}`
        }

        function formatAMPM(date) {
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // the hour '0' should be '12'
            minutes = minutes < 10 ? '0'+minutes : minutes;
            var strTime = hours + ':' + minutes + ' ' + ampm;
            return strTime;
        }

        $(".userType").change(function(){
            var userType = $(this).val();
            var table = $('#userTable').DataTable();
            table.destroy();
            $('#userTable').dataTable({
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
                    "bAutoWidth": false,
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
                        url: "{{ route('userType') }}",
                        type: 'POST',
                        dataType: 'json',
                        data:{
                          "userType" : userType,
                        },
                        global: false,
                        async: true,
                    },
                    "columns": [
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {;
                                return  data.DT_RowIndex;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.name;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.code;
                            }
                        },
                        {
                            "data": null,
                            render: function(data, type, full, meta, row) {
                                return data.role_name;
                            }
                        },
                    ],
                    "info": true
                });
        })
    })
    $.fn.dataTable.ext.classes.sPageButton = 'pagi-btn-green';
</script>
@endsection