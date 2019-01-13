@extends('backEnd.layout')

@section('content')
	<div class="padding">
		<div class="box">
			<div class="p-a-md dker">
				<h3>Payment Settings</h3>
			</div>

		<div class="row-col row-col-xs">
			<div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
						{{ Form::open([ 'route' => ['settingsUpdatePayment'], 'method' => 'POST' ]) }}

							<div class="form-group row" style="margin-top: 20px;">
								<div class="col-sm-3">
									<label class="form-control-label">PayPal receiver email</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('email', $PaymentSettings->email, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Live Client ID</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('live_client_id', $PaymentSettings->live_client_id, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Live Client Secret</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('live_client_secret', $PaymentSettings->live_client_secret, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Live Access Token</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('live_access_token', $PaymentSettings->live_access_token, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Live Access Token Expiry Date</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('live_access_token_expiry', $PaymentSettings->live_client_token_expiry, ['class' => 'form-control']) }}
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
											{{ Form::radio('sandbox_mode', 'true', true) }}
											<i class="dark-white"></i>
                                        	True
											</label>
										
											<label class="ui-check ui-check-md">
											{{ Form::radio('sandbox_mode', 'false', false) }}
											<i class="dark-white"></i>
											False
											</label>
										@else
											<label class="ui-check ui-check-md">
											{{ Form::radio('sandbox_mode', 'true', false) }}
											<i class="dark-white"></i>
                                        	True
											</label>
										
											<label class="ui-check ui-check-md">
											{{ Form::radio('sandbox_mode', 'false', true) }}
											<i class="dark-white"></i>
											False
											</label>
										@endif
									</div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Sandbox Client ID</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('sandbox_client_id', $PaymentSettings->sandbox_client_id, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Sandbox Client Secret</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('sandbox_client_secret', $PaymentSettings->sandbox_client_secret, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Sandbox Access Token</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('sandbox_access_token', $PaymentSettings->sandbox_access_token, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<label class="form-control-label">Sandbox Access Token Expiry</label>
								</div>
								<div class="col-sm-9">
									{{ Form::text('sandbox_access_token_expiry', $PaymentSettings->sandbox_access_token_expiry, ['class' => 'form-control']) }}
								</div>
							</div>

							<div class="form-group row">
								<div class="col-sm-3">
									<input type="submit" style="margin-left: 30px;" class="form-control btn btn-sm success" value="Save" />
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