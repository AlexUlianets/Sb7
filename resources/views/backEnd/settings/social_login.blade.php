@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h5>Social Login Settings</h5>
			</div>

			<div class="row-col row-col-xs">
			<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
					{{ Form::open(['route' => ['settingsSocialUpdate'], 'method' => 'POST' ]) }}	
					

						<div class="form-group row" style="margin-top: 20px;">
							<div class="col-sm-3">
								<label class="form-control-label">Enable\Disable all social login</label>
							</div>
							<div class="col-sm-6">
								<label class="ui-check ui-check-md">
								@if ( $SocialLoginSettings->all_settings == 'enable' )
								
								{{ Form::radio('all_setings', 'enable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('all_settings', 'disable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
								
								@else

                                {{ Form::radio('all_setings', 'enable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('all_settings', 'disable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
                                
                                @endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<b class="form-control-label">Facebook Login</b>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enable\Disable Facebook login</label>
							</div>
							<div class="col-sm-6">
							@if ( $SocialLoginSettings->facebook == 'enable' )
								<label class="ui-check ui-check-md">
                                {{ Form::radio('facebook', 'enable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('facebook', 'disable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
							@else
								<label class="ui-check ui-check-md">
                                {{ Form::radio('facebook', 'enable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('facebook', 'disable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
							</div>
							@endif
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enter Facebook App ID</label>
							</div>
							<div class="col-sm-6">
								{{ Form::text('facebook_id', $SocialLoginSettings->facebook_id, ['class' => 'form-control'] ) }}
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enter Facebook Secret</label>
							</div>
							<div class="col-sm-6">
								{{ Form::text('facebook_secret', $SocialLoginSettings->facebook_secret, ['class' => 'form-control'] ) }}
							</div>
						</div>

						<!-- Google+ Social Login Settings -->

						<div class="form-group row">
							<div class="col-sm-3">
								<b class="form-control-label">Google+ Login</b>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enable\Disable Google+ login</label>
							</div>
							<div class="col-sm-6">
							@if ( $SocialLoginSettings->google == 'enable' )
								<label class="ui-check ui-check-md">
                                {{ Form::radio('google', 'enable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('google', 'disable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
							@else
								<label class="ui-check ui-check-md">
                                {{ Form::radio('google', 'enable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('google', 'disable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
                            @endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enter Google Client ID</label>
							</div>
							<div class="col-sm-6">
								{{ Form::text('google_id', $SocialLoginSettings->google_id, ['class' => 'form-control'] ) }}
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enter Google Client Secret</label>
							</div>
							<div class="col-sm-6">
								{{ Form::text('google_secret', $SocialLoginSettings->google_secret, ['class' => 'form-control'] ) }}
							</div>
						</div>
					
					<!-- Twitter Social Login Settings -->

					<div class="form-group row">
							<div class="col-sm-3">
								<b class="form-control-label">Twitter Login</b>
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enable\Disable Twitter login</label>
							</div>
							<div class="col-sm-6">
							@if ( $SocialLoginSettings->twitter == 'enable' )
								<label class="ui-check ui-check-md">
                                {{ Form::radio('twitter', 'enable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('twitter', 'disable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
							@else
								<label class="ui-check ui-check-md">
                                {{ Form::radio('twitter', 'enable', false) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.yes') }}
                                </label>
                               	<label class="ui-check ui-check-md">
                                {{ Form::radio('twitter', 'disable', true) }}
                                <i class="dark-white"></i>
                                {{ trans('backLang.no') }}
                                </label>
                            @endif
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enter Twitter App ID</label>
							</div>
							<div class="col-sm-6">
								{{ Form::text('twitter_id', $SocialLoginSettings->twitter_id, ['class' => 'form-control'] ) }}
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<label class="form-control-label">Enter Twitter App Secret</label>
							</div>
							<div class="col-sm-6">
								{{ Form::text('twitter_secret', $SocialLoginSettings->twitter_secret, ['class' => 'form-control'] ) }}
							</div>
						</div>

						<div class="form-group row">
							<div class="col-sm-3">
								<input type="submit" style="margin-left: 30px;" class="btn btn-sm success form-control" value="Save" />
							</div>
						</div>

					{{ Form::close() }}
					</div>
				</div>
			</div>
		</div>

			</div>

		</div>
	</div>
@endsection