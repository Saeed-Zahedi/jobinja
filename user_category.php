<?php
include_once('functions.php');
$user_id;
$user_id = $_GET['user_id'];
$all_category = see_all_categories();
?>
<table>
    <?php
    foreach ($all_category as $category) {
        $category_id = $category['id']
    ?>
        <tr>
            <?php echo $category['name']; ?></t>
            <a href="<?php echo goto_add_skill($user_id, $category_id); ?>">add it</a>
        </tr>
        </br>
        </br>
    <?php } ?>
</table>
<a href="<?php echo goto_main_page($user_id); ?>">done</a>