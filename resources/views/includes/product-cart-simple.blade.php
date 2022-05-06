<div class="single-list">
    <div class="row">
        <div class="col-lg-6 col-md-6 col-12">
            <div class="list-image overlay">
                <img src="/images/115x140.png" alt="#">
                <a href="#" class="buy btn-add-to-basket" data-id="{{ $product->id }}" title="ADD TO CART"><i class="fa fa-shopping-bag" data-id="{{ $product->id }}"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6 col-12 no-padding">
            <div class="content">
                <h5 class="title"><a href="{{ route('siteProduct', ['product' => $product->slug]) }}">{{ $product->name }}</a></h5>
                <p class="price with-discount">${{ format_price($product->actual_price) }}</p>
            </div>
        </div>
    </div>
</div>
