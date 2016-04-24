@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3>
                        <i class="font-icon font-icon-archive"></i> Video Categories
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-inline btn-success">
                            <i class="font-icon font-icon-plus"></i> Add New</button>
                    </h3>
                </div>
            </div>
        </div>
    </header>

    <section class="box-typical box-typical-padding">
        <h3 class="with-border">Nestable</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="dd" id="nestable7">
                    {!! getHTML($category) !!}
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
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <form id="new-cat-form" action="{{ url('/admin/videos/categories/store') }}" method="post">
                        <label for="category_name">Enter the new category name below</label>
                        <input id="category_name" name="category_name" placeholder="Category Name" class="form-control"><br>
                        {{ csrf_field() }}
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-rounded btn-primary" id="submit-new-cat">Save changes</button>
                </div>
            </div>
        </div>
    </div><!--.modal-->
    <script type="text/javascript" src="{{ asset('wpanel/js/notie.js') }}"></script>
    <script type="text/javascript">
        $('#submit-new-cat').click(function(){
            $('#new-cat-form').submit();
        })
        $(function(){
            $('#nestable7').nestable({
                group: 1,
                maxDepth: 3
            }).on('change', function(e) {



                $.get('{{ url('/admin/videos/categories/order') }}', {
                    order : JSON.stringify($('.dd').nestable('serialize')),
                    _token : $('#_token').val()
                    }, function(data){
                        console.log(data);
                    });
            });

            @if($errors->has('category_name'))
                notie.alert(3, '{{ $errors->first('category_name') }}', 3);
            @endif
        })
    </script>
@stop