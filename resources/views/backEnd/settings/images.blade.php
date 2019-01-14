@extends('backEnd.layout')

@section('content')
<a href="{{ route('settings') }}" class="pull-left btn btn-sm" style="margin-left: 30px;">< Back to settings</a>
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h5>Images Settings</h5>
			</div>

			<div class="row-col row-col-xs">

				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">

                        	{{ Form::open(['route' => ['settingsImagesUpdate'], 'method' => 'POST']) }}
                        		
                        		<div class="form-group row" style="margin-top: 20px;">
                        			<div class="col-sm-3">
                        				<label class="form-control-label">Enter API key</label>
                        			</div>
                        			<div class="col-sm-6">
                        				{{ Form::text('api_key', $ImagesSettings->api_key, ['class' => 'form-control' ]) }}
                        			</div>
                        		</div>

                        		<div class="form-group row">
                        			<div class="col-sm-3">
                        				<label class="form-control-label">Compress new images in background</label>
                        			</div>
                        			<div class="col-sm-6">
                        				@if ( $ImagesSettings->compress_bg == 'enable'  )
                        				<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_bg', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    	</label>
                                    
                                    	<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_bg', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   		</label>
                        				@else
                        				<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_bg', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    	</label>
                                    
                                    	<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_bg', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   		</label>
                                   		@endif
                        			</div>
                        		</div>

                        		<div class="form-group row">
                        			<div class="col-sm-3">
                        				<label class="form-control-label">Compress new images during upload</label>
                        			</div>
                        			<div class="col-sm-6">
                        			@if ( $ImagesSettings->compress_upload == 'enable' )
                        				<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_upload', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    	</label>
                                    
                                    	<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_upload', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   		</label>
                        			@else
                        				<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_upload', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    	</label>
                                    
                                    	<label class="ui-check ui-check-md">
                                        {{ Form::radio('compress_upload', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   		</label>
                                   	@endif
                        			</div>
                        		</div>

                        		<div class="form-group row">
                        			<div class="col-sm-3">
                        				<label class="form-control-label">Do not compress images automatically</label>
                        			</div>
                        			<div class="col-sm-6">
                        			@if ( $ImagesSettings->not_compress_auto == 'enable' )
										<label class="ui-check ui-check-md">
                                        {{ Form::radio('not_compress_auto', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    	</label>
                                    
                                    	<label class="ui-check ui-check-md">
                                        {{ Form::radio('not_compress_auto', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   		</label>
                        			@else
                        				<label class="ui-check ui-check-md">
                                        {{ Form::radio('not_compress_auto', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    	</label>
                                    
                                    	<label class="ui-check ui-check-md">
                                        {{ Form::radio('not_compress_auto', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   		</label>
                                   	@endif
                        			</div>
                        		</div>

                        		<div class="form-group row">
                        			<div class="col-sm-3">
                        				<label class="form-control-label">Select images sizes to be compressed</label>
                        			</div>
                        			<div class="col-sm-6">
                        				<input name="sizes_compress" type="number" class="form-control" />
                        			</div>
                        		</div>

                        		<div class="form-group row">
                        			<div class="col-sm-3">
                        				<input style="margin-left: 30px;" type="submit" class="btn success" value="Save" />
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