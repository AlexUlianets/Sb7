@extends('backEnd.layout')

@section('content')
<a href="{{ route('settings') }}" class="pull-left btn btn-sm" style="margin-left: 30px;">< Back to settings</a>
	<script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/codemirror/CodeMirror/master/lib/codemirror.css">
        <script type="text/javascript" src="https://cdn.rawgit.com/codemirror/CodeMirror/master/lib/codemirror.js"></script>
        <script type="text/javascript" src="https://cdn.rawgit.com/codemirror/CodeMirror/master/mode/xml/xml.js"></script>
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h5>Other Settings</h5>
			</div>


			<div class="row-col row-col-xs">
				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                    	{{ Form::open([ 'route' => ['otherSettingsUpdate'], 'method' => 'POST' ]) }}
                    	<div class="form-group row" style="margin-top: 20px;">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Gzip compression</label>
                    		</div>
                    		<div class="col-sm-6">
                    		@if ( $OtherSettings->gzip_compression =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('gzip_compression', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('gzip_compression', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('gzip_compression', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('gzip_compression', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Enable/Disable captcha</label>
                    		</div>
                    		<div class="col-sm-6">
                    		@if ( $OtherSettings->enable_captcha =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_captcha', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_captcha', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_captcha', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('enable_captcha', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Captcha site key</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::text('captcha_site_key', $OtherSettings->captcha_site_key, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Captcha secret</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::text('captcha_secret', $OtherSettings->captcha_secret, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Captcha on Sign Up</label>
                    		</div>
                    		<div class="col-sm-6">
                    		@if ( $OtherSettings->captcha_on_signup =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_signup', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_signup', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_signup', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_signup', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    		</div>
                    	</div>


                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Captcha on list</label>
                    		</div>
                    		<div class="col-sm-6">
                    		@if ( $OtherSettings->captcha_on_list =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_list', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_list', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_list', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_list', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Captcha on forget</label>
                    		</div>
                    		<div class="col-sm-6">
                    		@if ( $OtherSettings->captcha_on_forget =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_forget', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_forget', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_forget', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.yes') }}
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_on_forget', 'disable', true) }}
                                        <i class="dark-white"></i>
                                        {{ trans('backLang.no') }}
                                   	</label>
                                   	@endif
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>Custom CSS/JS</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Before head tag</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::textarea('before_head_css', $OtherSettings->before_head_css, ['class' => 'form-control', 'id' => 'editor']) }}	
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">End of body tag</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::textarea('end_body_css', $OtherSettings->before_head_css, ['class' => 'form-control', 'id' => 'editor']) }}	
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    		<label class="form-control-label"><h6>Cookies</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Cookie bar position</label>
                    		</div>
                    		<div class="col-sm-6">
                    		@if ( $OtherSettings->cookie_bar_position =='top' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_bar_position', 'top', true) }}
                                        <i class="dark-white"></i>
                                        Top
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_bar_position', 'top', false) }}
                                        <i class="dark-white"></i>
                                        Bottom
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_bar_position', 'top', false) }}
                                        <i class="dark-white"></i>
                                        Top
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('captcha_bar_position', 'bottom', true) }}
                                        <i class="dark-white"></i>
                                        Bottom
                                   	</label>
                                   	@endif
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Cookie bar color</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::text('cookie_bar_color', $OtherSettings->cookie_bar_color, ['class' => 'form-control', 'id' => 'cp1']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Cookie text color</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::text('cookie_text_color', $OtherSettings->cookie_text_color, ['class' => 'form-control', 'id' => 'cp2']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Cookie show border</label>
                    		</div>
                    		<div class="col-sm-6">
                    		@if ( $OtherSettings->cookie_show_border =='enable' )
									<label class="ui-check ui-check-md">
                                        {{ Form::radio('cookie_show_border', 'enable', true) }}
                                        <i class="dark-white"></i>
                                        Yes
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('cookie_show_border', 'disable', false) }}
                                        <i class="dark-white"></i>
                                        No
                                   	</label>
                    				@else
                    				<label class="ui-check ui-check-md">
                                        {{ Form::radio('cookie_show_border', 'enable', false) }}
                                        <i class="dark-white"></i>
                                        Yes
                                    </label>
                                    
                                    <label class="ui-check ui-check-md">
                                        {{ Form::radio('cookie_show_border', 'disable', true) }}
                                        <i class="dark-white"></i>
                                       	No
                                   	</label>
                                   	@endif
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Cookie border color</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::text('cookie_border_color', $OtherSettings->cookie_border_color, ['class' => 'form-control', 'id' => 'cp3']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>Font settings</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Choose site global font</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="font_global" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Choose site style font</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="font_global_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Characters sets</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::text('characters_sets', $OtherSettings->characters_sets, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<!-- H1 Settings -->

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>H1</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H1 Font Family</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="h1_font_family" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H1 Size</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::number('h1_size', $OtherSettings->h1_size, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H1 Style</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="h1_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    	</div>


                    	<!-- H2 Settings -->

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>H2</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H2 Font Family</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="h2_font_family" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H2 Size</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::number('h2_size', $OtherSettings->h1_size, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H2 Style</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="h2_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    	</div>

                    	<!-- H3 Settings -->

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>H3</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H3 Font Family</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="h3_font_family" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H3 Size</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::number('h3_size', $OtherSettings->h1_size, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">H3 Style</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="h3_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    	</div>

                    	<!-- Body Settings -->

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>Body</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Body Font Family</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="body_font_family" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Body Size</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::number('body_size', $OtherSettings->body_size, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Body Style</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="col-sm-6">
                    			<select name="body_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    		</div>
                    	</div>

                    	<!-- Meta Info Settings -->

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>Meta Info</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Meta Info Font Family</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="meta_info_font_family" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Meta Info Size</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::number('meta_infos_size', $OtherSettings->meta_info_size, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Body Style</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="col-sm-6">
                    			<select name="meta_info_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    		</div>
                    	</div>

                    	<!-- Footer Settings -->

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>Footer</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Footer Font Family</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="footer_font_family" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Footer Size</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::number('footer_size', $OtherSettings->footer_size, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Footer Style</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="col-sm-6">
                    			<select name="footer_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    		</div>
                    	</div>

                    	<!-- Menu Settings -->

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label"><h6>Menu</h6></label>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Menu Font Family</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<select name="menu_font_family" class="form-control">
                    				<option value="Times New Roman" style="font-family: Times New Roman;">Times New Roman</option>
                    				<option value="Arial">Arial</option>
                    				<option value="Roboto Sans">Roboto Sans</option>
                    			</select>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Menu Size</label>
                    		</div>
                    		<div class="col-sm-6">
                    			{{ Form::number('menu_size', $OtherSettings->menu_size, ['class' => 'form-control']) }}
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<label class="form-control-label">Menu Style</label>
                    		</div>
                    		<div class="col-sm-6">
                    			<div class="col-sm-6">
                    			<select name="menu_style" class="form-control">
                    				<option value="normal">Normal</option>
                    				<option value="italic">Italic</option>
                    				<option value="oblique">Oblique</option>
                    			</select>
                    		</div>
                    		</div>
                    	</div>

                    	<div class="form-group row">
                    		<div class="col-sm-3">
                    			<input type="submit" class="form-control btn btn-sm success" style="margin-left: 30px;" value="Save" />
                    		</div>
                    	</div>

                    	{{ Form::close() }}
                    </div>


                </div>
            </div>

		</div>
	</div>

	<script>
        var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
            lineNumbers: true,
            mode:  "xml"
        });
    </script>
@endsection

@section('footerInclude')
    <script src="{{ URL::to('backEnd/libs/jquery/jquery/dist/jquery.js') }}"></script>
    <script src="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('backEnd/libs/jquery/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" type="text/css"/>
    <script>
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

            $('#cp2').colorpicker({
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

            $('#cp3').colorpicker({
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
</script>
@endsection