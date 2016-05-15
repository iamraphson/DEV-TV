@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3 style="display: inline-block">
                        <i class="font-icon font-icon-archive"></i> Post Categories
                    </h3>
                    <a data-toggle="modal" data-target="#myModal" class="label-success label">
                        <i class="font-icon font-icon-plus"></i> Add New</a>
                </div>
            </div>
        </div>
    </header>

    <section class="box-typical box-typical-padding">
        <h3 class="with-border" style="font-size: 1.2rem">Organize the Categories below: (max of 3 levels)</h3>
        <div class="row">
            <div class="col-md-8">
                <div class="dd" id="nestable7">
                    {!! getPostHTML($category) !!}
                </div>
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}" />
            </div>
        </div>
    </section>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">New Post Category</h4>
                </div>
                <div class="modal-body">
                    <form id="new-pcat-form" action="{{ url('/admin/posts/categories/store') }}" method="post">
                        <label for="category_name">Enter the new category name below</label>
                        <input id="category_name" name="category_name" placeholder="Category Name" class="form-control"><br>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-rounded btn-primary" id="submit-new-pcat">Save changes</button>
                </div>
            </div>
        </div>
    </div><!--.modal-->
    <!-- Update New Modal -->
    <div class="modal fade" id="update-pcategory">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                        <i class="font-icon-close-2"></i>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Update Category</h4>
                </div>
                <div class="modal-body" id="update-modal-body" style="display: none;">
                    <form id="edit-cat-form" action="{{ url('/admin/posts/categories/update') }}" method="post">
                        <label for="category_name">Category Name</label>
                        <input id="category_name_edit" name="category_name_edit" placeholder="Category Name" class="form-control"><br>
                        <input type="hidden" name="category_id" id="category_id" value="">
                        {{ csrf_field() }}
                        {!! method_field('PUT') !!}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-rounded btn-primary" id="submit-edit-cat">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script type="text/javascript" src="{{ asset('wpanel/js/notie.js') }}"></script>
    <script type="text/javascript">
        $('#submit-new-pcat').click(function(){
            $('#new-pcat-form').submit();
        });

        $('#submit-edit-cat').click(function(){
            $('#edit-cat-form').submit();
        });

        $(function(){
            $('#nestable7').nestable({
                group: 1,
                maxDepth: 3
            }).on('change', function(e) {
                $.get('{{ url('/admin/posts/categories/order') }}', {
                    order : JSON.stringify($('.dd').nestable('serialize')),
                    _token : $('#_token').val()
                }, function(data){
                    console.log(data);
                });
            });

            $('.actions .edit').click(function(e){
                $('#update-pcategory').modal('show', {backdrop: 'static'});
                e.preventDefault();
                href = $(this).attr('href');
                $.ajax({
                    url: href,
                    success: function(response) {
                        console.log(response);
                        var JsonResponse = JSON.parse(response);
                        $('#category_name_edit').val(JsonResponse.category_name);
                        $('#category_id').val(JsonResponse.category_id);
                        $('#update-modal-body').css("display", "block");
                    }
                });
            });

            $('.actions .delete').click(function(e){
                if (confirm("Are you sure you want to delete this category?")) {
                    return true;
                }
                return false;
            });

            @if($errors->has('category_name'))
                notie.alert(3, '{{ $errors->first('category_name') }}', 3);
            @endif

            @if($errors->has('category_name_edit'))
                notie.alert(3, '{{ $errors->first('category_name_edit') }}', 3);
            @endif
        })
    </script>
@stop