@extends('product_layout')
@section('content') 

<div class="aa-product-catg-content">
    <div class="aa-product-catg-head">
        <div class="aa-product-catg-head-left">
            <form action="" class="aa-sort-form">
                <label for="">Lọc theo</label>
                    <select name="">
                    <option value="1" selected="Default">Mặc định</option>
                    <option value="2">Tên</option>
                    <option value="3">Giá</option>
                    </select>
            </form>
            <form action="" class="aa-show-form">
                <label for="">Hiển thị</label>
                <select name="">
                    <option value="1" selected="12">12</option>
                    <option value="2">24</option>
                    <option value="3">36</option>
                </select>
            </form>
        </div>
        <div class="aa-product-catg-head-right">
            <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
            <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
        </div>
    </div>                   
    <div class="aa-product-catg-body">
        <ul class="aa-product-catg">
            @foreach($all_product as $product)
            <li>
                <figure>
                   <a class="aa-product-img" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><img src="{{URL::to('public/upload/product/'.$product->product_image)}}" alt="polo shirt img"></a>
                    <a onclick="AddCart({{$product->product_id}})" class="aa-add-card-btn"href="javascript:"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                    <figcaption>
                        <h4 class="aa-product-title"><a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">{{$product->product_name}}</a></h4>
                        <span class="aa-product-price">{{number_format($product -> product_price,0,',','.').' '.'VNĐ'}}</span>
                    </figcaption>
                </figure>                         
                <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Yêu thích"><span class="fa fa-heart-o"></span></a>                           
                </div>
            </li>
            @endforeach                                             
        </ul>         
    </div>
    <div class="aa-product-catg-pagination">
        <nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                    <a href="#" aria-label="Next">
                       <span aria-hidden="true">&raquo;</span>
                    </a></li>
            </ul>
        </nav>
    </div>
</div>
@endsection