<!DOCTYPE html>
<html lang="zxx">

<head>
    <base href="{{asset('/')}}">
    <meta charset="UTF-8">
    <meta name="description" content="codelean Template">
    <meta name="keywords" content="codelean, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') | MySu Fashion Trends</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css">
    <link rel="stylesheet" href="front/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="front/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="front/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="front/css/style.css" type="text/css">
</head>

<body>
    <!-- bắt đầu code ở đây -->

    <!-- hiệu ứng loading đầu trang START-->
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- hiệu ứng loading đầu trang END-->


    <!-- phần tiêu đề START-->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="ht-left">
                    <div class="contact-info">
                        <div class="mail-servive">
                            <i class="fa fa-envelope"></i> mysu220805@gmail.com
                        </div>
                        <div class="phone-service">
                            <i class="fa fa-phone"></i> +84 77.55.93.418
                        </div>
                    </div>
                </div>


                <div class="ht-right">

                    @if(Auth::check())
                    <a href="./account/logout" class="login-panel">
                    <i class="fa fa-user"></i>
                    {{ Auth::user()->name }} - Logout
                    </a>
                    @else
                    <a href="./account/login" class="login-panel"><i class="fa fa-user"></i>Đăng Nhập</a>
                    @endif
           
                    
                    <div class="lan-selector">
                        <select class="language_drop" name="countries" id="countries" style="width: 300px;">
                            <option value="yt" data-image="front/img/vietnam.png" data-imagecss="flag yt"
                                data-title="Vietnam">
                                Vietnam
                            </option>
                            <option value="yt" data-image="front/img/flag-1.jpg" data-imagecss="flag yt"
                                data-title="English">
                                English
                            </option>
                            <option value="yu" data-image="front/img/flag-2.jpg" data-imagecss="flag yu"
                                data-title="Bangladesh">
                                German
                            </option>
                        </select>
                    </div>
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="front/img/Screenshot_2024-10-24_194406-removebg-preview.png" height="50"
                                    alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 ol-md-7">

                        <form action="shop">
                        <div class="advanced-search">
                            <button type="button" class="category-btn"> Các danh mục</button>
                            <div class="input-group">
                                <input name="search" value="{{ request('search') }}" type="text" placeholder="Bạn cần gì?">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </form>
                    </div>
                    <div class="col-lg-3 col-md-3 text-right">
                        <ul class="nav-right">
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
                                <a href="./cart">
                                    <i class="icon_bag_alt"></i>
                                    <span class="cart-count">{{ Cart::count() }}</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody>

                                                @foreach(Cart::content() as $cart)
                                                <tr data-rowId="{{ $cart->rowId }}">
                                                    <td class="si-pic"><img style="height: 70px"
                                                        src="{{ isset($cart->options->images[0]) ? asset('front/img/products/' . $cart->options->images[0]->path) : 'default_image_path.jpg' }}" alt="">
                                                    </td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p>${{ $cart->price }} x {{ $cart->qty}}</p>
                                                            <h6>{{ $cart->name}}</h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                        <i onclick="removeCart('{{ $cart->rowId }}')" class="ti-close"></i>
                                                    </td>
                                                </tr>
                                                @endforeach



                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>tổng cộng:</span>
                                        <h5>${{ Cart::total() }}</h5>
                                    </div>
                                    <div class="select-button">
                                        <a href="./cart" class="primary-btn view-card">XEM GIỎ HÀNG</a>
                                        <a href="./checkout" class="primary-btn checkout-btn">KIỂM TRA</a>
                                    </div>
                                </div>
                            </li>
                            <li class="cart-price">${{ Cart::total() }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>Bộ phận</span>
                        <ul class="depart-hover">
                            <li class="active"><a href="#">Women's Clothing</a></li>
                            <li><a href="#">Men's Clothing</a></li>
                            <li><a href="#">Underwear</a></li>
                            <li><a href="#">Kid's Clothing</a></li>
                            <li><a href="#">Brand Local</a></li>
                            <li><a href="#">Accessories/Shoes</a></li>
                            <li><a href="#">Luxury Brands</a></li>
                            <li><a href="#">Brand Outdoor Apparel</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class=" {{ (request()->segment(1) == '') ? 'active' : '' }}"><a href="./">Trang Chủ</a></li>
                        <li class=" {{ (request()->segment(1) == 'shop') ? 'active' : '' }}"><a href="./shop">Cửa hàng</a></li>
                        <li><a href="">Bộ Sưu Tập</a>
                            <ul class="dropdown">
                                <li><a href="">Men's</a></li>
                                <li><a href="">Women's</a></li>
                                <li><a href="">Kid's</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="contact.html">Liên Hệ</a></li>
                        <li><a href="">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./account/my-order">Chi Tiết đơn hàng</a></li>
                                <li><a href="./cart">Giỏ Hàng</a></li>
                                <li><a href="./checkout">Kiểm Tra</a></li>
                                <li><a href="faq.html">Cố Vấn</a></li>
                                <li><a href="register.html">Đăng Kí</a></li>
                                <li><a href="./account/login">Đăng Nhập</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- phần tiêu đề END-->

    <!--body here-->
    @yield('body')


    <!-- phần logo đối tác START-->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="front/img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- phần logo đối tác END-->


    <!-- phần chân trang chính START-->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="front/img/Remove-bg.ai_1729956947445.png" height="25" alt="">
                            </a>
                        </div>
                        <ul>
                            <li>470 Trần Đại Nghĩa . Đà Nẵng</li>
                            <li>Phone: +84 77.55.93.418</li>
                            <li>Email: mysu220805@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Thông Tin</h5>
                        <ul>
                            <li><a href="">Giới Thiệu</a></li>
                            <li><a href="">Kiểm Tra</a></li>
                            <li><a href="">Liên Hệ</a></li>
                            <li><a href="">Dịch Vụ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>Tài Khoản</h5>
                        <ul>
                            <li><a href="">Tài Khoản Của Tôi</a></li>
                            <li><a href="">Liên Hệ</a></li>
                            <li><a href="">Giỏ Hàng</a></li>
                            <li><a href="">Cửa Hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Tham Gia Ngay Cùng Tụi Mình Để Không Bỏ Lỡ Bất Kỳ Cập Nhật Thú Vị Nào Nhé!</h5>
                        <P>Nhận ngay email cập nhật về cửa hàng mới và các ưu đãi đặc biệt từ chúng mình nhé!</P>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Nhập Email Của Bạn" name="" id="">
                            <button type="button">subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            Copyright <script>
                            document.write(new Date().getFullYear());
                            </script> Mọi quyền được bảo lưu | Mẫu này được tạo bởi <i class="fa fa-heart-o"
                                aria-hidden="true"></i> <span><b> Mysu & Khanh.</b></span>
                        </div>
                        <div class="payment-pic">
                            <img src="front/img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- phần chân trang chính END-->



    <!-- Js Plugins -->
    <script src="front/js/jquery-3.3.1.min.js"></script>
    <script src="front/js/bootstrap.min.js"></script>
    <script src="front/js/jquery-ui.min.js"></script>
    <script src="front/js/jquery.countdown.min.js"></script>
    <script src="front/js/jquery.nice-select.min.js"></script>
    <script src="front/js/jquery.zoom.min.js"></script>
    <script src="front/js/jquery.dd.min.js"></script>
    <script src="front/js/jquery.slicknav.js"></script>
    <script src="front/js/owl.carousel.min.js"></script>
    <script src="front/js/owlcarousel2-filter.min.js"></script>
    
    <script src="front/js/main.js"></script>
</body>

</html>