<link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.css"/>
<script src="/js/jquery.datetimepicker.js"></script>


<script type="text/javascript">
	$(document).ready(function(){
		$(".datetimepicker").datetimepicker({
			format : 'Y-m-d h:i'
		});
	});
</script>
<style type="text/css">
  input[type=checkbox]{
    text-align: left;
  }
</style>
		<form method="post" action="/event/edit/<?=isset($id)?$id:''?>">
		 <input type="hidden" name="id" value="<?=isset($id)?$id:''?>">
		  <div class="form-group">
			<label for="short_description">Title</label>
			<input type="text" class="form-control" id="short_description" name="short_description" value="<?=isset($short_description)?$short_description:''?>" placeholder="Enter title">
		  </div>
		   <div class="form-group">
			<label for="start_time">Start time</label>
			<input type="text" class="form-control datetimepicker" id="start_time" name="start_time" value="<?=isset($start_time)?$start_time:''?>">
		  </div>
		   <div class="form-group">
			<label for="end_time">End Time</label>
			<input type="text" class="form-control datetimepicker" id="end_time" name="end_time" value="<?=isset($end_time)?$end_time:''?>" placeholder="Enter end_time">
		  </div>
		   <div class="form-group">
			<label for="location">Location</label>
			<input type="text" class="form-control" id="location" name="location" value="<?=isset($location)?$location:''?>" placeholder="Enter location">
		  </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" placeholder="Enter Description" name="description"><?=isset($description)?$description:''?></textarea>
      </div>
      <div class="form-group">
        <input type="checkbox" class="form-control" id="company_event" name="company_event" value="<?=isset($company_event)?$company_event:''?>">
        <label for="company_event">Company event</label>
		  </div>
		  <button type="submit" class="btn btn-default">Submit</button>
		</form>
			  