@include('frontend.header')

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(https://previews.123rf.com/images/varijanta/varijanta1603/varijanta160300078/54344087-flat-line-design-website-banner-of-shopping-product-order-add-to-cart-modern-vector-illustration-for.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">shopping cart</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 0;
                                @endphp
                                @foreach ($cartadd as $product)
                                    @php
                                        $no = $no + 1;
                                    @endphp

                                    <tr>
                                        <td class="product-subtotal">{{ $no }}</td>
                                        <td class="product-thumbnail"><a href="#"><img
                                                    src="{{ asset('upload/' . $product->image) }}"
                                                    alt="product img" /></a></td>
                                        <td class="product-name"><a href="#">{{ $product->name }}</a>
                                            <ul class="pro__prize">
                                                <li class="old__prize">{{ '₹' . $product->mrp }}</li>
                                                <li>{{ '₹' . $product->price }}</li>
                                            </ul>
                                        </td>
                                        <td class="product-price"><span
                                                class="amount">{{ '₹' . $product->price }}</span>
                                        </td>
                                        <td class="product-subtotal"><span>{{ $product->qty }}</span></td>
                                        <td class="product-subtotal">{{ '₹' . $product->total }}</td>
                                        <td class="product-remove"><a href="{{ url('d_cart/' . $product->id) }}"><i
                                                    class="icon-trash icons"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="{{url('/')}}">Continue Shopping</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <a href="{{url('v_checkout/'.session()->get('user_id'))}}">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->


@include('frontend.footer')
