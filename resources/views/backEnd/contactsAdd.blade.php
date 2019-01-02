@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="app-body-inner">
            <div class="row-col row-col-xs">
                @if($ContactToEdit)
                        <!-- column -->
                <div class="col-sm-6 col-md-7">
                    <div class="row-col">
                        <div class="p-a-sm">
                            <div>
                                <a class="btn btn-sm white" href="{{route('contacts')}}">Back</a>

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

                                        {{Form::open(['route'=>['contactsUpdate',$ContactToEdit->id],'method'=>'POST', 'files' => true])}}
                                        <div class="row-col h-auto m-b-1">
                                            <div class="col-sm-3">
                                                <div class="avatar w-64 inline">
                                                    @if($ContactToEdit->photo !="")
                                                        <img id="photo_preview"
                                                             src="{{ URL::to('uploads/contacts/'.$ContactToEdit->photo) }}">
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
                                                    {!! Form::text('first_name',$ContactToEdit->first_name, array('placeholder' =>trans('backLang.firstName'),'class' => 'form-control inline','id'=>'first_name','required'=>'')) !!}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Username</label>
                                                <div class="col-sm-9">
                                                    {!! Form::text('last_name',$ContactToEdit->last_name, array('placeholder' =>trans('backLang.firstName'),'class' => 'form-control inline','id'=>'last_name','required'=>'')) !!}
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Role</label>
                                                <div class="col-sm-9">
                                                    <select name="group_id" id="country_id"
                                                                class="form-control c-select inline"
                                                                style="vertical-align: bottom;">
                                                            <option value="">- - Role - -
                                                            </option>

                                                            @foreach ($ContactsGroups as $Group)
                                                                <option value="{{ $Group->id  }}" {{ ($Group->id == $ContactToEdit->group_id) ? "selected='selected'":""  }}>{{ $Group->name }}</option>
                                                            @endforeach

                                                        </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">{{ trans('backLang.contactPhone') }}</label>
                                                <div class="col-sm-6">
                                                    {!! Form::text('phone',$ContactToEdit->phone, array('placeholder' =>'','class' => 'form-control','id'=>'phone')) !!}
                                                </div>
                                                @if($ContactToEdit->phone !="")
                                                    <div class="col-sm-3">
                                                        <a href="tel:{{$ContactToEdit->phone}}"
                                                           class="btn white pull-right" style="width: 100%">
                                                            <small>
                                                                <i class="material-icons">
                                                                    &#xe0b1;</i> {{ trans('backLang.callNow') }}
                                                            </small>
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">{{ trans('backLang.contactEmail') }}</label>
                                                <div class="col-sm-6">
                                                    {!! Form::email('email',$ContactToEdit->email, array('placeholder' =>'','class' => 'form-control','id'=>'email','required'=>'')) !!}
                                                </div>
                                                <div class="col-sm-3">
                                                    <a href="{{ route("webmails",["group_id"=>"create","stat"=>"email","wid"=>'new',"contact_email"=>$ContactToEdit->email]) }}"
                                                       style="width: 100%" class="btn white pull-right">
                                                        <small>
                                                            <i class="material-icons">
                                                                &#xe151;</i> {{ trans('backLang.sendEmail') }}
                                                        </small>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Password</label>
                                                <div class="col-sm-9">
                                                    {!! Form::text('company',$ContactToEdit->company, array('placeholder' =>'','class' => 'form-control has-value','id'=>'company')) !!}
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">{!!  trans('backLang.country') !!}</label>
                                                <div class="col-sm-6">
                                                    <select name="country_id" id="country_id"
                                                            class="form-control c-select">
                                                        <option value="">- - {!!  trans('backLang.country') !!} - -
                                                        </option>
                                                        <?php
                                                        $title_var = "title_" . trans('backLang.boxCode');
                                                        $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                                        ?>
                                                        @foreach ($Countries as $country)
                                                            <?php
                                                            if ($country->$title_var != "") {
                                                                $title = $country->$title_var;
                                                            } else {
                                                                $title = $country->$title_var2;
                                                            }
                                                            ?>
                                                            <option value="{{ $country->id  }}" {{ ($country->id == $ContactToEdit->country_id) ? "selected='selected'":""  }}>{{ $title }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    {!! Form::text('city',$ContactToEdit->city, array('placeholder' =>trans('backLang.city'),'class' => 'form-control','id'=>'city')) !!}
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">{{ trans('backLang.notes') }}</label>
                                                <div class="col-sm-9">
                                                    {!! Form::textarea('notes',$ContactToEdit->notes, array('placeholder' => '','class' => 'form-control','rows'=>'2')) !!}
                                                </div>
                                            </div> -->
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">{{ trans('backLang.status') }}</label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
                                                        <label class="ui-check ui-check-md">
                                                            {!! Form::radio('status','1',($ContactToEdit->status==1) ? true : false, array('id' => 'status1','class'=>'has-value')) !!}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.active') }}
                                                        </label>

                                                        &nbsp; &nbsp;
                                                        <label class="ui-check ui-check-md">
                                                            {!! Form::radio('status','2',($ContactToEdit->status==2) ? true : false, array('id' => 'status3','class'=>'has-value')) !!}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.waitActivation') }}
                                                        </label>
                                                        &nbsp; &nbsp;
                                                        <label class="ui-check ui-check-md">
                                                            {!! Form::radio('status','0',($ContactToEdit->status==0) ? true : false, array('id' => 'status2','class'=>'has-value')) !!}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.notActive') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Account type</label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
                                                        <label class="ui-check ui-check-md">
                                                            {!! Form::radio('type','1',($ContactToEdit->type==1) ? true : false, array('id' => 'type1','class'=>'has-value')) !!}
                                                            <i class="dark-white"></i>
                                                            Free
                                                        </label>

                                                        &nbsp; &nbsp;
                                                        <label class="ui-check ui-check-md">
                                                            {!! Form::radio('type','2',($ContactToEdit->type==2) ? true : false, array('id' => 'type3','class'=>'has-value')) !!}
                                                            <i class="dark-white"></i>
                                                            Premium
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <div class="radio">
                                                        <label class="ui-check ui-check-md">
                                                            {!! Form::radio('gender','1',($ContactToEdit->gender==1) ? true : false, array('id' => 'gender1','class'=>'has-value')) !!}
                                                            <i class="dark-white"></i>
                                                            Male
                                                        </label>

                                                        &nbsp; &nbsp;
                                                        <label class="ui-check ui-check-md">
                                                            {!! Form::radio('gender','2',($ContactToEdit->gender==2) ? true : false, array('id' => 'gender3','class'=>'has-value')) !!}
                                                            <i class="dark-white"></i>
                                                            Female
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                    @if(@Auth::user()->permissionsGroup->delete_status)
                                                        <button class="btn warning pull-right" data-toggle="modal"
                                                                data-target="#mc-{{ $ContactToEdit->id }}"
                                                                ui-toggle-class="bounce"
                                                                ui-target="#animate">
                                                            <small><i class="material-icons">
                                                                    &#xe872;</i> {{ trans('backLang.deleteContacts') }}
                                                            </small>
                                                        </button>
                                                        @endif
                                                                <!-- .modal -->
                                                        <div id="mc-{{ $ContactToEdit->id }}"
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
                                                                            <strong>[ {{ $ContactToEdit->first_name }}  {{ $ContactToEdit->last_name }}
                                                                                ]</strong>
                                                                        </p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button"
                                                                                class="btn dark-white p-x-md"
                                                                                data-dismiss="modal">{{ trans('backLang.no') }}</button>
                                                                        <a href="{{ route("contactsDestroy",["id"=>$ContactToEdit->id]) }}"
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
                                <a class="btn btn-sm white" href="{{route('contacts')}}"><i class="material-icons">
                                        &#xe02e;</i> Members</a>
                            </div>
                        </div>
                        <div class="row-row">
                            <div class="row-body">
                                <div class="row-inner">
                                    <div class="padding">
                                        {{Form::open(['route'=>['contactsStore'],'method'=>'POST', 'files' => true ])}}
                                        
                                        <!-- fields -->
                                        <div class="form-horizontal">
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Name</label>
                                              <div class="col-sm-9">
                                                 <input placeholder="First Name" class="form-control inline has-value" id="first_name" required="" name="first_name" type="text" value="wdqd">
                                              </div>
                                           </div>
                                           
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Userame</label>
                                              <div class="col-sm-9">
                                                 <input placeholder="First Name" class="form-control inline has-value" id="last_name" required="" name="last_name" type="text" value="">
                                              </div>
                                           </div>

                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Email</label>
                                              <div class="col-sm-6">
                                                 <input placeholder="" class="form-control has-value" id="email" required="" name="email" type="email" value="">
                                            </div>

                                            <div class="form-group row">

                                            </div>

                                            <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Gender</label>
                                              <div class="col-sm-9">
                                                 <div class="radio">
                                                    <label class="ui-check ui-check-md">
                                                    <input id="gender1" class="has-value" checked="checked" name="gender" type="radio" value="1">
                                                    <i class="dark-white"></i>
                                                    Male
                                                    </label>
                                                    &nbsp; &nbsp;
                                                    <label class="ui-check ui-check-md">
                                                    <input id="gender3" class="has-value" name="gender" type="radio" value="2">
                                                    <i class="dark-white"></i>
                                                    Female
                                                    </label>
                                                 </div>
                                              </div>
                                            </div>
                                            
                                            <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Phone</label>
                                              <div class="col-sm-6">
                                                 <input placeholder="" class="form-control has-value" id="phone" name="phone" type="text" value="">
                                              </div>
                                              <!-- <div class="col-sm-3">
                                                 <a href="tel:" class="btn white pull-right" style="width: 100%">
                                                 <small>
                                                 <i class="material-icons">
                                                 </i> Call Now
                                                 </small>
                                                 </a>
                                              </div> -->
                                           </div>                                           

                                            <div class="form-group row">
                                                <label class="col-sm-3 form-control-label">Address</label>
                                              <div class="col-sm-6">
                                                 <input placeholder="" class="form-control has-value" id="address" name="address" type="text" value="">
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Country</label>
                                              <div class="col-sm-6">
                                                 <select name="country_id" id="country_id" class="form-control c-select">
                                                    <option value="">- - {!!  trans('backLang.country') !!} - -
                                                    </option>
                                                    <?php
                                                    $title_var = "title_" . trans('backLang.boxCode');
                                                    $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                                    ?>
                                                    @foreach ($Countries as $country)
                                                        <?php
                                                        if ($country->$title_var != "") {
                                                            $title = $country->$title_var;
                                                        } else {
                                                            $title = $country->$title_var2;
                                                        }
                                                        ?>
                                                        <option value="{{ $country->id  }}">{{ $title }}</option>
                                                    @endforeach

                                                </select>
                                                
                                                <input placeholder="City" class="form-control inline has-value" id="" required="" name="city" type="text" value="">
                                                    
                                              </div>

                                            <div class="row-col h-auto m-b-1" style="padding-top: 20px;padding-left: 20px;">
                                                <div class="col-sm-3">
                                                    <label class="col-sm-3 form-control-label">Avatar</label>
                                                <div class="avatar w-64 inline">
                                                    <img id="photo_preview"
                                                         src="{{ URL::to('uploads/contacts/profile.jpg') }}"
                                                         style="opacity: 0.2">
                                                    
                                                        <div class="form-file">
                                                        <input id="photo_file" type="file" name="file" accept="image/*">
                                                            <button class="btn white btn-sm">
                                                                <small>
                                                                    <small>{{ trans('backLang.selectFile') }} ..    </small>
                                                                </small>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>                                           
                                           
                                              <!-- <div class="col-sm-3">
                                                 <a href="http://lotus.kl.com.ua/smartend/public/admin/webmails/create/new/email/qwdqw@ad.qwdqw" style="width: 100%" class="btn white pull-right">
                                                 <small>
                                                 <i class="material-icons">
                                                 </i> Send Email
                                                 </small>
                                                 </a>
                                              </div> -->
                                           </div>
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Password</label>
                                              <div class="col-sm-9">
                                                 <input name="company" type="password" value="">
                                              </div>
                                           </div>

                                           <div class="form-group row">
                                              <br />
                                              <label class="col-sm-3 form-control-label">Role</label>
                                              <div class="col-sm-6">
                                                <select name="group_id" id="country_id"
                                                        class="form-control c-select w-sm inline"
                                                        style="vertical-align: bottom;">
                                                    <option value="">- - Role - -
                                                    </option>
                                                    @foreach ($ContactsGroups as $Group)
                                                        <option value="{{ $Group->id  }}" {{ ($Group->id == $group_id) ? "selected='selected'":""  }}>{{ $Group->name }}</option>
                                                    @endforeach
                                                </select>
                                              </div>
                                           </div>
                                           

                                              
                                           </div>
                                           <!-- <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Notes</label>
                                              <div class="col-sm-9">
                                                 <textarea placeholder="" class="form-control" rows="2" name="notes" cols="50"></textarea>
                                              </div>
                                           </div> -->
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Status</label>
                                              <div class="col-sm-9">
                                                 <div class="radio">
                                                    <label class="ui-check ui-check-md">
                                                    <input id="status1" class="has-value" checked="checked" name="status" type="radio" value="1">
                                                    <i class="dark-white"></i>
                                                    Active
                                                    </label>
                                                    &nbsp; &nbsp;
                                                    <label class="ui-check ui-check-md">
                                                    <input id="status3" class="has-value" name="status" type="radio" value="2">
                                                    <i class="dark-white"></i>
                                                    Wait Activation
                                                    </label>
                                                    &nbsp; &nbsp;
                                                    <label class="ui-check ui-check-md">
                                                    <input id="status2" class="has-value" name="status" type="radio" value="0">
                                                    <i class="dark-white"></i>
                                                    Not Active
                                                    </label>
                                                 </div>
                                              </div>
                                           </div>
                                           <div class="form-group row">
                                              <label class="col-sm-3 form-control-label">Account type</label>
                                              <div class="col-sm-9">
                                                 <div class="radio">
                                                    <label class="ui-check ui-check-md">
                                                    <input id="type1" class="has-value" name="type" type="radio" value="1">
                                                    <i class="dark-white"></i>
                                                    Free
                                                    </label>
                                                    &nbsp; &nbsp;
                                                    <label class="ui-check ui-check-md">
                                                    <input id="type3" class="has-value" checked="checked" name="type" type="radio" value="2">
                                                    <i class="dark-white"></i>
                                                    Premium
                                                    </label>
                                                 </div>
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
    <style>
        .app-footer {
            display: none;
        }

        body {
            background-color: white;
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
@section('footerInclude')
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
