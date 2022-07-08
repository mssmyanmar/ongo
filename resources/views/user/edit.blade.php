@extends('template')

@section('content')
<div class="container">
      <h6 style="font-weight: bold;color:black">User Management</h6>
      <div class="card mx-auto mb-5 mt-3">
        <div class="row ml-3">
            <div class="col-lg-6 col-md-6 col-sm-12">
              <form method="POST" action="{{route('users.update',$user->id)}}">
              @csrf
              @method('PUT')
              <div class="fg-if-width">
                <!-- User Name -->
                <span class="s-blk form-title m-t-1-1 m-b-0-8">Edit User Info</span>
                <div class="form-group">
                  <label for="username">User name</label>
                  <input
                    type="text"
                    class="form-control py-3 bdr-gray br-8p fc-21"
                    id="username"
                    name="name"
                    value="{{$user->name}}"
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
                    value="{{$user->phone_number}}"
                  />
                  <div class="form-control-feedback text-danger"> {{$errors->first('phone_number') }} </div>
                </div>
              </div>
              <div>
                <!-- Passcode -->
                <div class="form-group">
                  <label for="passcode" style="color: #212121">Passcode</label>
                  <div class="flx-h50-c-center">
                    <input
                      class="form-control fg-if-width mr-3 py-3 bdr-gray br-8p fc-21"
                      type="text"
                      id="passcode"
                      name="password"
                      value="{{$user->password}}"
                    />
                    <button type="submit" class="btn-green-2">Generate</button>
                  </div>
                  <div class="form-control-feedback text-danger"> {{$errors->first('password') }} </div>
                </div>
              </div>
              <div class="fg-if-width">
                <!-- User Role -->
                {{$user->roles->pluck('id')[0]}}
                <div class="form-group pos-r">
                  <label for="userrole">User Role</label>
                  <select
                    class="form-control hgt-2-375-rem bdr-gray br-8p selectpicker fc-21"
                    id="userrole"
                    name="role"
                  >
                    <option selected value="">Select the role of the user</option>
                    <option value="1" @if($user->roles->pluck('id')[0]==1) selected @endif>Admin</option>
                    <option value="2" @if($user->roles->pluck('id')[0]==2) selected @endif>Supervisor</option>
                    <option value="3" @if($user->roles->pluck('id')[0]==3) selected @endif>Staff</option>
                    <option value="4" @if($user->roles->pluck('id')[0]==4) selected @endif>Shop Agent</option>
                    <option value="5" @if($user->roles->pluck('id')[0]==5) selected @endif>Office Staff</option>
                  </select>
                  <i class="fa fa-chevron-down"></i>
                </div>
                <div class="form-control-feedback text-danger"> {{$errors->first('role') }} </div>
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
                    value="{{ old('address') }}"
                    required
                  >{{$user->address}}</textarea>
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
                    <option value="0" @if($user->active_status==0) selected @endif>Active</option>
                    <option value="1" @if($user->active_status==1) selected @endif>Inactive</option>
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
                    value="{{$user->nrc}}"
                  />
                  <div class="form-control-feedback text-danger"> {{$errors->first('nrc') }} </div>
                </div>
              </div>
              <div class="fg-if-width flx m-t-1-5">
                <button class="btn create-btn-div" type="submit" >
                  <img class="create-btn-img" src="{{asset('template/img/create-btn-icon.svg')}}" />
                  <span class="create-txt">Update</span>
                </button>
              </div>
            </form>
            </div>
        </div>

      </div>
</div>
@endsection



                        