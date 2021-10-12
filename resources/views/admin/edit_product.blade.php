@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật sản phẩm
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
                @foreach ($edit_product as $key => $pro)
                    <form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                        <input type="text" name="product_name" onkeyup="ChangeToSlug();" id="slug" value="{{($pro->product_name)}}" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label >Slug</label>
                            <input type="text" id="convert_slug" name="product_slug" class="form-control" value="{{($pro->product_slug)}}" >
                        </div>
                        <div class="form-group">
                            <label >Số lượng sản phẩm</label>
                            <input type="text"  value="{{($pro->product_quantity)}}" data-validation="number" data-validation-error-msg="Làm ơn điền số lượng" name="product_quantity" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                            <input type="file" name="product_image" class="form-control" >
                            <img src="{{URL::to('public/uploads/product/'.$pro->product_image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="product_price" value="{{($pro->product_price)}}" class="form-control price_format">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá gốc sản phẩm</label>
                            <input type="text" name="price_cost" class="form-control price_format" value="{{($pro->price_cost)}}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea style="resize: none" rows="8" name="product_desc" class="form-control" id="ckeditor3">{{($pro->product_desc)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                            <textarea style="resize: none" rows="8" name="product_content" class="form-control" id="ckeditor4">{{($pro->product_content)}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                            <select name="product_cate" class="form-control input-sm m-bot15">
                                @foreach ($cate_product as $key => $cate)
                                    @if ($cate->category_id==$pro->category_id)
                                        <option selected value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                                    @else
                                        <option value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                                    @endif
                                @endforeach   
                            </select>    
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tag sản phẩm</label>
                            <input type="text" data-role="tagsinput" name="product_tags" class="form-control" id="" value="{{($pro->product_tags)}}" ></input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                            <select name="product_brand" class="form-control input-sm m-bot15">
                                @foreach ($brand_product as $key => $brand)
                                    @if ($brand->brand_id==$pro->brand_id)
                                        <option selected value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                                    @else
                                        <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                                    @endif 
                                @endforeach   
                            </select>    
                        </div>
                        <button type="submit" name="add_product" class="btn btn-info">Cập nhật sản phẩm</button>
                    </form>
                @endforeach
                </div>
            </div>
        </section>
    </div>
</div>    
@endsection
