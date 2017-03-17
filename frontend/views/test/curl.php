<?php 
use yii\helpers\Html;
use yii\helpers\Url;

$url = Url::toRoute('test/docurl');

?>
<!-- 
<form class="form-horizontal" action="<?php echo $url ?>" method="POST">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-3">
      <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form> -->

<form action="<?php echo $url; ?>" method="POST">
    <input type="text" placeholder="请输入测试url" name="url">
    <input type="submit" value="测试">
</form>