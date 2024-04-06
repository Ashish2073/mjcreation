@extends('users.layouts.main')
@section('title', 'User Registertion')
@section('content')
<style>
    @keyframes loader-element {
    0% {
      transform: translate(-50%, -50%) rotate(0deg);
    }

    100% {
      transform: translate(-50%, -50%) rotate(360deg);
    }
  }

  .loader-element div {
    position: absolute;
    width: 120px;
    height: 120px;
    border: 20px solid #125e81;
    border-top-color: transparent;
    border-radius: 50%;
  }

  .loader-element div {
    animation: loader-element 1s linear infinite;
    top: 100px;
    left: 100px;
  }

  .demo {
    -webkit-filter: blur(5px) grayscale(100%);
    pointer-events: none;
  }

  .loader-element {
    transform: translateZ(0) scale(1);
    backface-visibility: hidden;
    transform-origin: 0 0;

    z-index: 999999 !important;
    position: absolute;
    top: 25vh;
    left: 43vw;
  }
    </style>



  <div class="container-div" >
    <div class="loader-element" id="loader">

    </div>
  </div>



    <section id="main_content">

        <div class="container my-5 ">
            <div class="row">
                <div class="col-lg-4 left-box">
                    <h2 class="mt-4">Login/Sign up</h2>
                    <h6>Get access to your Orders, <br />Wishlist and Recommendations</h6>
                    <image src="{{ asset('img/user.png') }}" class="img-fluid user-img mt-4"></image>
                </div>
                <div class="col-lg-8 right-box">
                    <form action="{{ route('users-registration') }}" method="POST" id="user-registration-form">
                        @csrf
                        <div class="form-group">
                            <label for="user_contact"><b>Enter Your Mobile No./ Email</b></label>
                            <input type="text" id="user_contact" name ="user_contact" class="form-control"
                                aria-describedby="user_contact" placeholder="Enter Your Mobile No./ Email"
                                autocomplete="off" />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('phone_number')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="userpassword"><b>Enter Your Password</b></label>
                            <input type="password" name="password" class="form-control" id="userpassword"
                                placeholder="Enter Your Password" autocomplete="off" />

                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <br />
                        <p class="text-center">
                            By continuing, you agree to Flipkart's Terms of Use and Privacy
                            Policy.
                        </p>
                        <div class="s-box">
                            <div>
                                <button type="submit" class="btn sbt-btn" id="otpsubmitbutton">
                                    Request to OTP
                                </button>
                                <p class="text-center"><b>Not received your code?</b></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    @section('page-script')
    <script>
        $(document).ready(function(){
            $('#otpsubmitbutton').on('click',function(e){
               e.preventDefault();

               let userContact=$('#user_contact').val();
               let password=$('#userpassword').val();

               $.ajax({
                url:"{{route('users-registration')}}",
                type:"POST",
                data:{
                    _token:"{{ csrf_token() }}",
                    user_contact: userContact,
                    password:password,
                },
                beforeSend: function() {

                    $('#loader').html('<div></div>');

                    $('#main_content').attr('class','demo');

                },
                success:(data)=>{

                },
                error:(error)=>{

                }

               })

            })
        })
        </script>

    @endsection


@endsection
