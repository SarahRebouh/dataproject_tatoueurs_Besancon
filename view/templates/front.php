<?php if(isset($_GET['paramFront'])){
  $result = $avatar->getFront($_GET['paramFront']);
  foreach ($result as $row){  ?>
    <div class="">
      <img data-u="image" src="<?= $row->url_front ?>" alt="">
    </div>
    <?php }
    $_SESSION['front'] = $_GET['paramFront'];
}elseif (isset($_SESSION['front'])){
  $result = $avatar->getFront($_SESSION['front']);
  foreach ($result as $row){  ?>
    <div class="">
      <img data-u="image" src="<?= $row->url_front ?>" alt="">
    </div>
    <?php }
}else{
  $result = $avatar->getFront();
  foreach ($result as $row){  ?>
    <div class="">
      <img data-u="image" src="<?= $row->url_front ?>" alt="">
    </div>
    <?php }
}?>
