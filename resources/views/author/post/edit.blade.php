@extends('layouts.backend.app')

@section('title', 'Post Create - author')

@push('css')
    <!-- Bootstrap Select Css -->
    <link href="{{asset('assets/backend/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    {{--    <link rel="stylesheet" type="text/css" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.9.3/css/bootstrap-select.min.css">--}}
    {{--    <!-- Multi Select Css -->--}}
    {{--    <link href="{{ asset('assets/backend/plugins/multi-select/css/multi-select.css')  }}" rel="stylesheet">--}}
@endpush


@section('content')

    <div class="container-fluid">
        <div class="block-header">
            <h2>Post</h2>
        </div>
        <!-- Vertical Layout | With Floating Label -->

        <form action="{{ route('author.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit Post
                            </h2>

                        </div>
                        <div class="body">
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" id="title" class="form-control" name="title" value="{{ $post->title  }}">
                                    <label class="form-label">Post Title</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="image">Featured Image</label>
                                <input type="file" name="image" id="image">
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="publish" name="status" class="filled-in" value="1"
                                    {{ $post->status == 1 ? 'checked' : '' }}
                                >
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
                                            <option
                                                @foreach($post->categories as $postCategory)
                                                    {{ $category->id == $postCategory->id ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $category->id  }}">{{ $category->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line {{ $errors->has('tags') ? "focused error" : ''  }}">
                                    <label for="tag">Tag Name</label>
                                    <select name="tags[]" id="tag" class="form-control show-tick" data-live-search="true" multiple>
                                        @foreach($tags as $tag)
                                            <option
                                                @foreach($post->tags as $postTag)
                                                {{ $tag->id == $postTag->id ? 'selected' : '' }}
                                                @endforeach
                                                value="{{ $tag->id  }}">{{ $tag->name  }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <a type="button" class="btn btn-danger m-t-15 waves-effect" href="{{ route('author.post.index') }}">BACK</a>
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
                                Body
                            </h2>

                        </div>
                        <div class="body">
                       <textarea id="tinymce" name="body">
                            {{ $post->body  }}
                       </textarea>
                        </div>
                    </div>
                </div>
            </div>

        </form>
        <!-- Vertical Layout | With Floating Label -->
    </div>

@endsection

@push('js')


    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js')  }}"></script>

    <!-- Select Plugin Js -->
    <script src="{{asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>

    <script>
        $(function () {

            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce')  }}';
        });
    </script>


@endpush
