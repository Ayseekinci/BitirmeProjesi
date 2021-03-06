@extends('layout.master')
@section('title', 'Category')
@section('content')
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
                  <li class="active"><a href="#cat1" data-toggle="tab"> {{ $products[0]->categoryName }}</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                  <!-- Start category -->
                  <div class="tab-pane fade in active" id="cat1">
                    <ul class="aa-product-catg">
                      @foreach ($products as $product)
                      <li>
                        <figure>
                          <a class="aa-product-img" href="{{ route('category.product',[$product->categorySlug, $product->productSlug]) }}"><img src="/img/250x300.png" alt="polo shirt img"></a>
                          <form action="{{ route('cart.add') }}" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <button style="width: 100%; border: 0px; outline: none;" class="aa-add-card-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</button>
                          </form>
                          <figcaption>
                            <h4 class="aa-product-title"><a href="{{ route('category.product',[$product->categorySlug, $product->productSlug]) }}">{{ $product->title }}</a></h4>
                            <span class="aa-product-price">${{ $product->price }}</span>
                            @if (!is_null($product->old_price))
                              <span class="aa-product-price"><del>${{ $product->old_price ?? null }}</del></span>
                            @endif
                          </figcaption>
                        </figure>
                        <!-- product badge -->
                        <span class="aa-badge aa-{{ $product->statu == 1 ? 'sale' : ($product->statu == 2 ? 'hot' : 'sold-out') }}">{{ $product->statu == 1 ? 'SALE!' : ($product->statu == 2 ? 'HOT!' : 'SOLD OUT!') }}</span>
                      </li>
                      @endforeach
                    </ul>
                  </div>
                  <!-- End category -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
<!-- / Products section -->
@endsection
