@include('frontend.header')

<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(https://www.knowband.com/blog/wp-content/uploads/2016/09/sales-payment-banner.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">checkout</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (session()->has('ok'))
    <div class="alert alert-success ">{{ session()->get('ok') }}</div>
@endif
@if (session()->has('delete'))
    <div class="alert alert-danger ">{{ session()->get('delete') }}</div>
@endif

<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <div class="accordion__title">
                                Address Information
                            </div>
                            <form action="{{ url('f_checkout') }}" method="POST">
                                @csrf
                                <div class="accordion__body">
                                    <div class="bilinfo">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="single-input">
                                                    <input type="text" name="address" placeholder="Street Address">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="city" placeholder="City/State">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="single-input">
                                                    <input type="text" name="pincode" placeholder="Post code/ zip">
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="accordion__title">
                                            payment information
                                        </div>
                                        <div class="accordion__body">
                                            <div class="paymentinfo">
                                                <div class="single-method">
                                                    &nbsp; <input type="radio" name="payment_type" value="cod">COD
                                                </div>
                                                <div class="single-method">
                                                    &nbsp; <input type="radio" name="payment_type" value="payu">PayU
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-method">
                                            <button type="submit" class="fv-btn">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="order-details">
                    <h5 class="order-details__title">Your Order</h5>
                    <div class="order-details__item">
                        @php
                            $no = 0;
                            $cart_total = 0;
                        @endphp
                        @foreach ($cartadd as $product)
                            @php
                                $no = $no + 1;
                            @endphp
                            <div class="single-item">
                                <div class="single-item__thumb">
                                    <img src="{{ asset('upload/' . $product->image) }}" alt="ordered item">
                                </div>
                                <div class="single-item__content">
                                    <a href="#">{{ $product->name }}</a>
                                    <span class="price">{{ '₹' . $product->total }}</span>
                                </div>
                                @php
                                    $cart_total = $cart_total + $product->total;
                                @endphp
                                <div class="single-item__remove">
                                    <a href="{{ url('d_checkout/' . $product->id) }}"><i
                                            class="zmdi zmdi-delete"></i></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="ordre-details__total">
                        <h5>Order total</h5>
                        <span class="price">{{ $cart_total }}</span>
                        {{ session()->put('g_total', $cart_total) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('frontend.footer')
