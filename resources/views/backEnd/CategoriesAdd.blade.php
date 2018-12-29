@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="app-body-inner">
            <div class="row-col row-col-xs">
                @if($CategoryToEdit)
                        <!-- column -->
                <div class="col-sm-6 col-md-7">
                    <div class="row-col">
                        <div class="p-a-sm">
                            <div>
                                <a class="btn btn-sm white" href="{{route('categories')}}">Back</a>

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

                                        {{Form::open(['route'=>['categoriesUpdate1',$CategoryToEdit->id],'method'=>'POST', 'files' => true])}}
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
                                        <!-- fields -->
                                        <div class="form-horizontal">
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Name</label>
                                                <div class="col-sm-9">
                                                    {!! Form::text('first_name',$CategoryToEdit->first_name, array('placeholder' =>'','class' => 'form-control inline','id'=>'first_name','required'=>'')) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Color</label>
                                                <div class="col-sm-9">
                                                    <div id="cp1" class="input-group colorpicker-component">
                                                            {!! Form::text('email',$CategoryToEdit->email, array('placeholder' => '','class' => 'form-control','id'=>'style_color1')) !!}
                                                            <span class="input-group-addon" id="cpbg"><i></i></span>
                                                    </div>
                                                </div>
                                                <!-- <small><a href="javascript:null"
                                                          onclick="update_restcolor()">{!!  trans('backLang.restoreDefault') !!}</a>
                                                </small> -->
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Userame</label>
                                                <div class="col-sm-9">
                                                    {!! Form::text('last_name',$CategoryToEdit->last_name, array('placeholder' =>'','class' => 'form-control inline','id'=>'last_name',)) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">{{ trans('backLang.contactPhone') }}</label>
                                                <div class="col-sm-6">
                                                    {!! Form::text('phone',$CategoryToEdit->phone, array('placeholder' =>'','class' => 'form-control','id'=>'phone')) !!}
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">{{ trans('backLang.notes') }}</label>
                                                <div class="col-sm-9">
                                                    {!! Form::textarea('notes',$CategoryToEdit->notes, array('placeholder' => '','class' => 'form-control','rows'=>'2')) !!}
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                                        <button class="btn warning pull-right" data-toggle="modal"
                                                                data-target="#mc-{{ $CategoryToEdit->id }}"
                                                                ui-toggle-class="bounce"
                                                                ui-target="#animate">
                                                            <small><i class="material-icons">
                                                                    &#xe872;</i> {{ trans('backLang.deleteCategories') }}
                                                            </small>
                                                        </button>
                                                        @endif
                                                                <!-- .modal -->
                                                        <div id="mc-{{ $CategoryToEdit->id }}"
                                                             class="modal fade"
                                                             data-backdrop="true">
                                                            <div class="modal-dialog" id="animate">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">{{ trans('backLang.confirmation') }}</h5>
                                                                    </div>
                                                                    <div class="modal-body text-center p-lg">
                                                                        <p>
                                                                            {{ trans('backLang.confirmationDeleteMsg') }}
                                                                            <br>
                                                                            <strong>[ {{ $CategoryToEdit->first_name }}  {{ $CategoryToEdit->last_name }}
                                                                                ]</strong>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn dark-white p-x-md"
                                                                                data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                                                        <a href="{{ route("categoriesDestroy",["id"=>$CategoryToEdit->id]) }}"
                                                                           class="btn danger p-x-md">{{ trans('backLang.yes') }}</a>
                                                                    </div>
                                                                </div><!-- /.modal-content -->
                                                            </div>
                                                        </div>
                                                        <!-- / .modal -->

                                                        <button type="submit" class="btn btn-primary"><i
                                                                    class="material-icons">
                                                                &#xe31b;</i> {!! trans('backLang.save') !!}</button>
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

                @else

                        <!-- column -->
                <div class="col-sm-6 col-md-7">
                    <div class="row-col">
                        <div class="p-a-sm">
                            <div>
                                <a class="btn btn-sm white" href="{{route('categories')}}"> <i class="material-icons">
                                        &#xe02e; </i> Categories</a>
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
                                                 <input class="form-control inline has-value" id="first_name" required="" name="first_name" type="text" value="">
                                              </div>
                                           </div>
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Category meta title</label>
                                              <div class="col-sm-9">
                                                 <input class="form-control inline has-value" id="last_name" name="last_name" type="text" value="">
                                              </div>
                                           </div>
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Category meta description</label>
                                              <div class="col-sm-9">
                                                 <input placeholder="" class="form-control has-value" id="phone" name="phone" type="text" value="">
                                              </div>
                                           </div>
                                           
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Category keywords</label>
                                              <div class="col-sm-9">
                                                 <textarea placeholder="" class="form-control" rows="2" name="notes" cols="50"></textarea>
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
    </script>
@endsection
