<style type="text/css">
  table {
    width: 80%;
  }
  td {
    margin: 20px;
    text-align: left;
  }
</style>
<h1>Events</h1>
<table>
  <tr><th>Event</th><th>Host</th></tr>
<?php foreach($events as $event){?>
  <tr><td><a href="/event/<?=$event['id'] ?>"><?=$event['short_description']?></a></td><td><a href="/profile/<?=$event['created_by'] ?>"><?=$event['first_name']?> <?=$event['last_name']?></a></td></tr>
<?php } ?>
</table>
<a href="/event/edit">Create New Event</a>