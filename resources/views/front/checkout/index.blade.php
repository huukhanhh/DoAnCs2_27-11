@extends('front.layout.master')

@section('title', 'Check Out')

@section('body')


    <!--Shopping Cart START-->
    <section class="checkout-section spad">
      <div class="container">
        <form action="" class="checkout-form" method="post">

          @csrf
          <div class="row">

           @if(Cart::count() > 0)
            <div class="col-lg-6">
              <div class="checkout-content">
                <a href="login.html" class="content-btn">Nhấp vào đây để đăng nhập</a>
                <h4>Chi tiết thanh toán</h4>
                <div class="row">

                 <input type="hidden" id="user_id" name="user_id" value="{{ Auth::user()->id ?? ''}}">

                  <div class="col-lg-6">
                    <label for="fir">Tên <span>*</span></label>
                    <input type="text" id="fir" name="first_name"  value="{{ Auth::user()->name ?? ''}}"/>
                  </div>
                  <div class="col-lg-6">
                    <label for="last">Họ <span>*</span></label>
                    <input type="text" id="last" name="last_name"/>
                  </div>
                  <div class="col-lg-12">
                    <label for="cun-name">Tên công ty </label>
                    <input type="text" id="cun-name" name="company_name" {{ Auth::user()->company_name ?? ''}} >
                  </div>
                  <div class="col-lg-12">
                    <label for="cun">Quốc gia <span>*</span></label>
                    <input type="text" id="cun" name="country"{{ Auth::user()->country ?? ''}} />
                  </div>
                  <div class="col-lg-12">
                    <label for="street">Địa chỉ <span>*</span></label>
                    <input type="text" id="street" class="street-first" name="street_address" {{ Auth::user()->street_address ?? ''}} />
                  </div>
                  <div class="col-lg-12">
                    <label for="zip">Mã bưu điện</label>
                    <input type="text" id="zip" name="postcode_zip" {{ Auth::user()->postcode_zip ?? ''}} />
                  </div>
                  <div class="col-lg-12">
                    <label for="town">Thành phố / Thị trấn <span>*</span></label>
                    <input type="text" id="town" name="town_city" {{ Auth::user()->town_city ?? ''}}/>
                  </div>
                  <div class="col-lg-6">
                    <label for="email">Địa chỉ email <span>*</span></label>
                    <input type="text" id="email" name="email"{{ Auth::user()->email ?? ''}} />
                  </div>
                  <div class="col-lg-6">
                    <label for="phone">Số điện thoại <span>*</span></label>
                    <input type="text" id="phone" name="phone" {{ Auth::user()->phone ?? ''}} />
                  </div>
                  <div class="col-lg-12">
                    <div class="create-item">
                      <label for="acc-create">
                        Tạo tài khoản?
                        <input type="checkbox" id="acc-create" />
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="checkout-content">
                <input type="text" placeholder="Nhập mã giảm giá của bạn" />
              </div>
              <div class="place-order">
                <h4>Đơn hàng của bạn</h4>
                <div class="order-total">
                  <ul class="order-table">
                    <li>Sản phẩm <span>Tổng cộng</span></li>


                    @foreach($carts as $cart)
                    <li class="fw-normal">
                      {{ $cart->name }} x {{ $cart->qty }} 
                      <span>${{ $cart->price * $cart->qty }}</span>   
                    </li>
                    @endforeach
                    


                    <li class="fw-normal">Tạm tính <span> {{ $subtotal }}$</span></li>
                    <li class="total-price">Tổng cộng <span> {{ $total}}$</span></li>
                  </ul>
                  <div class="payment-check">
                    <div class="pc-item">
                      <label for="pc-check">
                        Thanh toán sau
                        <input type="radio" id="pc-check" value="pay_later" name="payment_type"/>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                    <div class="pc-item">
                      <label for="pc-paypal">
                        Chuyển khoản
                        <input type="radio" id="pc-paypal" value="online_payment" name="payment_type" checked/>
                        <span class="checkmark"></span>
                      </label>
                    </div>
                  </div>
                  <div class="order-btn">
                    <button type="submit" class="site-btn place-btn">
                        Đặt hàng
                    </button>
                  </div>
                </div>
              </div>
            </div>
            @else
            <div class="col-lg-12">
              <h4>Giỏ hàng của bạn đang trống.</h4>
            </div>
            @endif
          </div>
        </form>
      </div>
    </section>
    <!--Shopping Cart END-->

@endsection

    