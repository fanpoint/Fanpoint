<?php
// tutaj mamy generacje wiadomosci. do id= mamy przyporzadkowane id usera z fb, i puszczamy wiadomosc. idziemy pozniej dalej do process_gather.php
echo "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
echo "<Response><Gather numDigits=\"1\" action=\"process_gather.php?id=" . $_REQUEST['id'] . "\" method=\"GET\"><Say>Your friend invited you to the cinema. Press 0 if you want to stay at home or any other number if you want to go</Say></Gather></Response>";
?>
