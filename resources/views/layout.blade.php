<!DOCTYPE html>
<html lang="vn">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- ------SEO------ --}}
    <meta name="description" content="{{ $meta_desc }}">
    <meta name="keywords" content="{{ $meta_keywords }}" />
    <link rel="canonical" href="{{ $url_canonical }}" />
    <meta name="robots" content="INDEX,FOLLOW" />
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="" />

    {{-- <meta property="og:image" content="{{$image_og}}" /> --}}
    <meta property="og:site_name" content="http://localhost/shopbanhanglaravel/" />
    {{-- <meta property="og:description" content="{{$meta_desc}}" />
	<meta property="og:title" content="{{$meta_title}}" /> --}}
    {{-- <meta property="og:url" content="{{$url_canonical}}" /> --}}
    <meta property="og:type" content="website" />

    {{-- ------SEO------ --}}
    <title>{{ $meta_title }}</title>
    {{-- <title>E-Shopper</title> --}}
    <link href="{{ asset('public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/sweetalert.css') }}" rel="stylesheet">

    <link href="{{ asset('public/frontend/css/lightgallery.min.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/lightslider.css') }}" rel="stylesheet">
    <link href="{{ asset('public/frontend/css/prettify.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}">


    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head>
<!--/head-->

<body>

    <header id="header">
        <!--header-->
        <div class="header_top">
            <!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0949418766</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> dungnb27@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header_top-->

        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{ URL::to('/trang-chu') }}"><img
                                    src="{{ asset('public/frontend/images/logo.png') }}" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-star"></i>Y??u th??ch</a></li>
                                <?php
                                $customer_id = Session::get('customer_id');
                                $shipping_id = Session::get('shipping_id');
                                if ($customer_id != null && $shipping_id == null) { ?>
                                <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-lock"></i>Thanh to??n</a>
                                </li>
                                <?php } elseif ($customer_id != null && $shipping_id != null) { ?>
                                <li><a href="{{ URL::to('/payment') }}"><i class="fa fa-lock"></i>Thanh to??n</a></li>
                                <?php } else { ?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i>Thanh
                                        to??n</a>
                                </li>
                                <?php }
                                ?>

                                <li><a href="{{ URL::to('/gio-hang') }}"><i class="fa fa-shopping-cart"></i>Gi???
                                        h??ng</a></li>
                                <?php
                                $customer_id = Session::get('customer_id');
                                if ($customer_id != null) { ?>
                                <li><a href="{{ URL::to('/history') }}"><i class="fa fa-lock"></i>
                                        L???ch s??? mua h??ng
                                    </a>

                                </li>
                                <li><a href="{{ URL::to('/logout-checkout') }}"><i class="fa fa-lock"></i>
                                        ????ng xu???t
                                    </a>

                                </li>
                                <li>
                                    <a href=""> <img width="15%" src="{{ Session::get('customer_picture') }}">
                                        {{ Session::get('customer_name') }}</a>
                                </li>
                                <?php } else { ?>
                                <li><a href="{{ URL::to('/login-checkout') }}"><i class="fa fa-lock"></i>
                                        ????ng nh???p</a>
                                </li>
                                <?php }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ URL::to('/trang-chu') }}" class="active">Trang ch???</a></li>
                                <li class="dropdown"><a href="#">S???n ph???m<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach ($category as $key => $danhmuc)
                                            @if ($danhmuc->category_parent == 0)
                                                <li><a
                                                        href="{{ URL::to('/danh-muc-san-pham/' . $danhmuc->slug_category_product) }}">{{ $danhmuc->category_name }}</a>
                                                </li>
                                                @foreach ($category as $key => $cate_sub)
                                                    @if ($cate_sub->category_parent == $danhmuc->category_id)
                                                        <ul>
                                                            <li><a
                                                                    href="{{ URL::to('/danh-muc-san-pham/' . $cate_sub->slug_category_product) }}">{{ $cate_sub->category_name }}</a>
                                                            </li>
                                                        </ul>
                                                    @endif
                                                @endforeach
                                            @endif

                                        @endforeach
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Tin t???c<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="blog.html">Blog List</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ URL::to('/gio-hang') }}">Gi??? h??ng</a></li>
                                <li><a href="contact-us.html">Li??n h???</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{ URL::to('/tim-kiem') }}" autocomplete="off" method="POST">
                            {{ csrf_field() }}
                            <div class="search_box pull-right">
                                <input type="text" style="width: 100%" name="keywords_submit" id="keywords"
                                    placeholder="T??m ki???m" />
                                <div id="search-ajax"></div>
                                <input type="submit" style="margin-top: 0;color:black" name="search_item"
                                    class="btn btn-primary btn-sm" value="T??m ki???m">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-bottom-->
    </header>
    <!--/header-->

    <section id="slider">
        <!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>

                        <div class="carousel-inner">
                            @php
                                $i = 0;
                            @endphp
                            @foreach ($slider as $key => $slide)
                                @php
                                    $i++;
                                @endphp
                                <div class="item {{ $i == 1 ? 'active' : '' }}">
                                    <div class="col-sm-12">
                                        <img alt="{{ $slide->slider_desc }}"
                                            src="{{ asset('public/uploads/slider/' . $slide->slider_image) }}"
                                            width="100%" class="girl img-responsive" alt="" />
                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh m???c s???n ph???m</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            @foreach ($category as $key => $cate)
                                <div class="panel panel-default">
                                    @if ($cate->category_parent == 0)
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordian"
                                                    href="#{{ $cate->slug_category_product }}">
                                                    <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                                    {{ $cate->category_name }}
                                                </a>
                                            </h4>
                                        </div>

                                        <div id="{{ $cate->slug_category_product }}" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <ul>
                                                    @foreach ($category as $key => $cate_sub)
                                                        @if ($cate_sub->category_parent == $cate->category_id)
                                                            <li><a
                                                                    href="{{ URL::to('/danh-muc-san-pham/' . $cate_sub->slug_category_product) }}">{{ $cate_sub->category_name }}</a>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endforeach


                        </div>
                        <!--/category-products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>Th????ng hi???u</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach ($brand as $key => $brand)
                                        <li><a href="{{ URL::to('/thuong-hieu-san-pham/' . $brand->brand_slug) }}">
                                                <span class="pull-right"></span>{{ $brand->brand_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                        <!--/brands_products-->

                        <div class="brands_products">
                            <!--brands_products-->
                            <h2>S???n ph???m y??u th??ch</h2>
                            <div class="brands-name">
                                <div id="row_wishlist" class="row">

                                </div>
                            </div>
                        </div>
                        <!--/brands_products-->


                    </div>
                </div>

                <div class="col-sm-9 padding-right">

                    @yield('content')

                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        {{-- <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/images/iframe1.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/images/iframe2.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/images/iframe3.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>

                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{ asset('public/frontend/images/iframe4.png') }}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                                <p>Circle of Hands</p>
                                <h2>24 DEC 2014</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="{{ asset('public/frontend/images/map.png') }}" alt="" />
                            <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Danh m???c</h2>
                            <ul class="nav nav-pills nav-stacked">
                                @foreach ($category as $key => $cate)
                                    @if ($cate->category_parent == 0)
                                        <li><a href="{{ URL::to('/danh-muc-san-pham/' . $cate_sub->slug_category_product) }}">{{ $cate->category_name }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="single-widget">
                            <h2>Th????ng hi???u</h2>
                            <ul class="nav nav-pills nav-stacked">
                                @foreach ($brand_footer as $key => $bra)
                                    <li><a href="{{ URL::to('/thuong-hieu-san-pham/' . $bra->brand_slug) }}">{{ $bra->brand_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>B???n ?????</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15674.645509580208!2d106.697647!3d10.837205!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3175285e6edd3495%3A0xf6cb4697a6b2b9c5!2zMzc3IFbGsOG7nW4gTMOgaSwgQW4gUGjDuiDEkMO0bmcsIFF14bqtbiAxMiwgVGjDoG5oIHBo4buRIEjhu5MgQ2jDrSBNaW5oLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1626072576933!5m2!1svi!2s" width="450" height="200" style="border:0;" allowfullscreen="" loading="lazy"></iframe></a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Company Information</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Store Location</a></li>
                                <li><a href="#">Affillate Program</a></li>
                                <li><a href="#">Copyright</a></li>
                            </ul>
                        </div>
                    </div> --}}
                    {{-- <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>About Shopper</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i
                                        class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Get the most recent updates from <br />our site and be updated your self...</p>
                            </form>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright ?? 2013 E-SHOPPER Inc. All rights reserved.</p>
                    <p class="pull-right">Designed by <span><a target="_blank"
                                href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->

    <script src="{{ asset('public/frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('public/frontend/js/main.js') }}"></script>
    {{-- <script language="javascript" src="{{asset('http://code.jquery.com/jquery-2.0.0.min.js')}}"></script> --}}
    <script src="{{ asset('public/frontend/js/sweetalert.min.js') }}"></script>

    <script src="{{ asset('public/frontend/js/lightgallery-all.min.js') }}"></script>
    <script src="{{ asset('public/frontend/js/lightslider.js') }}"></script>
    <script src="{{ asset('public/frontend/js/prettify.js') }}"></script>
    {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') }}"></script> --}}
    <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
    <script src="https://www.paypalobjects.com/api/checkout.js"></script>
    <script>
        var usd = document.getElementById('vnd_to_usd').value;
        paypal.Button.render({
            // Configure environment
            env: 'sandbox',
            client: {
                sandbox: 'AeSIcRxGYXbI27l71mbakUARLOzptDy8WOlnBAwSxRxf7MjTGTa6FcSHM0hKviXJ8v-COfnElSN-aW5x',
                production: 'demo_production_client_id'
            },
            // Customize button (optional)
            locale: 'en_US',
            style: {
                size: 'small',
                color: 'gold',
                shape: 'pill',
            },

            // Enable Pay Now checkout flow (optional)
            commit: true,

            // Set up a payment
            payment: function(data, actions) {
                return actions.payment.create({
                    transactions: [{
                        amount: {
                            total: `${usd}`,
                            currency: 'USD'
                        }
                    }]
                });
            },
            // Execute the payment
            onAuthorize: function(data, actions) {
                return actions.payment.execute().then(function() {
                    // Show a confirmation message to the buyer
                    swal({
                            title: "X??c nh???n ????n h??ng",
                            text: "B???n ???? ?????t h??ng th??nh c??ng, nh???n ok ????? ti???p t???c!",
                            type: "warning",
                            //showCancelButton: true,
                            confirmButtonClass: "btn-success",
                            button: "C???m ??n, Mua h??ng",
                            cancelButtonText: "????ng,ch??a mua",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                var shipping_email = $('.shipping_email').val();
                                var shipping_name = $('.shipping_name').val();
                                var shipping_address = $('.shipping_address').val();
                                var shipping_phone = $('.shipping_phone').val();
                                var shipping_note = $('.shipping_note').val();
                                var shipping_method = $('.payment_select').val();
                                var order_fee = $('.order_fee').val();
                                var order_coupon = $('.order_coupon').val();
                                var _token = $('input[name="_token"]').val();
                                $.ajax({
                                    url: '{{ url('/confirm-order') }}',
                                    method: 'POST',
                                    data: {
                                        shipping_email: shipping_email,
                                        shipping_name: shipping_name,
                                        shipping_address: shipping_address,
                                        shipping_phone: shipping_phone,
                                        shipping_note: shipping_note,
                                        shipping_method: shipping_method,
                                        order_fee: order_fee,
                                        order_coupon: order_coupon,
                                        _token: _token
                                    },
                                    success: function(data) {
                                        swal("????n h??ng",
                                            "????n h??ng c???a b???n ???? ???????c g???i th??nh c??ng",
                                            "success");

                                    }
                                });

                                window.setTimeout(function() {
                                    location.reload();
                                }, 3000);

                            } else {
                                swal("????ng", "????n h??ng ch??a ???????c g???i, l??m ??n ho??n t???t ????n h??ng",
                                    "error");
                            }
                        });
                });
            }
        }, '#paypal-button');
    </script>
    <script>
        $(function() {
            $("#slider-range").slider({
                range: true,

                min: 1000000,
                max: 100000000,

                steps: 10000,
                values: [{{ $min_price }}, {{ $max_price }}],

                slide: function(event, ui) {
                    // $( "#amount_start" ).val(ui.values[ 0 ]);
                    // $( "#amount_end" ).val(ui.values[ 1 ]);

                    $('#amount').val("??" + ui.values[0] + " - ??" + ui.values[1]);

                    $("#start_price").val(ui.values[0]);
                    $("#end_price").val(ui.values[1]);
                }
            });
            // $( "#amount_start" ).val($( "#slider-range" ).slider("values",0));
            // $( "#amount_end" ).val($( "#slider-range" ).slider("values",1));
        });
    </script>
    {{-- <script type="text/javascript">
        $(document).ready(function(){

           $( "#slider-range" ).slider({
              orientation: "horizontal",
              range: true,

              min:{{$min_price_range}},
              max:{{$max_price_range}},

              steps:10000,
              values: [ {{$min_price}}, {{$max_price}} ],
             
              slide: function( event, ui ) {
                $( "#amount_start" ).val(ui.values[ 0 ]).simpleMoneyFormat();
                $( "#amount_end" ).val(ui.values[ 1 ]).simpleMoneyFormat();


                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);

              }

            });

            $( "#amount_start" ).val($( "#slider-range" ).slider("values",0)).simpleMoneyFormat();
            $( "#amount_end" ).val($( "#slider-range" ).slider("values",1)).simpleMoneyFormat();

        }); 
    </script> --}}
    <script type="text/javascript">
        $(document).ready(function() {

            $('#sort').on('change', function() {

                var url = $(this).val();
                // alert(url);
                if (url) {
                    window.location = url;
                }
                return false;
            });

        });
    </script>
    <script>
        function view() {


            if (localStorage.getItem('data') != null) {

                var data = JSON.parse(localStorage.getItem('data'));

                data.reverse();

                document.getElementById('row_wishlist').style.overflow = 'scroll';
                document.getElementById('row_wishlist').style.height = '500px';

                for (i = 0; i < data.length; i++) {

                    var name = data[i].name;
                    var price = data[i].price;
                    var image = data[i].image;
                    var url = data[i].url;

                    $('#row_wishlist').append(
                        '<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="' + image +
                        '"></div><div class="col-md-8 info_wishlist"><p>' + name + '</p><p style="color:#FE980F">' +
                        price + '</p><a href="' + url + '">?????t h??ng</a></div>');
                }

            }

        }

        view();




        function add_wistlist(clicked_id) {
            var id = clicked_id;
            var name = document.getElementById('wishlist_productname' + id).value;
            var price = document.getElementById('wishlist_productprice' + id).value;
            var image = document.getElementById('wishlist_productimage' + id).src;
            var url = document.getElementById('wishlist_producturl' + id).href;

            var newItem = {
                'url': url,
                'name': name,
                'price': price,
                'image': image,
                'id': id,
            }

            if (localStorage.getItem('data') == null) {
                localStorage.setItem('data', '[]');
            }

            var old_data = JSON.parse(localStorage.getItem('data'));

            // old_data.push(newItem);

            var matches = $.grep(old_data, function(obj) {
                return obj.id == id;
            });

            if (matches.length) {
                alert('S???n ph???m b???n ???? y??u th??ch,n??n kh??ng th??? th??m');
            } else {

                old_data.push(newItem);
                $('#row_wishlist').append(
                    '<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="' + newItem
                    .image + '"></div><div class="col-md-8 info_wishlist"><p>' + newItem.name +
                    '</p><p style="color:#FE980F">' + newItem.price + '</p><a href="' + newItem.url +
                    '">?????t h??ng</a></div>');

            }

            localStorage.setItem('data', JSON.stringify(old_data));
        }
    </script>
    <script>
        $(document).ready(function() {
            var cate_id = $('.tabs_pro').data('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('/product-tabs') }}",
                method: "POST",
                data: {
                    cate_id: cate_id,
                    _token: _token
                },
                success: function(data) {
                    $('#tabs_product').html(data);
                }
            });
            $('.tabs_pro').click(function() {

                var cate_id = $(this).data('id');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/product-tabs') }}",
                    method: "POST",
                    data: {
                        cate_id: cate_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#tabs_product').html(data);
                    }
                });

            });
        });
    </script>
    <script type="text/javascript">
        function remove_background(product_id) {
            for (var count = 1; count <= 5; count++) {
                $('#' + product_id + '-' + count).css('color', '#ccc');
            }
        }
        //hover chu???t ????nh gi?? sao
        $(document).on('mouseenter', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            // alert(index);
            // alert(product_id);
            remove_background(product_id);
            for (var count = 1; count <= index; count++) {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });
        //nh??? chu???t ko ????nh gi??
        $(document).on('mouseleave', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var rating = $(this).data("rating");
            remove_background(product_id);
            //alert(rating);
            for (var count = 1; count <= rating; count++) {
                $('#' + product_id + '-' + count).css('color', '#ffcc00');
            }
        });

        //click ????nh gi?? sao
        $(document).on('click', '.rating', function() {
            var index = $(this).data("index");
            var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('insert-rating') }}",
                method: "POST",
                data: {
                    index: index,
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    if (data == 'done') {
                        alert("B???n ???? ????nh gi?? " + index + " tr??n 5");
                    } else {
                        alert("L???i ????nh gi??");
                    }
                }
            });

        });
    </script>
    <script>
        $(document).ready(function() {

            load_comment();

            function load_comment() {
                var product_id = $('.comment_product_id').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/load-comment') }}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#comment_show').html(data);
                    }
                });
            }

            $('.send-comment').click(function() {
                var product_id = $('.comment_product_id').val();
                var comment_name = $('.comment_name').val();
                var comment_content = $('.comment_content').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/send-comment') }}",
                    method: "POST",
                    data: {
                        product_id: product_id,
                        comment_name: comment_name,
                        comment_content: comment_content,
                        _token: _token
                    },
                    success: function(data) {
                        $('#notify_comment').html(
                            '<p>Th??m b??nh lu???n th??nh c??ng, b??nh lu???n ??ang ch??? duy???t</p>');
                        load_comment();
                        $('#notify_comment').fadeOut(5000);
                        $('comment_name').val("");
                        $('comment_content').val("");
                    }
                });
            })
        });
    </script>
    <script>
        $('.xemnhanh').click(function() {
            var product_id = $(this).data('id_product');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{ url('/quickview') }}',
                method: 'POST',
                dataType: "JSON",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {
                    $('#product_quickview_title').html(data.product_name);
                    $('#product_quickview_id').html(data.product_id);
                    $('#product_quickview_price').html(data.product_price);
                    $('#product_quickview_image').html(data.product_image);
                    $('#product_quickview_gallery').html(data.product_gallery);
                    $('#product_quickview_desc').html(data.product_desc);
                    $('#product_quickview_content').html(data.product_content);
                    $('#product_quickview_value').html(data.product_quickview_value);
                    $('#product_quickview_button').html(data.product_button);
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var query = $(this).val();

            if (query != '') {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: "{{ url('/autocomplete-ajax') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search-ajax').fadeIn();
                        $('#search-ajax').html(data);
                    }
                });

            } else {

                $('#search-ajax').fadeOut();
            }
        });

        $(document).on('click', '.li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery: true,
                item: 1,
                loop: true,
                thumbItem: 3,
                slideMargin: 0,
                enableDrag: false,
                currentPagerPosition: 'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.send_order').click(function() {
                swal({
                        title: "X??c nh???n ????n h??ng",
                        text: "????n h??ng s??? kh??ng ???????c ho??n tr??? khi ?????t,b???n c?? mu???n ?????t kh??ng?",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-success",
                        confirmButtonText: "C???m ??n, Mua h??ng",

                        cancelButtonText: "????ng,ch??a mua",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {
                            var shipping_email = $('.shipping_email').val();
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_note = $('.shipping_note').val();
                            var shipping_method = $('.payment_select').val();
                            var order_fee = $('.order_fee').val();
                            var order_coupon = $('.order_coupon').val();
                            var _token = $('input[name="_token"]').val();
                            $.ajax({
                                url: '{{ url('/confirm-order') }}',
                                method: 'POST',
                                data: {
                                    shipping_email: shipping_email,
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_note: shipping_note,
                                    shipping_method: shipping_method,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    _token: _token
                                },
                                success: function(data) {
                                    swal("????n h??ng",
                                        "????n h??ng c???a b???n ???? ???????c g???i th??nh c??ng",
                                        "success");

                                }
                            });

                            window.setTimeout(function() {
                                location.reload();
                            }, 3000);

                        } else {
                            swal("????ng", "????n h??ng ch??a ???????c g???i, l??m ??n ho??n t???t ????n h??ng", "error");
                        }
                    });
            });
        });
    </script>
    {{-- Th??mm gi??? h??ng --}}
    <script>
        $(document).ready(function() {
            $('.add-to-cart').click(function() {
                var id = $(this).data('id_product');

                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var _token = $('input[name="_token"]').val();
                if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                    alert('L??m ??n ?????t nh??? h??n' + cart_product_quantity);
                } else {
                    $.ajax({
                        url: '{{ url('/add-cart-ajax') }}',
                        method: 'POST',
                        data: {
                            cart_product_id: cart_product_id,
                            cart_product_name: cart_product_name,
                            cart_product_image: cart_product_image,
                            cart_product_price: cart_product_price,
                            cart_product_qty: cart_product_qty,
                            cart_product_quantity: cart_product_quantity,
                            _token: _token
                        },
                        success: function(data) {
                            swal({
                                    title: "???? th??m s???n ph???m v??o gi??? h??ng",
                                    text: "B???n c?? th??? mua h??ng ti???p ho???c t???i gi??? h??ng ????? ti???n h??nh thanh to??n",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem ti???p",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "??i ?????n gi??? h??ng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{ url('/gio-hang') }}";
                                });

                        }
                    });
                }

            });
        });
    </script>
    {{-- Th??m gi??? h??ng quick view --}}
    <script>
        $(document).on('click', '.add-to-cart-quickview', function() {
            var id = $(this).data('id_product');

            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var _token = $('input[name="_token"]').val();
            if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                alert('L??m ??n ?????t nh??? h??n' + cart_product_quantity);
            } else {
                $.ajax({
                    url: '{{ url('/add-cart-ajax') }}',
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        cart_product_quantity: cart_product_quantity,
                        _token: _token
                    },
                    beforeSend: function() {
                        $("#beforesend_quickview").html(
                            "<p class='text text-primary'>??ang th??m s???n ph???m v??o gi??? h??ng</p>")
                    },
                    success: function(data) {
                        $("#beforesend_quickview").html(
                            "<p class='text text-success'>S???n ph???m ???? th??m v??o gi??? h??ng</p>")
                        $('#buy_quickview').attr('disabled', true);
                    }
                });
            }
        });
    </script>
    <script>
        $(document).on('click', '.redirect-cart', function() {
            window.location.href = "{{ url('/gio-hang') }}";
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';
                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ URL('/select-delivery-home') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.calculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' && maqh == '' && xaid == '') {
                    alert('L??m ??n ch???n ????? t??nh ph?? v???n chuy???n');
                } else {
                    $.ajax({
                        url: '{{ URL('/calculate-fee') }}',
                        method: 'POST',
                        data: {
                            matp: matp,
                            maqh: maqh,
                            xaid: xaid,
                            _token: _token
                        },
                        success: function(data) {
                            location.reload();
                        }
                    });
                }

            });
        });
    </script>
    {{-- <script src="{{asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script> --}}
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0"
        nonce="7IxmDu3y"></script>

    <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
        var chatbox = document.getElementById('fb-customer-chat');
        chatbox.setAttribute("page_id", "102858475399796");
        chatbox.setAttribute("attribution", "biz_inbox");

        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v11.0'
            });
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</body>

</html>
