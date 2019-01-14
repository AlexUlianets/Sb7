@extends('backEnd.layout')

@section('content')
<a href="{{ route('settings') }}" class="pull-left btn btn-sm" style="margin-left: 30px;">< Back to settings</a>
	<div class="padding">
		<div class="box">
			<button class="btn btn-info m-a pull-right" onclick="window.location.href='{{ route("settingsLanguageAdd") }}'">ADD NEW</button>
			<div class="p-a-md dker">
				<h5>Language Settings</h5>
			</div>
			<div class="row-col row-col-xs">

				<div class="row-row">

					<table class="table table-stripped b-t">
						
						<thead>
							<th>Default</th>
							<th>Language</th>
							<th>Icon</th>
							<th>Code</th>
							<th>Options</th>
						</thead>

						<tbody>
							@foreach( $Languages as $Language )
								<tr>
									<td>
										{{ $Language->default }}
									</td>

									<td>
										{{ $Language->name }}
									</td>

									<td>
										{{ $Language->icon }}
									</td>

									<td>
										{{ $Language->code }}
									</td>

									<td>
										<a href="{{ route('settingsLanguageEdit', ['id' => $Language->id]) }}" class="btn btn-sm success">
											Edit
										</a>

										<a href="{{ route('settingsLanguageDestroy', ['id' => $Language->id]) }}" class="btn btn-sm danger">
											Delete
										</a>
									</td>
								</tr>
							@endforeach
						</tbody>

					</table>

				</div>

			</div>
		</div>		
	</div>
@endsection