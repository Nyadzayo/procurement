<?php
require_once 'core/init.php';

if (Session::exists('home')){
    //echo '<p>'.Session::flash('home').'</p>';
}
//echo  Session::get(Config::get('session/session_name'));
$user = new User();
if ($user->isLoggedIn()){




    ?>
    <p >Hello <a href="profile.php?user=<?php echo escape($user->data()->name);?> " ><?php echo escape($user->data()->name);?>!</a> </p>
    <ul>
        <li>
            <a href="logout.php"> Logout</a>
        </li>
        <li>
            <a href="update.php"> Update Details</a>
        </li>
        <li>
            <a href="changepassword.php"> Change password</a>
        </li>
        <li>
            <a href="intenalrequest.php"> Create Request</a>
        </li>
    </ul>
    <?php
    if ($user->hasPermission('admin')){
       $ir = new IR();
       // var_dump($ir->state(5));
        //echo $ir->statecolor($ir->state(5));
       // $ir->recommend(5);
        foreach ( $ir->all() as $value){
           echo $value->id,' ',$value->product_name, '<br>';
        }
    }
}else{
    echo '<p>You need to <a href="login.php">Log in</a></p>';
}

