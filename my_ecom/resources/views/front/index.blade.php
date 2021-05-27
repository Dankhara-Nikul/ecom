@extends('front/layout')
@section('page_title','Home Page')
@section('container')

<div class="slider" >
  <div class="arrows">
    <a class="previous" href="#">&#xf053;</a>
    <a class="next" href="#">&#xf054;</a>
  </div>
  <div class="slides">

    <div class="slide active">
      <h2>Hello</h2>
      <img class="slide-image img-fluid" src="{{asset('storage\media\banner\slide1.jpg')}}">
    </div>
    <div class="slide white">
      <img class="slide-image img-fluid" src="{{asset('storage\media\banner\slide2.jpg')}}">
    </div>
    <div class="slide red">
      <img class="slide-image img-fluid" src="{{asset('storage\media\banner\slide3.jpg')}}">
    </div>
  </div>
  <div class="bullets">
  </div>
</div>
<!-- / slider -->


{{-- CARDS --}}

<div class="cards container-fluid"> 
  @foreach($home_categories as $list)
  <div class="card col-md-3 col-3">
    <a href="{{url('category/'.$list->category_slug)}}">
      <img class="card-image img-fluid" src="{{asset('storage/media/category/'.$list->category_image)}}"/>
    </a>
    <div class="card-name">
      <h4><a href="{{url('category/'.$list->category_slug)}}">{{$list->category_name}}</a></h4>
    </div>
  </div>
  @endforeach
</div>

{{-- CARDS --}}


{{-- Product Section --}}

<div class="container-fluid product-card-custom">
  <p class="text-white text-center mt-2 text-explore">Explore</p><div class="text-white product-text-banner">New Arrival</div>
  <div class="row">
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



    @if(isset($home_categories_product[$list->id][0]))
    @foreach($home_categories_product[$list->id] as $productArr)
      <div class="col-md-3">
        <div class="dress-card">
          <div class="dress-card-head">
            <a href="{{url('product/'.$productArr->slug)}}">
              <img class="dress-card-img-top" src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}">
            </a>
            {{-- <img class="dress-card-img-top" src="https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578935/2018/10/23/d7b740bc-e00e-4bec-97aa-65016f8ff2e71540289479612-Harpa-Women-Dresses-2331540289479465-1.jpg" alt=""> --}}
            <div class="surprise-bubble"><span class="dress-card-heart">
                <i class="fa fa-heart"></i>
              </span><a href="{{url('product/'.$productArr->slug)}}"> <span>More</span></a></div>
          </div>
          <div class="dress-card-body">
            <h4 class="dress-card-title"><a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}} </a></h4>
            {{-- <p class="dress-card-para">Womans printed clothing</p> --}}
            <p class="dress-card-para"><span class="dress-card-price">Rs {{$home_product_attr[$productArr->id][0]->mrp}} &ensp;</span><span class="dress-card-crossed">Rs {{$home_product_attr[$productArr->id][0]->price}}</span><span class="dress-card-off">&ensp;(60% OFF)</span></p>
            <div class="row">
              <div class="col-md-6 card-button"><a href="">

                <a onclick="home_add_to_cart('{{$productArr->id}}','{{$home_product_attr[$productArr->id][0]->size}}','{{$home_product_attr[$productArr->id][0]->color}}')">
                 
              
                
                <div class="card-button-inner bag-button">Add to Cart</div></a></div>  </a>
              <div class="col-md-6 card-button"><a href="{{url('product/'.$productArr->slug)}}"><div class="card-button-inner wish-button">Buy Now</div></a></div>
            </div>
          </div>
        </div>
      </div>
    {{-- <div class="col-md-3">
        <div class="dress-card">
          <div class="dress-card-head">
            <img class="dress-card-img-top" src="https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/6625378/2018/6/5/fcec8d8e-4253-4fa4-ae6e-c6805b3b8fd31528183265021-na-2331528183264786-1.jpg" alt="">
            <div class="surprise-bubble"><span class="dress-card-heart">
                <i class="fas fa-heart"></i>
              </span><a href="#"> <span>More</span></a></div>
          </div>
          <div class="dress-card-body">
            <h4 class="dress-card-title">Harpa</h4>
            <p class="dress-card-para">Womans printed clothing</p>
            <p class="dress-card-para"><span class="dress-card-price">Rs.839 &ensp;</span><span class="dress-card-crossed">Rs.2099</span><span class="dress-card-off">&ensp;(60% OFF)</span></p>
            <div class="row">
              <div class="col-md-6 card-button"><a href=""><div class="card-button-inner bag-button">Add to Bag</div></a></div>
              <div class="col-md-6 card-button"><a href=""><div class="card-button-inner wish-button">Whishlist</div></a></div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-md-3">
        <div class="dress-card">
          <div class="dress-card-head">
            <img class="dress-card-img-top" src="https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578929/2018/10/23/86988cdc-cbe3-4b13-93f9-b37ad571b4761540274855321-Harpa-Women-Dresses-9171540274855158-1.jpg" alt="">
            <div class="surprise-bubble"><span class="dress-card-heart">
                <i class="fas fa-heart"></i>
              </span><a href="#"> <span>More</span></a></div>
          </div>
          <div class="dress-card-body">
            <h4 class="dress-card-title">Harpa</h4>
            <p class="dress-card-para">Womans printed clothing</p>
            <p class="dress-card-para"><span class="dress-card-price">Rs.839 &ensp;</span><span class="dress-card-crossed">Rs.2099</span><span class="dress-card-off">&ensp;(60% OFF)</span></p>
            <div class="row">
              <div class="col-md-6 card-button"><a href=""><div class="card-button-inner bag-button">Add to Bag</div></a></div>
              <div class="col-md-6 card-button"><a href=""><div class="card-button-inner wish-button">Buy Now</div></a></div>
            </div>
          </div>
        </div>
      </div>
    <div class="col-md-3">
        <div class="dress-card">
          <div class="dress-card-head">
            <img class="dress-card-img-top" src="https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/7578940/2018/10/23/fe701151-69e6-4e20-9e2a-ace63081a8e11540282217137-Harpa-Women-Dresses-191540282216937-5.jpg" alt="">
            <div class="surprise-bubble"><span class="dress-card-heart">
                <i class="fas fa-heart"></i>
              </span><a href="#"> <span>More</span></a></div>
          </div>
          <div class="dress-card-body">
            <h4 class="dress-card-title">Harpa</h4>
            <p class="dress-card-para">Womans printed clothing</p>
            <p class="dress-card-para"><span class="dress-card-price">Rs.839 &ensp;</span><span class="dress-card-crossed">Rs.2099</span><span class="dress-card-off">&ensp;(60% OFF)</span></p>
            <div class="row">
              <div class="col-md-6 card-button"><a href=""><div class="card-button-inner bag-button">Add to Bag</div></a></div>
              <div class="col-md-6 card-button"><a href=""><div class="card-button-inner wish-button">Buy Now</div></a></div>
            </div>
          </div>
        </div>
      </div> --}}
    
    
    
    
     
      @endforeach
      @endif
      @endforeach
    </div>
  
</div>
<br>
<br>


{{-- /Product Section --}}

<!-- Products section -->
{{-- <section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner"> --}}
              <!-- start prduct navigation -->
              {{-- <ul class="nav nav-tabs aa-products-tab"> --}}
                {{-- @foreach($home_categories as $list)
                <li class=""><a href="#cat{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>
                @endforeach --}}
              {{-- </ul> --}}
              <!-- Tab panes -->
              {{-- <div class="tab-content"> --}}
                <!-- Start men product category -->
                {{-- @php
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
</section> --}}
<!-- / Products section -->


<!-- banner section -->
<section id="aa-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-banner-area">
            <a href="#"><img src="{{asset('front_assets/img/icon/banner.png')}}" alt="fashion banner img"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- popular section -->
{{-- <section id="aa-popular-category">
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
                      <a class="aa-add-card-btn" href="javascript:void(0)" onclick="home_add_to_cart('{{$productArr->id}}','{{$home_product_attr[$productArr->id][0]->size}}','{{$home_product_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
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
</section> --}}
<!-- / popular section -->

<div class="support-info">
  <div class="free-shipping"><img src="{{asset('front_assets\img\icon\ship.png')}}" class="support-icon"> <p>Free Shipping</p></div>
  <div class="money-back"><img src="{{asset('front_assets\img\icon\money-back.png')}}" class="support-icon"><p> 100% Money back</p></div>
  <div class="support"> <img src="{{asset('front_assets\img\icon\support.png')}}" class="support-icon"><p>24/7 support</p></div>
</div>

<!-- Support section -->
{{-- <section id="aa-support">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-support-area"> --}}
          <!-- single support -->
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-truck"></span>
              <h4>FREE SHIPPING</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div> --}}
          <!-- single support -->
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="aa-support-single">
              <span class="fa fa-clock-o"></span>
              <h4>30 DAYS MONEY BACK</h4>
              <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
            </div>
          </div> --}}
          <!-- single support -->
          {{-- <div class="col-md-4 col-sm-4 col-xs-12">
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
</section> --}}
<!-- / Support section -->

<!-- Client Brand -->
{{-- <section id="aa-client-brand">
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
</section> --}}
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