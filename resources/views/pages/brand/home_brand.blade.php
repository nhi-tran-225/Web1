@extends('layout')
@section('content') 

  <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('public/frontend/images/slide.jpg')}}" alt="Men slide img" />
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('public/frontend/images/slide1.jpg')}}" alt="Wristwatch slide img" />
              </div>
            </li>
            <!-- single slide item -->
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('public/frontend/images/slide2.png')}}" alt="Women Jeans slide img" />
              </div>
            </li>
            <!-- single slide item -->           
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('public/frontend/images/slide.jpg')}}" alt="Shoes slide img" />
              </div>
            </li>
            <!-- single slide item -->  
             <li>
              <div class="seq-model">
                <img data-seq src="{{asset('public/frontend/images/slide1.jpg')}}" alt="Male Female slide img" />
              </div>
            </li>                   
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row">
              <!-- promo left -->
              <div class="col-md-5 no-padding">                
                <div class="aa-promo-left">
                  <div class="aa-promo-banner">                    
                    <img src="{{asset('public/frontend/img/apple.jpg')}}" alt="img">                    
                    <div class="aa-prom-content">
                      <h4><a href="#"></a></h4>                      
                    </div>
                  </div>
                </div>
              </div>
              <!-- promo right -->
              <div class="col-md-7 no-padding">
                <div class="aa-promo-right">
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('public/frontend/img/samsung.png')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="#"></a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('public/frontend/img/oppo.jpg')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="#"></a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('public/frontend/img/vivo.png')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="#"></a></h4>                        
                      </div>
                    </div>
                  </div>
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                      <img src="{{asset('public/frontend/img/nokia.png')}}" alt="img">                      
                      <div class="aa-prom-content">
                        <h4><a href="#"></a></h4>                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                  <?php $true = 1; ?>
                    @foreach($cate_product as $cate)       
                    <li class="<?php if($true == 1){ echo 'active'; $true = -1;} ?>"><a href="{{'#' . $cate->category_id}}" data-toggle="tab">{{$cate ->category_name}}</a></li>
                    @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <?php $active = 1; ?>
                    @foreach($cate_product as $cate)
                      <div class="tab-pane fade<?php if($active == 1){echo ' active in'; $active = -1;} ?>" id="{{$cate->category_id}}">
                      <ul class="aa-product-catg">
                        <?php $product_category = DB::table('tbl_product')->where('category_id', $cate->category_id)->limit(8)->get(); ?>
                        <!-- start single product item -->
                        @foreach($product_category as $item)
                          <li>
                            <figure>
                              <a class="aa-product-img" href="#">
                                <img src="{{URL::to('public/upload/product/'.$item->product_image)}}" alt="polo shirt img"></a>
                              <a onclick="AddCart({{$item->product_id}})" class="aa-add-card-btn"href="javascript:"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                                <h4 class="aa-product-title"><a href="#">{{$item->product_name}}</a></h4>
                                <span class="aa-product-price">{{number_format($item->product_price,0,',','.').' '.'VNĐ'  }}</span>
                              </figcaption>
                            </figure>                        
                            <div class="aa-product-hvr-content">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>                 
                            </div>
                            <!-- product badge -->
                            <!-- <span class="aa-badge aa-sale" href="#">SALE!</span> -->
                          </li>
                        @endforeach                  
                      </ul>
                      <div class="bao-a">
                        <a class="aa-browse-btn" href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">Xem thêm <span class="fa fa-long-arrow-right"></span></a>
                      </div>
                      
                    </div>
                    @endforeach
                  </div>              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{asset('public/frontend/img/bn.png')}}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
    <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                  <ul class="nav nav-tabs aa-products-tab">
                   <?php $true = 1; ?>
                    @foreach($brand_product as $brand)       
                    <li class="<?php if($true == 1){ echo 'active'; $true = -1;} ?>"><a href="{{'#' . $brand->brand_id}}" data-toggle="tab">{{$brand ->brand_name}}</a></li>
                    @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <!-- Start men product category -->
                    <?php $active = 1; ?>
                    @foreach($brand_product as $brand)
                      <div class="tab-pane fade<?php if($active == 1){echo ' active in'; $active = -1;} ?>" id="{{$brand->brand_id}}">
                      <ul class="aa-product-catg">
                        <?php $product_category = DB::table('tbl_product')->where('brand_id', $brand->brand_id)->limit(8)->get(); ?>
                        <!-- start single product item -->
                        @foreach($product_category as $item)
                          <li>
                            <figure>
                              <a class="aa-product-img" href="#">
                                <img src="{{URL::to('public/upload/product/'.$item->product_image)}}" alt="polo shirt img"></a>
                              <a onclick="AddCart({{$item->product_id}})" class="aa-add-card-btn"href="javascript:"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                                <figcaption>
                                <h4 class="aa-product-title"><a href="#">{{$item->product_name}}</a></h4>
                                <span class="aa-product-price">{{number_format($item->product_price,0,',','.').' '.'VNĐ'  }}</span>
                              </figcaption>
                            </figure>                        
                            <div class="aa-product-hvr-content">
                              <a href="#" data-toggle="tooltip" data-placement="top" title="" data-original-title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>                 
                            </div>
                            <!-- product badge -->
                            <!-- <span class="aa-badge aa-sale" href="#">SALE!</span> -->
                          </li>
                        @endforeach                  
                      </ul>
                      <div class="bao-a">
                        <a class="aa-browse-btn" href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">Xem thêm <span class="fa fa-long-arrow-right"></span></a>
                      </div>
                      
                    </div>
                    @endforeach
                  </div>              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection