@extends('wpanel.master')

@section('content')
    <link rel="stylesheet" href="{{ asset('wpanel/js/tagsinput/jquery.tagsinput.css') }}" />
    <link rel="stylesheet" href="{{ asset('wpanel/js/dropzone/dropzone.css') }}" />
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
            <form enctype="multipart/form-data" action=""
                  method="post" class="form-horizontal dropzone dz-clickable">
                <div class=" row">
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label">Video title</label>
                            <input type="text" class="form-control maxlength-simple"
                                   id="exampleInput" placeholder="First Name" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label">Video Image Cover (1280x720 px or 16:9 ratio)</label>
                            <input type="file" multiple="true" class="form-control" name="image" id="image" />
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            {{--<div class="jspContainer" style="width: 457px; height: 312px;">
                                <div class="jspPane" style="padding: 0px; top: 0px; width: 445px;">
                                    <div class="box-typical-upload-in">
                                        <div class="drop-zone">
                                            <!--
                                            при перетаскиваении добавляем класс .dragover
                                            <div class="drop-zone dragover">
                                            -->
                                            <i class="font-icon font-icon-cloud-upload-2"></i>
                                            <div class="drop-zone-caption">Drag file to upload</div>
                                        </div><!--.drop-zone-->


                                    </div>
                                </div>
                            </div>--}}
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label">Video Details, Links, and Info</label>
                            @include('tinymce::tpl')
                            <textarea class="tinymce"></textarea>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label">Short description of the video</label>
                            <textarea rows="4" class="form-control" placeholder="Textarea"></textarea>
                        </fieldset>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <div style="width: 25%">
                            <fieldset class="form-group">
                                <label class="form-label">Video Category</label>
                                <select class="bootstrap-select bootstrap-select-arrow">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->cat_id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <fieldset class="form-group">
                            <label class="form-label">Video tags</label>
                            <input type="text" class="form-control maxlength-simple" id="tags" placeholder="Tags" />
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="time-mask-input">Video duration</label>
                            <input type="email" class="form-control" id="video-duration">
                            <small class="text-muted">Video duration: HH:MM:SS</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-4">
                        <fieldset class="form-group">
                            <label class="form-label" for="exampleInputEmail1">Who is allowed to view this video?</label>
                            <select class="bootstrap-select bootstrap-select-arrow" id="access" name="access">
                                <option value="guest">Guest (everyone)</option>
                                <option value="registered">Registered Users (free registration must be enabled)</option>
                                <option value="subscriber">Subscriber (only paid subscription users)</option>
                            </select>
                            <small class="text-muted">User Access</small>
                        </fieldset>
                    </div>
                    <div class="col-lg-4 p-t">
                        <fieldset class="form-group">
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="check-toggle-1" />
                                <label for="check-toggle-1">Is this video Featured</label>
                            </div>
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="check-toggle-2" checked />
                                <label for="check-toggle-2">Is this video Active</label>
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
                                            <select id="type" name="type" class="form-control">
                                                <option value="embed">Embed Code</option>
                                                <option value="file">Video File</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="new_video_file" style="display: none">
                                        <div class="dropzone" id="dropzoneFileUpload">
                                        </div>
                                    </div>
                                    <div class="new_video_embed">
                                        <label for="embed_code">Embed Code:</label>
                                        <textarea class="form-control" name="embed_code" id="embed_code"></textarea>
                                    </div>
                                </p>
                            </div>
                        </section>
                    </div>
                    <div class="col-xs-12 m-b-md">
                        <button type="button" class="btn btn-rounded btn-inline btn-success pull-right">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>



    <script type="text/javascript" src="{{ asset('wpanel/js/tagsinput/jquery.tagsinput.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wpanel/js/input-mask/jquery.mask.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('wpanel/js/dropzone/dropzone.js') }}"></script>
    <script type="text/javascript">
        $('#tags').tagsInput();
        $('#video-duration').mask('00:00:00', {placeholder: "__:__:__"});

        var baseUrl = "{{ url('/') }}";
        var token = "{{ Session::getToken() }}";
        Dropzone.autoDiscover = false;
        var myDropzone = new Dropzone("div#dropzoneFileUpload", {
            url: baseUrl + "/dropzone/uploadFiles",
            params: {
                _token: token
            }
        });
        Dropzone.options.myAwesomeDropzone = {
            paramName: "file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            accept: function(file, done) {

            },
        };

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
        });

    </script>
@stop