<?php
require_once 'core/init.php';
require_once 'docs/header.php';

    $ir = new IR();


?>

<div class="row">
    <div class="col-lg-3">
        <?php
            require_once 'dash.php';
            // getting id of a specific form



            $id = $_GET['id'];
            if (Input::exists()){
                $ir->recommend(Input::get('recommend'));

            }


        ?>

    </div>
    <div class="col-lg-9">
        <?php
        if ($ir->find($id)){
           $value=  $ir->data();
           $reason = '  <div class="col-md-12">
                                    <div class="form-group mb-0">
                                    <label class="form-label">Add Reason Recommend </label>
                                    <textarea rows="5" class="form-control" placeholder="Here can be your description" value="Mike">

                                    </textarea>
                                    </div>
                                    </div>';
            $action ='<button href="viewRequest.php?recommend='.$value->id.'" value="'.$value->id.'" type="submit" name="recommend" id="recommend" class="btn btn-outline-success">recommend</button>
                    <input type="submit" value="reject" href="home.php" class="btn btn-outline-danger ">';




         echo $request= '   <form class="card" method="post" action="">
                <div class="card-body">
                    <h3 class="card-title">Enter the required details</h3>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Product Name</label>
                                <input type="text" class="form-control" disabled placeholder="'.$value->product_name.' " name="product_name" id="product_name">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="form-group">
                                <label class="form-label">Quantity</label>
                                <input type="text" class="form-control" disabled placeholder="'.$value->quantity.'" name="quantity" id="quantity">
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                            <div class="form-group">
                                <label class="form-label">Location/Department</label>
                                <input type="email"  class="form-control" disabled placeholder="'.$value->department.'">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group mb-0">
                                <label class="form-label">Description</label>
                                <textarea rows="5" class="form-control" disabled >'.$value->description.'
                                </textarea>
                            </div>
                        </div>
                            '.(((new User())->data()->groups==2)?$reason:"" ).'
                    </div>
                </div>
                <div class="card-footer text-right">
                    '.(((new User())->data()->groups>1)?$action:"" ).'
                    
                    <a  href="home.php" class="btn btn-outline-blue">Close</a>
                </div>
            </form>

';}?>
    </div>

</div>

<?php
require_once 'docs/footer.php';
?>
