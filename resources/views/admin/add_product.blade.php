@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm sản phẩm
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
                <form role="form" action="{{URL::to('/save-product')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label >Tên sản phẩm</label>
                        <input type="text" onkeyup="ChangeToSlug();" id="slug" required data-validation="length" data-validation-length="min3" data-validation-error-msg="Ít nhất 3 ký tự" name="product_name" class="form-control" placeholder="Tên sản phẩm" >
                    </div>
                    <div class="form-group">
                        <label >Slug</label>
                        <input type="text" id="convert_slug" name="product_slug" required class="form-control" placeholder="Slug" >
                    </div>
                    <div class="form-group">
                        <label >Số lượng sản phẩm</label>
                        <input type="text" data-validation="number" required data-validation-error-msg="Làm ơn điền số lượng" name="product_quantity" class="form-control" placeholder="Số lượng sản phẩm" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh sản phẩm</label>
                        <input type="file" name="product_image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá sản phẩm</label>
                        <input type="text" name="product_price" required class="form-control price_format" placeholder="Giá sản phẩm" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Giá gốc sản phẩm</label>
                        <input type="text" name="price_cost" required class="form-control price_format" placeholder="Giá gốc sản phẩm" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                        <textarea style="resize: none" rows="8" required name="product_desc" class="form-control" id="ckeditor1" placeholder="Mô tả sản phẩm" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                        <textarea style="resize: none" rows="8" required name="product_content" class="form-control" id="ckeditor2" placeholder="Nội dung sản phẩm" ></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                        <select name="product_cate" class="form-control input-sm m-bot15" required>
                            @foreach ($cate_product as $key => $cate)  
                                @if ($cate->category_parent==0)
                                    <option style="color: red" value="{{($cate->category_id)}}">{{($cate->category_name)}}</option>
                                    @foreach ($cate_product as $key => $cate_sub)
                                        @if ($cate_sub->category_parent == $cate->category_id)
                                            <option value="{{($cate_sub->category_id)}}">--{{($cate_sub->category_name)}}</option>  
                                        @endif
                                    @endforeach  
                                @endif
                            @endforeach   
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tag sản phẩm</label>
                        <input type="text" data-role="tagsinput" name="product_tags" class="form-control" id="" placeholder="Tags sản phẩm" ></input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                        <select name="product_brand" class="form-control input-sm m-bot15">
                            @foreach ($brand_product as $key => $brand) 
                                <option value="{{($brand->brand_id)}}">{{($brand->brand_name)}}</option>
                            @endforeach   
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="product_status" class="form-control input-sm m-bot15">
                            <option value="1">Ẩn</option>
                            <option value="0">Hiển thị</option>
                        </select>    
                    </div>
                    <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                </form>
                </div>
            </div>
        </section>
    </div>
</div>  
<script>
    $(document).ready(function() {

        load_gallery();

        //Hiển thị ảnh
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

        //Kiểm tra file ảnh
        $('#file').change(function() {
            var error = "";
            var files = $('#file')[0].files;

            if (files.length > 5) {
                error += "<p>Bạn chọn tối đa chỉ được 5 ảnh</p>"
            } else if (files.length = "") {
                error += "<p>Bạn không được bỏ trống ảnh</p>"
            } else if (files.size > 2000000) {
                error += "<p>File ảnh không được lớn hơn 2MB</p>"
            }

            if (error == '') {

            } else {
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">' + error + '</span>');
                return false;
            }

        });

        //Cập nhật tên hình
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
                        '<span class="text-danger">Cập nhật tên hình ảnh thành công</span>'
                    );

                }
            });
        });

        //Xoá hình
        $(document).on('click', '.delete-gallery', function() {
            var gal_id = $(this).data('gal_id');
            var _token = $('input[name="_token"]').val();

            if (confirm('Bạn muốn xoá hình ảnh này không')) {
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
                            '<span class="text-danger">Xoá hình ảnh thành công</span>'
                        );

                    }
                });
            }
        });

        //Cập nhật hình ảnh
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
                        '<span class="text-danger">Cập nhật hình ảnh thành công</span>'
                    );

                }
            });

        });



    });
</script>  
@endsection
