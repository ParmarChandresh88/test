@include('frontend.header')
{{-- < action="{{ route ('addcart.store')}}" method="POST">
    @method('post') --}}
@foreach ($pro as $pro)
    <!-- Start Bradcaump area -->
    <div class="ht__bradcaump__area"
        style="background: rgba(0, 0, 0, 0) url(http://www.avizonchem.com/images/product.jpg) no-repeat scroll center center / cover ;">
        <div class="ht__bradcaump__wrap">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="bradcaump__inner">
                            <nav class="bradcaump-inner">
                                <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <a class="breadcrumb-item" href="product-grid.html">Products</a>
                                <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                                <span class="breadcrumb-item active">{{ $pro->name }}</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!-- End Bradcaump area -->
    <!-- Start Product Details Area -->
    @if (session()->has('cart_add'))
        <div class="alert alert-danger">{{ session()->get('cart_add') }}</div>
    @endif
    <section class="htc__product__details bg__white ptb--100">
        <!-- Start Product Details Top -->
        <div class="htc__product__details__top">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                        <div class="htc__product__details__tab__content">
                            <!-- Start Product Big Images -->
                            <div class="product__big__images">
                                <div class="portfolio-full-image tab-content">
                                    <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                        <img src="{{ asset('upload/' . $pro->image) }}" alt="full-image">
                                    </div>
                                </div>
                            </div>
                            <!-- End Product Big Images -->

                        </div>
                    </div>
                    <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                        <div class="ht__product__dtl">
                            <h2>{{ $pro->name }}</h2>
                            <ul class="pro__prize">
                                <li class="old__prize">{{ '₹' . $pro->mrp }}</li>
                                <li>{{ '₹' . $pro->price }}</li>
                            </ul>
                            <p class="pro__info">{{ $pro->short_desc }}</p>
                            <div class="ht__pro__desc">
                                <div class="sin__desc">
                                    <p><span>Availability:</span> In Stock</p>
                                </div>
                                <div class="sin__desc align--left">
                                    <p><span>Categories:</span></p>
                                    <ul class="pro__cat__list">
                                        <li><a href="#">{{ $pro->category }}</a></li>
                                    </ul>
                                </div>
                                <div class="sin__desc">
                                    <form action="{{ url('add_cart/' . $pro->id) }}" method="POST">
                                        @csrf
                                        <p><span>Quentity:</span>
                                            <select name="qty" id="qty" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                            </select>
                                        </p>
                                        <div class="cr__btn">
                                            <button type="submit" class="form-control"
                                                style="background-color:#c43b68;color:white"> Add To Cart</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Product Details Top -->
        <!-- Start Product Description -->
        <br>
        <section class="htc__produc__decription bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <ul class="pro__details__tab" role="tablist">
                            <li role="presentation" class="description active"><a href="#description" role="tab"
                                    data-toggle="tab">description</a></li>
                        </ul>
                        <!-- End List And Grid View -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ht__pro__details__content">
                            <div role="tabpanel" id="description" class="pro__single__content tab-pane fade in active">
                                <div class="pro__tab__content__inner">
                                    {{ $pro->description }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endforeach
@include('frontend.footer')
