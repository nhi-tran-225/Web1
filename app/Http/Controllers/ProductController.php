<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

class ProductController extends Controller
{
    
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();      
        return view('admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    public function all_product(){
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=','tbl_product.category_id')->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')->orderby('tbl_product.product_id','desc')->get();
        $manager_product = view('admin.all_product')->with('all_product',$all_product);
        
        return view('admin_layout')->with('admin.all_product', $manager_product);
    }
    public function save_product(Request $request){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_fettle'] = $request->product_fettle;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_image'] = $request->product_image;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_img = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_img));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;
            DB::table('tbl_product')-> insert($data);
        Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['product_image'] = '';
        DB::table('tbl_product')-> insert($data);
        Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>0]);
        Session::put('message','Ẩn sản phẩm thành công');
            return Redirect::to('all-product');
    }

    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status'=>1]);
        Session::put('message','Hiển thị sản phẩm thành công');
            return Redirect::to('all-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand_product')->orderby('brand_id','desc')->get();   

        $edit_product = DB::table('tbl_product')->where('product_id',$product_id)->get();
        $manager_product = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product', $cate_product)->with('brand_product',$brand_product);
                
        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request, $product_id){
        $this->AuthLogin();
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_fettle'] = $request->product_fettle;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if($get_image){
            $get_name_img = $get_image->getClientOriginalName();
            $name_img = current(explode('.',$get_name_img));
            $new_image = $name_img.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/upload/product',$new_image);
            $data['product_image'] = $new_image;

            DB::table('tbl_product')->where('product_id', $product_id)-> update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
        }
        
        DB::table('tbl_product')->where('product_id', $product_id)-> update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id',$product_id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
            return Redirect::to('all-product');
    }
    //end admin
    //start trang chủ
    public function detailProduct($product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status','1')->orderby('category_id','ASC')->get();
        $brand_product = DB::table('tbl_brand_product')->where('brand_status','1')->orderby('brand_id','ASC')->get();
        $detail_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=','tbl_product.category_id')->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_product.product_id',$product_id)->get();
        foreach ($detail_product as  $value) {
            $category_id = $value->category_id;
            $brand_id = $value->brand_id;
        }
        $related_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=','tbl_product.category_id')->join('tbl_brand_product', 'tbl_brand_product.brand_id','=','tbl_product.brand_id')->where('tbl_brand_product.brand_id',$brand_id)->whereNotIn('tbl_product.product_id',[$product_id])->limit(6)->get();

        return view('pages.product.show_detail')->with('category',$cate_product)->with('brand',$brand_product)->with('product_detail',$detail_product)->with('related',$related_product);
    }
}
