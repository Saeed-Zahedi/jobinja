<?php
include_once('functions.php');
$all_companies = get_all_companies();
foreach ($all_companies as $companies) {
    echo $companies['name'];
?>
    </br>
    </br>
    </br>
<?php } ?>
<a href="http://localhost/projects/add_company.php">add new company</a>