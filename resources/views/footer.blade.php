
<div>
@include('header')
</div>
<div>
<div class="row">
<table>
  @foreach($products as $product)
  <td>
  <div class="container">
    <div class="small-3 columns">
      <div class="item-wrapper">
      <a href="{{route('product.show',$product->id)}}">
        <div class="img-wrapper">
            
          
            <img src="/image/{{$product->image}}" style="max-width: 100px">
          
        </div>
        <h3>{{$product->product_name}}<h3>
        <h5>{{$product->price}}<h5>
      </a>
      </div>
      <div>
      <form action="/add_to_cart" method="POST">
        @csrf
        <input type="hidden" name='product_id' value={{$product->id}} >
        <button class="button btn-sucess" >Add to cart</button>
      </form> 
      </div>
    </div>


  </div>
  </td>
  @endforeach
</table>
</div>

</div>




