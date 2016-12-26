<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>IDMStory - Um novo começo</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700">
        <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <?php
          $check = filter_input(INPUT_GET,'p');
          if(!$check || $check == 'index'){
              echo '<link rel="stylesheet" href="assets/css/idmstory.min.css">';
          }else{
              echo '<link rel="stylesheet" href="assets/css/goodgames.min.css">';
          }
        ?>
        <link rel="stylesheet" href="assets/css/main.css" type="text/css" />
    </head>
    <body>
