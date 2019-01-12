@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h5>Alert Settings</h5>
			</div>

			<div class="row-col row-col-xs">

				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
                     {{ Form::open([ 'route' => ['settingsAlertUpdate'], 'method' => 'POST' ]) }}

                     	<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Create welcome(email)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->create_welcome_email =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_email', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_email', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_email', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_email', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Create welcome(notification)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->create_welcome_notification =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_notification', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_notification', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_notification', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('create_welcome_notification', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Order (email)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->order_email =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_email', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_email', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_email', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_email', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Order (notification)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->order_notification =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_notification', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_notification', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_notification', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_notification', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Order status (email)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->order_status_email =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_email', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_email', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_email', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_email', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Order status (notification)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->order_status_notification =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_notification', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_notification', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_notification', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('order_status_notification', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">New list (email)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->new_list_email =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_email', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_email', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_email', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_email', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">New list (notification)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->new_list_notification =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_email', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_notification', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_notification', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('new_list_notification', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Forgot password (email)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->forgot_password_email =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_email', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_email', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_email', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_email', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Forgot password (notification)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->forgot_password_notification =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_notification', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_notification', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_notification', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('forgot_password_notification', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Adding new list (email)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->add_new_list_email =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_email', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_email', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_email', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_email', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>


                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label">Adding new list (notification)</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $AlertSettings->add_new_list_notification =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_notification', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_notification', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_notification', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('add_new_list_notification', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<input type="submit" class="btn btn-sm form-control success" style="margin-left: 30px;" value="Save" />
                    			</div>
                    		</div>


                     {{ Form::close() }}
                     </div>
                     </div>
                     </div>
            </div>

		</div>
	</div>
@endsection