@extends('backEnd.layout')

@section('content')
	@if(@Auth::user()->permissionsGroup->webmaster_status)
		<div class="padding">
        		<div class="box">
        		<div class="box-header dker">
        			<a href="{{ route('reports') }}" class="btn btn-sm">< Back to reports</a>
                	<h3>Report</h3>
        		</div>
    	
        		<div class="row-col row-col-xs">
        			<div class="padding">
        				
        				<div class="form-group row">
        					<label class="form-control-label col-sm-3"><strong>Email</strong></label>
        					<div class="col-sm-9">
        						<p>
        							{{ $Report->email }}
        						</p>
        					</div>
        				</div>

        				<div class="form-group row">
        					<label class="form-control-label col-sm-3"><strong>Reason</strong></label>
        					<div class="col-sm-9">
        						<p>
        							{{ $Report->reason }}
        						</p>
        					</div>
        				</div>

        				<div class="form-group row">
        					<label class="form-control-label col-sm-3"><strong>Date</strong></label>
        					<div class="col-sm-9">
        						<p>
        							{{ $Report->created_at }}
        						</p>
        					</div>
        				</div>

        				<div class="form-group row">
        					<label class="form-control-label col-sm-3"><strong>Message</strong></label>
        					<div class="col-sm-9">
        						<p>
        							{{ $Report->message }}
        						</p>
        					</div>
        				</div>
        			
        			</div>
        		</div>
    		</div>
		</div>
	@endif
@endsection