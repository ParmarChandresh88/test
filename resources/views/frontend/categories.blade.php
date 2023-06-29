@include('frontend.header')


<div class="ht__bradcaump__area"
    style="background: rgba(0, 0, 0, 0) url(https://png.pngtree.com/background/20210710/original/pngtree-household-items-mug-small-fresh-cute-minimalist-poster-picture-image_998141.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="{{ url('/') }}">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Product</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="htc__product__grid bg__white ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="htc__product__rightidebar">
                    <div class="htc__grid__top">
                        <div class="htc__select__option">
                            <select class="ht__select">
                                <option>Default softing</option>
                                <option>Sort by popularity</option>
                                <option>Sort by average rating</option>
                                <option>Sort by newness</option>
                            </select>
                        </div>
                    </div>
                    <!-- Start Product View -->
                    <div class="row">
                        <div class="shop__grid__view__wrap">
                            <div role="tabpanel" id="grid-view"
                                class="single-grid-view tab-pane fade in active clearfix">
                                <!-- Start Single Product -->
                                @foreach ($products as $list1)
                                    @if ($list1->status == 1)
                                        <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                            <div class="category">
                                                <div class="ht__cat__thumb">
                                                    <a href="{{ url('p_detail/' . $list1->id) }}">
                                                        <img src="{{ asset('upload/' . $list1->image) }}" width="260"
                                                            height="350" alt="{{ $list1->name }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="fr__product__inner">
                                                <h4><a href="product-details.html">{{ $list1->name }}</a></h4>
                                                <ul class="fr__pro__prize">
                                                    <li class="old__prize">{{ '₹' . $list1->mrp }}</li>
                                                    <li>{{ '₹' . $list1->price }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('frontend.footer')
