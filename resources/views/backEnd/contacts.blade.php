@extends('backEnd.layout')

@section('content')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <div class="padding">
        <div class="box">
            <button class="btn btn-info m-a pull-right" onclick="window.location.href='{{ route("membersUpdate") }}'">ADD NEW</button>
            <div class="p-a-md dker">
                <h5>Members</h5>
                {{ Form::open(['route' => ['contactsShowEntries'], 'method' => 'POST' ]) }}
                    <p>Show
                    {{ Form::select('show-entries', array( '10' => '10', '25' => '25', '50' => '50', '100' => '100', '150' => '150', '200' => '200', '250' => '250')) }}
                    entries</p>
                    <input type="submit" class="btn btn-sm success" value="Show" />
                {{ Form::close() }}
            </div>
            <div class="row-col row-col-xs">
                <!-- column -->
                
                <!-- /column -->
                @if($Contacts->total() > 0)
                        <!-- column -->
                <div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
                            {{Form::open(['route'=>['contactsSearch'],'method'=>'POST'])}}
                            <div class="input-group">
                                <button type="submit" style="padding-top: 10px;"
                                        class="input-group-addon no-border no-bg pull-left"><i class="fa fa-search"></i>
                                </button>
                                <input type="text" style="width: 60%" name="q" required value="{{ $search_word }}"
                                       class="form-control no-border no-bg"
                                       placeholder="{{ trans('backLang.searchAllContacts') }}">
                                <input type="submit"
                                        class="btn btn-sm success pull-right" style="float: right;margin-top: 5px;" value="Search" />
                            </div>
                            {{Form::close()}}
                        </div>
                        <div class="row-row">

                            <table class="table table-striped  b-t">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Type</th>
                                    <th class="text-center" style="width:50px;">Status</th>
                                    <th>Gender</th>
                                    <th class="text-center" style="width:100px;">Options</th>
                                    <th class="text-center" style="width: 50px;">Created At</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($Contacts as $Contact)
                                        <tr>
                                            <td>
                                                <span class="w-40 avatar">
                                                        @if($Contact->photo!="")
                                                            <img src="{{ URL::to('uploads/contacts/'.$Contact->photo) }}" class="img-circle">
                                                        @else
                                                            <img src="{{ URL::to('uploads/contacts/profile.jpg') }}" class="img-circle"
                                                                 style="opacity: 0.5">
                                                        @endif
                                                </span>
                                            </td>
                                            <td> 
                                                {{ $Contact->first_name }}
                                            </td>
                                            <td>
                                                {{$Contact->email}}
                                            </td>
                                            <td>
                                                {{ $Contact->type=='1'?'Free':'Premium' }}
                                            </td>
                                            
                                            <td class="text-center">
                                                <i class="fa {{$Contact->status==1?'fa-check text-success':'fa-close text-danger'}} inline"></i>
                                            </td>

                                            <td>
                                                {{ $Contact->gender=='1'?'Male':'Female' }}
                                            </td>

                                            <td class="text-center">
                                            	
                                            	<div class="row">
                                                <a class="btn btn-sm success"  href="{{ route("membersUpdate",["id"=>$Contact->id]) }}">
                                                    <small>
                                                    <i class="material-icons">edit</i>
                                                    </small>
                                                </a>

                                                <a class="btn btn-sm danger" href="{{ route("contactsDestroy", ["id" => $Contact->id]) }}">
                                                    <small>
                                                    <i class="material-icons">clear</i>
                                                    </small>
                                                </a>

                                                @if ( $Contact->ban != 1 )
                                                    <a class="btn btn-sm warning" href="{{ route("contactsBan", ["id" => $Contact->id ]) }}">
                                                        <small>
                                                        <i class="material-icons">not_interested</i>
                                                        </small>
                                                    </a>
                                                @elseif ( $Contact->ban == 1 )
                                                    <a class="btn btn btn-sm primary" href="{{ route("contactsUnban", ["id" => $Contact->id ]) }}">
                                                        <small>
                                                        <i class="material-icons">remove_circle_outline</i>
                                                        </small>
                                                    </a>
                                                @endif
                                                </div>


                                            </td>

                                            <td class="text-center">
                                                {{ $Contact->created_at }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($Contacts->total() > env('BACKEND_PAGINATION'))
                            <div class="p-a b-t text-center">
                                {!! $Contacts->links() !!}
                            </div>
                        @endif
                    </div>
                </div>
                <!-- /column -->
                @endif


            </div>
        </div>
    </div>
    <style>
        .app-footer {
            display: none;
        }
    </style>
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo_file").change(function () {
            readURL(this);
            $('#photo_preview').css("opacity", 1);
        });

    </script>
@endsection
@section('footerInclude')
    <script type="text/javascript">
        function readURL(input) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#photo_preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#photo_file").change(function () {
            readURL(this);
            $('#photo_preview').css("opacity", 1);
        });
    </script>
@endsection
