<?php


require_once 'core/init.php';

if (Session::exists('home')){
    //echo '<p>'.Session::flash('home').'</p>';
}
//echo  Session::get(Config::get('session/session_name'));
$user = new User();
if ($user->isLoggedIn()) {
    $_SESSION["id"] = 0;
    if (isset($_POST["Export"])) {
        $ir->generatecsv('internal_requisition');
    }

    ?>

    <?php require_once 'docs/header.php'; ?>
    <div class="row">
        <div class="col-lg-3">
            <?php
            require_once 'dash.php';
            ?>

        </div>

        <div class="col-lg-9">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Requisitions History</h3>
                    <div class="col-lg-3 ml-auto">
                        <form class="input-icon my-3 my-lg-0" class="form-horizontal" action="home.php" method="post">

                            <input type="search" id="myInput" class="form-control header-search"
                                   placeholder="Search&hellip;" tabindex="1">
                            <div class="input-icon-addon">
                                <i class="fe fe-search"></i>

                            </div>


                        </form>

                    </div>
                    <div class="col-lg-3 ml-auto">
                        <form class="form-horizontal" action="test.php" method="post" name="upload_excel"
                              enctype="multipart/form-data">
                            <div class="form-group">
                                <button type="submit" name='Export' class="btn btn-outline-success btn-sm"
                                        value="export to excel"><i class="fe fe-download"></i>Download CSV
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table card-table table-vcenter text-nowrap">
                        <thead>
                        <tr>
                            <th class="w-1">No.</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th>Status</th>

                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody id="myTable">


                        <?php
                        //if ($user->hasPermission('supervisor')){
                        $ir = new IR();

                        // getting ir id and performing a deletion functionality on the ir using the id

                        if ($_GET) {
                            if ($ir_id = $_GET['delete']) {
                                $ir->delete($ir_id);
                            }
                        }

                        $results = DB::getInstance()->get('internal_requisition', array('from_id', '=', $user->data()->id))->results();

                        foreach ($results as $value) {


                            echo $valued = ' <tr>  <td><span class="text-muted">' . $value->id . '</span></td>
                            <td><a href="invoice.html" class="text-inherit">' . $value->product_name . '</a></td>
                            <td>
                                ' . $value->quantity . ' 
                            </td>
                            <td>
                                ' . $value->description . '
                            </td>
                            <td>
                                 ' . escape($value->created_date) . '
                            </td>
                            <td>
                                 ' . $ir->statecolor($ir->state($value->id)), $ir->statusname($ir->state($value->id)) . '
                            </td>

                            <td class="text-right">
                                 
                                <a href="viewRequest.php?id=' . $value->id . '"  class="btn btn-outline-success btn-sm">view</a>
                                <div class="dropdown">
                                    <form action="" method="get"> 
                                    <a href="home.php?delete=' . $value->id . '" class="btn btn-outline-danger btn-sm">delete</a>
                                    <button class="btn btn-outline-warning btn-sm">Action</button>
                                </form>
                                   
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    
                                </div>
                            </td></tr>';
                        }
                        ?>


                        </tbody>
                    </table>
                </div>
            </div>


        </div>

    </div>
    <?php
}

require_once 'docs/footer.php';

?>