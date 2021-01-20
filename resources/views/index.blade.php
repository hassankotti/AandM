@extends('layouts.master')
@section('content')
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">A&M Store</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Categoreis
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @forelse($categoreis as $category)
                            <a class="dropdown-item" href="#">{{ $category->name }}</a>
                        @empty
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">No Categories</a>
                        </div>
                    @endforelse
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="#">Profile</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="row">
        <div class="col-12">

            <div id="carouselExampleIndicators" class="carousel slide my-h1" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/en_slider-01.png') }}"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/en_slider-02.png') }}"
                            alt="Second slide">
                    </div>
                    <div class="carousel-item ">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/en_slider-03.png') }}"
                            alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block img-fluid" src="{{ asset('assets/images/en_slider-04.png') }}"
                            alt="Second slide">
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

            <div class="container mt-5">
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="card h-100">
                                <a href="#"><img class="card-img-top img-fluid" src="{{ url($product->img_path) }}"
                                        alt="{{ asset($product->img_path) }}"></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">{{ $product->name }}</a>
                                    </h4>
                                    <h5>{{ 'SDG ' . $product->price }}</h5>
                                    <p class="card-text">{{ $product->details }}</p>
                                </div>
                                <div class="card-footer">
                                    <a class="btn btn-success text-black" href="{{ route('cart') }}"
                                        onclick="event.preventDefault(); document.getElementById('add-to-cart-{{$product->id}}').submit();">
                                        <span class="fa fa-plus ml-2"></span>
                                        <span class="mr-2">{{ __('Add To Cart') }}</span>
                                    </a>
                                    <a class="pull-right p-2" href="#"><span class="fa fa-heart-o"></span></a>
                                    <form id="add-to-cart-{{$product->id}}" action="{{ route('cart.store') }}" method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
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
