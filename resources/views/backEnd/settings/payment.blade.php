@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="p-a-md dker">
				<h3>Payment Settings</h3>
			</div>
		</div>

		<div class="row-col row-col-xs">
			<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
						{{ Form::open([ 'route' => ['settingsUpdatePayment'], 'method' => 'POST' ]) }}
							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Enable/Disable PayPal payment</label>
								</div>
								<div class="col-sm-9">
									<div class="radio">
										@if ( $PaymentSettings->paypal_payment == 'true' )
											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_payment', 'true', true) }}
											<i class="dark-white"></i>
                                        	{{ trans('backLang.yes') }}
											</label>

											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_payment', 'false', false) }}
											<i class="dark-white"></i>
											{{ trans('backLang.no') }}
											</label>
										@else
											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_payment', 'true', false) }}
											<i class="dark-white"></i>
                                        	{{ trans('backLang.yes') }}
											</label>

											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_payment', 'false', true) }}
											<i class="dark-white"></i>
											{{ trans('backLang.no') }}
											</label>
										@endif
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Enable/Disable PayPal sandbox</label>
								</div>
								<div class="col-sm-9">
									<div class="radio">
										@if ( $PaymentSettings->paypal_sandbox == 'true' )
											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_sandbox', 'true', true) }}
											<i class="dark-white"></i>
                                        	{{ trans('backLang.yes') }}
											</label>
										
											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_sandbox', 'false', false) }}
											<i class="dark-white"></i>
											{{ trans('backLang.no') }}
											</label>
										@else
											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_sandbox', 'true', false) }}
											<i class="dark-white"></i>
                                        	{{ trans('backLang.yes') }}
											</label>
										
											<label class="ui-check ui-check-md">
											{{ Form::radio('paypal_sandbox', 'false', true) }}
											<i class="dark-white"></i>
											{{ trans('backLang.no') }}
											</label>
										@endif
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">PayPal receiver email</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('email', $PaymentSettings->email, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<input type="submit" class="form-control btn btn-sm success" value="Save" />
								</div>
							</div>
						{{ Form::close() }}
						</div>
					</div>
			</div>
		</div>
	</div>
@endsection