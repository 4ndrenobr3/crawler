<?php
namespace App;

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler as DomCrawler;

class Crawler
{
    public function index()
    {
        $client    = new Client();
        $response  = $client->get('https://www.carrosnaserra.com.br/capa');
        $html      = $response->getBody()->getContents();

        $crawler   = new DomCrawler($html);

        $data = $crawler->filter('div[class="box-estoque-capas-normal"]')->each(function ($contentContainer) {

            $Title = $contentContainer->filter('span[class="modelo-capas"]')->text();
            $brand = $contentContainer->filter('span[class="marca-ano-capas"]')->text();
            $year  = $contentContainer->filter('span[class="anos-capas"]')->text();
            $price = $contentContainer->filter('span[class="valor-capas"]')->text();
            $photo = $contentContainer->filter('a')->link();

            return [
                'title' => $Title,
                'brand' => $brand,
                'year'  => $year,
                'price' => $price,
                'photo' => $photo
            ];
        });

        var_dump($data);
    }
}
