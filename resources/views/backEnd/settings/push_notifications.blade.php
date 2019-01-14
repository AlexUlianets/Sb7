@extends('backEnd.layout')

@section('content')
<a href="{{ route('settings') }}" class="pull-left btn btn-sm" style="margin-left: 30px;">< Back to settings</a>
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h3>Push Notifications Settings</h3>
			</div>

			<div class="row-col row-col-xs">
				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">

                    	{{ Form::open([ 'route' => ['settingsNotificationsUpdate'], 'method' => 'POST' ]) }}

                    		<div class="form-group row" style="margin-top: 20px;">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">Default notification</label>
                    			</div>
                    			<div class="col-sm-6">
                    				{{ $PushNotifications->default_notification }}
                    				<select name="default_notification" class="form-control">
                    					<option value="One Signal">One signal</opion>
                    					<option value="Alert">Alert</option>
                    					<option value="Promotional">Promotional</option>
                    					<option value="Rating">Rating</option>
                    				</select>
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-4">
                    				<label class="form-control-label"><h6><b>Chosen service notification</b></h6></label>
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">App ID: </label>
                    			</div>
                    			<div class="col-sm-6">
                    				{{ Form::text( 'app_id', $PushNotifications->app_id, ['class' => 'form-control'] ) }}
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="form-control-label">Sender ID: </label>
                    			</div>
                    			<div class="col-sm-6">
                    				{{ Form::text( 'sender_id', $PushNotifications->sender_id, ['class' => 'form-control'] ) }}
                    			</div>
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<input type="submit" value="Save" class="btn btn-sm form-control success" style="margin-left: 30px;" />
                    			</div>
                    		</div>

                    	{{ Form::close() }}

                    </div>
                </div>
            </div>

		</div>
	</div>
@endsection