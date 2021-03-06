@extends('front/layout')
@section('page_title','Category')
@section('container')

  <!-- product category -->
<section id="aa-product-category">
   <div class="container">
      <div class="row">
         <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
            <div class="aa-product-catg-content">
               {{-- <div class="aa-product-catg-head">
                  <div class="aa-product-catg-head-left">
                     <form action="" class="aa-sort-form">
                        <label for="">Sort by</label>
                        <select name="" onchange="sort_by()" id="sort_by_value">
                           <option value="" selected="Default">Default</option>
                           <option value="name">Name</option>
                           <option value="price_desc">Price - Desc</option>
                           <option value="price_asc">Price - Asc</option>
                           <option value="date">Date</option>
                        </select>
                     </form>
                     {{$sort_txt}}


                  </div>
                  <div class="aa-product-catg-head-right">
                     <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                     <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
                  </div>
               </div> --}}

               {{-- Product card --}}
               <div class="row">
                  @if(isset($product[0]))
                  @foreach($product as $productArr)
                    <div class="col-md-4">
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
                          <p class="dress-card-para"><span class="dress-card-price">Rs {{$product_attr[$productArr->id][0]->mrp}} &ensp;</span><span class="dress-card-crossed">Rs {{$product_attr[$productArr->id][0]->price}}</span><span class="dress-card-off">&ensp;(60% OFF)</span></p>
                          <div class="row">
                            <div class="col-md-6 card-button"><a href="">
              
                              <a onclick="home_add_to_cart('{{$productArr->id}}','{{$product_attr[$productArr->id][0]->size}}','{{$product_attr[$productArr->id][0]->color}}')">
                               
                            
                              
                              <div class="card-button-inner bag-button">Add to Cart</div></a></div>  </a>
                            <div class="col-md-6 card-button"><a href="{{url('product/'.$productArr->slug)}}"><div class="card-button-inner wish-button">Buy Now</div></a></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    @else
                    <div class="no-product-found">
                       <img src="{{asset('front_assets\img\icon\no-product-found.png')}}" alt="" class="no-product col-md-6">
                    </div>
      
                    @endif
               </div>
               {{-- /Product card --}}
               


               {{-- <div class="aa-product-catg-body">
                  <ul class="aa-product-catg">
                     <!-- start single product item -->
                     
                     @if(isset($product[0]))
                       @foreach($product as $productArr)
                      
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                            <a class="aa-add-card-btn" href="" onclick="home_add_to_cart('{{$productArr->id}}','{{$product_attr[$productArr->id][0]->size}}','{{$product_attr[$productArr->id][0]->color}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="{{url('product/'.$productArr->slug)}}">{{$productArr->name}}</a></h4>
                              <span class="aa-product-price">Rs {{$product_attr[$productArr->id][0]->price}}</span><span class="aa-product-price"><del>Rs {{$product_attr[$productArr->id][0]->mrp}}</del></span>
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
                  <!-- quick view modal -->                  
               </div> --}}
            </div>
         </div>

         <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">


            <aside class="aa-sidebar">
               <!-- single sidebar -->

               <button id="shop-category"><p class="cat-filter">Shop By Category <i class="fa fa-angle-right" id="arrow-right-category"></i></p></button>
               <div id="shop-by-category">
               <div class="aa-sidebar-widget">

                 
                     
                  <ul class="aa-catg-nav">
                     @foreach($categories_left as $cat_left)
                        @if($slug==$cat_left->category_slug)
                           <li><a href="{{url('category/'.$cat_left->category_slug)}}" class="left_cat_active">{{$cat_left->category_name}}</a></li>
                        @else
                           <li><a href="{{url('category/'.$cat_left->category_slug)}}">{{$cat_left->category_name}}</a></li>
                        @endif
                     @endforeach
                  </ul>
               </div>
               </div>

               <button id="shop-price"><div class="cat-filter">Shop By Price <i class="fa fa-angle-right" id="arrow-right-price"></i></div></button>
               <div id="shop-by-price">
               <div class="aa-sidebar-widget">
                  <!-- price range -->
                  <div class="aa-sidebar-price-range">
                     <form action="">
                        <div id="skipstep" class="noUi-target noUi-ltr noUi-horizontal noUi-background">
                        </div>
                        <span id="skip-value-lower" class="example-val">30.00</span>
                        <span id="skip-value-upper" class="example-val">100.00</span>
                        <button class="aa-filter-btn" type="button" onclick="sort_price_filter()">Filter</button>
                     </form>
                  </div>
               </div>
               </div>


               <!-- single sidebar -->
               <button id="shop-color"><div  class="cat-filter">Shop By Color <i class="fa fa-angle-right" id="arrow-right-color"></i></div></button>
               <div id="shop-by-color">
                  <div class="aa-sidebar-widget">
                     <div class="aa-color-tag">
                        @foreach($colors as $color)

                        @if(in_array($color->id,$colorFilterArr))
                           <a class="aa-color-{{strtolower($color->color)}} active_color" href="javascript:void(0)" onclick="setColor('{{$color->id}}','1')"></a>
                        @else
                           <a class="aa-color-{{strtolower($color->color)}}" href="javascript:void(0)" onclick="setColor('{{$color->id}}','0')"></a>
                        @endif


                        @endforeach
                     </div>
                  </div>
               </div>


            </aside>
         </div>
      </div>
   </div>
</section>
<!-- / product category -->

<input type="hidden" id="qty" value="1"/>
  <form id="frmAddToCart">
    <input type="hidden" id="size_id" name="size_id"/>
    <input type="hidden" id="color_id" name="color_id"/>
    <input type="hidden" id="pqty" name="pqty"/>
    <input type="hidden" id="product_id" name="product_id"/>           
    @csrf
  </form>  

  <form id="categoryFilter">
    <input type="hidden" id="sort" name="sort" value="{{$sort}}"/>
    <input type="hidden" id="filter_price_start" name="filter_price_start" value="{{$filter_price_start}}"/>
    <input type="hidden" id="filter_price_end" name="filter_price_end" value="{{$filter_price_end}}"/>
    <input type="hidden" id="color_filter" name="color_filter" value="{{$color_filter}}"/>
  </form> 
@endsection
