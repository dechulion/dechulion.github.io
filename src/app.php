<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->register(new Silex\Provider\SwiftmailerServiceProvider());

$app->register(new Silex\Provider\TwigServiceProvider(), array(
  'twig.path' => __DIR__.'/views'
));

$app->before(function () use ($app) {
  $app['twig']->addGlobal('layout', $app['twig']->loadTemplate('layout.twig'));
});

$app->get('/', function () use ($app) {
  return $app['twig']->render('index.html.twig');
});

$app->get('/projects', function () use ($app) {
  return $app['twig']->render('projects.html.twig');
});

// $app->get('/css', function () use ($app) {
//   return $app['twig']->render('css.html.twig');
// });

// $app->get('/php', function () use ($app) {
//   return $app['twig']->render('php.html.twig');
// });

return $app;
