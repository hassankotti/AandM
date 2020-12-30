@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row ">

      <div class="col-lg-3">

        <div class="list-group">
          @forelse($categoreis as $category)
            <a href="#" class="list-group-item">{{ $category->name}}</a>
          @empty
             <a href="#" class="list-group-item">Category 1</a>
          @endforelse
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="{{ asset('images/slider01.png') }}" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="{{ asset('images/slider02.png') }}" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="http://placehold.it/900x350" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          @foreach ($products as $product)
              <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top img-thumbnail" src="{{ url($product->img_path) }}" alt="{{ asset($product->img_path) }}"></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">{{ $product->name }}</a>
                </h4>
                <h5>{{ 'SDG '.$product->price }}</h5>
                <p class="card-text">{{ $product->details }}</p>
              </div>
              <div class="card-footer btn-success">
                <a class="btn text-black" href="{{ route('cart') }}"
                          onclick="event.preventDefault();
                                          document.getElementById('add-to-cart').submit();">
                          {{ __('Add To Cart') }}
                      </a>

                    <form id="add-to-cart" action="{{ route('cart.store') }}" method="POST" class="d-none">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                    </form>
              </div>
            </div>
          </div>
          @endforeach

        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->



  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@endsection
