@extends('layout')
@section('content')

    <section id="cart_items">
        <div class="container" style="width:auto;">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Thanh toán giỏ hàng</li>
                </ol>
            </div>

            {{-- <div class="register-req">
                <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng và xem lại lịch sử mua hàng</p>
         
            </div> --}}
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {!! session()->get('message') !!}
                </div>
            @elseif(session()->has('error'))
                <div class="alert alert-danger">
                    {!! session()->get('error') !!}
                </div>
            @endif
            <!--/register-req-->

            <div class="shopper-informations">
                <div class="row">

                    <div class="col-sm-6 clearfix">
                        <div class="bill-to">
                            <p>Thông tin gửi hàng</p>
                            <div class="form-one">
                                <form method="POST">
                                    @csrf
                                    <input type="text" name="shipping_name" value="{{ old('shipping_name') }}"
                                        class="shipping_name" placeholder="Họ và tên" required>
                                    <input type="text" name="shipping_email" value="{{ old('shipping_email') }}"
                                        class="shipping_email" placeholder="Email" required>
                                    <input type="text" name="shipping_address" value="{{ old('shipping_address') }}"
                                        class="shipping_address" placeholder="Địa chỉ" required>
                                    <input type="text" name="shipping_phone" value="{{ old('shipping_phone') }}"
                                        class="shipping_phone" placeholder="Số điện thoại" required>
                                    <textarea name="shipping_note" class="shipping_note"
                                        placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea><br>

                                    @if (Session::get('fee'))
                                        <input type="hidden" name="order_fee" class="order_fee"
                                            value="{{ Session::get('fee') }}">
                                    @else
                                        <input type="hidden" name="order_fee" class="order_fee" value="25000">
                                    @endif

                                    @if (Session::get('coupon'))
                                        @foreach (Session::get('coupon') as $key => $cou)
                                            <input type="hidden" name="order_coupon" class="order_coupon"
                                                value="{{ $cou['coupon_code'] }}">
                                        @endforeach
                                    @else
                                        <input type="hidden" name="order_coupon" class="order_coupon" value="no">
                                    @endif

                                    
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="bill-to">
                            <p>Thông tin vận chuyển</p>
                            <div class="form-one">
                                <form>
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn thành phố</label>
                                        <select name="city" id="city" class="form-control input-sm m-bot15 choose city">

                                            <option value="">--Chọn tỉnh thành phố--</option>
                                            @foreach ($city as $key => $ci)
                                                <option value="{{ $ci->matp }}">{{ $ci->name_city }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn quận huyện</label>
                                        <select name="province" id="province"
                                            class="form-control input-sm m-bot15 province choose">
                                            <option value="">--Chọn quận huyện--</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn xã phường</label>
                                        <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                            <option value="">--Chọn xã phường--</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                        <select name="payment_select" class="form-control input-sm m-bot15 payment_select">
                                            <option value="0">Chuyển khoản</option>
                                            <option value="1">Tiền mặt</option>
                                        </select>
                                    </div>
                                    <input type="button" name="calculate_order" value="Tính phí vận chuyển"
                                        class="btn btn-primary btn-sm calculate_delivery">
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 clearfix">

                        {{-- @if (session()->has('message'))
                            <div class="alert alert-success">
                                {!! session()->get('message') !!}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {!! session()->get('error') !!}
                            </div>
                        @endif --}}
                        <div class="table-responsive cart_info">
                            <form action="{{ URL('/update-cart') }}" method="POST">
                                @csrf
                                <table class="table table-condensed">
                                    <thead>
                                        <tr class="cart_menu">
                                            <td class="image">Hình ảnh</td>
                                            <td class="description">Tên sản phẩm</td>
                                            <td class="price">Giá</td>
                                            <td class="quantity">Số lượng</td>
                                            <td class="total">Thành tiền</td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (Session::get('cart') == true)
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach (Session::get('cart') as $key => $cart)
                                                @php
                                                    
                                                    $subtotal = $cart['product_qty'] * $cart['product_price'];
                                                    $total += $subtotal;
                                                @endphp


                                                <tr>
                                                    <td class="cart_product">
                                                        <a href=""><img
                                                                src="{{ asset('public/uploads/product/' . $cart['product_image']) }}"
                                                                width="50" /></a>
                                                    </td>
                                                    <td class="cart_description">
                                                        <h4><a href=""></a></h4>
                                                        <p>{{ $cart['product_name'] }}</p>
                                                    </td>
                                                    <td class="cart_price">
                                                        <p>{{ number_format($cart['product_price']) }}</p>
                                                    </td>
                                                    <td class="cart_quantity">
                                                        <div class="cart_quantity_button">
                                                            <input class="cart_quantity" type="number" min="1"
                                                                name="cart_qty[{{ $cart['session_id'] }}]"
                                                                value="{{ $cart['product_qty'] }}">
                                                        </div>
                                                    </td>
                                                    <td class="cart_total">
                                                        <p class="cart_total_price">
                                                            {{ number_format($subtotal) }}
                                                        </p>
                                                    </td>
                                                    <td class="cart_delete">
                                                        <a class="cart_quantity_delete"
                                                            href="{{ URL('/del-product/' . $cart['session_id']) }}"><i
                                                                class="fa fa-times"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td><input type="submit" value="Cập nhật giỏ hàng" name="update_qty"
                                                        class="check_out btn btn-default btn-sm"></td>
                                                <td><a class="btn btn-default check_out"
                                                        href="{{ url('/del-all-product') }}">Xóa tất cả</a></td>
                                                <td>
                                                    @if (Session::get('coupon'))
                                                        <a class="btn btn-default check_out"
                                                            href="{{ url('/unset-coupon') }}">Xóa mã khuyến mãi</a>
                                                    @endif
                                                </td>

                                                {{-- <td>
                                                    @if (Session::get('customer'))
                                                        <a class="btn btn-default check_out"
                                                            href="{{ url('/checkout') }}">Đặt hàng</a>
                                                    @else
                                                        <a class="btn btn-default check_out"
                                                            href="{{ url('/dang-nhap') }}">Đặt hàng</a>
                                                    @endif
                                                </td> --}}

                                                <td>

                                                    @if (Session::get('cart') == true)

                                                        <input style="color: white;background-color: red;font-size:18px" type="button" value="Đặt hàng" name="send_order"
                                                            class="btn btn-primary btn-sm send_order">
                                                    @else
                                                        <input type="button" disabled value="Đặt hàng"
                                                            name="send_order" class="btn btn-primary btn-sm send_order">
                                                    @endif
                                                </td>

                                                <td colspan="2">
                                                    <li>Tổng tiền :<span>{{ number_format($total, 0, ',', '.') }}đ</span>
                                                    </li>
                                                    @if (Session::get('coupon'))
                                                        <li>

                                                            @foreach (Session::get('coupon') as $key => $cou)
                                                                @if ($cou['coupon_condition'] == 1)
                                                                    Mã giảm : {{ $cou['coupon_number'] }} %
                                                                    <p>
                                                                        @php
                                                                            $total_coupon = ($total * $cou['coupon_number']) / 100;
                                                                            
                                                                        @endphp
                                                                    </p>
                                                                    <p>
                                                                        @php
                                                                            $total_after_coupon = $total - $total_coupon;
                                                                        @endphp
                                                                    </p>
                                                                @elseif($cou['coupon_condition']==2)
                                                                    Mã giảm :
                                                                    {{ number_format($cou['coupon_number'], 0, ',', '.') }}
                                                                    k
                                                                    <p>
                                                                        @php
                                                                            $total_coupon = $total - $cou['coupon_number'];
                                                                            
                                                                        @endphp
                                                                    </p>
                                                                    @php
                                                                        $total_after_coupon = $total_coupon;
                                                                    @endphp
                                                                @endif
                                                            @endforeach



                                                        </li>
                                                    @endif

                                                    @if (Session::get('fee'))
                                                        <li>
                                                            Phí vận chuyển
                                                            <span>{{ number_format(Session::get('fee'), 0, ',', '.') }}đ</span>
                                                            <a class="cart_quantity_delete"
                                                                href="{{ url('/del-fee') }}"><i
                                                                    class="fa fa-times"></i></a>
                                                            <?php $total_after_fee = $total +
                                                            Session::get('fee'); ?>
                                                        </li>
                                                    @endif
                                                    <li>Tổng còn:
                                                        @php
                                                            if (Session::get('fee') && !Session::get('coupon')) {
                                                                $total_after = $total_after_fee;
                                                                echo number_format($total_after, 0, ',', '.') . 'đ';
                                                            } elseif (!Session::get('fee') && Session::get('coupon')) {
                                                                $total_after = $total_after_coupon;
                                                                echo number_format($total_after, 0, ',', '.') . 'đ';
                                                            } elseif (Session::get('fee') && Session::get('coupon')) {
                                                                $total_after = $total_after_coupon;
                                                                $total_after = $total_after + Session::get('fee');
                                                                echo number_format($total_after, 0, ',', '.') . 'đ';
                                                            } elseif (!Session::get('fee') && !Session::get('coupon')) {
                                                                $total_after = $total;
                                                                echo number_format($total_after, 0, ',', '.') . 'đ';
                                                            }
                                                            
                                                        @endphp
                                                    </li>
                                                    <div class="col-md-12">
                                                        @php
                                                            $vnd_to_usd = $total_after / 23083;
                                                        @endphp
                                                        <div id="paypal-button"></div>
                                                        <input type="hidden" id="vnd_to_usd"
                                                            value="{{ round($vnd_to_usd, 2) }}">
                                                    </div>

                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="5">
                                                    <center>
                                                        @php
                                                            echo 'Giỏ hàng trống';
                                                        @endphp
                                                    </center>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>


                                </table>
                            </form>
                            @if (Session::get('cart'))
                                <tr>
                                    <td>
                                        <form action="{{ URL('/check-coupon') }}" method="POST">
                                            @csrf
                                            <input type="text" class="form-control" name="coupon"
                                                placeholder="Nhập mã giảm giá">
                                            <input type="submit" value="Tính mã giảm giá" name="check_coupon"
                                                class="btn btn-default check_out">
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!--/#cart_items-->



@endsection
