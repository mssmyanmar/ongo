<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- favicon icon -->
    <link rel="icon" href="./img/OnGo_logo.svg" />

    <title>OnGo - Login</title>

    <!-- Custom fonts for this template-->
    <link
      href="{{asset('template/vendor/fontawesome-free/css/all.min.css')}}"
      rel="stylesheet"
      type="text/css"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
      rel="stylesheet"
    />

    <!-- Custom styles for this template-->
    <link href="{{asset('template/css/sb-admin-2.css')}}" rel="stylesheet" />
  </head>

  <body class="bg-gradient-primary">
    <div class="container">
      <!-- Outer Row -->
      <div class="row justify-content-center" style="margin-top: 40px">
        <div class="col-5 text-center">
          <img
            src="{{asset('template/img/OnGo_logo.svg')}}"
            alt="OnGo logo"
            style="width: 235px; height: 100"
          />
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-5">
          <div
            class="card o-hidden border-0 shadow-lg my-5"
            style="border-radius: 39px; height: 450px"
          >
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1
                        class="mb-4"
                        style="
                          color: #72f573;
                          font-size: 25pt;
                          font-weight: bold;
                        "
                      >
                        LOGIN
                      </h1>
                    </div> 
                    @if ( count( $errors ) > 0 )
                      @foreach ($errors->all() as $error)
                      <div class="text-center">
                          <span class="help-block backend_error" style="color:red;">
                              <strong>{{ $error }}</strong>
                          </span>
                      </div>
                      @endforeach
                    @endif

                    <form class="user" autocomplete="off" method="POST" action="{{ route('login') }}">
                      @csrf
                      <div class="form-group mx-auto max-w-80 b-e">
                        <div class="input-title">PHONE NUMBER / USER NAME</div>
                        <input
                          onfocus="bsShow(event)"
                          type="text"
                          class="form-control form-control-user"
                          id="inputPhoneUserName"
                          name="phone_number"
                        />
                      </div>
                      <div class="form-group mt-1-8 mx-auto max-w-80 b-e">
                        <div class="input-title">PASSWORD</div>
                        <input
                          onfocus="bsShow(event)"
                          type="password"
                          class="form-control form-control-user"
                          id="inputPassword"
                          name="password"
                        />
                      </div>
                      <button
                        type="submit"
                        class="btn btn-user btn-block mt-3-5 btn-green"
                      >
                        Login
                    </button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('template/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('template/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('template/js/sb-admin-2.js')}}"></script>

    <script>
      // for showing box shadow in the selected input tag group
      function bsShow(event) {
        let inputArr = document.querySelectorAll(".form-group");
        inputArr.forEach((ele) => (ele.style.boxShadow = "none"));
        event.path[1].style.boxShadow = "0 0 0 0.2rem rgba(78, 115, 223, 0.25)";
      }
    </script>
  </body>
</html>
