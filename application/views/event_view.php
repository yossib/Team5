<h1 style="color:#fff"><?=$short_description?></h1>
<h4 style="color:#fff"><?=$description?></h4>
<br>
<br>
<h4 style="color:#fff">Attending:</h4>
<div class="list-group">
  <?php
  $attending = false;
  foreach($attendees as $attendee){
    $name_display = $attendee['first_name'] . ' ' . $attendee['last_name'];
    if($attendee['id'] == $created_by){
      $name_display = '<b>' . $name_display . '</b>';
    }
    if(isset($userData['id']) && $userData['id'] == $attendee['id']){
      $attending = true;
    }?>
  <a class="list-group-item" href="/profile/<?=$attendee['id']?>"><?=$name_display?></a>
  <?php } ?>
</div>
<?php if(isset($userData['id'])){ ?>
  <h3 style="color:#fff">You are <?php echo $attending?'':'not '; ?> attending </h3><span class="label label-danger" onClick="location.href='/event/join/<?=$id?>/><?php echo $attending?0:1; ?>'" style="cursor: pointer"><?php echo $attending?'Leave':'Join' ?></span>
<?php } ?>
