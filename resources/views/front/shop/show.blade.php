@extends('front.layout.master')

@section('title', 'Product')

@section('body')

<!--phần xem chi tiết sản phẩm trong shop START-->
<section class="product-shop spad page-details">
    <div class="container">
        <div class="row">
            <!--mục bộ lọc theo danh mục, thuơg hiệu,giá, màu, size, thẻ START-->
            <div class="col-lg-3">
                
                @include('front.shop.components.products-sidebar-filter')

            </div>
            <!--mục bộ lọc theo danh mục, thuơg hiệu,giá, màu, size, thẻ END-->

            <!--mục chi tiết sản phẩm START-->
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="product-pic-zoom">
                            <img class="product-big-img" src="front/img/products/{{ $product->productImages[0]->path}}" alt="" />
                            <div class="zoom-icon">
                                <i class="fa fa-search-plus"></i>
                            </div>
                        </div>
                        <div class="product-thumbs">
                            <div class="product-thumbs-track ps-slider owl-carousel">
                                 @foreach($product->productImages as $productImage)
                                 <div class="pt active" data-imgbigurl="front/img/products/{{ $productImage->path}}">
                                     <img src="front/img/products/{{ $productImage->path}}" alt="">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="product-details">
                            <div class="pd-title">
                                <span>{{ $product->tag}}</span>
                                <h3>{{ $product->name}}</h3>
                                <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                            </div>
                            <div class="pd-rating">
                                @for($i=1; $i <=5; $i++)
                                @if($i <= $product->avgRating)
                                <i class="fa fa-star"></i>
                               @else
                                <i class="fa fa-star-o"></i>
                                @endif
                                @endfor
                                <span>({{ count($product->productComments )}})</span>
                            </div>
                            <div class="pd-desc">
                                <p>{{$product->content}}
                                </p>
                                @if($product->discount != null)
                                    <h4>${{$product->discount}}<span{{$product->price}}></span></h4>
                                @else
                                <h4>${{ $product->price}}</h4>
                                @endif
                            </div>
                            <div class="pd-color">
                                <h6>Màu sắc</h6>
                                <div class="pd-color-choose">

                                    @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)

                                    <div class="cc-item">
                                        <input type="radio" id="cc-{{$productColor}}" />
                                        <label for="cc-{{$productColor}}" class="cc-{{ $productColor}}"></label>
                                    </div>   
                                    @endforeach          
                                </div>
                            </div>
                            <div class="pd-size-choose">


                                @foreach(array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                <div class="sc-item">
                                    <input type="radio" id="sm-{{ $productSize}}" />
                                    <label for="sm-{{ $productSize}}">{{ $productSize}}</label>
                                </div>
                                @endforeach  

                            </div>
                            <div class="quantity">
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="text" value="1" />
                                    </div>
                                    <a href="#" class="primary-btn pd-cart">Thêm vào giỏ</a>
                                </div>
                            </div>
                            <ul class="pd-tags">
                                <li>
                                    <span>Danh mục</span>: {{ $product->productCategory->name}}
                                </li>
                                <li><span>Tags</span>: {{ $product->tag}}</li>
                            </ul>
                            <div class="pd-share">
                                <div class="p-code">SKU : {{ $product->sku}}</div>
                                <div class="pd-social">
                                    <a href="#" class="ti-facebook"></a>
                                    <a href="#" class="ti-twitter-alt"></a>
                                    <a href="#" class="ti-linkedin"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a href="#tab-1" class="active" data-toggle="tab" role="tab">Miêu tả</a>
                                </li>
                                <li>
                                    <a href="#tab-2" data-toggle="tab" role="tab">Thông số</a>
                                </li>
                                <li>
                                    <a href="#tab-3" data-toggle="tab" role="tab">Đánh giá của khách hàng ({{  count($product->productComments) }})</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        {!! $product->description!!}
                                        
                                        
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Đánh giá của khách hàng</td>
                                                <td>
                                                    <div class="pd-rating">

                                                        @for($i = 1; $i<=5; $i++)
                                                           @if($i <= $product->avgRating)
                                                             <i class="fa fa-star"></i>
                                                           @else
                                                             <i class="fa fa-star-o"></i>
                                                           @endif
                                                           @endfor

                                                           <span>({{count($product->productComments) }})</span>
                                                       
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Giá</td>
                                                <td>
                                                    <div class="p-price">${{ $product->price}}</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Thêm vào giỏ hàng</td>
                                                <td>
                                                    <div class="cart-add">+ thêm vào giỏ hàng</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Có sẵn</td>
                                                <td>
                                                    <div class="p-stock">{{ $product->qty}} còn lại </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Cân nặng</td>
                                                <td>
                                                    <div class="p-weight">{{ $product->weight}} kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Kích cỡ</td>
                                                <td>
                                                    <div class="p-size">
                                                        @foreach (array_unique(array_column($product->productDetails->toArray(), 'size')) as $productSize)
                                                        {{ $productSize}},
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Màu sắc</td>
                                                <td>
                                                    @foreach(array_unique(array_column($product->productDetails->toArray(), 'color')) as $productColor)
                                                        <span class="cl-item cl-{{ $productColor }}"></span>
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">SKU</td>
                                                <td>
                                                    <div class="p-code">{{ $product->sku}}</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>{{ count($product->productComments)  }} Comments</h4>
                                        <div class="comment-option">

                                            @foreach($product->productComments as $productComment)
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="front/img/product-single/{{ $productComment->user->avatar ?? 'default-avatar.jpg' }}"
                                                        alt="" />
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        @for($i=1; $i<=5; $i++)
                                                          @if($i <= $productComment->rating)
                                                          <i class="fa fa-star"></i>
                                                          @else
                                                          <i class="fa fa-star-o"></i>
                                                          @endif
                                                          @endfor
                                                     
                                                    </div>
                                                    <h5>{{ $productComment->name}} <span>{{ date('M d, Y', strtotime($productComment->created_at))  }}</span></h5>
                                                    <div class="at-reply">{{ $productComment->messages}}</div>
                                                </div>
                                            </div>
                                            @endforeach
                                    
                                        </div>
                                        
                                        <div class="leave-comment">
                                            <h4>Để lại bình luận</h4>
                                            <form action=""  method="post" class="comment-form">
                                                @csrf

                                                <input type="hidden" name="product_id" value="{{ $product->id}}">
                                                <input type="hidden" name="user_id" value="{{\Illuminate\Support\Facades\Auth::user()->id ?? null}}">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Tên" name="name" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email" name="email"/>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Lời nhắn nhủ" name="messages"></textarea>

                                                        <div class="personal-rating">
                                                            <h6>Đánh giá của bạn</h6>
                                                            <div class="rate">
                                                                <input type="radio" id="star5" name="rating" value="5" />
                                                                <label for="star5" title="text">5 stars</label>
                                                                <input type="radio" id="star4" name="rating" value="4" />
                                                                <label for="star4" title="text">4 stars</label>
                                                                <input type="radio" id="star3" name="rating" value="3" />
                                                                <label for="star3" title="text">3 stars</label>
                                                                <input type="radio" id="star2" name="rating" value="2" />
                                                                <label for="star2" title="text">2 stars</label>
                                                                <input type="radio" id="star1" name="rating" value="1" />
                                                                <label for="star1" title="text">1 star</label>
                                                            </div>
                                                        </div>


                                                        <button type="submit" class="site-btn">
                                                            Gửi tin nhắn
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--mục chi tiết sản phẩm START-->
        </div>
    </div>
</section>
<!--sản phẩm trong shop END-->

<!--danh sách sản phẩm liên quan START-->
<div class="related-products spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>Sản Phẩm Liên Quan</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach($relatedProducts as $product)
            <div class="col-lg-3 col-sm-6">
                @include('front.components.product-item')
            </div>
            @endforeach
            
            </div>
        </div>
    </div>

<!--danh sách sản phẩm liên quan END-->

@endsection