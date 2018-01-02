<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Custom;
use App\Address;
use App\Company;
use App\Media;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class CompanyController extends Controller
{
    public $_locale;
    public function __construct(Request $request) 
    {
        $this->_locale = Session::get('applocale');

        if ($request->is('fr/*')) {
            $this->_locale = 'fr';
        }
        else if ($request->is('en/*')) {
            $this->_locale = 'en';
        }
        else{
            $this->_locale = 'en';
        }

        View::share('_locale', $this->_locale); //make the $_locale variable available on all views
    }
    //nolanguage param present
    public function index_nol()
    {
        return $this->index( 'en');
    }
    public function index($locale){
    	 return view('new-company-wizard.new-company');
    	 
    }

    //create a new company 
     //no language param 
    public function new_nol(Request $request)
    {
        return $this->new($request, 'en');
    }
    public function new(Request $request, $locale)
    {
		$address = Address::create([
		            'telephone'     => $request->telephone,
		            'email'    => $request->email,
		            'country_id' => $request->country_id,
		            'state_id' => $request->state_id,
		            'city_id' => $request->city_id,
		        ]);

    	$company = new Company();
    	// $address = new Address();
    	// $address->email = $request->email;
    	// $address->telephone = $request->telephone;
    	// $address->country = $request->country;
    	// $address->state = $request->state;
    	// $address->city =$request->city;



    	$addressSaved = $address->save();

    	$company->name = $request->name;
    	$company->description = $request->description;
    	$company->duration = $request->duration;
    	$company->website = $request->website;
    	$company->application_period = $request->application_period;
    	$company->intern_number = $request->intern_number;
    	$company->longitude = $request->longitude;
    	$company->latitude = $request->latitude;
    	$company->internship_reward = $request->internship_reward;
    	$company->address_id = $address->id;
    	$company->category_id = $request->category_id;

    	//upload the logo and extract the name
    	if(isset($request->logo) ){
    		$company->logo =  Custom::fileUpload($request->logo, 'uploads/company/logo', null, null);
    	}
    	if(isset($request->image)){
    		$company->image = Custom::fileUpload($request->image, 'uploads/company', null, config('settings.img_resize'));
    	}

    	$company->save();
    }

    //renders the form to create an application to a company after login
    public function media_nol(Request $request)
    {
        return $this->media($request, 'en');
    }
    public function media(Request $request, $locale='en')
    {
    	$application_type = null;
    	return view('mediaForm')->with('application_type', $application_type)->with('company_id', 1);
    }

    //save the media object for the form above to a particular company you are applying for
    public function storeMedia_nol(Request $request)
    {
        return $this->storeMedia($request, 'en');
    }
    public function storeMedia(Request $request, $locale='en')
    {
    	Custom::uploadCV($request->cv, 'uploads/company/letters', null);
    	$media = new Media();
    	$media->company_id = $request->company_id;
    	$media->application_type = $request->application_type;
    	$media->user_id = Auth::user()->id;
    	$media->multivation_letter = $request->multivation_letter;
    	$media->application_letter_text = $request->application_letter_text;

    	//extract the name and save in the dbase while sending the files to uploads folder
    	$media->cv = Custom::uploadCV($request->cv, 'uploads/company/letters', null);
    	$media->application_letter =Custom::uploadCV($request->application_letter, 'uploads/company/letters', null); 

    	$media->save();
    }
}
