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
    <input hidden id="total-quanty-cart" type="number" value="{{Session::get('Cart')->totalQuantity}}">
  </li>
</ul>
@endif