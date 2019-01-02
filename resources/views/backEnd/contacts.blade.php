@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <button class="btn btn-info m-a pull-right" onclick="window.location.href='{{ route("membersUpdate") }}'">ADD NEW</button>
            <div class="p-a-md dker">
                <h5>Members</h5>
                <div class="select-entries">
                    <select id="show-entries" name="show-entries">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
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
                                <input type="text" style="width: 85%" name="q" required value="{{ $search_word }}"
                                       class="form-control no-border no-bg"
                                       placeholder="{{ trans('backLang.searchAllContacts') }}">
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

                                                <a class="btn btn-sm success"  href="{{ route("membersUpdate",["id"=>$Contact->id]) }}">
                                                    <small><i class="material-icons">
                                                            </i> Edit
                                                    </small>
                                                </a>

                                                <a class="btn btn-sm danger" href="{{ route("contactsDestroy", ["id" => $Contact->id]) }}">
                                                    <small>
                                                        <i class="material-icons">
                                                            </i> Delete
                                                    </small>
                                                </a>

                                                @if ( $Contact->ban != 1 )
                                                    <a class="btn btn-sm warning" href="{{ route("contactsBan", ["id" => $Contact->id ]) }}">
                                                        <small>
                                                            <i class="material-icons"></i> Ban
                                                        </small>
                                                    </a>
                                                @elseif ( $Contact->ban == 1 )
                                                    <a class="btn btn btn-sm primary" href="{{ route("contactsUnban", ["id" => $Contact->id ]) }}">
                                                        <small>
                                                            Unban
                                                        </small>
                                                    </a>
                                                @endif


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

        $(document).ready( function() {
            $('#show-entries').on('change', function() {
                $.ajax({
                    url: '/admin/members',
                    method: 'POST',
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    data: {'pageinateData':$('#issueinput5').val(),},
                    success: function(d){
                        console.log(d);
                    }
                });
            });
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
