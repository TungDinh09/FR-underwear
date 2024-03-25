@extends('master')

@section('content')
    <section>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ URL::asset('/img/BG-IMG/b14.jpg') }}" class="d-block w-100" alt="..." height="800px">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="" class="my-5"><button class="custom-btn btn-16 my-5"> MORE</button></a>
                        <h5>WHITE COLLECTION</h5>

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('/img/BG-IMG/b15.jpg') }}" class="d-block w-100" alt="..." height="800px">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="" class="my-5"><button class="custom-btn btn-16 my-5"> MORE</button></a>
                        <h5>DARK COLLECTION</h5>

                    </div>
                </div>
                <div class="carousel-item">
                    <img src="{{ URL::asset('/img/BG-IMG/b12.jpg') }}" class="d-block w-100" alt="..." height="800px">
                    <div class="carousel-caption d-none d-md-block">
                        <a href="" class="my-5"><button class="custom-btn btn-16 my-5"> MORE</button></a>
                        <h5>SWIMSUIT</h5>

                    </div>
                </div>
            </div>

    </section>
    <section class="bg-pink">
        <div class="container-fluid">
            <div class="container-1 mx-auto pt-3">
                <form action="{{ url('search') }}" method="GET" role="search">
                    <span class="icon"><i class="fa fa-search"></i></span>
                    <input type="search" id="search" name="search" class="" placeholder="SEARCH"
                        value="" />
                </form>


            </div>
            <div class="container d-flex row col-12 align-items-center justify-content-center mx-auto">

                @foreach ($products as $item)
                    @if ($loop->index < 3)
                        <div class="col-md-4 col-lg-4 d-flex px-3">
                            <div class="product-card">

                                <div class="product-tumb">
                                    <a href="/detail/{{ $item->id }}" class="h-100 w-100"><img
                                            src="{{ asset('storage/img/' . $item->photo1) }}" alt="" height="100%"
                                            width="100%"></a>
                                </div>
                                <div class="product-details">

                                    <span class="product-catagory text-pink">{{ $item->category }}</span>

                                    <h4><a href="">{{ $item->name }}</a></h4>
                                    <p>{{ $item->description }}</p>
                                    <div class="product-bottom-details">
                                        <div class="product-price">{{ $item->price }}$</div>
                                        <div class="product-links">
                                            <a href="/detail/{{ $item->id }}"
                                                class="d-inline text-decoration-none"><span>DETAIL</span></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="text-center pt-3 pb-3">
                    <a href="{{ URL::to('/') }}"><button type="submit" class="btn btn-outline-dark">MORE</button></a>
                </div>
            </div>
        </div>
    </section>
    <section class=" mx-0  bg-dark">
        <div class="container-fluid intro-section overflow-hidden">
            <div class="container">
                <div class=" d-flex mx-0">
                    <div class="col-7-lg">
                        <img src="{{ URL::asset('/img/BG-IMG/b16.jpg') }}" alt="" width="100%" height="">
                    </div>

                    <div class="col-5-lg ps-4 ">
                        <div class="intro-text-gr pt-5">

                            <h2 class="footer-headline text-center text-bold mb-5">ABOUT US</h2>
                            <p class="text-white text-intro mx-auto">
                                Welcome to our online store for high-quality underwear! We offer a wide range of comfortable
                                and stylish underwear options for both men and women, from basic essentials to trendy and
                                unique styles. Our collection includes different fabrics, sizes, and designs to meet your
                                needs and preferences.

                            </p>

                            <p class="mt-1 text-light text-intro">We believe that the right underwear can make you feel
                                confident, comfortable, and ready to take on the day. Browse our selection and find the
                                perfect fit for you!</p>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
