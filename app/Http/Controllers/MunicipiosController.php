<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class MunicipiosController extends Controller {

	public function index()
	{
		$client = new Client([
			'base_uri' => 'https://api.salud.gob.sv/',
			'timeout'  => 500
		]);
		$response = $client->request('GET', 'municipios',
			[
				'headers' => [
					'Accept'     => 'application/json'
				]
			]
		);
		$municipios = json_decode($response->getBody()->getContents());
		return view('municipios.index', compact('municipios'));
	}
}
