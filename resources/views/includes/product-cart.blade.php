<div class="single-product">
    <div class="product-img">
        <a href="{{ route('siteProduct', ['product' => $product->slug]) }}">
            <img class="default-img" src="/images/550x750.png" alt="{{ $product->name }}">
            <img class="hover-img" src="/images/550x750.png" alt="{{ $product->name }}">

            @if ($product->sale_percent)
                <span class="price-dec">{{ $product->sale_percent }}% Off</span>
            @elseif ($product->is_hot)
                <span class="out-of-stock">Hot</span>
            @elseif ($product->is_new)
                <span class="new">New</span>
            @endif

        </a>
        <div class="button-head">
            <div class="product-action">
                {{-- <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i
                        class=" ti-eye"></i><span>Quick
                        Shop</span></a> --}}
                <a title="Wishlist" href="#" class="btn-add-to-wishlist" data-id="{{ $product->id }}"><i class=" ti-heart " data-id="{{ $product->id }}"></i><span>Add to Wishlist</span></a>
                {{-- <a title="Compare" href="#" class="btn-add-to-compare" data-id="{{ $product->id }}"><i class="ti-bar-chart-alt" data-id="{{ $product->id }}"></i><span>Add to Compare</span></a> --}}
            </div>
            <div class="product-action-2">
                <a title="Add to cart" href="#" class="btn-add-to-basket" data-id="{{ $product->id }}">Add to cart</a>
            </div>
        </div>
    </div>
    <div class="product-content">
        <h3><a href="{{ route('siteProduct', ['product' => $product->slug]) }}">{{ $product->name }}</a></h3>
        <div class="product-price">
            @if ($product->sale_percent)
                <span class="old">${{ format_price($product->price) }}</span>
            @endif
            <span>${{ format_price($product->actual_price) }}</span>
        </div>
        <div>
            <span>Category: <a href="{{ route('siteCatalog', ['slug' => $product->category->slug]) }}">
                    {{ $product->category->title }}</a></span>
        </div>

    </div>
</div>
