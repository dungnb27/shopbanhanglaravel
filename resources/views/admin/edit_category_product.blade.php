@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Cập nhật danh mục sản phẩm
            </header>
            <div class="panel-body">
                @foreach ($edit_category_product as $key => $edit_value)
                    
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">'.$message.'</span>';
                        Session::put('message',null);
                    }
                ?>
                <div class="position-center">
                <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="">Tên danh mục</label>
                        <input type="text" id="slug" value="{{$edit_value->category_name}}" onkeyup="ChangeToSlug();" name="category_product_name" class="form-control"  required="">
                    </div>
                    <div class="form-group">
                        <label for="">Slug</label>
                        <input type="text"  id="convert_slug" value="{{$edit_value->slug_category_product}}" name="category_product_slug" class="form-control"  required="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Từ khoá danh mục</label>
                        <textarea style="resize: none" rows="8" name="category_product_keywords" class="form-control" required="">{{$edit_value->meta_keywords}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Danh mục cha</label>
                        <select name="category_product_parent" class="form-control input-sm m-bot15">
                            <option value="0">Danh mục cha</option>
                            @foreach($category as $key => $val)

                            @if($val->category_parent==0)     
                                <option {{$val->category_id==$edit_value->category_id ? 'selected' : '' }} value="{{$val->category_id}}">{{$val->category_name}}</option>
                            @endif

                            @foreach($category as $key => $val2)

                                @if($val2->category_parent==$val->category_id) 

                                    <option {{$val2->category_id==$edit_value->category_id ? 'selected' : '' }} value="{{$val2->category_id}}">---{{$val2->category_name}}</option>  

                                @endif

                            @endforeach

                        @endforeach
                            
                        </select>    
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea style="resize: none" rows="8"  name="category_product_desc" class="form-control"  required="">{{$edit_value->category_desc}}</textarea>
                    </div>
                    <button type="submit" name="update_category_product" class="btn btn-info">Cập nhật danh mục</button>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>
</div>    
@endsection
