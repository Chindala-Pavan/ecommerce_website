@extends('master')
<div>
@include('header')
<br><br>
</div class="py-4">
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            
            @forelse($products as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="image/{{$item->image}}" style="max-width: 100px" >
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->product_name}}</h2>
                      <h5>{{$item->description}}</h5>
                    </div>
             </div>
             <div class="col-sm-3">
                <a href="/removeitem/{{$item->cart_id}}" class="btn btn-warning" >Remove to Cart</a>
             </div>
            </div>
            @empty
            <div>
            <h1>cart is empty </h1>
            </div>
            @endforelse
          </div>

     </div>
</div>