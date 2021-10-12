@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm thương hiệu sản phẩm
            </header>
            <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert" >'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="position-center">
                <form role="form" action="{{URL::to('/save-brand-product')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Tên thương hiệu</label>
                        <input type="text" name="brand_product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên thương hiệu" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="brand_product_slug" class="form-control" id="convert_slug" placeholder="Slug" required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea style="resize: none" rows="8" name="brand_product_desc" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="brand_product_status" class="form-control input-sm m-bot15">
                            <option value="1">Ẩn</option>
                            <option value="0">Hiển thị</option>
                        </select>    
                    </div>
                    <button type="submit" name="add_brand_product" class="btn btn-info">Thêm thương hiệu</button>
                </form>
                </div>
            </div>
        </section>
    </div>
</div>    
@endsection
