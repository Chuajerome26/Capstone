<?php
if(isset($id)) {
    $remarks = $admin->getRemarks($id);
    foreach($remarks as $r){
?>
<h4>Admin Remarks</h4>
<dd class="col-sm-8"> - <?php echo $r["remarks"];?></dd>
<?php } ?>
<?php } else {
    echo "Scholar ID not provided.";
} ?>
