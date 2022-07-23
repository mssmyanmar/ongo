@extends('template')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex">
            <h6 class="um-title">Reports Management/</h6><span class="mt-1 spanMessage">User Reports</span>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-12">
            <ul class="nav nav-pills">
                <li class="nav-item active">
                  <a class="nav-link active btnUser" data-toggle="pill" href="#userReport">User Reports</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link btnTransaction" data-toggle="pill" href="#transaction">Transaction Reports</a>
                </li>
              </ul>

              <div class="tab-content">
                <div id="userReport" class="tab-pane active">
                    <div class="d-flex mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="icrc" class="icrc">
                            <label class="form-check-label active-or-not" for="icrc">
                               ICRC
                            </label>
                        </div>
                        <div class="form-check ml-5">
                            <input class="form-check-input" type="checkbox" id="lolc" class="lolc">
                            <label class="form-check-label active-or-not" for="lolc">
                                LOLC
                            </label>
                        </div>
                  </div>
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
                <div id="transaction" class="tab-pane">
                  <div class="d-flex mt-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="icrc" class="icrc">
                            <label class="form-check-label active-or-not" for="icrc">
                               ICRC
                            </label>
                        </div>
                        <div class="form-check ml-5">
                            <input class="form-check-input" type="checkbox" id="lolc" class="lolc">
                            <label class="form-check-label active-or-not" for="lolc">
                                LOLC
                            </label>
                        </div>

                  </div>
                  <div class="table-responsive mt-3">
                    <table class="table table-bordered v-center-th-td" id="transactionTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Unique Pin</th>
                                <th>Client Name</th>
                                <th>Staff</th>
                                <th>Amount</th>
                                <th>Branch</th>
                                <th>Loan ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $row)
                                <tr>
                                    <td>{{Carbon\Carbon::parse($row->collected_date)->format('Y-m-d')}}</td>
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
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {

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
            $(".spanMessage").html("User Reports");
        })
        $(".btnTransaction").click(function(){
            $(".spanMessage").html("Transactions Reports");
        })

    })
</script>
@endsection