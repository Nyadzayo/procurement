<?php
require_once 'core/init.php';
$user = new User();
if (!$username=Input::get('user')){
    Redirect::to('index.php');
}else{

    ?>
    <h4> user profile </h4>
    <h5 style="color: blue">Name: <?php echo $user->data()->name;?></h5>

    <ul>
        <li>
            <a href="#">edit</a>
        </li>
    </ul>

<?php
    $request = new IR();
    $users = new User();
    if (!$request->get()->error()){
       foreach ($request->get()->results() as $value){
            foreach ($value as $item){
                echo $item,' ';
            }
            echo '<br>';

       }

    }
   if ($users->hasPermission('admin')){
        //$irs =DB::getInstance()->get('internal_requisition',array('state','=',1));


        $ir = new IR();
        var_dump($ir);


   }
}