@extends('front.layout.master')

@section('title', 'Oder Details')

@section('body')

<div class="breacrumb-section"></div>


<section class="checkout-section spad">
    <div class="container">
        <form action="#" class="checkout-form">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="#" class="content-btn">
                            Mã đơn hàng
                            <b>#{{ $order->id }}</b>
                        </a>
                    </div>
                    <h4>Chi tiết thanh toán</h4>
                    <di class="row">
                        <div class="col-lg-6">
                            <label for="fir">Tên</label>
                            <input disabled type="text" id="fir" value="{{ $order->first_name }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="last">Họ</label>
                            <input disabled type="text" id="last" value="{{ $order->last_name }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun-name">Tên Công ty</label>
                            <input disabled type="text" id="cun-name"  value="{{ $order->company_name }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="cun">Quốc gia</label>
                            <input disabled type="text" id="cun" value="{{ $order->country }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="street">Địa chỉ</label>
                            <input disabled type="text" id="street" value="{{ $order->street_address}}">
                        </div>
                        <div class="col-lg-12">
                            <label for="zip">Mã bưu điện</label>
                            <input disabled type="text" id="zip" value="{{ $order->postcode_zip }}">
                        </div>
                        <div class="col-lg-12">
                            <label for="town">Thành phố</label>
                            <input disabled type="text" id="town" value="{{ $order->town_city }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="email">Địa chỉ email</label>
                            <input disabled type="text" id="email" value="{{ $order->email }}">
                        </div>
                        <div class="col-lg-6">
                            <label for="phone">Số điện thoại</label>
                            <input disabled type="text" id="phone" value="{{ $order->phone }}">
                        </div>
                    </di>
                </div>
                <div class="col-lg-6">
                    <div class="checkout-content">
                        <a href="#" class="content-btn">
                            Trạng thái
                            <b>{{ \App\Utilities\Constant::$order_status[$order->status] }}</b>
                        </a>
                    </div>
                    <div class="place-order">
                        <h4>Đơn hàng của bạn</h4>
                        <div class="order-total">
                            <ul class="order-table">
                                
                                @foreach($order->orderDetails as $orderDetail)
                                <li class="fw-normal">
                                    {{ $orderDetail->product->name }} x {{ $orderDetail->qty }}
                                    <span>${{ $orderDetail->total }}</span>
                                </li>
                                @endforeach

                                <li class="total-price">
                                    Tổng cộng
                                    <span>${{ array_sum(array_column($order->orderDetails->toArray(), 'total')) }}</span>
                                </li>
                            </ul>
                            <div class="payment-check">
                                <div class="pc-item">
                                    <label for="pc-check">
                                        Thanh toán sau
                                        <input disabled type="radio" name="payment_type" id="pc-check" value="pay_later"
                                        {{ $order->payment_type == 'pay_later' ? 'checked' : ''}}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="pc-item">
                                    <label for="pc-paypal">
                                        Chuyển khoản
                                        <input disabled type="radio" name="payment_type" id="pc-paypal" value="online_payment"
                                        {{ $order->payment_type == 'online_payment' ? 'checked' : ''}}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>


@endsection