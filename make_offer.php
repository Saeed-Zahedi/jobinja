<?php
global $company;
include_once('functions.php');
$username = $_GET['username'];
$password = $_GET['password'];
$company = $_GET['company'];
function procces_input()
{
  global $company;
  if (
    isset($_POST['offer']) && !empty($_POST['level']) && !empty($_POST['time']) &&
    !empty($_POST['status']) && !empty($_POST['category']) && !empty($_POST['city'])
    && !empty($_POST['Textarea'])
  ) {
    make_new_offer($company, $_POST['level'], $_POST['Textarea'], $_POST['city'], $_POST['time'], $_POST['status'], $_POST['category']);
  }
}
?>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">

    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">make offer</h3>
      </div>
      <div class="panel-body">
        <form class="form-horizontal" method="post">
          <div class="form-group">
            <label for="level">level</label>
            <select class="form-control" id="level" name="level">
              intern:<option>1</option>
              jouniour<option>2</option>
              senior<option>3</option>
            </select>
          </div>
          <form class="form-horizontal" method="post">
            <div class="form-group">
              <label for="time">time</label>
              <select class="form-control" id="time" name="time">
                <option>1</option>
                <option>2</option>
                <option>3</option>
              </select>
            </div>
            <form class="form-horizontal" method="post">
              <div class="form-group">
                <label for="status">status</label>
                <select class="form-control" id="status" name="status">
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
              <form class="form-horizontal" method="post">
                <div class="form-group">
                  <label for="category">category</label>
                  <select class="form-control" id="category" name="category">
                    <?php $all_category = see_all_categories();
                    foreach ($all_category as $categorys) {
                    ?>
                      <option><?php echo $categorys['name']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
                <form class="form-horizontal" method="post">
                  <div class="form-group">
                    <label for="city">city</label>
                    <select class="form-control" id="city" name="city">
                      <?php $all_cities = get_all_cities();
                      foreach ($all_cities as $cities) {
                      ?>
                        <option><?php echo $cities['name']; ?></option>
                      <?php
                      }
                      ?>
                    </select>
                  </div>
                  <form class="form-horizontal" method="post">
                    <div class="form-group">
                      <label for="Textarea">text about salary</label>
                      <textarea class="form-control" id="Textarea" name="Textarea" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="offer" class="btn btn-primary">add offer</button>
                      </div>
                    </div>
                    <?php procces_input() ?>
                  </form>
      </div>
    </div>

  </div>
  <div class="col-md-2"></div>
</div>
<a href="<?php echo goto_offer_maker($username, $password) ?>">exit</a>