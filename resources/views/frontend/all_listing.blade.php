@extends('frontend.includes.main')

@section('content')

<!-- Hero Banner -->
<section class="hero__banner__section">
    <div class="container">
        <div class="hero__banner">
            <h3 class="font-gilroy-bold mb-3 fs-1 text-primary">All Articles</h3>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Listing</li>
                </ol>
            </nav>
        </div>
    </div>
</section>

<!-- Featured Articles -->
<section class="post-section py-md-5 mt-4">
    <div class="container">
        <div class="row g-5">

            @foreach ($allarticals as $key => $article)
            @if($key < 3) <div class="col-12 col-md-6 col-lg-4">
                <div class="medium-cards-container">
                    <div class="post-image">
                        <a href="javascript:void(0)">

                            <img src="{{ URL::asset('storage/articals/' . $article->image) }}" alt="image">

                        </a>
                    </div>
                    <div class="post-content  {{($article->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex flex-column justify-content-between ]">
                        <div class="post-auth-date [ d-flex ]">
                            <ul class="d-flex">
                                <li>
                                    <a href="{{url('/author-listing/'.$article->user_name)}}">
                                        <i class="fa-solid fa-user"></i>
                                        {{$article->user_name}}
                                    </a>
                                </li>
                                <li>
                                <a href="{{ route('articals',$article->url)}}">
                                        <i class="fa-solid fa-calendar"></i>
                                        {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="post-tags mb-md-4 mb-4">
                                <a href="{{ route('articals',$article->url)}}" class="btn btn-primary tag">
                                    @if($article->subcategory_id == null)
                                    {{$article->category->name}}@else{{$article->categoryName->name ?? null}}@endif

                                </a>
                            </div>
                            <a href="{{ route('articals',$article->url)}}">
                                <h3 class="m-0 post-heading">
                                    {{$article->title}}
                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        @elseif($key >= 3 && $key < 7) <div class="col-12 col-md-4 col-lg-6">
            <div class="row g-5 mobile__scroll">
                <div class="col-12">
                    <div class="small-cards-container">
                        <div
                            class="post-content {{($article->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                            <a href="{{ route('articals',$article->url)}}">
                                <h4>{{$article->title}}</h4>
                            </a>
                            <div class="post-auth-date [ d-flex ]">
                                <ul class="d-flex">
                                    <li>
                                    <a href="{{url('/author-listing/'.$article->user_name)}}">
                                            <i class="fa-solid fa-user"></i>
                                            {{$article->user_name ?? ''}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('articals',$article->url)}}">
                                            <i class="fa-solid fa-calendar"></i>
                                            {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="post-image">
                            <div class="post-tags [ d-flex gap-2 ]">
                                <a href="{{ route('articals',$article->url)}}" class="btn btn-primary btn-sm">

                                    @if($article->subcategory_id == null)
                                    {{$article->category->name}}@else{{$article->categoryName->name ?? null}}@endif

                                </a>
                            </div>
                            <a href="javascript:void(0)">
                                <img src="{{ URL::asset('storage/articals/' . $article->image) }}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @else
    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="post__listing__card">
            <div class="post__listing__card__image">
                <ul class="__tags">
                    <li><a href="{{ route('articals',$article->url)}}" class="btn btn-sm btn-primary tag">

                            @if($article->subcategory_id == null)
                            {{$article->category->name}}@else{{$article->categoryName->name ?? null}}@endif

                        </a></li>
                </ul>
                <a href="{{ route('articals',$article->url)}}">
                    <img src="{{ URL::asset('storage/articals/' . $article->image) }}" alt="Listing Image" />
                </a>
            </div>
            <div class="post__listing__card__content {{($article->language_id=='3') ? 'urdu' : 'hindi'}} ">
                <a href="{{ route('articals',$article->url)}}">
                    <h4 class="mb-3 fw-bold">
                        {{$article->title}}</h4>
                </a>
                <p> {!!Str::words(strip_tags($article->content, 20))!!}</p>
                <ul class="post-auth-date d-flex font-roboto mt-4">
                    <li>
                    <a href="{{url('/author-listing/'.$article->user_name)}}">
                            <i class="fa-solid fa-user"></i>
                            {{$article->user_name??null}}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa-solid fa-calendar"></i>
                            {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    @endif
    @endforeach
    </div>
    </div>
</section>

<div class="pagination__container w-100 d-flex justify-content-center my-5 pt-3">
    <ul class="pagination pagination-lg">
        {{ $allarticals->links('pagination::bootstrap-4') }}
    </ul>
</div>




<!-- Full Width Ad -->
<section class="post-section">
    <div class="container">
        <div class="ad__cont horizontal">
            <a href="javascript:void(0)">
                <i class="fa-solid fa-ad"></i>
                <picture>
                    <!-- <source media="(max-width:650px)" srcset="img_pink_flowers.jpg')}}">
            <source media="(max-width:465px)" srcset="img_white_flower.jpg')}}"> -->
                    <img src="{{ URL::asset('storage/add_image/' . $ads01->add_image02) }}" alt="Ad Image">
                </picture>
            </a>
        </div>
    </div>
</section>

<!-- Related Articals -->

<section class="post-section py-md-5">
    <div class="container">
        <div class="section-heading [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
                <span class="white-space-nowrap">Related Articals</span>
            </h2>
            <a href="{{ route('allartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
                View All
                <i class="fa-solid fa-long-arrow-right"></i>
            </a>
        </div>
        <div class="row g-5">
            <div class="col-12 col-lg-12 col-xl-3">
                <div class="ad__cont vertical">
                    <a href="javascript:void(0)">
                        <i class="fa-solid fa-ad"></i>
                        <picture>

                            <img src="{{ URL::asset('storage/add_image/' . $ads01->add_image01) }}" alt="Ad Image">
                        </picture>
                    </a>
                </div>
            </div>
            <div class="col-12 col-lg-12 col-xl-9">
                <div class="row g-5">
                    <div class="col-12 col-lg-7">
                        <div class="row g-5 mobile__scroll">
                            @foreach($mostviews as $key=> $artical)
                            @if($key<3) <div class="col-12">
                                <div class="small-cards-container">
                                    <div
                                        class="post-content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                                        <a href="{{ route('articals',$artical->url)}}">
                                            <h4>{{$artical->title}}</h4>
                                        </a>
                                        <div class="post-auth-date [ d-flex ]">
                                            <ul class="d-flex">
                                                <li>
                                                <a href="{{url('/author-listing/'.$artical->user_name)}}">
                                                        <i class="fa-solid fa-user"></i>
                                                        {{$artical->user_name ?? ''}}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('articals',$artical->url)}}">
                                                        <i class="fa-solid fa-calendar"></i>
                                                        {{ Carbon\Carbon::parse($artical->created_at)->format('d/m/Y') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="post-image">
                                        <div class="post-tags [ d-flex gap-2 ]">
                                            <a href="{{ route('articals',$artical->url)}}"
                                                class="btn btn-primary btn-sm">

                                                @if($artical->subcategory_id == null)
                                                {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif

                                            </a>
                                        </div>
                                        <a href="javascript:void(0)">
                                            <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                                        </a>
                                    </div>
                                </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                </div>
                @if($mustView)
                <div class="col-12 col-lg-5">
                    <div class="medium-cards-container">
                        <div class="post-image">
                            <a href="javascript:void(0)">
                                <img src="{{ URL::asset('storage/articals/' . $mustView->image ?? '') }}" alt="Image" />
                            </a>
                        </div>
                        <div class="post-content {{($mustView->language_id=='3') ? 'urdu' : 'hindi'}}  [ d-flex flex-column justify-content-between ]">
                            <div class="post-auth-date [ d-flex ]">
                                <ul class="d-flex">
                                    <li>
                                    <a href="{{url('/author-listing/'.$mustView->user_name)}}">
                                            <i class="fa-solid fa-user"></i>
                                            {{$mustView->user_name ?? ''}}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="fa-solid fa-calendar"></i>
                                            {{ Carbon\Carbon::parse($mustView->created_at)->format('d/m/Y') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <div class="post-tags mb-md-4 mb-4">
                                    <a href="{{ route('articals',$mustView->url)}}" class="btn btn-primary tag">

                                        @if($mustView->subcategory_id == null)
                                        {{$mustView->category->name}}@else{{$mustView->categoryName->name ?? null}}@endif

                                    </a>
                                </div>
                                <a href="{{ route('articals',$mustView->url)}}">
                                    <h3 class="m-0 post-heading">
                                        {!! substr(strip_tags($mustView->content ?? ''), 0,150)!!}
                                    </h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="col-12">
            <div class="row g-5 mobile__scroll">
                @foreach($mostviews as $key=> $artical)
                @if(3<=$key ||$key>=5)
                    <div class="col-12 col-lg-6">

                        <div class="small-cards-container">
                            <div
                                class="post-content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                                <a href="{{ route('articals',$artical->url)}}">
                                    <h4>{{$artical->title}}</h4>
                                </a>

                                <div class="post-auth-date [ d-flex ]">
                                    <ul class="d-flex">
                                        <li>
                                        <a href="{{url('/author-listing/'.$artical->user_name)}}">
                                                <i class="fa-solid fa-user"></i>
                                                {{$artical->user_name ?? ''}}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('articals',$artical->url)}}">
                                                <i class="fa-solid fa-calendar"></i>
                                                {{ Carbon\Carbon::parse($artical->created_at)->format('d/m/Y') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="post-image">
                                <div class="post-tags [ d-flex gap-2 ]">
                                    <a href="{{ route('articals',$artical->url)}}" class="btn btn-primary btn-sm">

                                        @if($artical->subcategory_id == null)
                                        {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif

                                    </a>
                                </div>
                                <a href="{{ route('articals',$artical->url)}}">
                                    <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach

            </div>
        </div>
    </div>
    </div>
</section>
<section class="post-section py-md-5">
    <div class="container">
        <div class="section-heading [ d-flex align-items-center ]">
            <h2 class="heading-text m-0 font-gilroy-bold text-primary fs-1">
                <span class="white-space-nowrap">Featured Articles</span>
            </h2>
            <a href="{{ route('allartical') }}" class="white-space-nowrap [ btn btn-light border hover-dark ]">
                View All
                <i class="fa-solid fa-long-arrow-right"></i>
            </a>
        </div>
        <div class="row g-5 featured__articals__card__container horizontal__scroll">
            @foreach($featureArticles as $key => $artical)
            @if($key < 3) <div class="col-12 col-lg-6 col-xl-4">
                <div class="medium-cards-container">
                    <div class="post-image">
                        <a href="javascript:void(0)">
                            <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="Image">

                        </a>
                    </div>
                    <div class="post-content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex flex-column justify-content-between ]">
                        <div class="post-auth-date [ d-flex ]">
                            <ul class="d-flex">
                                <li>
                                    <a href="{{url('/author-listing/'.$artical->user_name)}}">
                                        <i class="fa-solid fa-user"></i>
                                        {{$artical->user_name}}
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="fa-solid fa-calendar"></i>
                                        {{ Carbon\Carbon::parse($artical->created_at)->format('d/m/Y') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <div class="post-tags mb-md-4 mb-4">
                                <a href="{{ route('articals',$artical->url)}}" class="btn btn-primary tag">
                                    @if($artical->subcategory_id == null)
                                    {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif
                                </a>
                            </div>
                            <a href="{{ route('articals',$artical->url)}}">
                                <h3 class="m-0 post-heading">
                                    {{$artical->title}}

                                </h3>
                            </a>
                        </div>
                    </div>
                </div>
        </div>
        @elseif($key >= 3 && $key < 7) <div class="col-12 col-lg-6">
            <div class="small-cards-container">
                <div class="post-content  {{($artical->language_id=='3') ? 'urdu' : 'hindi'}} [ d-flex justify-content-between flex-column  ]">
                    <a href="{{ route('articals',$artical->url)}}">
                        <h4>{{$artical->title}}</h4>
                    </a>
                    <div class="post-auth-date [ d-flex ]">
                        <ul class="d-flex">
                            <li>
                            <a href="{{url('/author-listing/'.$artical->user_name)}}">
                                    <i class="fa-solid fa-user"></i>
                                    {{$artical->user_name}}
                                </a>
                            </li>
                            <li>
                                <a href="javascript:;">
                                    <i class="fa-solid fa-calendar"></i>
                                    {{ Carbon\Carbon::parse($artical->created_at)->format('d/m/Y') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="post-image">
                    <div class="post-tags [ d-flex gap-2 ]">
                        <a href="{{ route('articals',$artical->url)}}" class="btn btn-primary btn-sm">
                            @if($artical->subcategory_id == null)
                            {{$artical->category->name}}@else{{$artical->categoryName->name ?? null}}@endif
                        </a>
                    </div>
                    <a href="javascript:void(0)">
                        <img src="{{ URL::asset('storage/articals/' . $artical->image) }}" alt="image">
                    </a>
                </div>
            </div>
    </div>
    @else
    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
        <div class="post__listing__card">
            <div class="post__listing__card__image">
                <ul class="__tags">
                    <li><a href="{{ route('articals',$article->url)}}" class="btn btn-sm btn-primary tag">

                            @if($article->subcategory_id == null)
                            {{$article->category->name}}@else{{$article->categoryName->name ?? null}}@endif

                        </a></li>
                </ul>
                <a href="{{ route('articals',$article->url)}}">
                    <img src="{{ URL::asset('storage/articals/' . $article->image) }}" alt="Listing Image" />
                </a>
            </div>
            <div class="post__listing__card__content {{($artical->language_id=='3') ? 'urdu' : 'hindi'}}">
                <a href="{{ route('articals',$article->url)}}">
                    <h4 class="mb-3 fw-bold">
                        {{$article->title}}</h4>
                </a>
                <p> {!!Str::words(strip_tags($article->content, 20))!!}</p>
                <ul class="post-auth-date d-flex font-roboto mt-4">
                    <li>
                    <a href="{{url('/author-listing/'.$article->user_name)}}">
                            <i class="fa-solid fa-user"></i>
                            {{$article->user_name??null}}
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <i class="fa-solid fa-calendar"></i>
                            {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    </div>
    </div>
</section>
@endsection