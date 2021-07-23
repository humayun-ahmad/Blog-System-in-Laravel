@extends('layouts.frontend.app')

@section('title')
    {{ $author->name }}
@endsection


@push('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/profile/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/profile/styles.css')}}">
    <style>
        .favorite-posts{
            color: blue;
        }
    </style>
@endpush

@section('content')

    <div class="slider display-table center-text">
        <h1 class="title display-table-cell"><b>BEAUTY</b></h1>
    </div><!-- slider -->

    <section class="blog-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        @foreach($posts as $post)
                        <div class="col-md-6 col-sm-12">
                            <div class="card h-100">
                                <div class="single-post post-style-1">

                                    <div class="blog-image"><img src="images/alex-lambley-205711.jpg" alt="Blog Image"></div>

                                    <a class="avatar" href="#"><img src="images/icons8-team-355979.jpg" alt="Profile Image"></a>

                                    <div class="blog-info">

                                        <h4 class="title"><a href="#"><b>How Did Van Gogh's Turbulent Mind Depict One of the Most Complex
                                                    Concepts in Physics?</b></a></h4>

                                        <ul class="post-footer">
                                            <li><a href="#"><i class="ion-heart"></i>57</a></li>
                                            <li><a href="#"><i class="ion-chatbubble"></i>6</a></li>
                                            <li><a href="#"><i class="ion-eye"></i>138</a></li>
                                        </ul>

                                    </div><!-- blog-info -->
                                </div><!-- single-post -->
                            </div><!-- card -->
                        </div><!-- col-md-6 col-sm-12 -->
                        @endforeach
                    </div><!-- row -->

                    <a class="load-more-btn" href="#"><b>LOAD MORE</b></a>

                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 ">

                    <div class="single-post info-area ">

                        <div class="about-area">
                            <h4 class="title"><b>ABOUT Author</b></h4><br>
                            <p>{{ $author->name }}</p><br>
                            <p>{{ $author->about }}</p><br>
                            <p>Author since : <strong>{{ $author->created_at->toDateString() }}</strong> </p><br>
                            <p>Total Posts : <strong>{{ $author->posts->count() }}</strong></p>
                        </div>
                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- section -->


@endsection

@push('js')

@endpush
