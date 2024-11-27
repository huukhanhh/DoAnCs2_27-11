@extends('front.layout.master')

@section('title', 'Login')

@section('body')

<!--Login START-->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="login-form">
                    <h2>ĐĂNG NHẬP</h2>

                    @if(session('notification'))
                    <div class="alert alert-warning" role="alert">
                        {{ session('notification')}}
                    </div>
                    @endif


                    <form action="" method="post">

                        @csrf
                        <div class="group-input">
                            <label for="username"
                                >Tên người dùng hoặc địa chỉ email *</label
                            >
                            <input type="email" id="email" name="email" />
                        </div>
                        <div class="group-input">
                            <label for="pass">Mật khẩu *</label>
                            <input type="password" id="pass" name="password"/>
                        </div>
                        <div class="group-input gi-check">
                            <div class="gi-more">
                                <label for="save-pass">
                                    Lưu mật khẩu
                                    <input type="checkbox" id="save-pass" name="remember"/>
                                    <span class="checkmark"></span>
                                </label>
                                <a href="#" class="forget-pass"
                                    >Quên mật khẩu</a
                                >
                            </div>
                        </div>
                        <button type="submit" class="site-btn login-btn">
                            Đăng nhập
                        </button>
                    </form>
                    <div class="switch-login">
                        <a href="./account/register" class="or-login"
                            >Hoặc tạo tài khoản</a
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Login Section End-->

@endsection
