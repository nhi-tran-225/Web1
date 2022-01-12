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
       <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
 <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->
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
                  <li class="hidden-xs"><a href="{{URL::to('/list-cart')}}">Giỏ hàng</a></li>
                  <li class="hidden-xs"><a href="{{URL::to('checkout')}}">Thanh toán</a></li>
                  <li><a href="{{URL::to('/login-checkout')}}">Đăng nhập</a></li>
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
                <a href="{{URL::to('/')}}"><img src="{{asset('public/frontend/images/logo.png')}}" alt="logo img" width="150px" height="50px"></a>
              </div>
              <!-- / logo  -->
               <!-- cart box -->
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
              <!-- / cart box -->
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
  <!-- / menu -->
  <!-- Start slider -->

  @yield('content')

  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>MIỄN PHÍ GIAO HÀNG</h4>
                <P>Miễn phí giao hàng trong bán kính 5km với đơn hàng trên 5 triệu.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 NGÀY HOÀN TIỀN</h4>
                <P>Hoàn tiền trong bòng 30 ngày kể từ ngày xuất hóa đơn với các lỗi do nhà sản xuất.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>HỖ TRỢ 24/7</h4>
                <P>Hỗ trợ tư vấn khách hàng với đội ngũ nhân viên nhiệt tình, thân thiện.</P>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
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
  <!-- / footer -->  

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
    function DeleteListCart(id){
      $.ajax({
        url: 'delete-list-cart/'+id,
        type: 'GET',
      }).done(function(response){
        RenderListCart(response);
        alertify.success('Đã xóa sản phẩm');
      });
    }
    function SaveListCart(id){
      $.ajax({
        url: 'save-list-cart/'+id+'/'+$("#quanty-item-"+id).val(), 
        type: 'GET',
      }).done(function(response){
        RenderListCart(response);
        alertify.success('Đã cập nhật sản phẩm');
      });
    }
    function RenderListCart(response) {
      $("#list-cart").empty();
      $("#list-cart").html(response);
    }
  </script>  

  <script>
  $(document).ready(function(){
    $(".nav-tabs a").click(function(){
      $(this).tab('show');
    });
  });
</script>

  </body>
</html>