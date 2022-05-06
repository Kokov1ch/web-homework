<?php
$users = array(
        'admin' => '123',
        'fedor' => 'fet',    
);
if (!isset($_COOKIE['username']) || ($_COOKIE['username']=='')){
?>
    <form  name = "authentication" method = "GET" action = "/">
    <input name="username" placeholder="username"/>
    <input name="password" placeholder="password"/>
    <input name = "btn" type = "submit" value = "Log in"/>
    <br> </br>
    <?php
    PrintMessages();
    }
else{
    $username = $_GET['username'];
    PrintMessages();
    ?>
    <form  name = "chat" method = "GET" action = "/send">
        <input name="message" placeholder="write smt"/>
        <input name = "send" type = "submit" value = "send"/>
</form>
<form action="/logout" method="GET">
<input type="submit" value="log out">
</form>
<?php
    if($_COOKIE['username']!='')
      echo 'authorized as ' . $_COOKIE['username'];
}
if ($_SERVER['REQUEST_URI'] == '/logout?'){
    setcookie('username', '');
    header('Location: http://62.113.100.182/');
}

if(isset($_GET['message']) && ($_GET['message']!='') && $_COOKIE['username']!='' && $_GET['send']){
    $message = $_GET['message'];
    AddMessage($_COOKIE['username'], $message);
    header('Location: http://62.113.100.182/');
}
if (isset($_GET["btn"] )&& isset($_GET['username'])&& isset($_GET['password'])) {
    if (array_key_exists($_GET['username'], $users) && in_array($_GET['password'],$users)){
        $username = $_GET['username'];
        $password = $_GET['password'];
        setcookie('username', $username, time() + 120);
        header('Location: http://62.113.100.182/');
    } else {
        echo "authentication error";
    }
}
function AddMessage($username, $message){
    if ($message != ''){
    $db = json_decode(file_get_contents("messages.json"));
    $info = (object) ['date'=>time()+ 60*60*10, 'username' => $username, 'message' => $message];
    $db->messages[] = $info;
    file_put_contents("messages.json", json_encode($db));
    }
    else
        echo 'Ur message is empty';
}
function PrintMessages(){
    $db = json_decode(file_get_contents("messages.json"));
    foreach($db->messages as $it){
        echo date('m/d/Y H:i:s', $it->date) . ' ' . $it->user . ' ' . $it->message;
        ?>
        <br></br>
        <?php
        }
}
