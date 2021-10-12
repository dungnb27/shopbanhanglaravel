@extends('layout')
@section('content')

    <section id="form" >
        <!--form-->
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
                        <!--login form-->
                        @if (session()->has('message'))
                            <div class="alert alert-success">
                                {!! session()->get('message') !!}
                            </div>
                        @elseif(session()->has('error'))
                            <div class="alert alert-danger">
                                {!! session()->get('error') !!}
                            </div>
                        @endif
                        <h2>Đăng nhập tài khoản</h2>
                        <form action="{{ URL::to('login-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="email_account" placeholder="Tài khoản" required />
                            <input type="password" name="password_account" placeholder="Mật khẩu" required />
                            <span>
                                <input type="checkbox" class="checkbox">
                                Ghi nhớ đăng nhập
                            </span>
                            <span>
                                <a href="{{ URL('/quen-mat-khau') }}">Quên mật khẩu</a>
                            </span>
                            <button type="submit" class="btn btn-default">Đăng nhập</button>
                        </form>

                        <style type="text/css">

							ul.list-login {
							    margin: 10px;
							    padding: 0;
							}
							ul.list-login li {
							    display: inline;
							    margin: 5px;
							}
							
						</style>

						<ul class="list-login">

							<li>
								<a href="{{url('login-customer-google')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản google"  src="{{asset('public/frontend/images/google.png')}}">
								</a>
							</li>
							
							<li>
								<a href="{{url('login-facebook-customer')}}">
									<img width="10%" alt="Đăng nhập bằng tài khoản facebook"  src="{{asset('public/frontend/images/fb.png')}}">
								</a>
							</li>
						</ul>

                    </div>
                    <!--/login form-->
                </div>
                <div class="col-sm-1">
                    <h2 class="or">Hoặc</h2>
                </div>
                <div class="col-sm-4">
                    <div class="signup-form">
                        <!--sign up form-->
                        <h2>Đăng ký tài khoản</h2>
                        <form action="{{ URL::to('/add-customer') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="text" name="customer_name" placeholder="Họ và tên" required/>
                            <input type="email" name="customer_email" placeholder="Email" required/>
                            <input type="password" name="customer_password" placeholder="Mật khẩu" required/>
                            <input type="text" name="customer_phone" placeholder="Số điện thoại" required/>
                            <button type="submit" class="btn btn-default">Đăng ký</button>
                        </form>
                    </div>
                    <!--/sign up form-->
                </div>
            </div>
        </div>
    </section>
    <!--/form-->


@endsection
