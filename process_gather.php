<?php
// Tutaj przez $_REQUEST['id'] mozemy pobrac id usera
// page located at http://example.com/process_gather.php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
$digits = intval($_REQUEST['Digits']);
if($digits==0)
{
  echo "<Response><Say>You entered" . $_REQUEST['Digits'] . ". You dont want to go</Say></Response>";
}
else
{
  // user sie zgadza chcemy do bazy
  // zmienna $_REQUEST['id'] -> fb id usera
  // zmienna $_REQUEST['Digits'] -> jesli dodatni, user sie zgadza, jesli 0, user sie nie zgadza
  echo "<Response><Say>You want to go</Say></Response>";
}
?>
