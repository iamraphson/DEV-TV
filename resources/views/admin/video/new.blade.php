@extends('wpanel.master')

@section('content')
    <? echo phpinfo(); ?>
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>
                        <i class="font-icon font-icon-plus-1"></i> Add New Video
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <h5 class="with-border">New Video Data</h5>
            <form enctype="multipart/form-data" action="{{ route('video.store') }}"
                  method="post" class="form-horizontal">
                @if ($errors->has('video_title'))
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('video_title') }}
                    </div>
                @endif

                @if ($errors->has('video_desc'))
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('video_desc') }}
                    </div>
                @endif

                @if ($errors->has('video_details'))
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('video_details') }}
                    </div>
                @endif
                @if ($errors->has('video_tags'))
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('video_tags') }}
                    </div>
                @endif
                @if ($errors->has('video_duration'))
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('video_duration') }}
                    </div>
                @endif
                @if ($errors->has('video_image'))
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        {{ $errors->first('video_image') }}
                    </div>
                @endif

                {{ csrf_field() }}
                <div class=" row">
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_title">Video title</label>
                            <input type="text" class="form-control"
                                   id="video_title" name="video_title" value="{{ old('video_title') }}" placeholder="Video Title" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label">Video Image Cover (1280x720 px or 16:9 ratio)</label>
                            <input type="file" class="form-control" name="video_image" id="video_image" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_details">Video Details, Links, and Info</label>
                            @include('tinymce::tpl')
                            <textarea class="tinymce" name="video_details" id="video_details">{{ old('video_details') }}</textarea>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_desc">Short description of the video</label>
                            <textarea rows="4" class="form-control" name="video_desc" id="video_desc"
                                      placeholder="Textarea">{{ old('video_desc') }}</textarea>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <div style="width: 25%">
                            <fieldset class="form-group">
                                <label class="form-label" for="video_category">Video Category</label>
                                <select name="video_category" id="video_category" class="bootstrap-select bootstrap-select-arrow">
                                    <option value="0">Uncategorized</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->cat_id }}"
                                        @if($category->cat_id == old('video_category'))
                                            {{ 'selected="selected"' }}
                                        @endif
                                        >{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_tags">Video tags</label>
                            <input type="text" class="form-control maxlength-simple" id="video_tags" value="{{ old('video_desc') }}"
                                   name="video_tags" placeholder="Tags" />
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_duration">Video duration</label>
                            <input type="text" name="video_duration" id="video_duration"  class="form-control"
                                   value="{{ old('video_duration') }}" />
                            <small class="text-muted">Video duration: HH:MM:SS</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Who is allowed to view this video?</label>
                            <select class="bootstrap-select bootstrap-select-arrow" id="video_access" name="video_access">
                                <option value="guest"
                                @if(old('video_access') == "guest")
                                    {{ 'selected="selected"' }}
                                @endif
                                >Guest (everyone)</option>
                                <option value="registered"
                                @if(old('video_access') == "registered")
                                    {{ 'selected="selected"' }}
                                @endif
                                >Registered Users (free registration must be enabled)</option>
                                <option value="subscriber"
                                @if(old('video_access') == "subscriber")
                                    {{ 'selected="selected"' }}
                                @endif
                                >Subscriber (only paid subscription users)</option>
                            </select>
                            <small class="text-muted">User Access</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-4 p-t">
                        <fieldset class="form-group">
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="featured" name="featured" value="1"
                                   @if(old('featured') != "")
                                   {{ 'checked' }}
                                   @endif
                                />
                                <label for="featured">Is this video Featured</label>
                            </div>
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="active" name="active" value="1"
                                @if(old('active') != "")
                                {{ 'checked' }}
                                @endif
                                />
                                <label for="active">Is this video Active</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <section class="card">
                            <header class="card-header card-header-xl">
                                Video Source
                            </header>
                            <div class="card-block">
                                <p class="card-text">
                                <div class="form-group row">
                                    <label for="exampleSelect" class="col-sm-2 form-control-label">Video Format</label>
                                    <div class="col-sm-3">
                                        <select id="type" name="video_type" class="form-control">
                                            <option value="embed"
                                            @if(old('video_type') == "embed")
                                                {{ 'selected="selected"' }}
                                            @endif
                                            >Embed Code</option>
                                            <option value="file"
                                            @if(old('video_type') == "file")
                                                {{ 'selected="selected"' }}
                                            @endif
                                            >Video File</option>
                                        </select>
                                    </div>
                                </div>
                                <hr/>
                                <div class="new_video_file" style="display: none">
                                    <div id="dZUpload" class="dropzone">
                                        <div class="dz-default dz-message">Drop files here to upload</div>
                                    </div>
                                    <input type="hidden" name="video_location" id="video_location" value="{{ old('video_location') }}" />
                                </div>
                                <div class="new_video_embed" >
                                    <label for="embed_code">Embed Code:</label>
                                    <textarea class="form-control" name="embed_code" id="embed_code">{{ old('embed_code') }}</textarea>
                                </div>
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <button type="submit" class="btn btn-rounded btn-inline btn-success pull-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop

@section('head')
    <link rel="stylesheet" href="{{ asset('wpanel/js/tagsinput/jquery.tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('wpanel/js/dropzone/dropzone.css') }}" />
@stop

@section('footer')
    <script type="text/javascript" src="{{ asset('wpanel/js/tagsinput/jquery.tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wpanel/js/input-mask/jquery.mask.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wpanel/js/dropzone/dropzone.js') }}"></script>
    <script type="text/javascript">
        $('#tags').tagsInput();
        $('#video_duration').mask('00:00:00', {placeholder: "__:__:__"});

        Dropzone.autoDiscover = false;

        $(function() {
            $('#type').change(function(){
                if($(this).val() == 'file'){
                    $('.new_video_file').show();
                    $('.new_video_embed').hide();
                } else {
                    $('.new_video_file').hide();
                    $('.new_video_embed').show();
                }
            });

            var baseUrl = "{{ url('/') }}";
            Dropzone.autoDiscover = false;
            $("#dZUpload").dropzone({
                url: baseUrl + "/admin/videos/upload",
                headers: {
                    'X-CSRF-Token': '{{ Session::getToken() }}'
                },
                maxFilesize : 1024,  // MB
                maxFiles : 1,
                paramName : "file",
                addRemoveLinks: true,
                success: function (file, response) {
                    console.log(response);
                    $('#video_location').val(response.message);
                }

            });
        });
    </script>
@stop