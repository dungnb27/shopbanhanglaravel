<!DOCTYPE html>

<head>
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type=" application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- bootstrap-css -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap.min.css') }}">
    <!-- //bootstrap-css -->
    <!-- Custom CSS -->
    <link href="{{ asset('public/backend/css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('public/backend/css/style-responsive.css') }}" rel="stylesheet" />
    <!-- font CSS -->
    <link
        href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- font-awesome icons -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/font.css') }}" type="text/css" />
    <link href="{{ asset('public/backend/css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/backend/css/morris.css') }}" type="text/css" />
    <!-- calendar -->
    <link rel="stylesheet" href="{{ asset('public/backend/css/monthly.css') }}">
    <!-- //calendar -->
    <link rel="stylesheet" href="{{ asset('//cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/backend/css/bootstrap-tagsinput.css') }}">
    <!-- //font-awesome icons -->

    <link rel="stylesheet" href="{{ asset('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css') }}">

    <script src="{{ asset('public/backend/js/jquery2.0.3.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/raphael-min.js') }}"></script>
    <script src="{{ asset('public/backend/js/morris.js') }}"></script>

    {{-- <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js')}}"></script>
<script type="text/javascript">
	$.validate({

	});
</script> --}}
</head>

<body>
    <section id="container">
        <!--header start-->
        <header class="header fixed-top clearfix">
            <!--logo start-->
            <div class="brand">
                <a href="{{ URL::to('/dashboard') }}" class="logo">
                    Admin
                </a>
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars"></div>
                </div>
            </div>
            <!--logo end-->

            <div class="top-nav clearfix">
                <!--search & user info start-->
                <ul class="nav pull-right top-menu">
                    <li>
                        <input type="text" class="form-control search" placeholder=" Search">
                    </li>
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <img alt="" src="{{ asset('public/backend/images/2.png') }}">
                            <span class="username">
                                <?php
                                if (Session::get('login_normal')) {
                                $name = Session::get('admin_name');
                                } else {
                                $name = Auth::user()->admin_name;
                                }
                                if ($name) {
                                echo $name;
                                }
                                ?>
                            </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <li><a href="#"><i class=" fa fa-suitcase"></i>Th??ng tin c?? nh??n</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>C??i ?????t</a></li>
                            <li><a href="{{ URL::to('/logout-auth') }}"><i class="fa fa-key"></i> ????ng xu???t</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->

                </ul>
                <!--search & user info end-->
            </div>
        </header>
        <!--header end-->
        <!--sidebar start-->
        <aside>
            <div id="sidebar" class="nav-collapse">
                <!-- sidebar menu start-->
                <div class="leftside-navigation">
                    <ul class="sidebar-menu" id="nav-accordion">
                        <li>
                            <a class="active" href="{{ URL::to('/dashboard') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>T???ng quan</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Banner</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/manage-slider') }}">Qu???n l?? Banner</a></li>
                                <li><a href="{{ URL::to('/add-slider') }}">Th??m Banner</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>????n h??ng</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/manage-order') }}">Qu???n l?? ????n h??ng</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>M?? gi???m gi??</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/insert-coupon') }}">Qu???n l?? m?? gi???m gi??</a></li>
                                <li><a href="{{ URL::to('/list-coupon') }}">Li???t k?? m?? gi???m gi??</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>V???n chuy???n</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/delivery') }}">Qu???n l?? v???n chuy???n</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Danh m???c s???n ph???m</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/add-category-product') }}">Th??m danh m???c s???n ph???m</a></li>
                                <li><a href="{{ URL::to('/all-category-product') }}">Li???t k?? danh m???c s???n ph???m</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-tasks"></i>
                                <span>Th????ng hi???u s???n ph???m</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/add-brand-product') }}">Th??m th????ng hi???u s???n ph???m</a></li>
                                <li><a href="{{ URL::to('/all-brand-product') }}">Li???t k?? th????ng hi???u s???n ph???m</a>
                                </li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-product-hunt"></i>
                                <span>S???n ph???m</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/add-product') }}">Th??m s???n ph???m</a></li>
                                <li><a href="{{ URL::to('/all-product') }}">Li???t k?? s???n ph???m</a></li>
                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-product-hunt"></i>
                                <span>B??nh lu???n</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/comment') }}">Li???t k?? b??nh lu???n</a></li>
                            </ul>
                        </li>


                        @hasrole(['admin','author'])

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-book"></i>
                                <span>Users</span>
                            </a>
                            <ul class="sub">
                                <li><a href="{{ URL::to('/add-users') }}">Th??m user</a></li>
                                <li><a href="{{ URL::to('/users') }}">Danh s??ch user</a></li>

                            </ul>
                        </li>

                        @endhasrole

                        @impersonate
                        <li>
                            <a class="" href="{{ URL::to('/impersonate-destroy') }}">
                                <i class="fa fa-dashboard"></i>
                                <span>D???ng chuy???n quy???n</span>
                            </a>
                        </li>
                        @endimpersonate

                    </ul>
                </div>
                <!-- sidebar menu end-->
            </div>
        </aside>
        <!--sidebar end-->
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                @yield('admin_content')
            </section>

        </section>
        <!-- footer -->
        {{-- <div class="footer">
	<div class="wthree-copyright">
	  <p style="text-align: center">?? 2017 Visitors. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
	</div>
  </div> --}}
        <!-- / footer -->
        <!--main content end-->
    </section>
    <script src="{{ asset('public/backend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.dcjqaccordion.2.7.js') }}"></script>
    <script src="{{ asset('public/backend/js/scripts.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.nicescroll.js') }}"></script>
    {{-- <script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/formvalidation/0.6.2-dev/js/formValidation.min.js')}}"></script> --}}
    <script src="{{ asset('public/backend/js/formValidation.min.js') }}"></script>
    <script src="{{ asset('//cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/jquery.form-validator.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/bootstrap-tagsinput.js') }}"></script>
    {{-- <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js') }}"></script> --}}
    <script src="{{ asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
    <script src="{{ asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js') }}"></script>
    <script src="{{ asset('public/backend/js/simple.money.format.js') }}"></script>
    <script>
        $('.price_format').simpleMoneyFormat();
    </script>
    <script>
        $(document).ready(function() {

            //     });
            var donut = Morris.Donut({
                element: 'donut',
                resize: true,
                colors: [
                    // '#a8328e',
                    // '#61a1ce',
                    '#ce8f61',
                    '#f5b942',
                    '#4842f5'

                ],
                //labelColor:"#cccccc", // text color
                //backgroundColor: '#333333', // border color
                data: [{
                        label: "S???n ph???m",
                        value: <?php echo $app_product; ?>
                    },
                    {
                        label: "????n h??ng",
                        value: <?php echo $app_order; ?>
                    },
                    {
                        label: "Kh??ch h??ng",
                        value: <?php echo $app_customer; ?>
                    }
                ]
            });

        });
    </script>

    
    <script type="text/javascript">
        $(document).ready(function() {

            chart60daysorder();

            var chart = new Morris.Bar({

                element: 'chart',
                //option chart
                lineColors: ['#819C79', '#fc8710', '#FF6541', '#A4ADD3', '#766B56'],
                parseTime: false,
                hideHover: 'auto',

                xkey: 'period',
                ykeys: ['order', 'sales', 'profit', 'quantity'],
                labels: ['????n h??ng', 'Doanh s???', 'L???i nhu???n', 'S??? l?????ng']

            });



            function chart60daysorder() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/days-order') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        _token: _token
                    },

                    success: function(data) {
                        chart.setData(data);
                    }
                });
            }

            $('.dashboard-filter').change(function() {
                var dashboard_value = $(this).val();
                var _token = $('input[name="_token"]').val();
                //alert(dashboard_value);
                $.ajax({
                    url: "{{ url('/dashboard-filter') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        dashboard_value: dashboard_value,
                        _token: _token
                    },

                    success: function(data) {
                        chart.setData(data);
                    }
                });

            });

            $('#btn-dashboard-filter').click(function() {

                var _token = $('input[name="_token"]').val();

                var from_date = $('#datepicker').val();
                var to_date = $('#datepicker2').val();

                $.ajax({
                    url: "{{ url('/filter-by-date') }}",
                    method: "POST",
                    dataType: "JSON",
                    data: {
                        from_date: from_date,
                        to_date: to_date,
                        _token: _token
                    },

                    success: function(data) {
                        chart.setData(data);
                    }
                });

            });

        });
    </script>
    <script type="text/javascript">
        $(function() {
            $("#datepicker").datepicker({
                prevText: "Th??ng tr?????c",
                nextText: "Th??ng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
                duration: "slow"
            });
            $("#datepicker2").datepicker({
                prevText: "Th??ng tr?????c",
                nextText: "Th??ng sau",
                dateFormat: "yy-mm-dd",
                dayNamesMin: ["Th??? 2", "Th??? 3", "Th??? 4", "Th??? 5", "Th??? 6", "Th??? 7", "Ch??? nh???t"],
                duration: "slow"
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#category_order').sortable({
                placeholder: 'ui-state-highlight',
                update: function(event, ui) {
                    var page_id_array = new Array();
                    var _token = $('input[name="_token"]').val();

                    $('#category_order tr').each(function() {
                        page_id_array.push($(this).attr("id"));
                    });
                    $.ajax({
                        url: "{{ url('/arrange-category') }}",
                        method: "POST",
                        data: {
                            page_id_array: page_id_array,
                            _token: _token
                        },
                        success: function(data) {
                            alert(data);
                        }
                    });

                }
            });
        });
    </script>
    <script>
        $('.btn-reply-comment').click(function() {
            var comment_id = $(this).data('comment_id');
            var comment = $('.reply_comment_' + comment_id).val();
            var comment_product_id = $(this).data('product_id');

            $.ajax({
                url: "{{ URL('/reply-comment') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment: comment,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(data) {
                    $('.reply_comment_' + comment_id).val('');
                    $('#notify_comment').html(
                        '<span class="text text-alert">Tr??? l???i b??nh lu???n th??nh c??ng</span>');
                    location.reload();
                }
            });
        });
    </script>
    <script>
        $('.comment_duyet_btn').click(function() {
            var comment_status = $(this).data('comment_status');
            var comment_id = $(this).data('comment_id');
            var comment_product_id = $(this).attr('id');
            if (comment_status == 0) {
                var alert = "Duy???t b??nh lu???n th??nh c??ng";
            } else {
                var alert = "B??? duy???t b??nh lu???n th??nh c??ng";
            }
            $.ajax({
                url: "{{ URL('/allow-comment') }}",
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    comment_status: comment_status,
                    comment_id: comment_id,
                    comment_product_id: comment_product_id
                },
                success: function(data) {
                    $('#notify_comment').html('<span class="text text-alert">' + alert + '</span>');
                    location.reload();
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
    
    <script>
        $(document).ready(function() {

            load_gallery();

            //Hi???n th??? ???nh
            function load_gallery() {
                var pro_id = $('.pro_id').val();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{ URL('/select-gallery') }}',
                    method: 'POST',
                    data: {
                        pro_id: pro_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#gallery_load').html(data);

                    }
                });

            }

            //Ki???m tra file ???nh
            $('#file').change(function() {
                var error = "";
                var files = $('#file')[0].files;

                if (files.length > 5) {
                    error += "<p>B???n ch???n t???i ??a ch??? ???????c 5 ???nh</p>"
                } else if (files.length = "") {
                    error += "<p>B???n kh??ng ???????c b??? tr???ng ???nh</p>"
                } else if (files.size > 2000000) {
                    error += "<p>File ???nh kh??ng ???????c l???n h??n 2MB</p>"
                }

                if (error == '') {

                } else {
                    $('#file').val('');
                    $('#error_gallery').html('<span class="text-danger">' + error + '</span>');
                    return false;
                }

            });

            //C???p nh???t t??n h??nh
            $(document).on('blur', '.edit_gal_name', function() {
                var gal_id = $(this).data('gal_id');
                var gal_text = $(this).text();
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url: '{{ URL('/update-gallery-name') }}',
                    method: 'POST',
                    data: {
                        gal_id: gal_id,
                        gal_text: gal_text,
                        _token: _token
                    },
                    success: function(data) {
                        load_gallery();
                        $('#error_gallery').html(
                            '<span class="text-danger">C???p nh???t t??n h??nh ???nh th??nh c??ng</span>'
                        );

                    }
                });
            });

            //Xo?? h??nh
            $(document).on('click', '.delete-gallery', function() {
                var gal_id = $(this).data('gal_id');
                var _token = $('input[name="_token"]').val();

                if (confirm('B???n mu???n xo?? h??nh ???nh n??y kh??ng')) {
                    $.ajax({
                        url: '{{ URL('/delete-gallery') }}',
                        method: 'POST',
                        data: {
                            gal_id: gal_id,
                            _token: _token
                        },
                        success: function(data) {
                            load_gallery();
                            $('#error_gallery').html(
                                '<span class="text-danger">Xo?? h??nh ???nh th??nh c??ng</span>'
                            );

                        }
                    });
                }
            });

            //C???p nh???t h??nh ???nh
            $(document).on('change', '.file_image', function() {

                var gal_id = $(this).data('gal_id');
                var image = document.getElementById('file-' + gal_id).files[0];



                var form_data = new FormData();

                form_data.append("file", document.getElementById('file-' + gal_id).files[0]);
                form_data.append("gal_id", gal_id);


                $.ajax({
                    url: "{{ URL('/update-gallery') }}",
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        load_gallery();
                        $('#error_gallery').html(
                            '<span class="text-danger">C???p nh???t h??nh ???nh th??nh c??ng</span>'
                        );

                    }
                });

            });



        });
    </script>

    <script type="text/javascript">
        function ChangeToSlug() {
            var slug;

            //L???y text t??? th??? input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
            slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
            slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
            slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
            slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
            slug = slug.replace(/??|???|???|???|???/gi, 'y');
            slug = slug.replace(/??/gi, 'd');
            //X??a c??c k?? t??? ?????t bi???t
            slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
            //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
            slug = slug.replace(/ /gi, "-");
            //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
            //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
            slug = slug.replace(/\-\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-\-/gi, '-');
            slug = slug.replace(/\-\-\-/gi, '-');
            slug = slug.replace(/\-\-/gi, '-');
            //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
            slug = '@' + slug + '@';
            slug = slug.replace(/\@\-|\-\@|\@/gi, '');
            //In slug ra textbox c?? id ???slug???
            document.getElementById('convert_slug').value = slug;
        }
    </script>

    <script>
        $('.update_quantity_order').click(function() {
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_' + order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();



            $.ajax({
                url: '{{ URL('/update-qty') }}',
                method: 'POST',
                data: {
                    order_product_id: order_product_id,
                    order_qty: order_qty,
                    order_code: order_code,
                    _token: _token
                },
                success: function(data) {
                    alert("C???p nh???t s??? l?????ng th??nh c??ng");
                    location.reload();

                }
            });
        });
    </script>

    <script>
        $('.order_details').change(function() {
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();

            //lay ra so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function() {
                quantity.push($(this).val());
            });

            //lay ra product id
            order_product_id = [];
            $("input[name='order_product_id']").each(function() {
                order_product_id.push($(this).val());
            });

            j = 0;

            for (i = 0; i < order_product_id.length; i++) {
                //S??? l?????ng kh??ch ?????t
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                //S??? l?????ng t???n kho
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();

                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j == 1) {
                        alert('S??? l?????ng b??n trong kho kh??ng ?????');
                    }
                    $('.color_qty_' + order_product_id[i]).css('background', 'red');
                }
            }
            if (j == 0) {
                $.ajax({
                    url: '{{ URL('/update-order-qty') }}',
                    method: 'POST',
                    data: {
                        order_status: order_status,
                        order_id: order_id,
                        quantity: quantity,
                        order_product_id: order_product_id,
                        _token: _token
                    },
                    success: function(data) {
                        alert("C???p nh???t t??nh tr???ng th??nh c??ng");
                        location.reload();

                    }
                });
            }


        });
    </script>
    
  




    <script type="text/javascript">
        $.validate({

        });
    </script>
    <script src="{{ asset('public/backend/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor1', {
            filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('file-browser?_token=' . csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });

        CKEDITOR.replace('ckeditor2', {
            filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('file-browser?_token=' . csrf_token()) }}",
            filebrowserUploadMethod: 'form'

        });

        CKEDITOR.replace('ckeditor3', {
            filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('file-browser?_token=' . csrf_token()) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('ckeditor4', {
            filebrowserImageUploadUrl: "{{ url('uploads-ckeditor?_token=' . csrf_token()) }}",
            filebrowserBrowseUrl: "{{ url('file-browser?_token=' . csrf_token()) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{ asset('public/backend/js/jquery.scrollTo.js') }}"></script>
    <!-- morris JavaScript -->
    <script>
        $(document).ready(function() {
            //BOX BUTTON SHOW AND CLOSE
            jQuery('.small-graph-box').hover(function() {
                jQuery(this).find('.box-button').fadeIn('fast');
            }, function() {
                jQuery(this).find('.box-button').fadeOut('fast');
            });
            jQuery('.small-graph-box .box-close').click(function() {
                jQuery(this).closest('.small-graph-box').fadeOut(200);
                return false;
            });

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#dddddd',
                axes: true,
                resize: true,
                smooth: true,
                pointSize: 0,
                lineWidth: 0,
                fillOpacity: 0.85,
                data: [{
                        period: '2015 Q1',
                        iphone: 2668,
                        ipad: null,
                        itouch: 2649
                    },
                    {
                        period: '2015 Q2',
                        iphone: 15780,
                        ipad: 13799,
                        itouch: 12051
                    },
                    {
                        period: '2015 Q3',
                        iphone: 12920,
                        ipad: 10975,
                        itouch: 9910
                    },
                    {
                        period: '2015 Q4',
                        iphone: 8770,
                        ipad: 6600,
                        itouch: 6695
                    },
                    {
                        period: '2016 Q1',
                        iphone: 10820,
                        ipad: 10924,
                        itouch: 12300
                    },
                    {
                        period: '2016 Q2',
                        iphone: 9680,
                        ipad: 9010,
                        itouch: 7891
                    },
                    {
                        period: '2016 Q3',
                        iphone: 4830,
                        ipad: 3805,
                        itouch: 1598
                    },
                    {
                        period: '2016 Q4',
                        iphone: 15083,
                        ipad: 8977,
                        itouch: 5185
                    },
                    {
                        period: '2017 Q1',
                        iphone: 10697,
                        ipad: 4470,
                        itouch: 2038
                    },

                ],
                lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script>
    <!-- calendar -->
    <script type="text/javascript" src="{{ asset('public/backend/js/monthly.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function() {

            $('#mycalendar').monthly({
                mode: 'event',

            });

            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });

            switch (window.location.protocol) {
                case 'http:':
                case 'https:':
                    // running on a server, should be good.
                    break;
                case 'file:':
                    alert('Just a heads-up, events will not work when run locally.');
            }

        });
    </script>
    <!-- //calendar -->
</body>

</html>
