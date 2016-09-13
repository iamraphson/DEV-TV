@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>
                        <i class="glyphicon glyphicon-pencil"></i> Edit {{ $post->post_title }}
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <h5 class="with-border">{{ $post->post_title }}</h5>
            <form enctype="multipart/form-data" action="{{ route('post.update', $post->post_id) }}"
                  method="post" class="form-horizontal">
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </div>
                @endif

                {!! method_field('PUT') !!}
                {{ csrf_field() }}
                <div class=" row">
                    <div class="col-xs-7 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="post_title">Post Title</label>
                            <input type="text" class="form-control"
                                   id="post_title" name="post_title" value="{{ $post->post_title }}" placeholder="Post Title" />
                        </fieldset>
                    </div>
                    <div class="col-lg-3">
                        <fieldset class="form-group">
                            <label class="form-label" for="post_slug">SEO URL Slug</label>
                            <input type="text" name="post_slug" id="post_slug"  class="form-control"
                                   value="{{ $post->post_slug }}" placeholder="slug-name" />
                        </fieldset>
                    </div>
                    <div class="col-lg-2">
                        <fieldset class="form-group">
                            <label class="form-label" for="post_created">Created Date</label>
                            <input type="text" name="post_created" id="post_created"  class="form-control"
                                   value="{{ $post->created_at }}" placeholder="created-date" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="post_image">Post Image</label>
                            <div class="with-border">
                                <img src="{{ URL::asset($post->post_image_location) }}"
                                     alt="{{ $post->post_title }}" class="video-img"/>
                            </div>
                            <input type="file" class="form-control" name="post_image" id="post_image" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="post_content">Post Content</label>
                            @include('tinymce::tpl')
                            <textarea class="tinymce" name="post_content" id="post_content">{{ $post->post_content }}</textarea>
                        </fieldset>
                    </div>
                    <div class="col-xs-4 m-b-md">
                        <div>
                            <fieldset class="form-group">
                                <label class="form-label" for="post_category">Category</label>
                                <select name="post_category" id="post_category" class="bootstrap-select bootstrap-select-arrow">
                                    <option value="0">Uncategorized</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->pc_id }}"
                                        @if($category->pc_id == $post->post_category)
                                            {{ 'selected="selected"' }}
                                                @endif
                                        >{{ $category->pc_category_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-lg-4 p-t-2">
                        <fieldset class="form-group">
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="post_active" name="post_active" value="1"
                                @if($post->active == "1")
                                    {{ 'checked' }}
                                @endif
                                />
                                <label for="post_active">Is this post Active</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <button type="submit" class="btn btn-rounded btn-inline btn-success pull-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop


@section('footer')
    <script type="text/javascript">
        $(function() {
            @if(session()->has('info'))
                $.notify({
                icon: 'font-icon font-icon-check-circle',
                message: '{{ session()->get('info') }}'
            },{
                type: 'success'
            });
            @endif
        })
    </script>
@stop
