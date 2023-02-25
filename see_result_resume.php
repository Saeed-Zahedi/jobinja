<?php
include_once('functions.php');
$user_id = $_GET['user_id'];
$results = see_result_of_sent_resume($user_id);
foreach ($results as $result) {
    $offer = get_offer_by_id($result['offer_id']);
    $offer = $offer->fetch_assoc();
    echo $offer['company_name'];
    echo ":";
    if ($result['result'] == 0) {
        echo "not seen yet!";
    }
    if ($result['result'] == 1) {
        echo "accepted";
    }
    if ($result['result'] == 2) {
        echo "rejected";
    } ?>
    <br />
<?php
}
?>
<a href="<?php echo goto_profile_page($user_id); ?>">back</a>