@extends('layouts.backend.app')

@section('title', 'Post Create')

@push('css')
    <!-- Bootstrap Select Css -->
{{--    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />--}}
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">
    <!-- Multi Select Css -->
    <link href="{{ asset('assets/backend/plugins/multi-select/css/multi-select.css')  }}" rel="stylesheet">
@endpush


@section('content')

<div class="container-fluid">
            <div class="block-header">
                <h2>Post</h2>
            </div>
            <!-- Vertical Layout | With Floating Label -->

            <form action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row clearfix">
                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Add New Post
                                </h2>

                            </div>
                            <div class="body">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="title" class="form-control" name="title">
                                            <label class="form-label">Post Title</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="image">Featured Image</label>
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" id="publish" name="status" class="filled-in" value="1">
                                        <label for="publish">publish</label>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    Categories and Tags
                                </h2>

                            </div>
                            <div class="body">

                                    <div class="form-group form-float">
                                        <div class="form-line {{ $errors->has('categories') ? "focused error" : ''  }}">
                                            <label for="category">Category Name</label>
                                            <select name="categories[]" id="category" class="form-control show-tick" data-live-search="true" multiple>
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id  }}">{{ $category->name  }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                <div class="form-group form-float">
                                    <div class="form-line {{ $errors->has('tags') ? "focused error" : ''  }}">
                                        <label for="tag">Tag Name</label>
                                        <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                            @foreach($tags as $tag)
                                                <option value="{{ $tag->id  }}">{{ $tag->name  }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <input type="file" name="image" id="image">
                                    </div>
                                    <a type="button" class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            Add New Category
                        </h2>

                    </div>
                    <div class="body">
                        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="name" class="form-control" name="name">
                                    <label class="form-label">Category Name</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="file" name="image" id="image">
                            </div>
                            <a type="button" class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.category.index') }}">BACK</a>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            </form>
            <!-- Vertical Layout | With Floating Label -->
        </div>

@endsection

@push('js')

    <!-- Select Plugin Js -->
{{--    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/js/bootstrap-select.min.js"></script>
@endpush
