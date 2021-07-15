@extends('layouts.frontend.app')

@section('title')
    {{ $post->title }}
@endsection

@push('css')
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-post/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/single-post/styles.css')}}">
    <style>
        .header-bg{
            height: 400px;
            width: 100%;
            background-image: url({{ Storage::disk('public')->url('post/'.$post->image) }});
            background-size: cover;
        }
        .favorite-posts{
            color: blue;
        }
    </style>
@endpush


@section('content')

    <div class="header-bg">
    </div><!-- slider -->

    <section class="post-area section">
        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-12 no-right-padding">

                    <div class="main-post">

                        <div class="blog-post-inner">

                            <div class="post-info">

                                <div class="left-area">
                                    <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>
                                </div>

                                <div class="middle-area">
                                    <a class="name" href="#"><b>{{ $post->user->name }}</b></a>
                                    <h6 class="date">on {{ $post->created_at->diffForHumans() }}</h6>
                                </div>

                            </div><!-- post-info -->

                            <h3 class="title"><a href="#"><b>{{ $post->title }}</b></a></h3>

                            <p class="para">{!! html_entity_decode($post->body) !!}</p>

                            <div class="post-image"><img src="{{ Storage::disk('public')->url('post/'.$post->image) }}" alt="Blog Image"></div>

                            <ul class="tags">
                                @foreach($post->tags as $tag)
                                    <li><a href="{{ route('tag.posts', $tag->slug) }}">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- blog-post-inner -->

                        <div class="post-icons-area">
                            <ul class="post-icons">
                                <li>
                                    @guest()
                                        <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first', 'Info', {
                                                    closeButton : true,
                                                    progressBar : true,
                                                })"
                                            {{--                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"--}}
                                        ><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                    @else
                                        <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $post->id }}').submit();"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                        <form id="favorite-form-{{ $post->id }}" method="POST" action="{{ route('post.favorite', $post->id) }}">
                                            @csrf
                                        </form>
                                    @endguest


                                </li>
                                <li><a href="#"><i class="ion-chatbubble"></i>{{ $post->comments->count() }}</a></li>
                                <li><a href="#"><i class="ion-eye"></i>{{ $post->view_count }}</a></li>
                            </ul>

                            <ul class="icons">
                                <li>SHARE : </li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
                            </ul>
                        </div>

                        <div class="post-footer post-info">

                            <div class="left-area">
                                <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$post->user->image) }}" alt="Profile Image"></a>
                            </div>

                            <div class="middle-area">
                                <a class="name" href="#"><b>{{ $post->user->name }}</b></a>
                                <h6 class="date">on {{ $post->created_at }}</h6>
                            </div>

                        </div><!-- post-info -->


                    </div><!-- main-post -->
                </div><!-- col-lg-8 col-md-12 -->

                <div class="col-lg-4 col-md-12 no-left-padding">

                    <div class="single-post info-area">

                        <div class="sidebar-area about-area">
                            <h4 class="title"><b>ABOUT AUTHOR</b></h4>
                            <p>About author or admin</p>
                        </div>
                        <div class="tag-area">

                            <h4 class="title"><b>CATEGORY CLOUD</b></h4>
                            <ul>
                                @foreach($post->categories as $category)
                                    <li><a href="{{ route('category.posts', $category->slug) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>

                        </div><!-- subscribe-area -->

                    </div><!-- info-area -->

                </div><!-- col-lg-4 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section><!-- post-area -->


    <section class="recomended-area section">
        <div class="container">
            <div class="row">
                @foreach($randomPosts as $randomPost)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100">
                        <div class="single-post post-style-1">

                            <div class="blog-image"><img src="{{ Storage::disk('public')->url('post/'.$randomPost->image) }}" alt="Blog Image"></div>

                            <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$randomPost->user->image) }}" alt="Profile Image"></a>

                            <div class="blog-info">

                                <h4 class="title"><a href="{{ route('post.details', $randomPost->slug) }}"><b>{{ $randomPost->title }}</b></a></h4>

                                <ul class="post-footer">
                                    <li>
                                        @guest()
                                            <a href="javascript:void(0);" onclick="toastr.info('To add favorite list. You need to login first', 'Info', {
                                                    closeButton : true,
                                                    progressBar : true,
                                                })"
                                                {{--                                                   class="{{ !Auth::user()->favorite_posts->where('pivot.post_id',$post->id)->count()  == 0 ? 'favorite_posts' : ''}}"--}}
                                            ><i class="ion-heart"></i>{{ $randomPost->favorite_to_users->count() }}</a>
                                        @else
                                            <a href="javascript:void(0);" onclick="document.getElementById('favorite-form-{{ $randomPost->id }}').submit();"><i class="ion-heart"></i>{{ $post->favorite_to_users->count() }}</a>
                                            <form id="favorite-form-{{ $randomPost->id }}" method="POST" action="{{ route('post.favorite', $randomPost->id) }}">
                                                @csrf
                                            </form>
                                        @endguest


                                    </li>
                                    <li><a href="#"><i class="ion-chatbubble"></i>{{ $randomPost->comments->count() }}</a></li>
                                    <li><a href="#"><i class="ion-eye"></i>{{ $randomPost->view_count }}</a></li>
                                </ul>

                            </div><!-- blog-info -->
                        </div><!-- single-post -->
                    </div><!-- card -->
                </div><!-- col-md-6 col-sm-12 -->
                @endforeach
            </div><!-- row -->

        </div><!-- container -->
    </section>

    <section class="comment-section">
        <div class="container">
            <h4><b>POST COMMENT</b></h4>
            <div class="row">

                <div class="col-lg-8 col-md-12">
                    <div class="comment-form">
                        @guest()
                            <p>If want to write you post, you have to login first. <a style="color: #0D47A1" href="{{ route('login') }}">Login</a> </p>
                        @else
                            <form method="post" action="{{ route('comment.store', $post->id) }}">
                                @csrf
                            <div class="row">
                                <div class="col-sm-12">
									<textarea name="comment" rows="2" class="text-area-messge form-control"
                                              placeholder="Enter your comment" aria-required="true" aria-invalid="false"></textarea >
                                </div><!-- col-sm-12 -->
                                <div class="col-sm-12">
                                    <button class="submit-btn" type="submit" id="form-submit"><b>POST COMMENT</b></button>
                                </div><!-- col-sm-12 -->

                            </div><!-- row -->
                        </form>
                        @endguest
                    </div><!-- comment-form -->

                    <h4><b>COMMENTS({{ $post->comments->count() }})</b></h4>

                    <div class="commnets-area ">
                        @if($post->comments->count() == 0)
                            <p>No comment yet. Be the first :)</p>
                        @else
                            @foreach($post->comments as $comment)
                                <div class="comment" id="comment-section">

                                    <div class="post-info">

                                        <div class="left-area">
                                            <a class="avatar" href="#"><img src="{{ Storage::disk('public')->url('profile/'.$comment->user->image) }}" alt="Profile Image"></a>
                                        </div>

                                        <div class="middle-area">
                                            <a class="name" href="#"><b>{{ $comment->user->name }}</b></a>
                                            <h6 class="date">{{ $comment->created_at->diffForHumans() }}</h6>
                                        </div>

                                        <div class="right-area">
                                            <h5 class="reply-btn" ><a href="#"><b>REPLY</b></a></h5>
                                        </div>

                                    </div><!-- post-info -->

                                    <p>{{ $comment->comment }}</p>

                                </div>
                            @endforeach
                            @endif
                    </div><!-- commnets-area -->



                </div><!-- col-lg-8 col-md-12 -->

            </div><!-- row -->

        </div><!-- container -->
    </section>

@endsection

@push('js')

@endpush
