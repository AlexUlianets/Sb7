<div class="padding">
        <div class="box">
        	<div class="box-header dker">
                <h3>Premium List Settings</h3>
            </div>
        
        	@if ( $TotalSettings > 0 )
                
                <div class="row-col row-col-xs">
                <div class="row-row">
                    <div class="padding">

                        {{ Form::open( [ 'route' => ['premiumSavePages', 'webmasterId' => $WebmasterSection->id], 'method' => 'POST' ] ) }}
                        <div class="form-horizontal">

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Choose premium list positions</label>
                                <div class="col-sm-9">
                                    @foreach ( $Topics as $Topic )
                                        <p>{{ Form::radio( 'page', $Topic->title_en ) }} {{ $Topic->title_en }}</p>    
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    {{ Form::submit('Add', ['class' => 'form-control btn btn-sm success'] ) }}
                                </div>
                            </div>

                        </div>
                        {{ Form::close() }}

                        <div class="form-horizontal">

                            <div class="card" style="padding-bottom: 20px;">
                                <div class="form-group padding d-inline">
                                    <div class="col-sm-9 d-inline">
                                        <div class="row">
                                            @foreach ( $ListPages as $Page )
                                                <strong style="margin-left: 10px;" class="primary btn pull-left">{{ $Page->title }} <a href="{{ route('premiumListDelete', [ 'id' => $Page->id, 'webmasterId' => $WebmasterSection->id ]) }}" class="danger" style="padding: 3px;border-radius: 2px;">☓</a></strong>    
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{ Form::open(['route' => ['premiumListUpdate', 'webmasterId' => $WebmasterSection->id], 'method' => 'POST' ]) }}
                            <div class="form-horizontal">

                                @foreach ( $SettingToEdit as $Setting )

                                <div class="form-group row">

                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label"><strong>Choose premium list conditions</strong></label>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Set number of days</label>
                                    <div class="col-sm-9">
                                        {{ Form::text( 'days', $Setting->days, ['class' => 'form-control']) }}  
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Set number of impression</label>
                                    <div class="col-sm-9">
                                        {{ Form::text( 'impression', $Setting->impressions, ['class' => 'form-control'] ) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 form-control-label">Price</label>
                                    <div class="col-sm-9">
                                        {{ Form::text( 'price', $Setting->price, ['class' => 'form-control'] ) }}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        {{ Form::submit('Save', ['class' => 'form-control btn success']) }}
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
                </div>

        	@else
        		<div class="row-col row-col-xs">
        		<div class="row-row">
        			<div class="padding">
                        {{ Form::open( [ 'route' => ['premiumSavePages', 'webmasterId' => $WebmasterSection->id], 'method' => 'POST' ] ) }}
                        <div class="form-horizontal">

                            <div class="form-group row">
                                <label class="col-sm-3 form-control-label">Choose premium list positions</label>
                                <div class="col-sm-9">
                                    @foreach ( $Topics as $Topic )
                                        <p>{{ Form::radio( 'page', $Topic->title_en ) }} {{ $Topic->title_en }}</p>    
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3">
                                    {{ Form::submit('Add', ['class' => 'form-control btn btn-sm success'] ) }}
                                </div>
                            </div>

                        </div>
                        {{ Form::close() }}

                        <div class="form-horizontal">

                            <div class="card" style="padding-bottom: 20px;">
                                <div class="form-group padding d-inline">
                                    <div class="col-sm-9 d-inline">
                                        <div class="row">
                                            @foreach ( $ListPages as $Page )
                                            <a href="{{ route('premiumListDelete', [ 'id' => $Page->id, 'webmasterId' => $WebmasterSection->id ]) }}">
                                                <strong style="margin-left: 10px;" class="primary btn pull-left">{{ $Page->title }} ☓</strong></a>    
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

        				{{ Form::open(['route' => ['premiumListStore', 'webmasterId' => $WebmasterSection->id ], 'method' => 'POST' ]) }}
        					<div class="form-horizontal">

        						<div class="form-group row">
        							<label class="col-sm-3 form-control-label"><strong>Choose premium list conditions</strong></label>
        						</div>

        						<div class="form-group row">
        							<label class="col-sm-3 form-control-label">Set number of days</label>
        							<div class="col-sm-9">
        								{{ Form::text('days', '', ['class' => 'form-control'] ) }}
        							</div>
        						</div>
 
        						<div class="form-group row">
        							<label class="col-sm-3 form-control-label">Set number of impression</label>
        							<div class="col-sm-9">
        								{{ Form::text('impression', '', ['class' => 'form-control'] ) }}
        							</div>
        						</div>

        						<div class="form-group row">
        							<label class="col-sm-3 form-control-label">Price</label>
        							<div class="col-sm-9">
        								{{ Form::text('price', '', ['class' => 'form-control'] ) }}
        							</div>
        						</div>

        						<div class="form-group row">
        							<div class="col-sm-3">
        								{{ Form::submit('Save', ['class' => 'form-control btn success'] ) }}
        								</div>
        							</div>

        						</div>
        					{{ Form::close() }}
        				</div>
        			</div>
        	@endif
        	</div>
        </div>
    </div>