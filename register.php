<?php
require_once 'core/init.php';



//check if form is posted
if (Input::exists()) {
    if(Token::check(Input::get('token'))) {

        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' => array(
                'required' => true,
                'min' => 6,

            ),
            'password_again' => array(
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'required' => true,
                'min' => 2,
                'max' => 50
            )

        ));
        if ($validation->passed()) {
            //register user
            $user = new User();
            $salt = Hash::salt(32);


            try{
                $user->create(array(
                        'username'=>Input::get('username'),
                        'password'=>Hash::make(Input::get('password'),$salt),
                        'salt'=>$salt,
                        'name'=>Input::get('name'),
                        'joined'=>date('Y-m-d H:i:s'),
                        'groups'=>1,
                        'department'=>Input::get('department')
                ));
                Session::flash('home','you have been registered');
                Redirect::to('login.php');

            }catch (Exception $e){
                die($e->getMessage());
            }
        } else {
            //output user
            foreach ($validation->errors() as $error) {
                echo $error, '<br> ';
            }
        }

    }
}
?>


<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>Register - tabler.github.io - a responsive, flat and full featured admin template</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="./assets/js/require.min.js"></script>
    <script>
        requirejs.config({
            baseUrl: '.'
        });
    </script>
    <!-- Dashboard Core -->
    <link href="./assets/css/dashboard.css" rel="stylesheet" />
    <script src="./assets/js/dashboard.js"></script>
    <!-- c3.js Charts Plugin -->
    <link href="./assets/plugins/charts-c3/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/charts-c3/plugin.js"></script>
    <!-- Google Maps Plugin -->
    <link href="./assets/plugins/maps-google/plugin.css" rel="stylesheet" />
    <script src="./assets/plugins/maps-google/plugin.js"></script>
    <!-- Input Mask Plugin -->
    <script src="./assets/plugins/input-mask/plugin.js"></script>
</head>
<body class="">
<div class="page">
    <div class="page-single">
        <div class="container">
            <div class="row">
                <div class="col col-login mx-auto">
                    <div class="text-center mb-6">
                        <img src="./assets/brand/tabler.svg" class="h-6" alt="">
                    </div>
                    <form class="card" action="" method="post">
                        <div class="card-body p-6">
                            <div class="card-title">Create new account</div>
                            <div class="form-group">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo escape(Input::get('username'));?>" autocomplete="off" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Choose Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Choose a password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Repeat your Password </label>
                                <input type="password"  value="" name="password_again" id="password_again" class="form-control" placeholder="Repeat your password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <input type="text" value="<?php echo escape(Input::get('name'));?>" name="name" id="name" class="form-control" placeholder="Enter Your Fullname">
                            </div>
                            <div class="form-group">
                                <select class="form-control" id="department" name="department">
                                    <?php

                                    $departments = DB::getInstance()->get('hq_departments',array('department_id','>',0))->results();
                                    foreach ($departments as $department) {
                                        echo ' <option  value="' . $department->department_id . '">' . $department->department_name. '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" />
                                    <span class="custom-control-label">Agree the <a href="terms.html">terms and policy</a></span>
                                </label>
                            </div>

                            <div class="form-footer">
                                <input type="hidden" name="token" value=" <?php echo Token::generate();?>">

                                <input type="submit" value="Create new account"  class="btn btn-primary btn-block">
                            </div>
                        </div>
                    </form>
                    <div class="text-center text-muted">
                        Already have account? <a href="login.php">Sign in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>