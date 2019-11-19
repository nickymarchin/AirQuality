<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Air extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');

	}

	public function getCityAQI()
	{
		$city_name = $this->input->post('city');
		$country_name = $this->input->post('country');
		$state_name = $this->input->post('state');

		$url = str_replace(' ', '%20', 'http://api.airvisual.com/v2/city?city=' . $city_name .
			'&state=' . $state_name . '&country=' . $country_name . '&key=10f1d96a-f8d1-4d1a-bd75-8fbd21b32228');

		$json_data = @file_get_contents($url);

		if ($json_data === FALSE) {
			$this->session->set_flashdata('not_found', 'City cannot be found!');
			redirect('/#service');
		}

		$api_info = json_decode($json_data, true);

		$aqi = intval($api_info['data']['current']['pollution']['aqius']);
		$data['coordinates'] = $api_info['data']['location']['coordinates'];
		$data['city'] = $city_name;
		$data['country'] = $country_name;
		$data['aqi'] = $aqi;
		$data['temperature'] = $api_info['data']['current']['weather']['tp'];
		$data['pressure'] = $api_info['data']['current']['weather']['pr'];
		$data['humidity'] = $api_info['data']['current']['weather']['hu'];
		$data['wind_speed'] = floatval($api_info['data']['current']['weather']['ws']) * 3.6;

		if ($aqi <= 50) {
			$data['color'] = '#c6ffb3';
		} else if ($aqi > 50 && $aqi <= 100) {
			$data['color'] = '#ffffb3';
		} else if ($aqi > 100 && $aqi <= 150) {
			$data['color'] = '#ffd699';
		} else if ($aqi > 150 && $aqi <= 300) {
			$data['color'] = '#ffc2b3';
		} else {
			$data['color'] = '#e6ccff';
		}

		if ($api_info !== null) {
			$this->load->view('results', $data);
		} else {
			$this->session->set_flashdata('not_found', 'City cannot be found!');
		}
	}

}
