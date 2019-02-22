<?php
 require_once 'core/init.php';

 $user = new User();

 if ($user->hasPermission('supervisor')){


 }else{
     echo 'No permission to access this area';
 }
if(isset($_POST["Export"])) {
     $ir= new IR();
    $ir->generatecsv('internal_requisition');

}
require_once 'docs/header.php';
?>
<div class="row">
    <div class="col-lg-12">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Requisitions List</h3>
                <div class="col-lg-3 ml-auto">
                    <form class="input-icon my-3 my-lg-0" class="form-horizontal" action="Supervisor.php" method="post">

                        <input type="search" id="myInput" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                        <div class="input-icon-addon">
                            <i class="fe fe-search"></i>

                        </div>


                    </form>

                </div>
                <div class="col-lg-3 ml-auto" >
                    <form class="form-horizontal" action="report.php" method="post" name="upload_excel"
                          enctype="multipart/form-data">
                        <div class="form-group">
                            <button type="submit" name='Export' class="btn btn-outline-success btn-sm" value="export to excel"><i class="fe fe-download"></i>Download CSV</button>
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
                        <th>From</th>

                        <th></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="myTable">


                    <?php
                    //if ($user->hasPermission('supervisor')){
                    $ir = new IR();

                    // getting ir id and performing a deletion functionality on the ir using the id

                    if($_GET) {
                        if ($ir_id=$_GET['delete']) {
                            $ir->delete($ir_id);
                        }
                    }
                    $results = DB::getInstance()->get('internal_requisition',array('department','=',(new User())->data()->department))->results();

                    foreach ( $results as $value){


                        echo  $valued=' <tr>  <td><span class="text-muted">'.$value->id.'</span></td>
                            <td><a href="invoice.html" class="text-inherit">'.$value->product_name.'</a></td>
                            <td>
                                '.$value->quantity.' 
                            </td>
                            <td>
                                '.$value->description.'
                            </td>
                            <td>
                                 '.escape($value->created_date).'
                            </td>
                            <td>
                                 '.$ir->statecolor($ir->state($value->id)),$ir->statusname($ir->state($value->id)).'
                            </td>
                            <td>
                                 '.escape(($userz=new User())->find($value->from_id)?$userz->data()->name:$value->from_id).'
                            </td>

                            <td class="text-right">
                                 
                                <a href="viewRequest.php?id='.$value->id.'"  class="btn btn-outline-success btn-sm">view</a>
                                <div class="dropdown">
                                    <form action="" method="get"> 
                                    
                                </form>
                                   
                                </div>
                            </td>
                            <td>
                                <div class="dropdown">
                                    
                                </div>
                            </td></tr>' ;
                    }
                    ?>







                    </tbody>
                </table>
            </div>
        </div>


    </div>

</div>
<?php
 require_once 'docs/footer.php';