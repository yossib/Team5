<script type="text/javascript">
  $(document).ready(get_latest_posts());

  function get_latest_posts(){
    console.log('here');
    var url = "http://localhost/feed/getrecentposts"

    $.ajax({
      dataType: "json",
      url: url,
      data: "",
      success:  function(data, status, obj){
        console.log('here2');
        render_posts(data);
      },
      error: function(hi){
        console.log(hi);
      }

    });
  }

  function render_posts(data){
    $.each(data, function(k, entry){
      console.log(entry);
      var post = $(postTemplate)
      $(".panel-title", post).html(entry.name);
      $(".panel-body", post).html(entry.content);
      $("#feed").prepend(post);
    })

  }

  var postTemplate = '<div class="panel panel-primary">' +
    '<div class="panel-heading"> ' +
    '<h3 class="panel-title">Panel title</h3> ' +
    '</div> ' +
    '<div class="panel-body">Panel content </div> ' +
    '</div>';


</script>
<h1>Somoto Feed By Team5!</h1>
<div class="row" id="feed">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">Panel title</h3>
    </div>
    <div class="panel-body">
      Panel content
    </div>
  </div>
</div>