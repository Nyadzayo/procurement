<?php
require_once 'core/init.php';
$db = DB::getInstance();
$query1 = $db->get('internal_requisition',array( 'id','>',0))->results();
//var_dump(json_decode(json_encode($query1), true));

 if(isset($_POST["Export"])){

      header('Content-Type: text/csv; charset=utf-8');
      header('Content-Disposition: attachment; filename=data.csv');
      $output = fopen("php://output", "w");


      fputcsv($output, array('request_id', 'product_name', 'quantity', 'description', 'created_date','department'));
      $query = $db->get('internal_requisition',array( 'id','>',0))->results();
     // $result = mysqli_query($db_con, $query);

     foreach (json_decode(json_encode($query1), true) as $value){

             fputcsv($output,$value);

     }

     fclose($output);
 }

 ?>



                        <form class="form-horizontal" action="generate_excel.php" method="post" name="upload_excel"
                                enctype="multipart/form-data">
                            <div class="form-group">

                                        <div class="card-footer text-right">
                                          <button type="submit" name='Export' class="btn btn-outline-success btn-sm"
                                          value="export to excel"><i class="fe fe-download"></i>Download CSV</button>
                                      </div>
                             </div>
                      </form>

