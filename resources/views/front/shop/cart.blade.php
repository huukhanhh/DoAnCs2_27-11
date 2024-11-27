@extends('front.layout.master')

@section('title', 'Product')

@section('body')

    <!--Shopping Cart Section Begin-->
    <section class="shopping-cart spad">
      <div class="container">
        <div class="row">

          @if(Cart::count() > 0)
          <div class="col-lg-12">
            <div class="cart-table">
              <table>
                <thead>
                  <tr>
                    <th>Hình Ảnh</th>
                    <th class="p-name">Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Tổng cộng</th>
                    <th><i onclick="confirm('Bạn có chắc chắn muốn xoá toàn bộ') === true ? destroyCart() : ''"
                      style="cursor: pointer" class="ti-close"></i></th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($carts as $cart)
                  <tr data-rowid="{{ $cart->rowId }}">
                    <td class="cart-pic first-row">
                      
                      <img style="height: 190px"
                      src="{{ isset($cart->options->images[0]) ? asset('front/img/products/' . $cart->options->images[0]->path) : 'default_image_path.jpg' }}" alt="Product Image" />
                      
                    </td>
                    <td class="cart-title first-row">
                      <h5>{{ $cart->name}}</h5>
                    </td>
                    <td class="p-price first-row">{{ number_format($cart->price, 2)}}</td>
                    <td class="qua-col first-row">
                      <div class="quantity">
                        <div class="pro-qty">
                          <input type="text" value="{{ $cart->qty }}" data-rowId="{{ $cart->rowId }}" />
                        </div>
                      </div>
                    </td>
                    <td class="total-price first-row">${{ number_format($cart->price * $cart->qty, 2) }}</td>
                    <td class="close-td first-row">
                      <i class="ti-close" onclick="removeCart('{{ $cart->rowId }}')"></i>
                    </td>
                  </tr>
                  @endforeach
                 


                </tbody>
              </table>
            </div>
            <div class="row">
              <div class="col-lg-4">
                <div class="cart-buttons">
                  <a href="#" class="primary-btn continue-shop"
                    >Tiếp tục mua sắm</a
                  >
                  <a href="#" class="primary-btn up-cart">Cập nhật giỏ hàng</a>
                </div>
                <div class="discount-coupon">
                  <h6>Mã giảm giá</h6>
                  <form action="#" class="coupon-form">
                    <input type="text" placeholder="Nhập mã của bạn" />
                    <button type="submit" class="site-btn coupon-btn">
                      Áp dụng
                    </button>
                  </form>
                </div>
              </div>
              <div class="col-lg-4 offset-lg-4">
                <div class="proceed-checkout">
                  <ul>
                    <li class="subtotal">Tạm tính <span>${{ $total }}</span></li>
                    <li class="cart-total">Tổng cộng <span>${{ $subtotal }}</span></li>
                  </ul>
                  <a href="./checkout" class="proceed-btn"
                    >TIẾN HÀNH ĐỂ KIỂM TRA</a
                  >
                </div>
              </div>
            </div>
          </div>
          @else
          <div class="col-lg-12">
            <h4>Giỏ hàng của bạn đang trống</h4>

          </div>
          @endif
        </div>
      </div>
    </section>
    <!--Shopping Cart Section End-->
    
@endsection



