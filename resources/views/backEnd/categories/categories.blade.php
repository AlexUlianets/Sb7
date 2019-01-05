@extends('backEnd.layout')

@section('content')
    <div class="padding">
        <div class="box">
            <button class="btn btn-info m-a pull-right" onclick="window.location.href='{{ route("categoriesUpdate") }}'">ADD NEW</button>
            <div class="p-a-md dker">
                <h5>Categories</h5>
                {{ Form::open(['route' => ['categoriesEntries'], 'method' => 'POST']) }}
                    <p>Show
                    {{ Form::select('show-entries', array( '10' => '10', '25' => '25', '50' => '50', '100' => '100', '150' => '150', '200' => '200', '250' => '250')) }}
                    entries</p>
                    <input type="submit" class="btn btn-sm success" value="Show" />
                {{ Form::close() }}
            </div>
            <div class="row-col row-col-xs">
                <!-- column -->
                
                <!-- /column -->
                @if($Categories->total() > 0)
                        <!-- column -->
                <div class="col-sm-4 col-md-3 bg b-r">
                    <div class="row-col">
                        <div class="p-a-xs b-b">
                            {{Form::open(['route'=>['categoriesSearch'],'method'=>'POST'])}}
                            <div class="input-group">
                                <button type="submit" style="padding-top: 10px;"
                                        class="input-group-addon no-border no-bg pull-left"><i class="fa fa-search"></i>
                                </button>
                                <input type="text" style="width: 85%" name="q" required value="{{ $search_word }}"
                                       class="form-control no-border no-bg"
                                       placeholder="Search here">
                            </div>
                            {{Form::close()}}
                        </div>
                        <div class="row-row">

                            <table class="table table-striped  b-t">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Icon</th>
                                    <th>Meta title</th>
                                    <th>Meta description</th>
                                    <th class="text-center" style="width:100px;">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($Categories as $Category)
                                        <tr>
                                            <td>
                                                <span class="w-40 avatar">
                                                        @if($Category->photo!="")
                                                            <img src="{{ URL::to('uploads/Categories/'.$Category->photo) }}" class="img-circle">
                                                        @else
                                                            <img src="{{ URL::to('uploads/contacts/profile.jpg') }}" class="img-circle"
                                                                 style="opacity: 0.5">
                                                        @endif
                                                </span>
                                            </td>
                                            <td> 
                                                {{ $Category->name }}
                                            </td>
                                            <td>
                                                {{ $Category->icon }}
                                            </td>
                                            <td>
                                                {{ $Category->category_meta }}
                                            </td>
                                            <td>
                                                {{ $Category->category_description }}
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-sm success"  href="{{ route("categoryEdit",["id"=>$Category->id]) }}">
                                                    <small><i class="material-icons">
                                                            </i> Edit
                                                    </small>
                                                </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        @if($Categories->total() > env('BACKEND_PAGINATION'))
                            <div class="p-a b-t text-center">
                                {!! $Categories->links() !!}
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
