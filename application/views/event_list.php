<style type="text/css">
  table {
    width: 80%;
  }
  td {
    margin: 20px;
    text-align: left;
  }
</style>
<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading" style="font-weight:bold">Events</div>
<table>
  <tr><th>Event</th><th>Host</th><th>Start Time</th><th>End Time</th></tr>
<?php foreach($events as $event){?>
  <tr>
    <td><a href="/event/<?=$event['id'] ?>"><?=$event['short_description']?></a></td>
    <td><a href="/profile/<?=$event['created_by'] ?>"><?=$event['first_name']?> <?=$event['last_name']?></a></td>
    <td><?=$event["start_time"]?></td>
    <td><?=$event["end_time"]?></td>
  </tr>
<?php } ?>
</table>
</div>
<h4><span class="label label-danger" onClick="location.href='/event/edit'" style="cursor: pointer">Create New Event</span></h4>