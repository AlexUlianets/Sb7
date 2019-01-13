@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h5>Google Analytics Settings</h5>
			</div>

			<div class="row-col row-col-xs">

				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">

                        	{{ Form::open(['route' => ['settingsGoogleAnalyticsUpdate'], 'method' => 'POST' ]) }}

                        		<div class="form-group row" style="margin-top: 20px;">
                        			<div class="col-sm-3">
                        				<label class="form-control-label">Tracking code</label>
                        			</div>
                        			<div class="col-sm-6">
                        				{{ Form::textarea('tracking_code', $GoogleAnalyticsSettings->tracking_code, ['class' => 'form-control', 'rows' => '5']) }}
                        			</div>
                        		</div>

                        		<div class="form-group row">
                        			<div class="col-sm-3">
                        				<label class="form-control-label">View ID</label>
                        			</div>
                        			<div class="col-sm-6">
                        				{{ Form::textarea('view_id', $GoogleAnalyticsSettings->view_id, ['class' => 'form-control', 'rows' => '5']) }}
                        			</div>
                        		</div>

                        		<div class="form-group row">
                        			<div class="col-sm-3">
                        				<input type="submit" class="btn btn-sm form-control success" value="Save" style="margin-left: 30px;" />
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