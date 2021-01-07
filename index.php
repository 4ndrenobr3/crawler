<?php
require_once __DIR__ . './vendor/autoload.php';

use App\Crawler;

$crawler = new Crawler();
echo $crawler->index('Hi Lorena!');
