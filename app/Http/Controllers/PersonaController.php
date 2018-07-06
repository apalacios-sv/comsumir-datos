<?php namespace App\Http\Controllers;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
class PersonaController extends Controller {

	public function index()
	{
		$client = new Client([
			'base_uri' => 'http://localhost/api-rest/public/',
			'timeout'  => 500
		]);
    if (!$client->get('persona')) {
           echo 'Que locura!';
              /*die('An error occurred: '.$client->getError());*/
          }

		$response = $client->request('GET', 'persona',
			[
				'headers' => [
					'Accept'     => 'application/json'
				]
			]
		);
		$datos = json_decode($response->getBody()->getContents());
		return view('personas.index', compact('datos'));
	}
}
