<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Tom.php";
    date_default_timezone_set('America/Los_Angeles');

    session_start();

    // if(empty($_SESSION['tomCookie'])) {
    //     $_SESSION['tomCookie'] = array();
    // }

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        $_SESSION['tomCookie'] = "";
        return $app['twig']->render('home.html.twig', array('tom'=> Tom::getAll()));

    });
    $app->post("/tom", function() use ($app) {
        $new_tom = new Tom($_POST['input_name']);
        $new_tom->save();
        return $app['twig']->render('tom.html.twig', array('tom' => $new_tom));
    });
    $app->post("/start", function() use ($app) {
        echo "else ran";
        $new_tom = $_SESSION['tomCookie'];
        $new_tom->save();
        return $app['twig']->render('tom.html.twig', array('tom' => $new_tom));
    });


// https://userscontent2.emaze.com/images/8344def1-ff81-44b7-83ef-cf328f0d8e78/0dbea3cfa690f0dbf0c9cf3ac62576da.png

      $app->post("/feed", function() use ($app) {
          $new_tom = $_SESSION['tomCookie'];
          $new_tom->setSatiety(-10);
          $new_tom->save();
          return $app['twig']->render('tom.html.twig', array('tom' => $new_tom));
      });
      $app->post("/rest", function() use ($app) {
          $new_tom = $_SESSION['tomCookie'];
          $new_tom->setRest(40);
          $new_tom->save();
          return $app['twig']->render('tom.html.twig', array('tom' => $new_tom));
      });
      $app->post("/attention", function() use ($app) {
          $new_tom = $_SESSION['tomCookie'];
          $new_tom->setAttention(40);
          $new_tom->save();
          return $app['twig']->render('tom.html.twig', array('tom' => $new_tom));
      });




    return $app;
?>
