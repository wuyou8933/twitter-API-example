<div id="verify_credentials">
  <h2>Verify Credentials</h2>
<?php

$code = $tmhOAuth->user_request(array(
  'url' => $tmhOAuth->url('1.1/account/verify_credentials')
));

if ($code == 200) :
  $data = json_decode($tmhOAuth->response['response'], true);

  if (isset($data['status'])) {
    $code = $tmhOAuth->user_request(array(
      'url' => $tmhOAuth->url('1.1/friends/list'),
      'params' => array(
    'screen_name' => $data['screen_name']
      )
    ));

    if ($code == 200)
      $J = json_decode($tmhOAuth->response['response'], true);
//print_r($J);

  }
?>
  <p>Hello, @<?php $i=0;
//print_r($J->users[0]->screen_name);
while($i<sizeof($J->users))
{
    echo print_r($J->users[$i]->screen_name,true);
    $i++;
}
   ?>.</p>
<?php else : ?>
  <h3>Something went wrong</h3>
  <p><?php echo $tmhOAuth->response['error'] ?></p>
<?php endif; ?>
</div>