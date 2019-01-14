@extends('backEnd.layout')

@section('content')
	 <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
  <a href="{{ route('settings') }}" class="pull-left btn btn-sm" style="margin-left: 30px;">< Back to settings</a>
	<div class="padding">
		<div class="box">
			<div class="p-a-md dker">
				<h3>Email Settings</h3>
			</div>

		<div class="row-col row-col-xs">

				<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
                        	
                        	{{ Form::open(['route' => ['settingsEmailUpdate'], 'method' => 'POST']) }}
                        	<div class="form-group row" style="margin-top: 20px;">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Inquery email</label> 
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('inquery_email', $EmailSettings->inquery_email, ['class' => 'form-control' ]) }}
                        			<p>User will be contact to you via this email address.</p>
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Order email</label> 
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::text('order_email', $EmailSettings->order_email, ['class' => 'form-control' ]) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<label class="form-control-label">Template email</label> 
                        		</div>
                        		<div class="col-sm-6">
                        			{{ Form::textarea('email_template', $EmailSettings->email_template, ['class' => 'form-control' ]) }}
                        		</div>
                        	</div>

                        	<div class="form-group row">
                        		<div class="col-sm-3">
                        			<input type="submit" style="margin-left: 30px;" class="btn form-control success" value="Save" />
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