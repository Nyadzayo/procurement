<?php
require_once  'core/init.php';

if (Input::exists()){
    if (Token::check(Input::get('token'))){
        $user = new User();
        $request = new IR();
        $validate = new Validate();
        $validation = $validate->check($_POST,array(
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
            'created_date' => array(
                'required' => true,
                'min' => 2,
                'max' => 20
            ),
            'department' => array(
                'required' => true,
                'min' => 2,
                'max' => 20
            ),

        ));

        if ($validation->passed()){
            // create internal request

            try{

                $request->create(array(
                    'product_name'=>Input::get('product_name'),
                    'quantity'=>Input::get('quantity'),
                    'description'=>Input::get('description'),
                    'created_date'=>Input::get('created_date'),
                    'state'=>1,
                    'from_id'=>$user->data()->id,
                    'to_id'=>2,
                    'department'=>Input::get('department'),
                    'status'=>'pending'
                ));
               // Session::flash('home','success in creating the ir');
                Redirect::to('index.php');


            }catch (Exception $e){
                echo $e->getMessage();
            }

        }else{
            foreach ($validation->errors() as $error) {
                echo $error, '<br> ';
            }
        }
    }
}

?>
<form action="" method="post">
    <div class="field">
        <label for="product_name">Product Name</label>
        <input type="text" name="product_name" id="product_name">

    </div>
    <div class="field">
        <label for="description">Description</label>
        <textarea name="description" id="description" rows="2" cols="30"></textarea>

    </div>
    <div class="field">
        <label for="quantity">Quantity</label>
        <input type="text" name="quantity" id="quantity">

    </div>
    <div class="field">
        <label for="created_date">Date</label>
        <input type="date" name="created_date" id="created_date">

    </div>
    <div class="field">
        <label for="department">Department</label>
        <input type="text" name="department" id="department">

    </div>

        <input type="hidden" name="token" value=" <?php echo Token::generate(); ?>" >
        <input type="submit" value="Submit" >



</form>