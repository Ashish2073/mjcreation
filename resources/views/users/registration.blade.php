@extends('users.layouts.main')
@section('title', 'User Registertion')
@section('content')

    {{-- <form action="{{route('users-registration')}}" method="POST" >

    @csrf
     @method('POST')
    <div class="mb-3"> 
      <label for="exampleInputEmail1" class="form-label">Email/phone</label>
      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Password</label>
      <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form> --}}


    <section>
        <div class="container my-5">
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
                            <label for="exampleInputPassword1"><b>Enter Your Password</b></label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1"
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
                                <button type="submit" class="btn sbt-btn">
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


@endsection
