		<form method="post" action="/profile/edit/<?=$id?>">
		 <input type="hidden" name="id" value="<?=$id?>">
		  <div class="form-group">
			<label for="first_name">Name</label>
			<input type="first_name" class="form-control" id="first_name" value="<?=$first_name?>" placeholder="Enter name">
		  </div>
		   <div class="form-group">
			<label for="last_name">Last name</label>
			<input type="last_name" class="form-control" id="last_name"   value="<?=$last_name?>" placeholder="Enter Last name">
		  </div>
		   <div class="form-group">
			<label for="birthday">Birthday</label>
			<input type="birthday" class="form-control" id="birthday"  value="<?=$birthday?>" placeholder="Enter birthday">
		  </div>
		   <div class="form-group">
			<label for="position">Position</label>
			<input type="position" class="form-control" id="position"  value="<?=$position?>" placeholder="Enter position">
		  </div>
		   <div class="form-group">
			<label for="work_start_date">Work start date</label>
			<input type="work_start_date" class="form-control" id="work_start_date"  value="<?=$work_start_date?>" placeholder="Enter start date">
		  </div>
		  <div class="form-group">
			<label for="password">Email address</label>
			<input type="email" class="form-control" id="$email"  value="<?=$email?>" placeholder="Enter email">
		  </div>
		  <div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password"  value="<?=$password?>" placeholder="Password">
		  </div>
		  <div class="form-group">
			<label for="avatar">Avatar Url</label>
			<input type="text" id="avatar" name="avatar" value="<?=$avatar?>" >
			<p class="help-block">Example block-level help text here.</p>
		  </div>
		   <div class="form-group">
			<label for="description">Description</label>
			<input type="description" class="form-control" id="description"  value="<?=$description?>" placeholder="Description">
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
			  