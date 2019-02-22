<?php
require_once 'core/init.php';
$db = DB::getInstance();

$ir = new IR();
$user = new User();
echo $db->conditionaction('SELECT *','ir_application_state',array('state','=',2),'AND',array('location_code','=','hq115'))->first()->user_id;

var_dump($db);

//var_dump($departments = $db->get('hq_departments',array('department_id','=',$user->data()->department))->first());

if(isset($_POST["Export"])) {
    $ir->generatecsv('internal_requisition');

}
if (Input::exists()){
    echo Input::get('department');
    echo Input::get('user_role');
}
 //var_dump($db->get('internal_requisition',array('id','=',47))->results());
?>
<form action="" method="post">
    <select id="department" name="department">
        <?php

        $departments = $db->get('hq_departments',array('department_id','>',0))->results();
        foreach ($departments as $department) {
            echo ' <option  value="' . $department->department_id . '">' . $department->department_name. '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>
<form action="" method="post">
    <select id="user_role" name="user_role">
        <?php

        $users = $db->get('users',array('id','>',0))->results();
        foreach ($users as $user) {
            echo ' <option  value="' . $user->groups. '">' . $user->name. '</option>';
        }
        ?>
    </select>

    <input type="submit" value="Submit">
</form>
<form method="post" action="">
    <select id="user_group" name="user_group">
        <?php

        $groups = $db->get('groups',array('id','=',Input::get('user_role')))->results();
        foreach ($groups as $group) {
            echo ' <option  value="' . $group->id . '">' . $group->name. '</option>';
        }
        ?>
    </select>
    <input type="submit" value="Submit">
</form>


