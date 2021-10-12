@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="position-center">
                <form role="form" action="{{URL::to('/save-category-product')}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" name="category_product_name" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text" name="category_product_slug" class="form-control" id="convert_slug" placeholder="Slug danh mục" required="">
                    </div>
                    <div class="form-group">
                        <label for="">Mô tả danh mục</label>
                        <textarea style="resize: none" rows="8" name="category_product_desc" class="form-control" id="" placeholder="Mô tả danh mục" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Từ khoá danh mục</label>
                        <textarea style="resize: none" rows="8" name="category_product_keywords" class="form-control" id="" placeholder="Mô tả danh mục" required=""></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục cha</label>
                        <select name="category_product_parent" class="form-control input-sm m-bot15">
                            <option value="0">Danh mục cha</option>
                            @foreach ($category as $key => $val)
                                <option value="{{$val->category_id}}">{{$val->category_name}}</option>    
                            @endforeach
                            
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="">Hiển thị</label>
                        <select name="category_product_status" class="form-control input-sm m-bot15">
                            <option value="1">Ẩn</option>
                            <option value="0">Hiển thị</option>
                        </select>    
                    </div>
                    <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                </form>
                </div>
            </div>
        </section>
    </div>
</div>    
@endsection
