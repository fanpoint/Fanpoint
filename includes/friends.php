<?php 

error_reporting(E_ERROR | E_WARNING | E_PARSE);
ini_set('display_errors', '1');

if(!$_REQUEST['access_token']) die('no at');
$facebook->setAccessToken($_REQUEST['access_token']);
$friends = $facebook->api('/me/friends?limit=50');

$creator = $facebook->getUser();
$date = isset($_POST['show_date']) ? '\''. $_POST['show_date'] . '\'' : 'NOW()';
$uri = isset($_POST['uri']) ? $_POST['uri'] : '';
$sql = "INSERT INTO `show` (shw_datetime, shw_creator_id, shw_film_uri) VALUES($date, $creator, '$uri');";
$db->query($sql);
?>

<?php foreach($friends['data'] as $friend):?>

    <div class="friend" id="friend_<?php echo $friend['id'] ?>">
        
        <img class="lazy" src="https://graph.facebook.com/<?php echo $friend['id'] ?>/picture"/>
        <p><?php echo $friend['name']?></p>
        <input type="checkbox" class="friend_select"/>
        <input type="hidden" value="<?php echo $friend['id']?>" name="fbuid"></input>
    </div>
<?php endforeach;?>
<div class="clear"></div>
<input type="submit" id="submit" value="ok"/>