@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h5>CDN Settings</h5>
			</div>

			<div class="row-col row-col-xs">
				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                    	{{ Form::open(['route' => ['settingsCdnUpdate'], 'method' => 'POST' ]) }}
                    	<div class="form-horizontal">
                    		<div class="form-group row">
                    			<div class="col-sm-3">
                    				<label class="col-sm-3 form-control-label">Enable\Disable CDN</label>
                    			</div>
                    			<div class="col-sm-6">
                    				@if ( $Cdn->cdn =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('cdn', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('cdn', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('cdn', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('cdn', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    			</div>

                    			
 
                    		</div>

                    		<div class="form-group row">
                    			<div class="col-sm-3" style="margin-left: 30px;">
                    				<input type="submit" class="btn btn-sm success" value="Save" />
                    			</div>
                    		</div>

                    	</div>
                    	{{ Form::close() }}
                    </div>
                </div>
			</div>

		</div>
	</div>
@endsection