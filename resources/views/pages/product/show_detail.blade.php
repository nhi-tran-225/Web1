@extends('layout')
@section('content') 
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
              	@foreach($product_detail as $value)
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{URL::to('public/upload/product/'.$value->product_image)}}" class="simpleLens-lens-image"><img src="{{URL::to('public/upload/product/'.$value->product_image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a data-big-image="{{URL::to('public/upload/product/'.$value->product_image)}}" data-lens-image="{{URL::to('public/upload/product/'.$value->product_image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{URL::to('public/upload/product/'.$value->product_image)}}">
                          </a>                                    
                          <a data-big-image="{{URL::to('public/upload/product/'.$value->product_image)}}" data-lens-image="{{URL::to('public/upload/product/'.$value->product_image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{URL::to('public/upload/product/'.$value->product_image)}}">
                          </a>
                          <a data-big-image="{{URL::to('public/upload/product/'.$value->product_image)}}" data-lens-image="{{URL::to('public/upload/product/'.$value->product_image)}}" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{URL::to('public/upload/product/'.$value->product_image)}}">
                          </a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <form method="post" action="{{URL::to('/save-cart')}}">
                      {{ csrf_field() }}
                        <h3>{{$value->product_name}}</h3>
                        <div class="aa-price-block">
                          <span class="aa-product-view-price">{{number_format($value->product_price,0,',','.').' '.'VNĐ'  }}</span>
                        </div>
                          <div class="aa-prod-quantity">
                            <label>Số lượng: </label>
                            <input name="qty" width="30px" type="number" min="1" value="1" />
                            <input name="productid_hidden" type="hidden" min="1" value="{{$value->product_id}}" />
                          </div>
                        <div class="aa-prod-view-bottom">
                          <a onclick="AddCart({{$value->product_id}})" class="aa-add-to-cart-btn "href="javascript:">Thêm vào giỏ hàng</a>
                          <a class="aa-add-to-cart-btn" href="#">Yêu thích</a>
                        </div>
                    </form>
                          <p class="aa-product-avilability">Tình trạng: <span><?php
                        		if($value -> product_status ==1){
                        	?>
                        		Còn hàng
                        	<?php 
                        		}else{
                        	?>
                        		Hết hàng
                        	<?php
                        		}
                        	?></span></p>
                      
                        <p><b>Điều kiện: </b> {!!$value -> product_fettle!!}</p>
                        
                        <br>
                          <p class="aa-prod-category">
                            Thương hiệu: <a href="#">{{$value->brand_name}}</a>
                          </p>
                        
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Mô tả</a></li>
                <li><a href="#review" data-toggle="tab">Đánh giá</a></li>                
              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  <p>{{$value->product_desc}}</p>
                  <ul>
                    <li>{{$value->product_content}}</li>
                  </ul>
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Sản phẩm tương tự</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
                @foreach($related as $recomend)
                <li>
                  <figure>
                    <a class="aa-product-img" href="{{URL::to('/chi-tiet-san-pham/'.$recomend->product_id)}}"><img src="{{URL::to('public/upload/product/'.$recomend->product_image)}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Thêm vào giỏ hàng</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="{{URL::to('/chi-tiet-san-pham/'.$recomend->product_id)}}">{{$recomend->product_name}}</a></h4>
                        <span class="aa-product-price">{{number_format($recomend -> product_price,0,',','.').' '.'VNĐ'}}</span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                               
                  </div>
                  <!-- product badge -->
                </li>
                @endforeach                                                                     
              </ul> 
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
@endsection
