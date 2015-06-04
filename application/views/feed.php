<script type="text/javascript">
  var refresh_url = '/feed'
  var usedId = <?php echo $userData['id'] ?>;

  $(document).ready(get_latest_posts());
  $(document).ready(function(){
    $("#newPost").on("click",".makePost",makePost);
    $(document).on("click",".makeNewComment", makeComment);
    $(document).on('focus','textarea',function(){
      if($(this).val() == 'Make a new post' || $(this).val() == 'comment'){
        $(this).val("");
      }
    });
  });
  function get_latest_posts(){
    console.log('here');
    var url = "/feed/getrecentposts"

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
    console.log(data)
    $.each(data, function(k, entry){
      var post = $(postTemplate);
      post.data(entry);
      $(".panel-title", post).html(entry.created_at + ", By: " + entry.first_name + " " + entry.last_name);
      $(".panel-body-content", post).html(entry.content);
      if(entry.avatar){
        $(".panel-body", post).prepend("<img src='" + entry.avatar + "'/>");
      }
      console.log(entry);
      $.each(entry.comments, function(k, c){
        var comment = $(commentTemplate);
        $(".panel-title", comment).html("By: " + c.first_name + " " + c.last_name);
        $(".panel-body", comment).html(c.content);
        $(".panel-comments",post).append(comment);
      })
      $("#feed").prepend(post);
    })

  }

  var newCommentTemplate = '<div class="input-group .newComment"> ' +
    '<span class="input-group-btn makeNewComment" style="vertical-align: top"> ' +
    '<button class="btn btn-default" type="button">+</button> ' +
    '</span> ' +
    '<textarea class="form-control newCommentContent" rows="3">comment</textarea> ' +
    '</div>';

  var postTemplate = '<div class="panel panel-primary post">' +
    '<div class="panel-heading"> ' +
    '<h3 class="panel-title">Panel title</h3> ' +
    '</div> ' +
    '<div class="panel-body">' +
    '<div class="panel-body-content">Panel content</div>' +
    '<div class="panel-comments"></div>' +
    '<div>' +  newCommentTemplate + '</div>' +
    '</div></div> ' +
    '</div>';

  var commentTemplate = '<div class="panel panel-info"> ' +
    '<div class="panel-heading"> ' +
    '<h3 class="panel-title">Panel title</h3> ' +
    '</div> ' +
    '<div class="panel-body">' +
    '' +
    '</div> ' +
    '</div>'

  function makePost(){
    var content = $("#newPostContent").val();
    console.log(content);
    var url = "/feed/savepost";
    $.post(url , { userId : usedId, content : content }, function(data){
      console.log(data);
      location.href = refresh_url;

    } , "json");
  }

  function makeComment(){
    console.log('here');
    var post = $(this).closest(".post");
    var content = $(".newCommentContent", post).val();
    var url = "/feed/savecomment";
    postId = post.data().post_id;
    $.post(url , { userId : usedId, "postId" : postId, content : content }, function(data){
      console.log(data);
      location.href = refresh_url;
    } , "json");
  }



</script>
<style type="text/css">
  #upcomingBirthdays {
    text-align: left;
  }
  #upcomingBirthdays p {
    font-weight: bold;
  }
</style>
<?php if(count($upcomingBirthdays)){ ?>
<div id="upcomingBirthdays">
  <h3 style="color: #FF9696">Upcoming Birthdays!</h3>
  <?php foreach($upcomingBirthdays as $birthday){
    $birth_date = new DateTime($birthday['birthday']);?>
    <div class="alert alert-success" role="alert">
    <a href="/profile/<?=$birthday['id']?>"><?=$birthday['first_name']?> <?=$birthday['last_name']?></a>:  <?=$birth_date->format('d/m')?>
    </div>
  <?php } ?>
</div>
<?php } ?>
<div class="input-group" id="newPost">
  <span class="input-group-btn makePost" style="vertical-align: top">
    <button class="btn btn-default" type="button">+</button>
  </span>
  <textarea class="form-control" rows="5" id="newPostContent">Make a new post</textarea>
</div>

<br/><br/>
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