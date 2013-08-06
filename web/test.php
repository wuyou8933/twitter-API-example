<div id="verify_credentials">
  <h2>Verify Credentials</h2>
<?php
$code = $tmhOAuth->user_request(array(
      'url' => $tmhOAuth->url('1.1/friends/list'),
      'params' => array(
    'screen_name' => $data['screen_name']
      )
    ));
    if ($code == 200)
      $J = json_decode($tmhOAuth->response['response']);
      //echo print_r($J);
      $i=0;
while($i<sizeof($J->users))
{
    echo print_r($J->users[$i]->screen_name);
    $i++;
}
?>
</div>
