<?php

require_once __DIR__.'/../vendor/autoload.php';

$users = [
    'lorem',
    'ipsum',
    'foo',
    'bar',
    'baz',
];

$app = new Silex\Application();

$app->get('/hello/{name}', function($name) use($app) {

    return 'Hello '.$app->escape($name);

});

$app->get('/', function () {

  return <<<EOT

  <!DOCTYPE html>

  <html lang="fr">

    <head>

      <meta charset="utf-8">

      <link rel="stylesheet" type="text/css" href="theme.css">

      <title></title>

    </head>

    <body>

      <pre class="doc">

      GET /api/users/

      renvoit la liste des utilisateurs

      GET /api/users/{id}

      renvoit le détail dun utilisateur

      POST /api/users/

      ajoute un utilisateur

      PUT /api/users/{id}

      ajoute ou modifie un utilisateur

      DELETE /api/users/{id}

      supprime un utilisateur

      DELETE /api/users/

      supprime tout les utilisateurs

      </pre>

    </body>

  </html>

EOT;

});

$app->get('api/users/', function() use ($users){

  return json_encode($users);

});

$app->run();
