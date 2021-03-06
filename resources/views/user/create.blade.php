@extends('template')

@section('content')
<div class="container">
      <div class="d-flex justify-content-between">
        <h6 style="font-weight: bold;color:black">User Management</h6>
        <a href="{{ route('users.index') }}" class="btn btn-sm btn-dark"><i class="fa-solid fa-arrow-left-long"></i> back</a>
      </div>
      <div class="card mx-auto mb-5 mt-3">
        <div class="row ml-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <form method="POST" action="{{route('users.store')}}">
              @csrf
              <div class="fg-if-width">
                <!-- User Name -->
                <span class="s-blk form-title m-t-1-1 m-b-0-8">Add a new User</span>
                <div class="form-group">
                  <label for="username">User name</label>
                  <input
                    type="text"
                    class="form-control py-3 bdr-gray br-8p fc-21"
                    id="username"
                    name="name"
                    value="{{ old('name') }}"
                  />
                  <div class="form-control-feedback text-danger"> {{$errors->first('name') }} </div>
                </div>
              </div>
              <div class="fg-if-width">
                <!-- Mobile's number -->
                <div class="form-group">
                  <label for="phonenumber">Mobile number</label>
                  <input
                    type="number"
                    class="form-control py-3 bdr-gray br-8p fc-21"
                    id="phonenumber"
                    name="phone_number"
                    value="{{ old('phone_number') }}"
                    placeholder="09*********"
                  />
                  <div class="form-control-feedback text-danger"> {{$errors->first('phone_number') }} </div>
                </div>
              </div>
              <div>
                <!-- Passcode -->
                <div class="form-group">
                  <label for="passcode" style="color: #212121">Passcode</label>
                  <div class="flx-h50-c-center">
  
                    <div class="input-group fg-if-width mr-3">
                      <input
                        class="form-control py-3 bdr-gray br-8p fc-21"
                        type="password"
                        id="passcode"
                        name="password"
                      />
                      <div class="input-group-append">
                        <span class="input-group-text btn_eye">
                          <i class="fas fa-eye" id="show_eye"></i>
                          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                        </span>
                      </div>
                    </div>

                    <a class="btn btn-green-2 btn_generate">Generate</a>
                  </div>
                  <div class="form-control-feedback text-danger"> {{$errors->first('password') }} </div>
                </div>
              </div>
              <div class="fg-if-width">
                <!-- User Role -->
                <div class="form-group pos-r">
                  <label for="userrole">User Role</label>
                  <select
                    class="form-control hgt-2-375-rem bdr-gray br-8p selectpicker fc-21"
                    id="userrole"
                    name="role"
                  >
                    <option selected value="">Select the role of the user</option>
                    <option value="1" {{old ('role') == 1 ? 'selected' : ''}}>Admin</option>
                    <option value="2" {{old ('role') == 2 ? 'selected' : ''}}>Supervisor</option>
                    <option value="3" {{old ('role') == 3 ? 'selected' : ''}}>Staff</option>
                    <option value="4" {{old ('role') == 4 ? 'selected' : ''}}>Shop Agent</option>
                  </select>
                  <i class="fa fa-chevron-down"></i>
                </div>
                <div class="form-control-feedback text-danger"> {{$errors->first('role') }} </div>
              </div>
              <div class="fg-if-width staff-code d-none">
                <!-- Staff/Agent Code -->
                <div class="form-group">
                  <label for="code">Staff/Agent Code</label>
                  <input
                    type="text"
                    class="form-control py-3 bdr-gray br-8p fc-21 codebyrole"
                    id="code"
                    name="code"
                    value="{{ old('code') }}"
                  />
                  <div class="form-control-feedback text-danger"> {{$errors->first('code') }} </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 mb-3 mt-sm-0">
              <div class="fg-if-width m-t-4-1rem">
                <!-- Full Address -->
                <div class="form-group">
                  <label for="fulladdress">Full Address</label>
                  <textarea
                    class="form-control bdr-gray br-8p fc-21"
                    id="fulladdress"
                    rows="4"
                    name="address"
                    required
                  >{{ old('address') }}</textarea>
                  <div class="form-control-feedback text-danger"> {{$errors->first('address') }} </div>
                </div>
              </div>
              <div class="fg-if-width m-t-1-8">
                <!-- User Status -->
                <div class="form-group pos-r">
                  <label for="userstatus">User Status</label>
                  <select
                    class="form-control hgt-2-375-rem bdr-gray br-8p selectpicker fc-21"
                    id="userstatus" name="active_status"
                  >
                    <option selected value="">Select the status of the user</option>
                    <option value="1" {{old ('active_status') == 1 ? 'selected' : ''}}>Active</option>
                    <option value="2" {{old ('active_status') == 2 ? 'selected' : ''}}>Inactive</option>
                  </select>
                  <i class="fa fa-chevron-down"></i>
                </div>
                <div class="form-control-feedback text-danger"> {{$errors->first('active_status') }} </div>
              </div>
              <div class="fg-if-width m-t-1-8">
                <!-- NRC -->
                <div class="form-group">
                  <label for="nrc"
                    >NRC
                    <div class="font-fade">(*Optional)</div></label
                  >
                  <input
                    type="text"
                    class="form-control py-3 bdr-gray br-8p fc-21"
                    id="nrc"
                    name="nrc"
                    value="{{ old('nrc') }}"
                  />
                  <div class="form-control-feedback text-danger"> {{$errors->first('nrc') }} </div>
                </div>
              </div>
              <div class="fg-if-width flx m-t-1-5">
                <button class="btn create-btn-div" type="submit" >
                  <img class="create-btn-img" src="{{asset('template/img/create-btn-icon.svg')}}" />
                  <span class="create-txt">Create</span>
                </button>
              </div>
            </form>
            </div>
        </div>

      </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function() {
      $(".staff-code").hide();

      if($("#userrole").val()==3 || $("#userrole").val()==4){
        $(".staff-code").removeClass("d-none");      
        $(".staff-code").show();
      }
      
      $("#userrole").change(function(){
        let role = $(this).val();
        if(role==3 || role==4){
          $(".staff-code").removeClass("d-none");      
          $(".staff-code").show();
        }else{
          $(".codebyrole").val(null);
          $(".staff-code").addClass("d-none");
          $(".staff-code").hide();
        }
      })

      $(".btn_generate").click(function(){
        var number = Math.floor(100000 + Math.random() * 900000);
        $("#passcode").val(number);
      })

      $(".btn_eye").click(function(){
        var x = document.getElementById("passcode"); 
        var show_eye = document.getElementById("show_eye"); 
        var hide_eye = document.getElementById("hide_eye"); 
        hide_eye.classList.remove("d-none");
        if (x.type === "password") { 
          x.type = "text";
          show_eye.style.display = "none"; 
          hide_eye.style.display = "block";
         } else { 
          x.type = "password"; 
          show_eye.style.display = "block";
          hide_eye.style.display = "none"; 
        } 
      })
    })
</script>
@endsection
                       