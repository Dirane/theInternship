<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom\Custom;
use App\Address;
use App\Company;
use App\Media;

class CompanyController extends Controller
{

    //protected all functions of this controller with the auth middleware
    // id all users acessing methods of this class should be loggedin
    public function __constructor(Request $request)
    {
        $this->middleware('auth');
    }




    public function index(){
    	 return view('new-company-wizard.new-company');
    	 
    }

    //create a new company 
    public function new(Request $request)
    {
        $this->validate($request, [
            'telephone' => 'required|integer',
            'email' => 'required|email',
            'country_id' => 'required|integer',
            'state_id' => 'required|integer',
            'city_id' => 'required|integer',
            'name' => 'required|string',
            'description' => 'required|string',
            'website' => 'url',
            'duration' => 'integer',
            'application_period' => 'string',
            'intern_number' => 'integer',
            'longitude' => 'numeric',
            'latitude' => 'numeric',
            'internship_reward' => 'string',
            'category_id' => 'integer',

        ]);


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
    public function media(Request $request)
    {
    	$application_type = null;
    	return view('mediaForm')->with('application_type', $application_type)->with('company_id', 1);
    }
    //save the media object for the form above to a particular company you are applying for
    public function storeMedia(Request $request)
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
