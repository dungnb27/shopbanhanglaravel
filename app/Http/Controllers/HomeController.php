<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Mail;
use App\Http\Requests;
use App\Models\Slider;
use App\Models\Product;
use App\Models\CategoryProductModel;
use Illuminate\Support\Facades\Redirect;
session_start();


class HomeController extends Controller
{
    public function send_mail()
    {
        $to_name = "Tiến Dũng";
        $to_email = "dungnbn1999@gmail.com";

        $data = array("name" => "Mail từ tài khoản khách hàng","body"=>"Mail gửi về website");

        Mail::send('pages.send_mail',$data,function($message) use ($to_name,$to_email){
            $message->to($to_email)->subject('Quên mật khẩu tài khoản');
            $message->from($to_email,$to_name);
        });
        return redirect('')->with('message','');
    }

    public function index(Request $request){
        //SEO
        $meta_desc = "Thể hình phục vụ cuộc sống không để cuộc sống phục vụ thể hình. Là 1 gymer ngoài việc có body đẹp cần là 1 người có ích trong xã hội: trí tuệ, sức khỏe, sẻ chia";
        $meta_keywords = "thuc phamchuc nang, Thực phẩm thể hình, Phụ kiện Gym";
        $meta_title = "WEB BÁN HÀNG";
        $url_canonical = $request->url();
        //SEO

        //Slider
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderBy('category_parent','DESC')->orderBy('category_order','ASC')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','DESC')->get();
        $brand_footer = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','DESC')->get();
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        // $all_product = DB::table('tbl_product')->where('product_status','0')->orderby(DB::raw('RAND()'))->paginate(6); 

        $all_product = DB::table('tbl_product')->where('product_status','0')->paginate(6); 

        $cate_pro_tabs = CategoryProductModel::where('category_parent','==',0)->orderBy('category_order','ASC')->get();

        return view('pages.home')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('brand_footer',$brand_footer)
            ->with('all_product',$all_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider)
            ->with('cate_pro_tabs',$cate_pro_tabs);
    }

    public function search(Request $request)
    {
        //slide
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();

        //SEO
        $meta_desc = "Tìm kiếm sản phẩm";
        $meta_keywords = "Tim kiem";
        $meta_title = "Tìm kiếm sản phẩm";
        $url_canonical = $request->url();
        //SEO


        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        
        // $all_product = DB::table('tbl_product')
        // ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
        // ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
        // ->orderby('tbl_product.product_id','desc')->get();

        $search_product = DB::table('tbl_product')->where('product_name','like','%'.$keywords.'%')->get();
        
        return view('pages.sanpham.search')
            ->with('category',$cate_product)
            ->with('brand',$brand_product)
            ->with('search_product',$search_product)
            ->with('meta_desc',$meta_desc)
            ->with('meta_keywords',$meta_keywords)
            ->with('meta_title',$meta_title)
            ->with('url_canonical',$url_canonical)
            ->with('slider',$slider);

    }

    public function autocomplete_ajax(Request $request)
    {
        $data = $request->all();

        if($data['query']){

            $product = Product::where('product_status',0)->where('product_name','LIKE','%'.$data['query'].'%')->get();

            $output = '
            <ul class="dropdown-menu" style="display:block; position:relative">'
            ;

            foreach($product as $key => $val){
               $output .= '
               <li class="li_search_ajax"><a href="#">'.$val->product_name.'</a></li>
               ';
            }

            $output .= '</ul>';
            echo $output;
        }
    }
}
