<h1><?=$short_description?></h1>
<?=$description?>
<br>
<br>
Attending:
<ul>
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
  <li><a href="/profile/<?=$attendee['id']?>"><?=$name_display?></a></li>
  <?php } ?>
</ul>
<?php if(isset($userData['id'])){ ?>
  You are <?php echo $attending?'':'not '; ?> attending <a href="/event/join/<?=$id?>/<?php echo $attending?0:1; ?>"><?php echo $attending?'Leave':'Join' ?></a>
<?php } ?>
