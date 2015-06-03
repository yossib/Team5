<script type="text/javascript">
  var usedId = 1;
  $(document).ready(get_latest_posts());
  $(document).ready(function(){
    $("#newPost").on("click",".makePost",makePost);
    $(document).on("click",".makeNewComment", makeComment);
  })
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
      var post = $(postTemplate);
      post.data(entry);
      $(".panel-title", post).html(entry.created_at + ", By: " + entry.first_name + " " + entry.last_name);
      $(".panel-body-content", post).html(entry.content);
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
    var content = $("#newPostContent").html();
    var url = "http://localhost/feed/savepost";
    $.post(url , { userId : usedId, content : content }, function(data){
      console.log(data);
    } , "json");
  }

  function makeComment(){
    console.log('here');
    var post = $(this).closest(".post");
    var content = $(".newCommentContent", post).html();
    var url = "http://localhost/feed/savecomment";
    postId = post.data().post_id;
    $.post(url , { userId : usedId, "postId" : postId, content : content }, function(data){
      console.log(data);
    } , "json");
  }



</script>
<h1>Somoto Feed By Team5!</h1>
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