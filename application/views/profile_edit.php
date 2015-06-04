		<form method="post" action="/profile/edit/<?=$id?>">
		 <input type="hidden" name="id" value="<?=$id?>">
		  <div class="form-group">
			<label for="first_name">Name</label>
			<input type="first_name" class="form-control" id="first_name" name="first_name" value="<?=$first_name?>" placeholder="Enter name">
		  </div>
		   <div class="form-group">
			<label for="last_name">Last name</label>
			<input type="last_name" class="form-control" id="last_name" name="last_name" value="<?=$last_name?>" placeholder="Enter Last name">
		  </div>
		   <div class="form-group">
			<label for="birthday">Birthday</label>
			<input type="birthday" class="form-control" id="birthday" name="birthday" value="<?=$birthday?>" placeholder="Enter birthday">
		  </div>
		   <div class="form-group">
			<label for="position">Position</label>
			<input type="position" class="form-control" id="position" name="position" value="<?=$position?>" placeholder="Enter position">
		  </div>
		   <div class="form-group">
			<label for="work_start_date">Work start date</label>
			<input type="work_start_date" class="form-control" id="work_start_date" name="work_start_date" value="<?=$work_start_date?>" placeholder="Enter start date">
		  </div>
		   <div class="form-group">
			<label for="description">Description</label>
			<textarea type="description" class="form-control" id="description" placeholder="Description" name="description"><?=$description?></textarea>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
			  