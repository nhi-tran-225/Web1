@extends('layout')
@section('content')

 <!-- Cart view section -->
 <section id="aa-myaccount">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
        <div class="aa-myaccount-area">         
            <div class="row">
              <div class="col-md-6">
                <div class="aa-myaccount-login">
                <h4>ĐĂNG NHẬP</h4>
                 <form action="" class="aa-login-form">
                  <label for="">Nhập Email <span>*</span></label>
                   <input type="text" placeholder="Email">
                   <label for="">Mật khẩu <span>*</span></label>
                    <input type="password" placeholder="Mật khẩu">
                    <button type="submit" class="aa-browse-btn">Đăng nhập</button>
                    <label class="rememberme" for="rememberme"><input type="checkbox" id="rememberme"> Nhớ tài khoản </label>
                    <p class="aa-lost-password"><a href="#">Quên mật khẩu?</a></p>
                  </form>
                </div>
              </div>
              <div class="col-md-6">
                <div class="aa-myaccount-register">                 
                 <h4>ĐĂNG KÝ</h4>
                 <form action="" class="aa-login-form">
                    <label for="">Nhập Email <span>*</span></label>
                    <input type="text" placeholder="Emaill">
                    <label for="">Mật khẩu  <span>*</span></label>
                    <input type="password" placeholder="Mật khẩu">
                    <button type="submit" class="aa-browse-btn">Đăng ký</button>                    
                  </form>
                </div>
              </div>
            </div>          
         </div>
       </div>
     </div>
   </div>
 </section>
 <!-- / Cart view section -->
@endsection            