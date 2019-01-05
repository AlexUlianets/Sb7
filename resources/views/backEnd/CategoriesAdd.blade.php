@extends('backEnd.layout')

@section('content')
    <link rel="stylesheet" href="https://icono-49d6.kxcdn.com/icono.min.css">
    <div class="padding">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <div class="app-body-inner">
            <div class="row-col row-col-xs">
                @if($CategoryToEdit)
                        <!-- column -->
                <div class="col-sm-6 col-md-7">
                    <div class="row-col">
                        <div class="p-a-sm">
                            <div>
                                <a class="btn btn-sm white" href="{{route('categories')}}">Back</a>
                                <div class="form-horizontal">
                                {{ Form::open(['route' => ['categoriesUpdate1', $CategoryToEdit->id ], 'method' => 'POST' ]) }}
                                            <div class="row-col h-auto m-b-1">
                                            <div class="col-sm-3">
                                                <div class="avatar w-64 inline">
                                                    @if($CategoryToEdit->photo !="")
                                                        <img id="photo_preview"
                                                             src="{{ URL::to('uploads/Categories/'.$CategoryToEdit->photo) }}">
                                                    @else
                                                        <img id="photo_preview"
                                                             src="{{ URL::to('uploads/contacts/profile.jpg') }}"
                                                             style="opacity: 0.2">
                                                    @endif
                                                </div>
                                                <div class="form-file">
                                                    <input id="photo_file" type="file" name="file" accept="image/*">
                                                    <button class="btn white btn-sm">
                                                        <small>
                                                            <small>{{ trans('backLang.selectFile') }} ..</small>
                                                        </small>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Name</label> 
                                              <div class="col-sm-9">
                                                 {{ Form::text('name', $CategoryToEdit->name, array( 'class' => 'form-control' ) ) }}
                                              </div>
                                           </div>
                                           
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Category meta title</label>
                                              <div class="col-sm-9">
                                                 {{ Form::text('category_meta', $CategoryToEdit->category_meta, array( 'class' => 'form-control' ) ) }}
                                              </div>
                                           </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Color</label>
                                                <div class="col-sm-9">
                                                    {{ Form::text('color', $CategoryToEdit->color, array( 'class' => 'form-control', 'id' => 'cp1' )) }}
                                                </div>
                                            </div>

                                           <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Category meta description</label>
                                                <div class="col-sm-9">
                                                    {{ Form::text('category_description', $CategoryToEdit->category_description, array( 'class' => 'form-control' ) ) }}
                                                </div>
                                           </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Category keywords</label>
                                                <div class="col-sm-9">
                                                    {{ Form::textarea('category_keywords', $CategoryToEdit->category_keywords, array( 'class' => 'form-control' ) ) }}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-9">
                                                    {{ Form::submit('Save', [ 'class' => 'btn btn-sm primary' ]) }}
                                                    <a href="{{ route( 'categoriesDestroy', ['id' => $CategoryToEdit->id ] ) }}" class="btn btn-sm danger">Delete</a>
                                                </div>
                                            </div>
                                {{ Form::close() }}
                                </div>
                            </div>
                        </div>
                        <div class="row-row">
                            <div class="row-body">
                                <div class="row-inner">
                                    <div class="padding">
                                        @if(Session::has('doneMessage2'))
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="alert alert-success">
                                                        <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">×</span>
                                                        </button>
                                                        {{ Session::get('doneMessage2') }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        

                @else

                        <!-- column -->
                <div class="col-sm-6 col-md-7">
                    <div class="row-col">
                        <div class="p-a-sm">
                            <div>
                                <a class="btn btn-sm white" href="{{route('categories')}}"> <i class="material-icons">
                                        &#xf270; </i> Categories</a>
                            </div>
                        </div>
                        <div class="row-row">
                            <div class="row-body">
                                <div class="row-inner">
                                    <div class="padding">
                                        {{Form::open(['route'=>['categoriesStore'],'method'=>'POST', 'files' => true ])}}
                                        <div class="row-col h-auto m-b-1">
                                            <div class="col-sm-3">
                                                <div class="avatar w-64 inline">
                                                    <img id="photo_preview"
                                                         src="{{ URL::to('uploads/contacts/profile.jpg') }}"
                                                         style="opacity: 0.2">
                                                </div>
                                                <div class="form-file">
                                                    <input id="photo_file" type="file" name="file" accept="image/*">
                                                    <button class="btn white btn-sm">
                                                        <small>
                                                            <small>{{ trans('backLang.selectFile') }} ..</small>
                                                        </small>
                                                    </button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                        <!-- fields -->
                                        <div class="form-horizontal">
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Name</label>
                                              <div class="col-sm-9">
                                                 <input class="form-control inline has-value" id="first_name" required="" name="name" type="text" value="">
                                              </div>
                                           </div>
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Category meta title</label>
                                              <div class="col-sm-9">
                                                 <input class="form-control inline has-value" id="last_name" name="category_meta" type="text" value="">
                                              </div>
                                           </div>

                                           <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Color</label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="cp1" class="form-control"  name="color" />
                                                    <div id="cpbg"></div>
                                                </div>
                                           </div>

                                           <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Icon</label>
                                                
                                                <div class="col-sm-9">

                                                    <select name="icon" class="fa-select">
                                                        <span class="icono-piano"></span>
                                                    </select>
                                                </div>
                                           </div>

                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Category meta description</label>
                                              <div class="col-sm-9">
                                                 <input placeholder="" class="form-control has-value" id="phone" name="category_description" type="text" value="">
                                              </div>
                                           </div>
                                           
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Category keywords</label>
                                              <div class="col-sm-9">
                                                 <textarea placeholder="" class="form-control" rows="2" name="category_keywords" cols="50"></textarea>
                                              </div>
                                           </div>
                                           
                                           <div class="form-group row">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    <button type="submit" class="btn btn-primary"><i
                                                                class="material-icons">
                                                            &#xe31b;</i> {!! trans('backLang.add') !!}</button>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- / fields -->
                                        {{Form::close()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /column -->
                @endif

            </div>
        </div>
    </div>

@endsection
@section('footerInclude')
    <script src="{{ URL::to('backEnd/libs/jquery/jquery/dist/jquery.js') }}"></script>
    <script src="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" type="text/css"/>
    <script>
        $(document).ready(function () {
            $("#site_status1").click(function () {
                $("#close_msg_div").css("display", "none");
            });
            $("#site_status2").click(function () {
                $("#close_msg_div").css("display", "block");
            });

            $("#style_type1").click(function () {
                $("#bgtyps").css("display", "none");
            });
            $("#style_type2").click(function () {
                $("#bgtyps").css("display", "inline-block");
            });

            $("#style_bg_type1").click(function () {
                $("#bgtimg").css("display", "none");
                $("#bgtptr").css("display", "none");
                $("#bgtclr").css("display", "inline-block");
            });
            $("#style_bg_type2").click(function () {
                $("#bgtimg").css("display", "none");
                $("#bgtclr").css("display", "none");
                $("#bgtptr").css("display", "inline-block");
            });
            $("#style_bg_type3").click(function () {
                $("#bgtptr").css("display", "none");
                $("#bgtclr").css("display", "none");
                $("#bgtimg").css("display", "inline-block");
            });
        });
        $(function () {
            $('#cp1').colorpicker({
                colorSelectors: {
                    'black': '#000000',
                    'white': '#ffffff',
                    'red': '#FF0000',
                    'default': '#777777',
                    'primary': '#337ab7',
                    'success': '#5cb85c',
                    'info': '#5bc0de',
                    'warning': '#f0ad4e',
                    'danger': '#d9534f'
                }
            });
        });

        function update_restcolor() {
            document.getElementById("style_color1").value = '#0cbaa4';
            $("#cpbg i").css("background-color", "#0cbaa4");
        }

        function update_restcolor2() {
            document.getElementById("style_color2").value = '#2e3e4e';
            $("#cpbg2 i").css("background-color", "#2e3e4e");
        }
    </script>
    <style>
        .app-footer {
            display: none;
        }
        .fa-select {
            font-family: 'Lato', 'Font Awesome 5 Free';
            font-weight: 900;
        }
    </style>
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo_file").change(function () {
            readURL(this);
            $('#photo_preview').css("opacity", 1);
        });

        $("#togglePaletteOnly").spectrum({
            showPaletteOnly: true,
            togglePaletteOnly: true,
            togglePaletteMoreText: 'more',
            togglePaletteLessText: 'less',
            color: 'blanchedalmond',
            palette: [
                ["#000","#444","#666","#999","#ccc","#eee","#f3f3f3","#fff"],
                ["#f00","#f90","#ff0","#0f0","#0ff","#00f","#90f","#f0f"],
                ["#f4cccc","#fce5cd","#fff2cc","#d9ead3","#d0e0e3","#cfe2f3","#d9d2e9","#ead1dc"],
                ["#ea9999","#f9cb9c","#ffe599","#b6d7a8","#a2c4c9","#9fc5e8","#b4a7d6","#d5a6bd"],
                ["#e06666","#f6b26b","#ffd966","#93c47d","#76a5af","#6fa8dc","#8e7cc3","#c27ba0"],
                ["#c00","#e69138","#f1c232","#6aa84f","#45818e","#3d85c6","#674ea7","#a64d79"],
                ["#900","#b45f06","#bf9000","#38761d","#134f5c","#0b5394","#351c75","#741b47"],
                ["#600","#783f04","#7f6000","#274e13","#0c343d","#073763","#20124d","#4c1130"]
            ]
        });
    </script>
@endsection
