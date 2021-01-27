<div class="card-body">
	<div class="form-group" >
		<label>Provinsi</label>
		<select class="form-control select2bs4" wire:model="selectedProv" style="width: 100%;">
			<option value="" selected>pilih provinsi</option>
		 	@foreach($provinces as $prov)
		 		<option value="{{$prov->id}}">{{$prov->prov_name}}</option>
		 	@endforeach
		</select>
	</div> 
    @if (!is_null($selectedProv))
	<div class="form-group">
		<label>Kota/Kabupaten</label>
		<select class="form-control" wire:model="selectedCity" >
			<option value="" selected>pilih kota</option>
			@foreach($cities as $city)
				<option value="{{$city->id}}">{{$city->city_name}}</option>
			@endforeach
		</select>
	</div>
	@endif

    @if (!is_null($selectedCity))
	<div class="form-group">
		<label>Kecamatan</label>
		<select class="form-control" wire:model="selectedDist">
			<option value="" selected>pilih kecamatan</option>
			@foreach($districts as $dist)
				<option value="{{$dist->id}}">{{$dist->dist_name}}</option>
			@endforeach
		</select>
	</div>
	@endif

    @if (!is_null($selectedDist))
	<div class="form-group">
		<label>Kelurahan/Desa</label>
		<select class="form-control" wire:model="selectedSubDist">
			<option value="" selected>pilih kelurahan</option>
			@foreach($subDistricts as $subdist)
				<option value="{{$subdist->id}}">{{$subdist->subdist_name}}</option>
			@endforeach
		</select>
	</div>
	@endif


    @if (!is_null($selectedSubDist))
	<div class="form-group">
		<label>RW</label>
		<select class="form-control" wire:model="selectedRw" name="rw_id">
			<option value="" selected>pilih rw</option>
			@foreach($rws as $rw)
				<option value="{{$rw->id}}">{{$rw->rw_name}}</option>
			@endforeach
		</select>
	</div>
	@endif

	@if(!is_null($selectedRw))
	<div class="row">
		<div class="form-group col-3">
			<label>Positif</label>
			<input type="number" value="@if(isset($tracks)){{$tracks->positif}}@endif" class="form-control" name="positif">
		</div>
		<div class="form-group col-3">
			<label>Meninggal</label>
			<input type="number" value="@if(isset($tracks)){{$tracks->meninggal}}@endif" class="form-control" name="meninggal">
		</div>
		<div class="form-group col-3">
			<label>Sembuh</label>
			<input type="number" value="@if(isset($tracks)){{$tracks->sembuh}}@endif" class="form-control" name="sembuh">
		</div>
		<div class="form-group col-3">
			<label>Reaktif</label>
			<input type="number" value="@if(isset($tracks)){{$tracks->reaktif}}@endif" class="form-control" name="reaktif">
		</div>
	</div>
	<div class="form-group">
		<input type="submit" class="btn btn-outline-info btn-block" name="">
	</div>
	
	@endif

</div>
