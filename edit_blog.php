<?php
include "header.php";
include "connection.php";
$con = new Connection('new1');
$id = 0;
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$blog = $con->getBlog($id);
?>
<form class="form-horizontal" action="edit_blog_action.php" method="post">
<input type="hidden" value="<?php echo $blog['id'];?>" name="id">
<fieldset>

<!-- Form Name -->
<legend>Edit Blog</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Blog Name</label>
  <div class="col-md-4">
  <input id="name" name="name" value="<?php echo $blog['name'];?>"placeholder="" class="form-control input-md" required="" type="text">

  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="content">Blog Text</label>
  <div class="col-md-4">
    <textarea class="form-control" id="content" name="content"><?php echo $blog['content'];?></textarea>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton"></label>
  <div class="col-md-4">
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Update</button>
  </div>
</div>

</fieldset>
</form>
<?php
include "footer.php";
