@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>
                        <i class="glyphicon glyphicon-pencil"></i> Edit {{ $video->video_title }}
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <section class="card">
        <div class="card-block">
            <h5 class="with-border">{{ $video->video_title }}</h5>
            <form enctype="multipart/form-data" action="{{ route('video.update', $video->video_id) }}"
                  method="post" class="form-horizontal">
                @if(count($errors) > 0)
                    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach ($errors->all() as $error)
                            @if(str_contains($error, "embed code"))
                                <p>Video Source is required</p>
                            @else
                                <p>{{ $error }}</p>
                            @endif
                        @endforeach
                    </div>
                @endif
                <div class=" row">
                    <div class="col-xs-9 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_title">Video title</label>
                            <input type="text" class="form-control"
                                   id="video_title" name="video_title" value="{{ $video->video_title }}" placeholder="Video Title" />
                        </fieldset>
                    </div>
                    <div class="col-xs-3 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_creationdate">Created On</label>
                            <input type="text" class="form-control"id="video_creationdate" name="video_creationdate"
                                   value="{{ $video->created_at }}" placeholder="Creation Date" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label">Video Image Cover (1280x720 px or 16:9 ratio)</label>
                            <div class="with-border">
                                <img src="{{ URL::asset($video->video_cover_location) }}"
                                     alt="{{ $video->video_title }}" class="video-img"/>
                            </div>
                            <input type="file" class="form-control" name="video_image" id="video_image" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_details">Video Details, Links, and Info</label>
                            @include('tinymce::tpl')
                            <textarea class="tinymce" name="video_details" id="video_details">{{ $video->video_details }}</textarea>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_desc">Short description of the video</label>
                            <textarea rows="3" class="form-control" name="video_desc" id="video_desc"
                                      placeholder="Textarea">{{ $video->video_desc }}</textarea>
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
                                        @if($category->cat_id == $video->video_category)
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
                            <input type="text" class="form-control maxlength-simple" id="video_tags" value="{{ $video->video_tags }}"
                                   name="video_tags" placeholder="Tags" />
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="video_duration">Video duration</label>
                            <input type="text" name="video_duration" id="video_duration"  class="form-control"
                                   value="{{ $video->video_duration }}" />
                            <small class="text-muted">Video duration: HH:MM:SS</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Who is allowed to view this video?</label>
                            <select class="bootstrap-select bootstrap-select-arrow" id="video_access" name="video_access">
                                <option value="guest"
                                @if($video->video_access == "guest")
                                    {{ 'selected="selected"' }}
                                        @endif
                                >Guest (everyone)</option>
                                <option value="registered"
                                @if($video->video_access == "registered")
                                    {{ 'selected="selected"' }}
                                        @endif
                                >Registered Users (free registration must be enabled)</option>
                                <option value="subscriber"
                                @if($video->video_access == "subscriber")
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
                                @if($video->featured != "")
                                    {{ 'checked' }}
                                @endif
                                />
                                <label for="featured">Is this video Featured</label>
                            </div>
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="active" name="active" value="1"
                                @if($video->active != "")
                                    {{ 'checked' }}
                                @endif
                                />
                                <label for="active">Is this video Active</label>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <h5 class="with-border m-t-lg">Video Source</h5>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <div class="form-group row">
                            <label for="exampleSelect" for="video_type" class="col-sm-2 form-control-label">Video Format</label>
                            <div class="col-sm-3">
                                <select id="video_type" name="video_type" class="form-control">
                                    <option value="embed"
                                    @if($video->video_type == "embed")
                                        {{ 'selected="selected"' }}
                                    @endif
                                    >Embed Code</option>
                                    <option value="file"
                                    @if($video->video_type == "file")
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
                            <input type="hidden" name="video_location" id="video_location"
                                   value="@if($video->video_type == "file"){{ $video->video_source }}@endif" />
                        </div>
                        <div class="new_video_embed" >
                            <label for="embed_code">Embed Code:</label>
                            <textarea class="form-control" name="embed_code"
                                  id="embed_code">@if($video->video_type == "embed"){{ $video->video_source }}@endif</textarea>
                        </div>
                    </div>
                    {!! method_field('PUT') !!}
                    {{ csrf_field() }}
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
        $('#video_tags').tagsInput();
        $('#video_duration').mask('00:00:00', {placeholder: "__:__:__"});

        Dropzone.autoDiscover = false;

        $(function() {

            changeVideoSourceOption('#video_type');

            $('#video_type').change(function(){
                changeVideoSourceOption(this);
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