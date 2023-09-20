<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CardController extends Controller
{
    public function consumirAPI(){
        // Crear una instancia de Client de Guzzle
        $client = new Client();

        try {
            // Hacer una solicitud GET a la API
            $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon/pikachu');

            // Obtener el cuerpo de la respuesta
            $body = $response->getBody()->getContents();

            // Decodificar la respuesta JSON (si es JSON)
            $data = json_decode($body, true);

            // Manejar los datos recibidos
            // ...

            // Retornar los datos o hacer algo con ellos
            return response()->json($data);
        } catch (\Exception $e) {
            // Manejar errores de solicitud
            return response()->json(['error' => 'Error al obtener datos de la API: ' . $e->getMessage()], 500);
        }
    }

    public function checkDate($month,$year){
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8000/card/checkDate/'.$month.'/'.$year);

            $body = $response->getBody()->getContents();

            $data = json_decode($body, true);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener datos de la API: ' . $e->getMessage()], 500);
        }
    }

    public function checkCard($pan){
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8000/card/checkCard/'.$pan);

            $body = $response->getBody()->getContents();

            $data = json_decode($body, true);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener datos de la API: ' . $e->getMessage()], 500);
        }
    }

    public function checkCVV($pan,$cvv){
        $client = new Client();

        try {
            $response = $client->request('GET', 'http://localhost:8000/card/checkCVV/'.$pan.'/'.$cvv);

            $body = $response->getBody()->getContents();

            $data = json_decode($body, true);
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al obtener datos de la API: ' . $e->getMessage()], 500);
        }
    }

    public function checkAll(){
        
    }

}
