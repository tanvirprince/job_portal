@if(Auth::guard('company')->check())
<h3 class="seekertxt">{{__('One million success stories')}}. <span>{{__('Search Jobseekers Today')}}.</span></h3>
<form action="{{route('job.seeker.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox seekersrch">		
		<div class="input-group">
		  <input type="text"  name="search" id="empsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or Job Seeker Details')}}" autocomplete="off" />
		  <span class="input-group-btn">
			<input type="submit" class="btn" value="{{__('Search Job Seeker')}}">
		  </span>
		</div>
		</div>
		
       
        
    </div>
</form>
@else
<h3>{{__('One million success stories')}}. <span>{{__('Start yours today')}}.</span></h3>
<form action="{{route('job.list')}}" method="get">
    <div class="searchbar">
		<div class="srchbox">
		
		<div class="row">
			<div class="col-lg-9 col-md-8">
				<label for=""> {{__('Keywords / Job Title')}}</label>
				<input type="text"  name="search" id="jbsearch" value="{{Request::get('search', '')}}" class="form-control" placeholder="{{__('Enter Skills or job title')}}" autocomplete="off" /></div>
			<div class="col-lg-3 col-md-4">
				<label for="">&nbsp;</label>
				<input type="submit" class="btn" value="{{__('Search Job')}}"></div>
		</div>
				
		<div class="srcsubfld additional_fields">
			<div class="row">
        <div class="col-lg-{{((bool)$siteSetting->country_specific_site)? 6:3}}">
			<label for="">{{__('Select Functional Area')}}</label>
            {!! Form::select('functional_area_id[]', ['' => __('Select Functional Area')]+$functionalAreas, Request::get('functional_area_id', null), array('class'=>'form-control', 'id'=>'functional_area_id')) !!}
        </div>

        @if((bool)$siteSetting->country_specific_site)
        {!! Form::hidden('country_id[]', Request::get('country_id[]', $siteSetting->default_country_id), array('id'=>'country_id')) !!}
        @else
        <div class="col-lg-3">
			<label for="">{{__('Select Country')}}</label>
            {!! Form::select('country_id[]', ['' => __('Select Country')]+$countries, Request::get('country_id', $siteSetting->default_country_id), array('class'=>'form-control', 'id'=>'country_id')) !!}
        </div>
        @endif

        <div class="col-lg-3">
			<label for="">{{__('Select State')}}</label>
            <span id="state_dd">
                {!! Form::select('state_id[]', ['' => __('Select State')], Request::get('state_id', null), array('class'=>'form-control', 'id'=>'state_id')) !!}
            </span>
        </div>
        <div class="col-lg-3">
			<label for="">{{__('Select City')}}</label>
            <span id="city_dd">
                {!! Form::select('city_id[]', ['' => __('Select City')], Request::get('city_id', null), array('class'=>'form-control', 'id'=>'city_id')) !!}
            </span>
        </div>
		</div>
		</div>	
			
			
			
		</div>
      
		
		
		
		
    </div>
</form>
@endif