<?php
  require '../vendor/autoload.php';

  $options = array(
    'cluster' => 'eu',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    'c2d5c567da85f92e033e',
    '598f1207e3b129493673',
    '1410197',
    $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('username', 'notifications', $data);
?>