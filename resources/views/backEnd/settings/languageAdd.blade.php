@extends('backEnd.layout')

@section('content')
	<div class="app-body-inner">
        <div class="row-col row-col-xs">
        	<div class="col-sm-6 col-md-7">
                    <div class="row-col">
                        <div class="p-a-sm">
                              <div class="box">
                              @if ( !empty( $LanguageToEdit ) )
                              <div class="form-horizontal" style="padding-top: 20px;padding-bottom: 10px;">
                                    {{ Form::open([ 'route' => ['settingsLanguageUpdate', $LanguageToEdit->id], 'method' => 'POST' ]) }}
                                          
                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                      <label class="col-sm-3 form-control-label">Name</label>
                                                </div>
                                                <div class="col-sm-6">
                                                      {{ Form::text('name', $LanguageToEdit->name, ['class' => 'form-control']) }}
                                                </div>
                                          </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                      <label class="col-sm-3 form-control-label">Code</label>
                                                </div>
                                                <div class="col-sm-6">
                                                      {{ Form::text('code', $LanguageToEdit->code, ['class' => 'form-control', 'placeholder' => 'E.g.: en']) }}
                                                </div>
                                          </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                      <label class="col-sm-3 form-control-label">Direction</label>
                                                </div>
                                                <div class="col-sm-6">
                                                      {{ Form::text('direction', $LanguageToEdit->direction, ['class' => 'form-control', 'placeholder' => 'E.g: :rtl or ltr']) }}
                                                </div>
                                          </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                      <label class="col-sm-3 form-control-label">Icon</label>
                                                </div>
                                                <div class="col-sm-6">
                                                      <select name="icon" class="form-control">
                                                            <option value="{{ $LanguageToEdit->icon }}">{{ $LanguageToEdit->icon }}</option>
                                                            <option value="🇩🇪">🇩🇪 Deutsh</option>
                                                            <option value="🇬🇧">🇬🇧 English</option>
                                                            <option value="🇫🇷">🇫🇷 France</option>
                                                            <option value="🇷🇺">🇷🇺 Russian</option>
                                                            <option value="🇯🇵">🇯🇵 Japanese</option>
                                                            <option value="🇮🇹">🇮🇹 Italian</option>
                                                            <option value="🇪🇸">🇪🇸 Spain</option>
                                                            <option value="🇵🇱">🇵🇱 Polish</option>
                                                            <option value="🇨🇿">🇨🇿 Czech</option>
                                                            <option value="🇺🇦">🇺🇦 Ukrainian</option>
                                                            <option value="🇧🇾">🇧🇾 Belorussian</option>
                                                            <option value="🇲🇩">🇲🇩 Moldovian</option>
                                                            <option value="🇬🇷">🇬🇷 Greece</option>
                                                            <option value="🇵🇹">🇵🇹 Portugalian</option>
                                                            <option value="🇷🇴">🇷🇴 Romanian</option>
                                                            <option value="🇧🇬">🇧🇬 Bulgarian</option>
                                                            <option value="🇨🇳">🇨🇳 Chinese</option>
                                                            <option value="🇰🇷">🇰🇷 South Korea</option>
                                                      </select>
                                                </div>
                                          </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                      <label class="col-sm-3 form-control-label">Directory</label>
                                                </div>
                                                <div class="col-sm-6">
                                                      {{ Form::text('directory', $LanguageToEdit->directory, ['class' => 'form-control', 'placeholder' => 'E.g: english']) }}
                                                </div>
                                          </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                      <label class="col-sm-3 form-control-label">Default</label>
                                                </div>
                                                <div class="col-sm-6">
                                                      @if ( $LanguageToEdit->default == 'yes' )
                                                      <label class="ui-check ui-check-md">
                                                            {{ Form::radio('default', 'yes', true) }}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.yes') }}
                                                      </label>
                                                      <label class="ui-check ui-check-md">
                                                            {{ Form::radio('default', 'no', false) }}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.no') }}
                                                      </label>
                                                      @else
                                                      <label class="ui-check ui-check-md">
                                                            {{ Form::radio('default', 'yes', false) }}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.yes') }}
                                                      </label>
                                                      <label class="ui-check ui-check-md">
                                                            {{ Form::radio('default', 'no', true) }}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.no') }}
                                                      </label>
                                                      @endif
                                                </div>
                                          </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                      <input type="submit" value="Add" class="form-control btn btn-sm success" style="margin-left: 30px;" />
                                                </div>
                                          </div>

                                    {{ Form::close() }}
                              </div>
                              @else
                        	<div class="form-horizontal" style="padding-top: 20px;padding-bottom: 10px;">
                        		{{ Form::open([ 'route' => ['settingsLanguageStore'], 'method' => 'POST' ]) }}
                        			
                        			<div class="form-group row">
                        				<div class="col-sm-3">
                        					<label class="col-sm-3 form-control-label">Name</label>
                        				</div>
                        				<div class="col-sm-6">
                        					{{ Form::text('name', '', ['class' => 'form-control']) }}
                        				</div>
                        			</div>

                        			<div class="form-group row">
                        				<div class="col-sm-3">
                        					<label class="col-sm-3 form-control-label">Code</label>
                        				</div>
                        				<div class="col-sm-6">
                        					{{ Form::text('code', '', ['class' => 'form-control', 'placeholder' => 'E.g.: en']) }}
                        				</div>
                        			</div>

                        			<div class="form-group row">
                        				<div class="col-sm-3">
                        					<label class="col-sm-3 form-control-label">Direction</label>
                        				</div>
                        				<div class="col-sm-6">
                        					{{ Form::text('direction', '', ['class' => 'form-control', 'placeholder' => 'E.g: :rtl or ltr']) }}
                        				</div>
                        			</div>

                        			<div class="form-group row">
                        				<div class="col-sm-3">
                        					<label class="col-sm-3 form-control-label">Icon</label>
                        				</div>
                        				<div class="col-sm-6">
                        					<select name="icon" class="form-control">
                        						<option value="🇩🇪">🇩🇪 Deutsh</option>
                        						<option value="🇬🇧">🇬🇧 English</option>
                        						<option value="🇫🇷">🇫🇷 France</option>
                        						<option value="🇷🇺">🇷🇺 Russian</option>
                        						<option value="🇯🇵">🇯🇵 Japanese</option>
                        						<option value="🇮🇹">🇮🇹 Italian</option>
                        						<option value="🇪🇸">🇪🇸 Spain</option>
                        						<option value="🇵🇱">🇵🇱 Polish</option>
                        						<option value="🇨🇿">🇨🇿 Czech</option>
                        						<option value="🇺🇦">🇺🇦 Ukrainian</option>
                        						<option value="🇧🇾">🇧🇾 Belorussian</option>
                        						<option value="🇲🇩">🇲🇩 Moldovian</option>
                        						<option value="🇬🇷">🇬🇷 Greece</option>
                        						<option value="🇵🇹">🇵🇹 Portugalian</option>
                        						<option value="🇷🇴">🇷🇴 Romanian</option>
                        						<option value="🇧🇬">🇧🇬 Bulgarian</option>
                        						<option value="🇨🇳">🇨🇳 Chinese</option>
                        						<option value="🇰🇷">🇰🇷 South Korea</option>
                        					</select>
                        				</div>
                        			</div>

                        			<div class="form-group row">
                        				<div class="col-sm-3">
                        					<label class="col-sm-3 form-control-label">Directory</label>
                        				</div>
                        				<div class="col-sm-6">
                        					{{ Form::text('directory', '', ['class' => 'form-control', 'placeholder' => 'E.g: english']) }}
                        				</div>
                        			</div>

                        			<div class="form-group row">
                        				<div class="col-sm-3">
                        					<label class="col-sm-3 form-control-label">Default</label>
                        				</div>
                        				<div class="col-sm-6">
                        					<label class="ui-check ui-check-md">
                                                            {{ Form::radio('default', 'yes', false) }}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.yes') }}
                                                      </label>
                                                      <label class="ui-check ui-check-md">
                                                            {{ Form::radio('default', 'no', true) }}
                                                            <i class="dark-white"></i>
                                                            {{ trans('backLang.no') }}
                                                      </label>
                        				</div>
                        			</div>

                        			<div class="form-group row">
                        				<div class="col-sm-3">
                        					<input type="submit" value="Add" class="form-control btn btn-sm success" style="margin-left: 30px;" />
                        				</div>
                        			</div>

                        		{{ Form::close() }}
                        	</div>
                              @endif
                              </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection