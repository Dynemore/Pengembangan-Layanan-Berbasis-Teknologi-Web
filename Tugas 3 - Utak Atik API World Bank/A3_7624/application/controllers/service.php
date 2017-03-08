<?php

//require APPPATH.'/libraries/REST_Controller.php';
//class Engine extends REST_Controller
class Service extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Load the rest client spark
		$this->load->spark('restclient/2.1.0');

		// Load the library
		$this->load->library('rest');

		// Run some setup
		$this->rest->initialize(array('server' => 'http://'));
		$this->load->helper('url');

	}

	function get_country_data()
	{

	    // deklarasi variabel untuk menampung data array hasil akses REST API
		$countries = array();

     	// deklarasi variabel untuk menampung data field array
		$country_data['id'] = "";
		$country_data['name'] = "";
		$country_data['region'] = "";
		$country_data['capital_city'] = "";
		$country_data['longitude'] = "";
		$country_data['latitude'] = "";

		$country_data["incomeLevel_id"] = "";
		$country_data["incomeLevel_value"]="";
		$country_data["lendingType_id"] = "";
		$country_data["lendingType_value"] = "";

		$country_data["currency"] = "";
		$country_data["currencyName"] = "";


		// akses REST API
		$result = $this->rest->get('api.worldbank.org/countries/?per_page=350&format=json');
		$resultCurr = $this->rest->get('restcountries.eu/rest/v2/all');

		// kode program pada bagian ini sangat tergantung keluaran JSON dari API yang kita gunakan
		// jika keluaran JSO dari API-nya ternyata string maka harus di decode terlebih dahulu dengan perintah json_decode()
		// pemrosesan data-nya juga sangat tergantung dari struktur JSON-nya, Anda bisa mengecek melalui http://jsonviewer.stack.hu/
		// Anda harus banyak bereksperimen pada bagian ini, silahkan gunakan echo atau var_dump() untuk memastikan isi dari setiap variabel
		foreach($result as $result_object)
		{
			foreach ($result_object as $key=>$value)
			{
				if(!($key==="page" || $key==="pages" || $key==="per_page" || $key==="total"))
				{
					foreach($value as $attribute=>$attribute_value)
					{
						//echo ($attribute. "\n");
						if ($attribute =='id')
						{
							$country_data['id']= $attribute_value;
							foreach($resultCurr as $resultCurr_object=>$xvalue){
								if($xvalue->alpha3Code == $attribute_value){
										$country_data["currency"]=$xvalue->currencies['0']->code;
										$country_data["currencyName"]=$xvalue->currencies['0']->name;
										$country_data["currencySymbol"]=$xvalue->currencies['0']->symbol;
								}
							}

						}
						if ($attribute =='name')
						{
							$country_data['name']= $attribute_value;
						}
						if ($attribute =='region')
						{
							$country_data['region']= $attribute_value->value;
						}
						if ($attribute =='capitalCity')
						{
							$country_data['capital_city']= $attribute_value;
						}
						if ($attribute =='longitude')
						{
							$country_data['longitude']= $attribute_value;
						}
						if ($attribute =='latitude')
						{
							$country_data['latitude']= $attribute_value;
						}
						if($attribute == 'incomeLevel'){
							$country_data['incomeLevel_id']=$attribute_value->id;
							$country_data['incomeLevel_value']=$attribute_value->value;
						}
						if($attribute == 'lendingType'){
							$country_data['lendingType_id']=$attribute_value->id;
							$country_data['lendingType_value']=$attribute_value->value;
						}
					}
					array_push($countries,$country_data);
				}
			}

		}
		return $countries;

	}
	function get_currency_data($idCurr){


		$rate_data['base'] = "";
		$rate_data['JPY']= "";
		$rate_data['EUR']= "";
		$rate_data['USD']= "";

		$resultRates = $this->rest->get('api.fixer.io/latest?base='.$idCurr);

			$rate_data['base'] = $resultRates->base;
			$rate_data['JPY']= number_format(1/$resultRates->rates->JPY,2);
			$rate_data['EUR']= number_format(1/$resultRates->rates->EUR,2);
			$rate_data['USD']= number_format(1/$resultRates->rates->USD,2);


		return $rate_data;

}

	function index()
	{
		$data['countries'] = $this->get_country_data();
		$this->load->view('result_viewer',$data);
	}

	function detail()
	{
		$idnegara = $this->uri->segment('3');
		$countries = $this->get_country_data();


		foreach ($countries as $country => $country_value) {
			if ($country_value['id'] == $idnegara) {
				$data['countries']=$country_value;
				$data['rate_data'] = $this->get_currency_data($country_value['currency']);

			}
		}

		//$data['countries'] = $this->get_country_data();
		$this->load->view('result_currency',$data);
	}

}
