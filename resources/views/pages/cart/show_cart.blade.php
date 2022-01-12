@extends('layout')
@section('content') 
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12" id="list-cart">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Hình ảnh</th>
                        <th>Sản phẩm</th>
                        <th>Giá tiền</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                        <th>Cập nhật</th>
                        <th>Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                    	@if(Session::has('Cart')!= null)
                      @foreach(Session::get('Cart')->product as $item)
                      <tr>
                        
                        <td><a href="#"><img src="{{URL::to('public/upload/product/'.$item['productInfo']->product_image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$item['productInfo']->product_name}}</a></td>
                        <td>{{number_format($item['productInfo']->product_price,0,',','.').' '.'VNĐ'}}</td>
                        <td><input class="aa-cart-quantity" id="quanty-item-{{$item['productInfo']->product_id}}" type="number" value="{{$item['quantity']}}" min="1">
                        </td>
                        <td>
                        	{{number_format($item['price'],0,',','.').' '.'VNĐ'}} 
                       </td>
                       <td><a class="save" href="{{URL::to('/save-list-cart/' . $item['productInfo']->product_id).'/'. $item['quantity']}}"><fa class="fa fa-save"></fa></a></td>

                       <td><a class="remove" href="{{URL::to('/delete-list-cart/' . $item['productInfo']->product_id)}}"><fa class="fa fa-close" ></fa></a></td>
                      </tr>
                      @endforeach
                      @endif
                      </tbody>
                  </table>
                </div>
             </form>
             @if(Session::has('Cart')!= null)
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Thanh toán giỏ hàng</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Tổng số lượng</th>
                     <td>{{Session::get('Cart')->totalQuantity}} sản phẩm</td>
                   </tr>
                   <tr>
                     <th>Thành tiền</th>
                     <td>{{number_format(Session::get('Cart')->totalPrice,0,',','.').' '.'VNĐ'}}</td>
                   </tr>
                 </tbody>
               </table>
               <a href="#" class="aa-cart-view-btn">Thanh toán</a>
             </div>
             @endif
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
@endsection