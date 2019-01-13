@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">

			<div class="p-a-md dker">
				<h5>SEO Settings</h5>
			</div>

			<div class="row-col row-col-xs">

				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">

                        {{ Form::open(['route' => ['settingsSeoUpdate'], 'method' => 'POST' ]) }}

                        	<div class="form-group row" style="margin-top: 20px;">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Show site name after page title, sepatate with "-"?</label>
                        		</div>
                        		<div class="col-sm-6">
                        		@if ( $SeoSettings->show_name_after == 'enable' )
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('show_name_after', 'enable', true) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('show_name_after', 'disable', false) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
                        		@else
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('show_name_after', 'enable', false) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('show_name_after', 'disable', true) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
								@endif
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label"><h6><b>Breadcrumbs settings</b></h6></label>
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Enable\Disable breadcrumbs</label>
                        		</div>
                        		<div class="col-sm-6">
                        		@if ( $SeoSettings->enable_breadcumbs == 'enable' )
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('enable_breadcumbs', 'enable', true) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('enable_breadcumbs', 'disable', false) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
                        		@else
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('enable_breadcumbs', 'enable', false) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('enable_breadcumbs', 'disable', true) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
								@endif
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Separator between breadcrumbs</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('between_breadcumbs', $SeoSettings->between_breadcumbs, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Anchor text for the Homepage</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('anchor_for_homepage', $SeoSettings->anchor_for_homepage, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Prefix for list category breadcrumbs</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('prefix_list_category', $SeoSettings->prefix_list_category, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Prefix for Search Page breadcrumbs</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('prefix_search_page', $SeoSettings->prefix_search_page, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Breadcrumb for 404 page:</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('breadcumb_for_404', $SeoSettings->breadcumb_for_404, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Bold the last page</label>
                        		</div>
                        		<div class="col-sm-6">
                        		@if ( $SeoSettings->bold_last_page == 'enable' )
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('bold_last_page', 'enable', true) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('bold_last_page', 'disable', false) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
                        		@else
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('bold_last_page', 'enable', false) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('bold_last_page', 'disable', true) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
								@endif
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-4">
                        			<label class="form-control-label"><h6><b>Site verification</b></h6></label>
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Google Webmaster Tools</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('google_webmaster_tools', $SeoSettings->google_webmaster_tools, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Bing Webmaster Tools</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('bing_webmaster_tools', $SeoSettings->bing_webmaster_tools, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Pinterest Webmaster Tools</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('pinterest_webmaster_tools', $SeoSettings->pinterest_webmaster_tools, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-4">
                        			<label class="form-control-label"><h6><b>General Site SEO</b></h6></label>
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">SEO Title</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('seo_title', $SeoSettings->seo_title, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">SEO Description</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('seo_description', $SeoSettings->seo_description, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">SEO Keywords</label>
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::textarea('seo_keywords', $SeoSettings->seo_keywords, ['class' => 'form-control']) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label"><h6><b>List SEO</b></h6></label>
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Use list title as meta title</label>
                        		</div>
                        		<div class="col-sm-6">
                        		@if ( $SeoSettings->list_title_as_meta_title == 'enable' )
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('list_title_as_meta_title', 'enable', true) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('list_title_as_meta_title', 'disable', false) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
                        		@else
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('list_title_as_meta_title', 'enable', false) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('list_title_as_meta_title', 'disable', true) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
								@endif
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Use list description as meta description</label>
                        		</div>
                        		<div class="col-sm-6">
                        		@if ( $SeoSettings->list_description_as_meta_description == 'enable' )
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('list_description_as_meta_description', 'enable', true) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('list_description_as_meta_description', 'disable', false) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
                        		@else
                        			<label class="ui-check ui-check-md">
									{{ Form::radio('list_description_as_meta_description', 'enable', false) }}
									<i class="dark-white"></i>
                                    {{ trans('backLang.yes') }}
									</label>

									<label class="ui-check ui-check-md">
									{{ Form::radio('list_description_as_meta_description', 'disable', true) }}
									<i class="dark-white"></i>
									{{ trans('backLang.no') }}
									</label>
								@endif
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<input type="submit" class="btn success form-control" style="margin-left: 30px;" value="Save" />
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