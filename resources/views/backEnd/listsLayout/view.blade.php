<div class="padding">
    {{Form::open(['route'=>['updateCustomSettings'],'method'=>'POST', 'files' => true ])}}
    <input type="hidden" name="redirectTo" value="listsLayout">
    
    <div class="box">
        <button type="submit" class="btn btn-info m-a pull-right">Save Changes</button>
    	<div class="p-a-md dker">
            <h5>General Settings</h5>
        </div>

        <div class="row p-a">
            <div class="col-sm-12">
                
	            <div class="form-group">
	                <label>Transition type</label>
                	<select name="sett1" id="country_id" class="form-control c-select">
			            <option value="1" {{$data->sett1=='1'?'selected':''}}>Type 1</option>
			            <option value="2" {{$data->sett1=='2'?'selected':''}}>Type 2</option>
			            <option value="3" {{$data->sett1=='3'?'selected':''}}>Type 3</option>
			            <option value="4" {{$data->sett1=='4'?'selected':''}}>Type 4</option>
			        </select>
	            </div>
	            <div class="form-group">
                    <label>Automatic color from image</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett2" type="radio" value="1" {{$data->sett2=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Enable
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett2" type="radio" value="0" {{$data->sett2=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            Disable
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Show automatic progress bar of slides that slides automatically if not clicked</label>
                    <div class="radio">
                        <label class="ui-check ui-check-md">
                            <input id="style_header1" class="has-value" name="sett3" type="radio" value="1" {{$data->sett3=='1'?'checked':''}}>
                            <i class="dark-white"></i>
                            Enable
                        </label>
                        &nbsp; &nbsp;
                        <label class="ui-check ui-check-md">
                            <input id="style_header2" class="has-value" name="sett3" type="radio" value="0" {{$data->sett3=='0'?'checked':''}}>
                            <i class="dark-white"></i>
                            Disable
                        </label>
                    </div>
                </div>
	            
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