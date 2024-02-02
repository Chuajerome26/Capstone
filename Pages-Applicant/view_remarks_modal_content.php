<?php
if(isset($id)) {
    $remarks = $admin->getRemarks($id);

    // Check if $remarks is an array or object before iterating
    if(is_array($remarks) || is_object($remarks)) {
        foreach($remarks as $r){
?>
            <h4>Admin Remarks</h4>
            <dd class="col-sm-8"> - <?php echo $r["remarks"];?></dd>
<?php
        }
    } else {
        echo "No remarks found for the provided Scholar ID.";
    }
} else {
    echo "Scholar ID not provided.";
}
?>
