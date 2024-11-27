@extends('front.layout.master')

@section('title', 'Home')

@section('body')
<!-- phần slide to nhất START-->
<section class="hero-section">
    <div class="hero-items owl-carousel">
        <div class="single-hero-items set-bg" data-setbg="front/img/bg1.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag, kids</span>
                        <h1>Ngày Hội Giảm Giá</h1>
                        <p>Chào mừng đến với Ngày hội Giảm giá - cơ hội mua sắm lớn nhất trong năm! Săn ngay các sản
                            phẩm yêu thích với mức giảm giá cực khủng, đừng bỏ lỡ! </p>
                        <a href="#" class="primary-btn">Mua Ngay</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Giảm Giá <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="front/img/bg2.png">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag, kids</span>
                        <h1>Ngày Hội Giảm Giá</h1>
                        <p>Tưng bừng khai hội Ngày hội Giảm giá! Đây là dịp hoàn hảo để sắm sửa những món đồ yêu
                            thích với mức giá siêu hấp dẫn. Đừng chần chừ, ưu đãi lớn đang chờ bạn!</p>
                        <a href="#" class="primary-btn">Mua Ngay</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Giảm Giá <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="front/img/hero-1.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag, kids</span>
                        <h1>Ngày Hội Giảm Giá</h1>
                        <p>Chỉ trong Ngày hội Giảm giá lần này - giảm giá sâu, sản phẩm chất lượng! Hãy để chúng tôi
                            giúp bạn mua sắm thả ga mà không lo về giá. Cơ hội có hạn, nhanh tay nhé!</p>
                        <a href="#" class="primary-btn">Mua Ngay</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Giảm Giá <span>50%</span></h2>
                </div>
            </div>
        </div>
        <div class="single-hero-items set-bg" data-setbg="front/img/hero-2.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <span>Bag, kids</span>
                        <h1>Ngày Hội Giảm Giá</h1>
                        <p>Ngày hội Giảm giá đã chính thức bắt đầu! Nhanh tay rinh về những ưu đãi đặc biệt, giảm
                            giá lên đến 50%! Mua sắm ngay để không bỏ lỡ cơ hội có 1-0-2 này!</p>
                        <a href="#" class="primary-btn">Mua Ngay</a>
                    </div>
                </div>
                <div class="off-card">
                    <h2>Giảm Giá <span>50%</span></h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- phần slide to nhất END-->


<!--phần banner START-->
<div class="banner-section spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-1.jpg" alt="">
                    <div class="inner-text">
                        <h4>Men's</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-2.jpg" alt="">
                    <div class="inner-text">
                        <h4>Women's</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="single-banner">
                    <img src="front/img/banner-3.jpg" alt="">
                    <div class="inner-text">
                        <h4>Kid's</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--phần banner END-->


<!-- phần spham nổi bật wonman START-->
<section class="women-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="product-large set-bg" data-setbg="front/img/products/women-large.jpg">
                    <h2>Women's</h2>
                    <a href="#">Khám Phá Thêm</a>
                </div>
            </div>
            <div class="col-lg-8 offset-lg-1">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="women">Tất cả</li>
                        <li class="item" data-tag=".Clothing" data-category="women">Quần áo</li>
                        <li class="item" data-tag=".HandBag" data-category="women">Túi xách</li>
                        <li class="item" data-tag=".Shoes" data-category="women">Giày</li>
                        <li class="item" data-tag=".Accessories" data-category="women">Phụ kiện</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel women">

                    @foreach($featuredProducts['women'] as $product)
                    @include('front.components.product-item')
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- phần spham nổi bật wonman END -->


<!-- phần hiển thị thông tin khuyến mãi START-->
<section class="deal-of-week set-bg spad" data-setbg="front/img/time-bg.jpg">
    <div class="container">
        <div class="col-lg-6 text-center">
            <div class="section-title">
                <h2>Ưu Đãi Trong Tuần</h2>
                <p>Đây là chương trình khuyến mãi đặc biệt của cửa hàng chúng tớ tung ra mỗi tuần, với các sản phẩm
                    được giảm giá và có các ưu đãi hấp dẫn trong thời gian giới hạn. Bạn đừng bỏ lỡ mà hãy nhanh tay
                    đặt ngay nhé! </p>
                <div class="product-price">
                    380.000 VND
                    <span>/ Túi xách</span>
                </div>
            </div>
            <div class="countdown-timer" id="countdown">
                <div class="cd-item">
                    <span>56</span>
                    <p>Days</p>
                </div>
                <div class="cd-item">
                    <span>12</span>
                    <p>Hrs</p>
                </div>
                <div class="cd-item">
                    <span>40</span>
                    <p>Mins</p>
                </div>
                <div class="cd-item">
                    <span>52</span>
                    <p>Secs</p>
                </div>
            </div>
            <a href="" class="primary-btn">Mua Ngay</a>
        </div>
    </div>
</section>
<!-- phần hiển thị thông tin khuyến mãi END-->


<!-- phần spham nổi bật men START-->
<section class="men-banner spad">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 ">
                <div class="filter-control">
                    <ul>
                        <li class="active item" data-tag="*" data-category="men">Tất cả</li>
                        <li class="item" data-tag=".Clothing" data-category="men">Quần áo</li>
                        <li class="item" data-tag=".HandBag" data-category="men">Túi xách</li>
                        <li class="item" data-tag=".Shoes" data-category="men">Giày</li>
                        <li class="item" data-tag=".Accessories" data-category="men">Phụ kiện</li>
                    </ul>
                </div>
                <div class="product-slider owl-carousel men">


                    @foreach($featuredProducts['men'] as $product)
                      @include('front.components.product-item')
                    @endforeach
                    
                </div>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="product-large set-bg m-large" data-setbg="front/img/products/man-large.jpg">
                    <h2>Men's</h2>
                    <a href="#">Khám Phá Thêm</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- phần spham nổi bật men END-->


<!-- phần hiển thị mạng xã hội START-->
<div class="instagram-photo">
    <div class="insta-item set-bg" data-setbg="front/img/insta-1.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">Mysu & Khanh</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-2.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">Mysu & Khanh</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-3.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">Mysu & Khanh</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-4.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">Mysu & Khanh</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-5.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">Mysu & Khanh</a></h5>
        </div>
    </div>
    <div class="insta-item set-bg" data-setbg="front/img/insta-6.jpg">
        <div class="inside-text">
            <i class="ti-instagram"></i>
            <h5><a href="#">Mysu & Khanh</a></h5>
        </div>
    </div>
</div>
<!-- phần hiển thị mạng xã hội END-->


<!-- phần hiển thị blog mới nhất START-->
<section class="lastest-blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Bài viết từ Blog</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-blog">
                    <img src="front/img/blog/{{ $blog->image }}" alt="">
                    <div class="latest-text">
                        <div class="tag-list">
                            <div class="tag-item">
                                <i class="fa fa-calendar-o"></i>
                                {{ date('M d, Y', strtotime($blog->created_at)) }}
                            </div>
                            <div class="tag-item">
                                <i class="fa fa-comment-o"></i>
                                {{ count($blog->blogComments) }}
                            </div>
                        </div>
                        <a href="">
                            <h4>{{ $blog->title}}</h4>
                        </a>
                        <p>{{ $blog->subtitle}}</p>
                    </div>
                </div>
            </div>  
            @endforeach       
        </div>
        <div class="benefit-items">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-1.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Miễn phí ship</h6>
                            <p>Áp dụng cho tất cả đơn hàng trên 99k.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-2.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Giao hàng đúng hạn</h6>
                            <p>Cam kết giao đúng hạn.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-benefit">
                        <div class="sb-icon">
                            <img src="front/img/icon-3.png" alt="">
                        </div>
                        <div class="sb-text">
                            <h6>Thanh toán an toàn</h6>
                            <p>100% bảo mật cao.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- phần hiển thị blog mới nhất START-->

@endsection