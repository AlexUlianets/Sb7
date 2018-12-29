<div class="padding">
    {{Form::open(['route'=>['updateCustomSettings'],'method'=>'POST', 'files' => true ])}}
    <input type="hidden" name="redirectTo" value="lists">

    <div class="box">
        <button type="submit" class="btn btn-info m-a pull-right">Save Changes</button>
    	<div class="p-a-md dker">
            <h5>General Settings</h5>
        </div>

        <div class="row p-a">
            <div class="col-sm-12">

	            <div class="form-group">
	                <label>List maximum number</label>
                	<input placeholder="Website Title" class="form-control has-value" name="sett1" type="number" max="10" min="5" value="{{$data->sett1}}">
	            </div>
	            <div class="form-group">
	                <label>Max image upload size <small>(mb)</small></label>
                	<input placeholder="Website Title" class="form-control has-value" name="sett2" type="number" max="10" min="5" value="{{$data->sett2}}">
	            </div>
	            <div class="form-group">
                    <label>Video media in list</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett4" type="radio" value="1" {{$data->sett4=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Enable
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett4" type="radio" value="0" {{$data->sett4=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            Disable
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Sound media in list</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett6" type="radio" value="1" {{$data->sett6=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Enable
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett6" type="radio" value="0" {{$data->sett6=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            Disable
                        </label>
                    </div>
                </div>
                <div class="form-group">
	                <label>Daily contributor can submit <small>(0 is unlimited)</small></label>
                	<input placeholder="Website Title" class="form-control has-value" name="sett7" type="number" value="{{$data->sett7}}">
	            </div>
	            <div class="form-group">
                    <label>Auto publish user submitted list : yes/no approved by admin</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett9" type="radio" value="1" {{$data->sett9=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Yes
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett9" type="radio" value="0" {{$data->sett9=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Block users from editing or deleting approved sett</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett11" type="radio" value="1" {{$data->sett11=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Yes
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett11" type="radio" value="0" {{$data->sett11=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Show reaction buttons under each list </label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett13" type="radio" value="1" {{$data->sett13=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Yes
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett13" type="radio" value="0" {{$data->sett13=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Show share buttons under each list</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett15" type="radio" value="1" {{$data->sett15=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Yes
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett15" type="radio" value="0" {{$data->sett15=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Show numbering at each list </label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett17" type="radio" value="1" {{$data->sett17=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Yes
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett17" type="radio" value="0" {{$data->sett17=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            No
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>List sort order</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett19" type="radio" value="1" {{$data->sett19=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Ascending
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett19" type="radio" value="0" {{$data->sett19=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            Descending
                        </label>
                    </div>
                </div>
	            <!-- <div class="form-group">
	                <label>List maximum number</label>
                	<input placeholder="Website Title" class="form-control has-value" name="site_title_ar" type="text" value="qwdqwd">
	            </div> -->
	            <!-- <div class="form-group">
	                <label>Website Title <small>eqwdqwdqw</small></label>
                	<select name="group_id" id="country_id" class="form-control c-select">
			            <option value="">sadas </option>
			            <option value="">sadas </option>
			            <option value="">sadas </option>
			            <option value="">sadas </option>
			        </select>
	            </div> -->
	            
            </div>
        </div>
            <div class="col-sm-9 v-m h2 _300">
                <div class="p-l-xs">
                </div>
            </div>
        </div>
    </div>
    {{Form::close()}}
</div>