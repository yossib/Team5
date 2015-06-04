<style type="text/css">
  .form-group .value {
    margin-left: 12px;
  }
  .username {
    font-weight: bold;
    font-size: 16px;
  }
</style>
<div class="row">
	  <div class="col-md-8">
		<form>
		 <div class="form-group">
			<div><img src="<?=$avatar?>" />&nbsp;&nbsp;&nbsp;&nbsp;<span class="username"><?=$first_name?> <?=$last_name?></span></div>
       <?php if($edit){ ?> <a href="/profile/edit/<?=$id?>">Edit details</a> <?php }?>
		  </div>
      <br><br>
		   <div class="form-group">
			<label for="birthday">Birthday</label>
			<div class="value"><?=$birthday?></div>
		  </div>
		   <div class="form-group">
			<label for="position">Position</label>
			<div class="value"><?=$position?></div>
		  </div>
		   <div class="form-group">
			<label for="work_start_date">Work start date</label>
			<div class="value"><?=$work_start_date?></div>
		  </div>
		  <div class="form-group">
			<label for="password">Email address</label>
			<div class="value"><?=$email?></div>
		  </div>
		 
		 
		   <div class="form-group">
			<label for="description">Description</label>
			<p><?=$description?></p>
		  </div>
		</form>
			  