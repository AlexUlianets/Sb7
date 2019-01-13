@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h3>Subscription Settings</h3>
			</div>

			<div class="row-col row-col-xs">
				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">

                    	{{ Form::open([ 'route' => ['settingsSubscriptionUpdate'], 'method' => 'POST' ]) }}

                    		<div class="form-group row" style="margin-top: 20px;">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">Enable\Disable Subscription</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $SubscriptionSettings->enable_subscription =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_subscription', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_subscription', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_subscription', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_subcription', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">Service provide</label>
                    			</div>
                    			<div class="col-sm-6">
                    				<select name="service_provide" class="form-control">
                    					<option value="Choose">Choose</option>
                    				</select>
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">Default checkbox status</label>
                    			</div>
                    			<div class="col-sm-6">
                    			@if ( $SubscriptionSettings->default_checkbox =='checked' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('default_checkbox', 'checked', true) }}
                                        <i class="dark-white"></i>
                                        Checked
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('default_checkbox', 'unchecked', false) }}
                                        <i class="dark-white"></i>
                                        Unchecked
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('default_checkbox', 'checked', false) }}
                                        <i class="dark-white"></i>
                                        Checked
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('default_checkbox', 'unchecked', true) }}
                                        <i class="dark-white"></i>
                                        Unchecked
                                   	</label>
                                   	@endif
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label"><b>Subscribe labels</b></label>
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">Check box label</label>
                    			</div>
                    			<div class="col-sm-6">
                    				{{ Form::text('checkbox_label', $SubscriptionSettings->checkbox_label, ['class' => 'form-control']) }}
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">Confirmation sent label</label>
                    			</div>
                    			<div class="col-sm-6">
                    				{{ Form::text('confirmation_label', $SubscriptionSettings->confirmation_label, ['class' => 'form-control']) }}
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label"><b>API Setting</b></label>
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">API Key</label>
                    			</div>
                    			<div class="col-sm-6">
                    				{{ Form::text('api_key', $SubscriptionSettings->api_key, ['class' => 'form-control']) }}
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">API URL</label>
                    			</div>
                    			<div class="col-sm-6">
                    				{{ Form::text('api_url', $SubscriptionSettings->api_url, ['class' => 'form-control']) }}
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<input type="submit" value="Save" class="btn btn-sm success form-control" style="margin-left: 30px;" />
                    			</div>
                    		</div>

                    	{{ Form::close() }}

                    </div>
                </div>
            </div>

		</div>
	</div>
@endsection