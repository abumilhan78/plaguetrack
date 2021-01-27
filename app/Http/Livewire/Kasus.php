<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Subdistrict;
use App\Models\Rw;
use App\Models\Track;

class Kasus extends Component
{
	public $provinces;
	public $cities;
	public $districts;
	public $subDistricts;
	public $rws;
	public $tracks;
	public $track_id;

	public $selectedProv = null;
	public $selectedCity = null;
	public $selectedDist = null;
	public $selectedSubDist = null;
	public $selectedRw = null;

	public function mount($selectedRw = null, $track_id = null)
	{
		if (!is_null($track_id)) {
			$this->tracks = Track::findOrFail($track_id);
		}

		$this->provinces = Province::all();
		$this->selectedRw = $selectedRw;
		
		$this->track_id = $track_id;

		if (!is_null($selectedRw)) {
			$rw = Rw::with('subdist.district.city.province')->find($selectedRw);
			if ($rw) {
				$this->rws = Rw::where('subdist_id', $rw->subdist_id)->get();
				$this->subDistricts = Subdistrict::where('dist_id', $rw->subdist->dist_id)->get();
				$this->districts = District::where('city_id', $rw->subdist->district->city_id)->get();
				$this->cities = City::where('prov_id', $rw->subdist->district->city->prov_id)->get();

				$this->selectedProv =$rw->subdist->district->city->prov_id;
                $this->selectedCity = $rw->subdist->district->city_id;
                $this->selectedDist = $rw->subdist->dist_id;
                $this->selectedSubDist = $rw->subdist_id;
			}
		}
	}

    public function render()
    { 
        return view('livewire.kasus');
    }

    public function updatedSelectedProv($prov)
    {
    	$this->cities = City::where('prov_id', $prov)->get();
    	$this->selectedCity = null;
    	$this->selectedDist = null;
    	$this->selectedSubDist = null;
    	$this->selectedRw = null;
    }

    public function updatedSelectedCity($city)
    {
        $this->districts = District::where('city_id', $city)->get();
        $this->selectedDist = null;
        $this->selectedSubDist = null;
        $this->selectedRw = null;
    }

    public function updatedSelectedDist($dist)
    {
    	$this->subDistricts = Subdistrict::where('dist_id', $dist)->get();
    	$this->selectedRw = null;
    }

    public function updatedSelectedSubDist($subdist)
    {
    	if (!is_null($subdist)) {
    		$this->rws = RW::where('subdist_id', $subdist)->get();
    	}else {
    		$this->rws = null;
    	}
    }
}
