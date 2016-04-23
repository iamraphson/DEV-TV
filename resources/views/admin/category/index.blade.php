@extends('wpanel.master')

@section('content')
    <header class="section-header">
        <div class="tbl">
            <div class="tbl-row">
                <div class="tbl-cell">
                    <h3><i class="font-icon font-icon-archive"></i> Video Categories</h3>
                </div>
            </div>
        </div>
    </header>

    <section class="box-typical box-typical-padding">
        <h3 class="with-border">Nestable</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="dd" id="nestable7">
                    <ol class="dd-list">
                        <li class="dd-item dd3-item" data-id="13">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 13</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="14">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 14</div>
                        </li>
                        <li class="dd-item dd3-item" data-id="15">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 15</div>
                            <ol class="dd-list">
                                <li class="dd-item dd3-item" data-id="16">
                                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 16</div>
                                </li>
                                <li class="dd-item dd3-item" data-id="17">
                                    <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 17</div>
                                </li>

                            </ol>
                        </li><li class="dd-item dd3-item" data-id="18">
                            <div class="dd-handle dd3-handle">Drag</div><div class="dd3-content">Item 18</div>
                        </li>
                    </ol>
                </div>
            </div>
        </div>


    </section>

    <script type="text/javascript">
        $(function(){
            $('#nestable7').nestable({
                group: 1,
                maxDepth: 3
            }).on('change', function(e) {
                alert(JSON.stringify($('.dd').nestable('serialize')));
            });
        })
    </script>
@stop