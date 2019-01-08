<div class="padding">
        <div class="box">
        	<div class="box-header dker">
                <h3>Reports</h3>
                <br />
                {{ Form::open( [ 'route' => ['reportsShowEntries'], 'method' => 'POST' ] ) }}
                	<p>Show
                    {{ Form::select('show_entries', array( '10' => '10', '25' => '25', '50' => '50', '100' => '100', '150' => '150', '200' => '200', '250' => '250')) }}
                    entries</p>
                    <input type="submit" class="btn btn-sm success" value="Show" />
                {{ Form::close() }}
        	</div>
    	
        	<div class="row-col row-col-xs">
        		<div class="row-col">
                        <div class="p-a-xs b-b">
                            {{Form::open(['route'=>['reportsSearch'],'method'=>'POST'])}}
                            <div class="input-group">
                                <button type="submit" style="padding-top: 10px;"
                                        class="input-group-addon no-border no-bg pull-left"><i class="fa fa-search"></i>
                                </button>
                                <input type="text" style="width: 60%" name="q" required
                                       class="form-control no-border no-bg"
                                       placeholder="Search here">
                                <input type="submit"
                                        class="btn btn-sm success pull-right" style="float: right;margin-top: 5px;" value="Search" />
                            </div>
                            {{Form::close()}}
                        </div>
        		<div class="row-row">

        			<table class="table table-striped b-t">

        				<thead>
        					<tr>
        						<th>Email</th>
        						<th>Reason</th>
        						<th>Date</th>
        						<th>Actions</th>
        					</tr>
        				</thead>

        				<tbody>
        					@foreach ( $Reports as $Report )
        					<tr>
        						<td>{{ $Report->email }}</td>
        						<td>{{ $Report->reason }}</td>
        						<td>{{ $Report->created_at }}</td>
        						<td>
        							<a href="{{ route('reportsView', [ 'id' => $Report->id ] ) }}" class="btn btn-sm primary">View</a>

        							<a href="{{ route('reportsDelete', [ 'id' => $Report->id ] ) }}" class="btn btn-sm danger">Delete</a>
        						</td>
        					</tr>
        					@endforeach
        				</tbody>

        			</table>

        		</div>

        	</div>
    	</div>
</div>