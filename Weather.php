<?php

use GuzzleHttp\Client;

class Weather
{
    protected $token = "4ad153b6d8e068bcd4157e0896617a3a";

    public function getWeather($latitude, $longitude)
    {
        $url = "api.openweathermap.org/data/2.5/weather";
        $params = [];
        $params['lat'] = $latitude;
        $params['lon'] = $longitude;
        $params['APPID'] = $this->token;
        $url.= '?' . http_build_query($params);

        $client = new Client([
            'base_uri' => $url
        ]);

        $result = $client->request('GET');
        return json_decode($result->getBody());
    }
}