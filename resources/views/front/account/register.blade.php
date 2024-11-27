@extends('front.layout.master')

@section('title', 'Register')

@section('body')


    <!--đăng kí START -->
    <div class="register-login-section spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 offset-lg-3">
            <div class="register-form">
              <h2>ĐĂNG KÍ</h2>

              @if(session('notification'))
              <div class="alert alert-warning" role="alert">
                {{ session('notification')}}
              </div>
              @endif


              <form action="" method="post">
                @csrf
                <div class="group-input">
                  <label for="name">Tên người dùng *</label>
                  <input type="text" id="name" name="name" />
                </div>
                <div class="group-input">
                  <label for="email">Địa chỉ email *</label>
                  <input type="email" id="email" name="email" />
                </div>
                <div class="group-input">
                  <label for="pass">Mật khẩu *</label>
                  <input type="password" id="pass" name="password" />
                </div>
                <div class="group-input">
                  <label for="con-pass">Xác nhận mật khẩu *</label>
                  <input type="password" id="con-pass" name="password_confirmation"/>
                </div>

                <button type="submit" class="site-btn register-btn">
                  ĐĂNG KÍ
                </button>
              </form>
              <div class="switch-login">
                <a href="./account/login" class="or-login">Bạn có tài khoản rồi?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Login Section End-->

@endsection


    