@extends('users.layouts.main')
@section('title', 'User Otp Varification')
@section('content')
    <style>
        * {
            box-sizing: border-box;
        }

        .title {
            max-width: 400px;
            margin: auto;
            text-align: center;
            font-family: "Poppins", sans-serif;

            h3 {
                font-weight: bold;
            }

            p {
                font-size: 12px;
                color: #118a44;

                &.msg {
                    color: initial;
                    text-align: initial;
                    font-weight: bold;
                }
            }
        }

        .otp-input-fields {
            margin: auto;
            background-color: white;
            box-shadow: 0px 0px 8px 0px #02025044;
            max-width: 400px;
            width: auto;
            display: flex;
            justify-content: center;
            gap: 10px;
            padding: 40px;

            input {
                height: 40px;
                width: 40px;
                background-color: transparent;
                border-radius: 4px;
                border: 1px solid #2f8f1f;
                text-align: center;
                outline: none;
                font-size: 16px;

                &::-webkit-outer-spin-button,
                &::-webkit-inner-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }

                /* Firefox */
                &[type=number] {
                    -moz-appearance: textfield;
                }

                &:focus {
                    border-width: 2px;
                    border-color: darken(#2f8f1f, 5%);
                    font-size: 20px;
                }
            }
        }

        .result {
            max-width: 400px;
            margin: auto;
            padding: 24px;
            text-align: center;

            p {
                font-size: 24px;
                font-family: 'Antonio', sans-serif;
                opacity: 1;
                transition: color 0.5s ease;

                &._ok {
                    color: green;
                }

                &._notok {
                    color: red;
                    border-radius: 3px;
                }
            }
        }
    </style>









    <section>
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-4 left-box">
                    <h2 class="mt-4">Login/Sign up</h2>
                    <h6>Get access to your Orders, <br />Wishlist and Recommendations</h6>
                    <image src="{{ asset('img/user.png') }}" class="img-fluid user-img mt-4"></image>
                </div>
                <div class="col-lg-8 right-box">
                    <form action="{{ route('user-otpverification') }}" method="POST">
                        @csrf

                        <br />
                        <p class="text-center info">
                            Please enter the OTP sent to
                        </p>
                        <p class="text-center">
                            @if (session('user_contact'))
                                {{ session('user_contact') }}
                            @endif
                            <span class="change">Change</span>
                        </p>
                        <div>


                            <div class="otp-input-fields">
                                <input type="number" name="ot1" class="otp__digit otp__field__1">
                                <input type="number" name="ot2" class="otp__digit otp__field__2">
                                <input type="number" name="ot3" class="otp__digit otp__field__3">
                                <input type="number" name="ot4" class="otp__digit otp__field__4">
                                <input type="number" name="ot5" class="otp__digit otp__field__5">
                                <input type="number" name="ot6" class="otp__digit otp__field__6">
                            </div>
                        </div>
                        <div class="s-box">
                            <div>
                                <button type="submit" class="btn sbt-btn mt-3">
                                    Verify Otp
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
        var otp_inputs = document.querySelectorAll(".otp__digit")
        var mykey = "0123456789".split("")
        otp_inputs.forEach((_) => {
            _.addEventListener("keyup", handle_next_input)
        })

        function handle_next_input(event) {
            let current = event.target
            let index = parseInt(current.classList[1].split("__")[2])
            current.value = event.key

            if (event.keyCode == 8 && index > 1) {
                current.previousElementSibling.focus()
            }
            if (index < 6 && mykey.indexOf("" + event.key + "") != -1) {
                var next = current.nextElementSibling;
                next.focus()
            }
            var _finalKey = ""
            for (let {
                    value
                }
                of otp_inputs) {
                _finalKey += value
            }
            if (_finalKey.length == 6) {
                document.querySelector("#_otp").classList.replace("_notok", "_ok")
                document.querySelector("#_otp").innerText = _finalKey
            } else {
                document.querySelector("#_otp").classList.replace("_ok", "_notok")
                document.querySelector("#_otp").innerText = _finalKey
            }
        }
    </script>

@endsection

@endsection
