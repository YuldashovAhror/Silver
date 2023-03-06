@foreach ($products as $product)
<div class="products__item">
    <div class="products__item-pic">
        <img src="{{$product->photos[0]}}" alt="">
    </div>
    <!-- /.products__item-pic -->
    <div class="products__item-content">
        <h3 class="products__name">{{$product['name_'.$lang]}}</h3>
        <!-- /.products__name -->
        <div class="products__item-bottom">
            <h4 class="price general-SM">
                {{$product->price}}
                <span class="general-M">{{__('asd.Cум')}}</span>
            </h4>
            <!-- /.price -->
            <a href="{{route('product.shows', $product->id)}}" class="more general-SM">{{__('asd.Заказать')}}</a>
            <!-- /. -->
        </div>
        <!-- /.products__item-bottom -->
    </div>
    <!-- /.product__item-content -->
</div>
<!-- /.products__item -->
@endforeach