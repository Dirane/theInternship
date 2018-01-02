<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\City;
use App\Country;
use App\Address;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class SearchController extends Controller
{

	//$_locale is for language translation on the url for search engines to discover that the site is myltilingual
    
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


	public function index(Request $request)
    {
        $countries = Country::get();
        return view('welcome')->with('countries', $countries);
    }

	public function search(Request $request)
	{
		$company = Company::get();
		// $company = Company::where('country_id', $request->country)->where('state_id', $request->state);

		/*Todo 
		* if country is not specified in the search string use the default browser location
		*/
		return view('search.result')->with('companies',$company);
		return $company;
	}

	public function searchDetails(Request $request, $company)
	{
		$company = Company::find($company);
		$address = $company->address()->first();
		$CompanyHasCategory = $company->CompanyHasCategory()->get();
		return view('search.searchdetails')->with('company', $company)
											->with('address', $address)
											->with('CompanyHasCategories', $CompanyHasCategory);
	}

}
