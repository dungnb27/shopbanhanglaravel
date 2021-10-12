@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                @foreach ($edit_brand_product as $key => $brand_value)
                    
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="position-center">
                <form role="form" action="{{URL::to('/update-brand-product/'.$brand_value->brand_id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Tên thương hiệu</label>
                        <input type="text" onkeyup="ChangeToSlug();" value="{{$brand_value->brand_name}}" name="brand_product_name" class="form-control" id="slug" required="" >
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="brand_product_slug" class="form-control" id="convert_slug" value="{{$brand_value->brand_slug}}" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea style="resize: none" rows="8"  name="brand_product_desc" class="form-control" id="exampleInputPassword1" required="" >{{$brand_value->brand_desc}}</textarea>
                    </div>
                    <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật danh mục</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>    
@endsection
