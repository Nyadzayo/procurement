<?php

require_once 'core/init.php';

$validation = NULL;


//if (Session::exists('home')){
//
//}



$user = new User();

if (Input::exists()) {


    if (Token::check(Input::get('token'))) {

        $request = new IR();
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'product_name' => array(
                'required' => true,
                'min' => 2,
                'max' => 20,
            ),
            'quantity' => array(
                'required' => true,
                'max' => 20
            ),
            'description' => array(
                'required' => true,
                'min' => 2,
                'max' => 500
            ),
            'department' => array(
                'required' => true,

            )

        ));

        if ($validation->passed()) {
            // create internal request

            try {



                $request->create(array(
                    'product_name' => Input::get('product_name'),
                    'quantity' => Input::get('quantity'),
                    'description' => Input::get('description'),
                    'created_date' => Input::get('created_date'),
                    'state' => $user->data()->groups,
                    'from_id' => $user->data()->id,
                    'to_id' => DB::getInstance()->conditionaction('SELECT*','ir_application_state',array('state','=',($user->data()->groups+1)),'AND',array('location_code','=',$user->data()->department))->first()->user_id,
                    'department' => Input::get('department')


                ));
                Session::flash('home', '');
                Redirect::to('home.php');

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        } else {


        }

    }}

    ?>
<?php
require_once 'docs/header.php';
?>
    <div class="row">
        <div class="col-lg-3">
            <?php
            require_once 'dash.php';
            ?>

        </div>
        <div class="col-lg-9">


            <form class="card" action="" method="post">
                <div class="card-body">
                    <?php if ($validation){
                        foreach ($validation->errors() as $value){
                            echo '<h5 style="color: red">'.$value.'</h5><br>';
                        }
                    } ?>
                    <h3 class="card-title">Enter the required details</h3>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name" id="product_name" class="form-control"
                                       placeholder="product_name" name="product_name" id="product_name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Quantity</label>
                                <input type="text" name="quantity" id="quantity" class="form-control"
                                       placeholder="Quantity" name="quantity" id="quantity">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Location/Department</label>
                                <input type="text" class="form-control"  value="<?php echo $user->data()->department ;?>">
                                <input type="hidden" name="department" id="department" value="<?php echo $user->data()->department ;?>">
                            </div>
                        </div>
                        <?php date_default_timezone_set('Africa/Harare') ?>
                        <input type="hidden" name="created_date" id="created_date"
                               value="<?php echo (new DateTime())->format('Y-m-d') ?>">

                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Description</label>
                                <textarea rows="5" class="form-control" id="description" name="description"
                                          placeholder="Here can be your description" value="Mike">

                                </textarea>
                            </div>
                        </div>
                        <?php
                        if ((new User())->data()->groups===2) {
                            ?>
                            <div class="col-md-12">
                                <div class="form-group mb-0">
                                    <label class="form-label">Add Reason Recommend </label>
                                    <textarea rows="5" class="form-control" name="reason" id="reason"
                                              placeholder="Here can be your description" value="Mike">

                                    </textarea>
                                </div>
                            </div>

                        <?php } ?>


                    </div>
                </div>
                <div class="card-footer text-right">
                    <input type="hidden" name="token" value=" <?php echo Token::generate(); ?>">
                    <input type="submit" class="btn-outline-success" value="Submit">
                </div>
            </form>


        </div>

    </div>

    <?php

require_once 'docs/footer.php';
?>
