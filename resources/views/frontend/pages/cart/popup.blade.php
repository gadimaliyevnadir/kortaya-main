<div class="cart-offcanvas-wrapper">
    <div class="offcanvas-overlay"></div>
    <div class="cart-offcanvas-inner">
        <div class="offcanvas-btn-close">
            <i class="pe-7s-close"></i>
        </div>
        <div class="offcanvas-cart-content " id="load_container">
            <h2 class="offcanvas-cart-title mb-10">Shopping Cart</h2>
            <div class="basket_text_pad">
            </div>
            @php
                $subtotal = 0
            @endphp
            @if(auth()->check())
                @if(auth()->user()?->cart?->infos)
                    @foreach(auth()->user()?->cart?->infos as  $cart_product)
                        @php $subtotal += $cart_product->product->main()->pivot->discount_price @endphp
                        <div class="cart-product-wrapper mb-6 basket_content_body ">
                            <div class="single-cart-product">
                                <div class="cart-product-thumb">
                                    <a href=""><img src="{{$cart_product->product->first_image}}"
                                                    alt="Cart Product"></a>
                                </div>
                                <div class="cart-product-content">
                                    <h3 class="title"><a href="">{{$cart_product->product->name}}</a></h3>
                                    <span class="price">
                                    <span class="new">${{$cart_product->product->main()->pivot->discount_price}}</span>
                                    <span class="old">${{$cart_product->product->main()->pivot->price}}</span>
                                </span>
                                </div>
                            </div>
                          
                        </div>
                    @endforeach
                @endif
            @else
                @foreach(session()->get('carts',[]) as $cart_product)
                    @php $subtotal += $cart_product['discount_price'] @endphp
                    <div class="cart-product-wrapper mb-6 basket_content_body ">
                        <div class="single-cart-product">
                            <div class="cart-product-thumb">
                                <a href=""><img src="{{$cart_product['image']}}"
                                                alt="Cart Product"></a>
                            </div>
                            <div class="cart-product-content">
                                <h3 class="title"><a href="">{{$cart_product['name']}}</a></h3>
                                <span class="price">
                                    <span class="new">${{$cart_product['price']}}</span>
                                    <span class="old">${{$cart_product['discount_price']}}</span>
                                </span>
                            </div>
                        </div>
                      
                    </div>
                @endforeach
            @endif
            <div class="row mb-5">
                <div class="col" data-aos="fade-up" data-aos-delay="300">
                    <nav class="mt-1 d-flex justify-content-center">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    </a>
                                </li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <div class="cart-product-total">
                <span class="value">Subtotal</span>
                <span class="price subtotal_span">{{$subtotal}}$</span>
            </div>
            <div class="cart-product-btn mt-4">
                <a href="{{route('frontend.cart')}}" class="btn btn-dark btn-hover-primary rounded-0 w-100">View cart</a>
                <a href="{{route('frontend.checkout')}}" class="btn btn-dark btn-hover-primary rounded-0 w-100 mt-4">Checkout</a>
            </div>
        </div>
    </div>
</div>
