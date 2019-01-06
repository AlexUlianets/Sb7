<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<div class="padding">
        	<div class="box">
        		<div class="p-a-md dker">
        			<h5>Contact Messages</h5>
                                {{ Form::open(['route' => ['messagesShowEntries'], 'method' => 'POST']) }}
                                        <p>Show
                                        {{ Form::select('show_entries', array( '10' => '10', '25' => '25', '50' => '50', '100' => '100', '150' => '150', '200' => '200', '250' => '250')) }}
                    entries</p>
                    <input type="submit" class="btn btn-sm success" value="Show" />
                                {{ Form::close() }}                                
        		</div>
        		<div class="row-col row-col-xs">
        			@if ( !empty( $ContactMessages ) )
        				<div class="row-row">
        					<table class="table table-striped b-t">
        						<thead>
        							<th>Email</th>
        							<th>Phone</th>
        							<th>Messages</th>
        							<th>Options</th>
        						</thead>
        						<tbody>
        							@foreach ( $ContactMessages as $ContactMessage )
                                                                        <tr>
        								        <td>
        									       {{ $ContactMessage->email }}
        								        </td>

        								        <td>
        									       {{ $ContactMessage->phone }}
        								        </td>

        								        <td>
        									       {{ $ContactMessage->message }}
        								        </td>

                                                                                <td>
                                                                                        <a href="{{ route('messagesDestroy', ["id" => $ContactMessage->id]) }}" class="btn btn-sm danger">
                                                                                                <i class="material-icons">clear</i>
                                                                                        </a>
                                                                                </td>
                                                                        </tr>
        							@endforeach
        						</tbody>
        					</table>
        				</div>
        			@endif
        		</div>
        	</div>
</div>	