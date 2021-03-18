@extends('layouts.master')
@section('content')

    <div class="row">
        <div class=" container-fluid">
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
                        <div class="mb-4 col-lg-3 col-md-6">
                            <div class="h-40 card" style="width: 13rem;">
                                <a href="#">
                                    <img class="card-img-top img-fluid h-25" src="{{ url($product->img_path??'no_image.jpg') }}"
                                        alt="{{ asset($product->img_path??'no_image.jpg') }}"></a>
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <a href="#">{{ $product->name }}</a>
                                    </h4>
                                    <h5 class="badge badge-primary">{{ 'SDG ' . $product->price }}</h5>
                                    <p class="card-text">{{ $product->details }}</p>
                                </div>
                                <div class="card-footer">
                                    <a class="text-black btn btn-success" href="{{ route('cart') }}"
                                        onclick="event.preventDefault(); document.getElementById('add-to-cart-{{ $product->id }}').submit();">
                                        <span class="ml-2 fa fa-plus"></span>
                                        <span class="mr-1"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                    </a>
                                    <a class="p-2 pull-right" href="#"><span class="fa fa-heart-o"></span></a>
                                    <form id="add-to-cart-{{ $product->id }}" action="{{ route('cart.store') }}"
                                        method="POST" class="d-none">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">

                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
