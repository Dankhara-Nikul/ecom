@extends('front/layout')
@section('page_title','Home Page')
@section('container')
<img data-seq src="storage\app\..\public\media\banner\1613593472.jpg" />

<!-- / slider -->
<!-- Start Promo section -->
<div class="row pt-4 pb-5 py-4  justify-content-center">
  <h2 class="text-light text-center text-line text-light">THERE'S SOMRTHING FOR EVERYONE</h2>
  @foreach($home_categories as $list)
  <div class="col-6 col-lg-3 py-4 ">
    <div class="image-area ">
      <div class="img-wrapper ">
        <img src="{{asset('storage/media/category/'.$list->category_image)}} " alt=" ">
        <h2><a href="{{url('category/'.$list->category_slug)}}">{{$list->category_name}}</a></h2>
      </div>
    </div>
  </div>
  @endforeach
</div>

<!-- / category -->
<div class="wrapper cat-banners">
  <div class="row justify-content-center gutter-2">
    @foreach($home_categories as $list)
    <div class="col-lg-3 col-6 py-2">
      <div class="category-card default-shadow">
        <a href="">
          <img src="{{asset('storage/media/category/'.$list->category_image)}}" class="img-fluid lazy-img" style="display: inline-block;" data-aspect-ratio="0.68">
        </a>
        <a href="{{url('category/'.$list->category_slug)}}" class="p-2 text-center title" title="Shirt">{{$list->category_name}}</a>
      </div>
    </div>
    @endforeach
  </div>
</div>

<!-- / Promo section -->
<!-- Products section -->
<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
              <ul class="nav nav-tabs aa-products-tab">
                @foreach($home_categories as $list)
                <li class=""><a href="#cat{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>
                @endforeach
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men product category -->
                @php
                $loop_count=1;
                @endphp
                @foreach($home_categories as $list)
                @php
                $cat_class="";
                if($loop_count==1){
                $cat_class="in active";
                $loop_count++;
                }
                @endphp
                <div class="tab-pane fade {{$cat_class}}" id="cat{{$list->id}}">
                  <ul class="aa-product-catg">
                    @if(isset($home_categories_product[$list->id][0]))
                    @foreach($home_categories_product[$list->id] as $productArr)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}">
                          <img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}">
                        </a>
                        <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr->id}}','{{$home_product_attr[$productArr->id][0]->size}}','{{$home_product_attr[$productArr->id][0]->color}}')">
                          <span class="fa fa-shopping-cart"></span>Add To Cart
                        </a>
                        <figcaption>
                          <h4 class="aa-product-title">
                            <a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}} </a>
                          </h4>
                          <span class="aa-product-price">Rs {{$home_product_attr[$productArr->id][0]->price}}</span>
                          <span class="aa-product-price"><del>Rs {{$home_product_attr[$productArr->id][0]->mrp}}</del></span>
                        </figcaption>
                      </figure>
                    </li>
                    @endforeach
                    @else
                    <li>
                      <figure>
                        No data found
                        <figure>
                    <li>
                      @endif
                  </ul>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Products section -->
<!-- banner section -->
<section id="aa-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-banner-area">
            <a href="#"><img src="{{asset('front_assets/img/fashion-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- popular section -->
<section id="aa-popular-category">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-popular-category-area">
            <!-- start prduct navigation -->
            <ul class="nav nav-tabs aa-products-tab">
              <li class="active"><a href="#featured" data-toggle="tab">Featured</a></li>
              <li><a href="#tranding" data-toggle="tab">Tranding</a></li>
              <li><a href="#discounted" data-toggle="tab">Discounted</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Start men featured category -->
              <div class="tab-pane fade in active" id="featured">
                <ul class="aa-product-catg aa-featured-slider">
                  <!-- start single product item -->


                  @if(isset($home_featured_product[$list->id][0]))
                  @foreach($home_featured_product[$list->id] as $productArr)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                      <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr->id}}','{{$home_product_attr[$productArr->id][0]->size}}','{{$home_product_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                        <span class="aa-product-price">Rs {{$home_featured_product_attr[$productArr->id][0]->price}}</span><span class="aa-product-price"><del>Rs {{$home_featured_product_attr[$productArr->id][0]->mrp}}</del></span>
                      </figcaption>
                    </figure>
                  </li>
                  @endforeach
                  @else
                  <li>
                    <figure>
                      No data found
                      <figure>
                  <li>
                    @endif
                </ul>
              </div>
              <!-- / popular product category -->

              <!-- start tranding product category -->
              <div class="tab-pane fade" id="tranding">
                <ul class="aa-product-catg aa-tranding-slider">
                  <!-- start single product item -->
                  @if(isset($home_tranding_product[$list->id][0]))
                  @foreach($home_tranding_product[$list->id] as $productArr)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                      <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr->id}}','{{$home_product_attr[$productArr->id][0]->size}}','{{$home_product_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                        <span class="aa-product-price">Rs {{$home_tranding_product_attr[$productArr->id][0]->price}}</span><span class="aa-product-price"><del>Rs {{$home_tranding_product_attr[$productArr->id][0]->mrp}}</del></span>
                      </figcaption>
                    </figure>
                  </li>
                  @endforeach
                  @else
                  <li>
                    <figure>
                      No data found
                      <figure>
                  <li>
                    @endif
                </ul>
              </div>
              <!-- / featured product category -->

              <!-- start discounted product category -->
              <div class="tab-pane fade" id="discounted">
                <ul class="aa-product-catg aa-discounted-slider">
                  <!-- start single product item -->

                  @if(isset($home_discounted_product[$list->id][0]))
                  @foreach($home_discounted_product[$list->id] as $productArr)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                      <a class="aa-add-card-btn" href="" onclick="home_add_to_cart('{{$productArr->id}}','{{$home_product_attr[$productArr->id][0]->size}}','{{$home_product_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                        <span class="aa-product-price">Rs {{$home_discounted_product_attr[$productArr->id][0]->price}}</span><span class="aa-product-price"><del>Rs {{$home_discounted_product_attr[$productArr->id][0]->mrp}}</del></span>
                      </figcaption>
                    </figure>
                  </li>
                  @endforeach
                  @else
                  <li>
                    <figure>
                      No data found
                    </figure>
                  <li>
                    @endif
                </ul>
              </div>
              <!-- / latest product category -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / popular section -->
<!-- Support section -->
<section id="aa-support">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-support-area">
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-truck"></span>
              <h4>FREE SHIPPING</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-clock-o"></span>
              <h4>30 DAYS MONEY BACK</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
          <!-- single support -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-phone"></span>
              <h4>SUPPORT 24/7</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Support section -->

<!-- Client Brand -->
<section id="aa-client-brand">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-client-brand-area">
          <ul class="aa-client-brand-slider">
            @foreach($home_brand as $list)
            <li><a href="#"><img src="{{asset('storage/media/brand/'.$list->image)}}" alt="{{$list->name}}"></a></li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Client Brand -->
<input type="hidden" id="qty" value="1" />
<form id="frmAddToCart">
  <input type="hidden" id="size_id" name="size_id" />
  <input type="hidden" id="color_id" name="color_id" />
  <input type="hidden" id="pqty" name="pqty" />
  <input type="hidden" id="product_id" name="product_id" />
  @csrf
</form>
@endsection