<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>LNT Mobie</title>
    <link rel="icon" href="{{asset('public/frontend/images/logonho.png')}}">
    
    <!-- Font awesome -->
    <link href="{{asset('public/frontend/css/font-awesome.css')}}" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="{{asset('public/frontend/css/bootstrap.css')}}" rel="stylesheet">   
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="{{asset('public/frontend/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/jquery.simpleLens.css')}}">    
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/slick.css')}}">
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/css/nouislider.css')}}">
    <!-- Theme color -->
    <link id="switcher" href="{{asset('public/frontend/css/theme-color/default-theme.css')}}" rel="stylesheet">
    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="{{asset('public/frontend/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('public/frontend/css/style.css')}}" rel="stylesheet">    

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


  </head>
  <body> 

  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="account.html">Tài khoản</a></li>
                  <li class="hidden-xs"><a href="wishlist.html">Yêu thích</a></li>
                  <li class="hidden-xs"><a href="cart.html">Giỏ hàng</a></li>
                  <li class="hidden-xs"><a href="checkout.html">Thanh toán</a></li>
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Đăng nhập</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/images/logo.png')}}" alt="logo img" ></a>
              </div>
              <!-- / logo  -->
               
              <!-- / cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">GIỎ HÀNG</span>
                  @if(Session::has('Cart')!= null)
                    <span id="total-quanty-show" class="aa-cart-notify">{{Session::get('Cart')->totalQuantity}}</span>
                  @else
                    <span id="total-quanty-show" class="aa-cart-notify">0</span>
                  @endif
                  
                </a>
                <div class="aa-cartbox-summary">
                  <div id="change-item-cart">
                  @if(Session::has('Cart')!= null)
                    <ul>
                      @foreach(Session::get('Cart')->product as $item)
                      <li>
                        <a class="aa-cartbox-img" href="#"><img src="{{URL::to('public/upload/product/'.$item['productInfo']->product_image)}}" alt="img"></a>
                        <div class="aa-cartbox-info">
                          <h4><a href="#">{{$item['productInfo']->product_name}}</a></h4>
                          <p>{{$item['quantity']}} x {{number_format($item['productInfo']->product_price,0,',','.').' '.'VNĐ'}}</p>
                        </div>
                          <a class="aa-remove-product" ><i class="fa fa-times" data-id="{{$item['productInfo']->product_id}}"></i></a>
                      </li> 
                      @endforeach                   
                      <li>
                        <span class="aa-cartbox-total-title">
                          Tổng tiền
                        </span>
                        <span class="aa-cartbox-total-price">
                          {{number_format(Session::get('Cart')->totalPrice,0,',','.').' '.'VNĐ'}}
                        </span>
                      </li>
                    </ul>
                    @endif
                  </div>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="{{URL('/list-cart')}}">Xem chi tiết</a>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Thanh toán</a>
                </div>
              </div>
              <!-- search box -->
              <div class="aa-search-box">
                <form action="{{URL::to('/tim-kiem')}}" method="post">
                  {{csrf_field()}}
                  <input type="text" name="keyword_submit" id="" placeholder="Tìm kiếm vd. 'iphone' ">
                  <button type="submit" name="search-item"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li><a href="{{URL::to('/san-pham')}}">Sản phẩm </span></a></li>
              <li><a href="#">Tin tức</a></li>
              <li><a href="#">Liên hệ</a></li>            
              <li><a href="#">Giới thiệu</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
    <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('public/frontend/img/bn2.jpg')}}"  alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->
  <section id="aa-product-category">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
           @yield('content')
        </div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
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
                  <?php $new_product = DB::table('tbl_product')->where('product_status','1')->orderby('product_id','desc')->limit(3)->get(); ?>
                        <!-- start single product item -->
                        @foreach($new_product as $item)
                          <li>
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$item->product_id)}}" class="aa-cartbox-img"><img alt="img" src="{{URL::to('public/upload/product/'.$item->product_image)}}"></a>
                    <div class="aa-cartbox-info">
                      <h4><a href="{{URL::to('/chi-tiet-san-pham/'.$item->product_id)}}">{{$item->product_name}}</a></h4>
                      <p>{{number_format($item->product_price,0,',','.').' '.'VNĐ'  }}</p>
                    </div>                    
                  </li>
                        @endforeach                                      
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
        </div>
      </div>
    </div>
  </section>
  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Đăng ký nhận tin</h3>
            <p>Nhận các thông báo về sản phẩm mới và nhiều ưu đãi khác!!!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Nhập Email của bạn">
              <input type="submit" value="Đăng ký">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Dịch vụ</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Trang chủ</a></li>
                    <li><a href="#">Dịch vụ của chúng tôi</a></li>
                    <li><a href="#">Sản phẩm của chúng tôi</a></li>
                    <li><a href="#">Về chúng tôi</a></li>
                    <li><a href="#">Liên hệ</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Phục vụ</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Vận chuyển</a></li>
                      <li><a href="#">Hoàn trả</a></li>
                      <li><a href="#">Giảm giá</a></li>
                      <li><a href="#">Bảo hành</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Liên kết</h3>
                    <ul class="aa-footer-nav">
                      <li><a href="#">Sơ đồ trang web</a></li>
                      <li><a href="#">Tìm kiếm</a></li>
                      <li><a href="#">Tìm kiếm nâng cao</a></li>
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <div class="aa-footer-widget">
                    <h3>Liên hệ</h3>
                    <address>
                      <p> 123 Phan Thanh, Đà Nẵng</p>
                      <p><span class="fa fa-phone"></span>0359805446</p>
                      <p><span class="fa fa-envelope"></span>lntmobie@gmail.com</p>
                    </address>
                    <div class="aa-footer-social">
                      <a href="#"><span class="fa fa-facebook"></span></a>
                      <a href="#"><span class="fa fa-twitter"></span></a>
                      <a href="#"><span class="fa fa-google-plus"></span></a>
                      <a href="#"><span class="fa fa-youtube"></span></a>
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
  </footer>

    <!-- jQuery library -->
  <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js')}}"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('public/frontend/js/bootstrap.js')}}"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('public/frontend/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('public/frontend/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <!-- To Slider JS -->
  <script src="{{asset('public/frontend/js/sequence.js')}}"></script>
  <script src="{{asset('public/frontend/js/sequence-theme.modern-slide-in.js')}}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('public/frontend/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('public/frontend/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('public/frontend/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('public/frontend/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('public/frontend/js/custom.js')}}"></script>
  <!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
  <script>
    function AddCart(product_id) {
      $.ajax({
        url: 'add-cart/'+product_id,
        type: 'GET',
      }).done(function(response){
        RenderCart(response);
        alertify.success('Đã thêm vào giỏ hàng');
      });
    }
    $("#change-item-cart").on("click", ".aa-remove-product i", function(){
      $.ajax({
        url: 'delete-to-cart/'+$(this).data("id"),
        type: 'GET',
      }).done(function(response){
        RenderCart(response);
        alertify.success('Đã xóa sản phẩm');
      });
    });
    function RenderCart(response) {
      $("#change-item-cart").empty();
      $("#change-item-cart").html(response);
      $("#total-quanty-show").text($("#total-quanty-cart").val());
    }
  </script> 

  </body>
</html>