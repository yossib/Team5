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
	  <div class="col-md-8" style="padding-left:500px; text-align:left; color: #fff">
			<img src="<?=$avatar?>" style="height: 150px; width: 150px; float: left; margin-left: -250px" />
			<form>
		 <div class="form-group">
			<div>
				<span class="username"><?=$first_name?> <?=$last_name?></span></div>
       <?php if($edit){ ?> <div class="value">
				 <h4><span class="label label-primary" onClick="location.href='/profile/edit/<?=$id?>'" style="cursor: pointer">Edit details</span></h4></div> <?php }?>
		  </div>
      <br><br>
		   <div class="form-group">
			<label for="birthday">Birthday</label>
			<div class="value"><?= ($birthday == "0000-00-00") ? "Not entered yet" : $birthday ?></div>
		  </div>
		   <div class="form-group">
			<label for="position">Position</label>
			<div class="value"><?=($position == "")? "Not entered yet" : $position ?></div>
		  </div>
		   <div class="form-group">
			<label for="work_start_date">Work start date</label>
			<div class="value"><?= ($work_start_date == "0000-00-00") ? "Not entered yet" : $work_start_date?></div>
		  </div>
		  <div class="form-group">
			<label for="password">Email address</label>
			<div class="value"><?=$email?></div>
		  </div>
		   <div class="form-group">
			<label for="description">Description</label>
			 <div class="value"><?=($description == "")? "Not entered yet" : $description ?></div>
		  </div>
		</form>
			  