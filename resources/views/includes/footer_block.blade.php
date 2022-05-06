<!-- Jquery -->
<script src="/js/jquery.min.js"></script>
<script src="/js/jquery-migrate-3.0.0.js"></script>
<script src="/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="/js/bootstrap.min.js"></script>
<!-- Color JS -->
{{-- <script src="/js/colors.js"></script> --}}
<!-- Slicknav JS -->
<script src="/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="/js/magnific-popup.js"></script>
<!-- Waypoints JS -->
<script src="/js/waypoints.min.js"></script>
<!-- Countdown JS -->
<script src="/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="/js/nicesellect.js"></script>
<!-- Flex Slider JS -->
<script src="/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="/js/easing.js"></script>
<!-- Active JS -->
<script src="/js/active.js"></script>

<script>
    const refreshBasket = () => {

        const basketList = getBasketList()
        generateBasketPopup(basketList)

        if (typeof PAGE != "undefined" && PAGE == 'cart') {
            generateBasketCart(basketList)
        }
    }

    const getLocalStorageBasket = () => {

        if (localStorage.getItem('basket') === null) {
            localStorage.setItem('basket', JSON.stringify({}))
        }

        return JSON.parse(localStorage.getItem('basket'))
    }

    const getBasketArrayRequestData = () => {

        const basket = getLocalStorageBasket()

        let requestData = []

        for (const key in basket) {
            requestData.push({
                id: key,
                quantity: basket[key]
            });
        }

        return requestData
    }

    const getBasketList = () => {

        let result = '-'

        $.ajax({
            type: 'POST',
            url: '{{ route('siteGetBasketList') }}',
            async: false,
            data: {
                basket: getBasketArrayRequestData()
            },
            success: function(data) {
                result = data;
            }
        });

        return result
    }

    const generateBasketPopup = (basketList) => {

        $('#num_basket_item').html(Object.keys(basketList.products).length)
        $('.dropdown-cart-header span').html(Object.keys(basketList.products).length + ' Items')

        let list = '';

        for (const key in basketList.products) {

            const product = basketList.products[key]

            list = list +
                `<li><a href="#" class="remove" onClick="removeItemFromBasket(${product.id}); return false" title="Remove this item"><i class="fa fa-remove"></i></a>
                <a class="cart-img" href="/product/${product.slug}"><img src="/images/70x70.png" alt="${product.name}"></a>
                <h4><a href="/product/${product.slug}">${product.name}</a></h4>
                <p class="quantity">${product.quantity} x ${format_price(product.actual_price)} = <span class="amount">$${format_price(product.amount)}</span>
                </p></li>`
        }
        $('ul.shopping-list').html(list)

        $('span.basket-popup-amount').html('$' + format_price(basketList.amount))

        $('#checkout_amount_total').html('$' + format_price(basketList.amount))

    }

    const removeItemFromBasket = (id) => {

        const basket = getLocalStorageBasket();

        if (basket[id] != undefined) {
            delete basket[id]
        }

        localStorage.setItem('basket', JSON.stringify(basket))
        refreshBasket()
    }

    const updateLocalStorageBasket = (id, quantity) => {

        let basket = getLocalStorageBasket();
        basket[id] = quantity
        localStorage.setItem('basket', JSON.stringify(basket))
    }

    $('.btn-add-to-basket').click(function(e) {
        e.preventDefault()

        id = e.target.getAttribute('data-id')
        updateLocalStorageBasket(id, 1)
        refreshBasket()

        alert('adding to basket')
    })

    const format_price = (num) => {
        return new Intl.NumberFormat("en", {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(num / 100);
    }

    const getLocalStorageWishList = () => {

        if (localStorage.getItem('wishlist') === null) {
            localStorage.setItem('wishlist', JSON.stringify({}))
        }

        return JSON.parse(localStorage.getItem('wishlist'))
    }

    const removeItemFromWishList = (id) => {

        const wishlist = getLocalStorageWishList()

        if (wishlist[id] != undefined) {
            delete wishlist[id]
        }

        localStorage.setItem('wishlist', JSON.stringify(wishlist))
        refreshWishList()
    }

    $('.btn-add-to-wishlist').click(function(e) {
        e.preventDefault()
        id = e.target.getAttribute('data-id')

        let wishlist = getLocalStorageWishList()
        wishlist[id] = 1
        localStorage.setItem('wishlist', JSON.stringify(wishlist))

        alert('adding to wishlist')
    })



    $(document).ready(function() {
        refreshBasket()
    });
</script>
