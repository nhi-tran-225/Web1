@extends('product_layout')
@section('tab_menu') 
<aside class="aa-sidebar">
            <div class="aa-sidebar-widget">
              <h3>DANH MỤC</h3>
              <ul class="aa-catg-nav">
                @foreach($category as $cate)       
                  <li class=""><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate ->category_name}}</a></li>
                @endforeach
              </ul>
            </div>
            <div class="aa-sidebar-widget">
              <h3>THƯƠNG HIỆU</h3>
              <ul class="aa-catg-nav">
                @foreach($brand as $br)
                  <li><a href="{{URL::to('/thuong-hieu-san-pham/'.$br->brand_id)}}">{{$br ->brand_name}}</a></li>
                @endforeach 
              </ul>
            </div>
            
            <div class="aa-sidebar-widget">
              <h3>LỌC THEO GIÁ</h3>              
              <div class="aa-sidebar-price-range">
               <form action="">
                  <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                    <div class="noUi-base">
                      <div class="noUi-origin noUi-connect active" style="left:10%;">
                        <div class="noUi-handle noUi-handle-lower"></div>
                      </div>
                      <div class="noUi-origin noUi-background" style="left:100%;">
                        <div class="noUi-handle noUi-handle-upper"></div>
                      </div>
                    </div>
                  </div>
                  <span id="skip-value-lower" class="example-val">30.00</span>
                 <span id="skip-value-upper" class="example-val">100.00</span>
                 <button class="aa-filter-btn" type="submit">Lọc</button>
               </form>
              </div>              
            </div>
            <div class="aa-sidebar-widget">
              <h3>SẢN PHẨM MỚI NHẤT</h3>
              <div class="aa-recently-views">
                
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
            <div class="aa-sidebar-widget">
              <h3>SẢN PHẨM BÁN CHẠY</h3>
              <div class="aa-recently-views">
                <ul>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                  <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>
                   <li>
                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="#">Product Name</a></h4>
                      <p>1 x $250</p>
                    </div>                    
                  </li>                                      
                </ul>
              </div>                            
            </div>
          </aside>
@endsection