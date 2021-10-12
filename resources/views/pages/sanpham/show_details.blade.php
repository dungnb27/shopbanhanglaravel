@extends('layout')
@section('content')

    @foreach ($details_product as $key => $value)
        <div class="product-details">
            <!--product-details-->
            <style>
                li.active {
                    border: solid 2px #8860D0;
                }

            </style>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background: none">
                    <li class="breadcrumb-item"><a href="{{ URL('trang-chu') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a
                            href="{{ URL('danh-muc-san-pham/' . $cate_slug) }}">{{ $product_cate }}</a>
                    </li>
                    <li class="breadcrumb-item" aria-current="page">{{ $meta_title }}</li>
                </ol>
            </nav>
            <div class="col-sm-5">
                <ul id="imageGallery">
                    @foreach ($gallery as $key => $gal)
                        <li data-thumb="{{ asset('public/uploads/gallery/' . $gal->gallery_image) }}"
                            data-src="{{ asset('public/uploads/gallery/' . $gal->gallery_image) }}">
                            <img width="100%" alt="{{ $gal->gallery_name }}"
                                src="{{ asset('public/uploads/gallery/' . $gal->gallery_image) }}" />
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    <!--/product-information-->
                    <img src="{{ asset('public/frontend/imagesuct-details/new') }}.jpg" class="newarrival" alt="" />
                    <h2>{{ $value->product_name }}</h2>
                    <p>Mã sản phẩm: {{ $value->product_id }}</p>
                    <img src="{{ asset('public/frontend/imagesuct-details/rating') }}.png" alt="" />

                    <form action="{{ URL::to('/save-cart') }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $value->product_id }}"
                            class="cart_product_id_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_name }}"
                            class="cart_product_name_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_image }}"
                            class="cart_product_image_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_price }}"
                            class="cart_product_price_{{ $value->product_id }}">
                        <input type="hidden" value="{{ $value->product_quantity }}"
                            class="cart_product_quantity_{{ $value->product_id }}">

                        <span>
                            <span>{{ number_format($value->product_price) . ' VNĐ' }}</span>
                            <label>Số lượng:</label>
                            <input name="qty" type="number" min="1" value="1"
                                class="cart_product_qty_{{ $value->product_id }}" />
                            <input name="productid_hiden" type="hidden" value="{{ $value->product_id }}" />
                            {{-- <button type="submit" class="btn btn-fefault cart">
                            <i class="fa fa-shopping-cart"></i>
                            Thêm vào giỏ hàng
                        </button> --}}
                        </span>
                        <input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart"
                            data-id_product="{{ $value->product_id }}" name="add-to-cart">
                    </form>

                    <p><b>Tình trạng:</b> Còn hàng</p>
                    <p><b>Trạng thái:</b> Mới</p>
                    <p><b>Danh mục:</b> {{ $value->category_name }}</p>
                    <p><b>Thương hiệu:</b> {{ $value->brand_name }}</p>
                    <style>
                        a.tags_style {
                            margin: 3px 2px;
                            border: solid 2px;
                            border-radius: 5px;
                            height: auto;
                            background: #428bca;
                            color: #ffff;
                            padding: 0px;
                        }

                        a.tags_style:hover {
                            background: black;
                        }

                    </style>
                    <fieldset>
                        <legend>Tags</legend>
                        <p><i class="fa fa-tag"></i>
                            @php
                                $tags = $value->product_tags;
                                $tags = explode(',', $tags);
                            @endphp
                            @foreach ($tags as $tag)
                                <a href="{{ url('/tag/' . str_slug($tag)) }}" class="tags_style">{{ $tag }}</a>
                            @endforeach
                        </p>
                    </fieldset>
                    <a href=""><img src="{{ asset('public/frontend/imagesuct-details/share') }}.png"
                            class="share img-responsive" alt="" /></a>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->

        <div class="category-tab shop-details-tab">
            <!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Mô tả</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
                    <li><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details">
                    <p>{!! $value->product_content !!}</p>
                </div>

                <div class="tab-pane fade" id="companyprofile">
                    <p>{!! $value->product_desc !!}</p>
                </div>
                <div class="tab-pane fade " id="reviews">
                    <div class="col-sm-12">
                        <ul>
                            <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                            <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                            <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                        </ul>
                        <style>
                            .style_comment {
                                border: 1px solid #ddd;
                                border-radius: 10px;
                                background: #C1C8E4;
                            }

                        </style>

                        <form action="">
                            @csrf
                            <input type="hidden" name="comment_product_id" class="comment_product_id"
                                value="{{ $value->product_id }}">

                            <div id="comment_show"></div>
                        </form>

                        <p><b>Viết đánh giá của bạn</b></p>

                        <!------Rating here---------->
                        <ul class="list-inline" title="Average Rating">
                            @for ($count = 1; $count <= 5; $count++)
                                @php
                                    if ($count <= $rating) {
                                        $color = 'color:#ffcc00;';
                                    } else {
                                        $color = 'color:#ccc;';
                                    }
                                    
                                @endphp
                                <li title="đánh giá sao" 
                                    id="{{ $value->product_id }}-{{ $count }}"
                                    data-index="{{ $count }}" 
                                    data-product_id="{{ $value->product_id }}"
                                    data-rating="{{ $rating }}" 
                                    class="rating"
                                    style="cursor:pointer; {{ $color }} font-size:30px;">
                                    &#9733;
                                </li>
                            @endfor
                        </ul>


                        <form action="#">
                            <span>
                                <input style="width:100%;margin-left: 0" type="text" class="comment_name"
                                    placeholder="Tên bình luận" />

                            </span>
                            <textarea name="comment" class="comment_content" placeholder="Nội dung bình luận"></textarea>
                            <div id="notify_comment"></div>

                            <button type="button" class="btn btn-default pull-right send-comment">
                                Gửi bình luận
                            </button>

                        </form>
                    </div>

                </div>
            </div>
            <!--/category-tab-->
    @endforeach
    <div class="fb-comments" data-href="{{ $url_canonical }}" data-width="" data-numposts="20"></div>
    <div class="recommended_items">
        <!--recommended_items-->
        <h2 class="title text-center">Sản phẩm tương tự</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    @foreach ($related_product as $key => $lienquan)
                        <a href="{{ URL::to('/chi-tiet-san-pham/' . $lienquan->product_id) }}">
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <form>
                                                @csrf
                                                <input type="hidden" value="{{ $lienquan->product_id }}"
                                                    class="cart_product_id_{{ $lienquan->product_id }}">
                                                <input type="hidden" value="{{ $lienquan->product_name }}"
                                                    class="cart_product_name_{{ $lienquan->product_id }}">
                                                <input type="hidden" value="{{ $lienquan->product_image }}"
                                                    class="cart_product_image_{{ $lienquan->product_id }}">
                                                <input type="hidden" value="{{ $lienquan->product_price }}"
                                                    class="cart_product_price_{{ $lienquan->product_id }}">
                                                <input type="hidden" value="1"
                                                    class="cart_product_qty_{{ $lienquan->product_id }}">
                                                <input type="hidden"
                                                    class="cart_product_quantity_{{ $lienquan->product_id }}"
                                                    value="{{ $lienquan->product_quantity }}">
                                                <input type="hidden" class="cart_product_qty_{{ $lienquan->product_id }}"
                                                    value="1">

                                                <a href="{{ URL::to('/chi-tiet-san-pham/' . $lienquan->product_id) }}">
                                                    <img src="{{ URL::to('public/uploads/product/' . $lienquan->product_image) }}"
                                                        alt="" />
                                                    <h2>{{ number_format($lienquan->product_price) . ' VNĐ' }}</h2>
                                                    <p>{{ $lienquan->product_name }}</p>
                                                </a>
                                                <button type="button" class="btn btn-default add-to-cart" name="add-to-cart"
                                                    data-id_product="{{ $lienquan->product_id }}">Thêm giỏ hàng</button>
                                                {{-- <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart"> --}}
                                            </form>
                                            {{-- <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
                                        <h2>{{number_format($lienquan->product_price).' VNĐ'}}</h2>
                                        <p>{{$lienquan->product_name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
    <!--/recommended_items-->
@endsection
