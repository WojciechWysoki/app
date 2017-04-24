

@extends('welcome')
@section('content')
<h3>{{$article->title}}</h3>
<textarea disabled="true" name="content" type="text" class="form-control" rows="15" >{{$article->content}}</textarea>

<ul id="list">
    @foreach ($article->comment as $comment)
        <li><a href="{{route("comment.get", ["id"=>$comment->id])}}">{{$comment->author}}</a></li>
    @endforeach
</ul>

<form method="POST" action="{{route("comment.post")}}">
  <div class="form-group">
    <label>Author</label>
    <input id="comment" name="author" type="text" class="form-control" placeholder="...">
    
  </div>
    <div class="form-group">
    <label>Content</label>
    <textarea id="text-area" name="content" type="text" class="form-control" rows="15" placeholder="..."></textarea>
  </div>
    
    <input id="content" name="article_id" type="hidden" class="form-control" value="{{$article->id}}">
  <div class="btn-group" role="group" aria-label="...">
    <button id="button_comment" type="submit" class="btn btn-default" disabled="">Post</button>
    <button type="reset" class="btn btn-default">Cancel</button>
  </div>
</form>

<script>
 var zawartosc_article = "";
 var zawartosc_content = "";
$('#comment').on('keyup', function() {
        zawartosc_article = $('#comment').val();
        if(zawartosc_article.length === 0||zawartosc_content.length === 0) {
            $('#button_comment').attr('disabled', 'true');
        }
        else if(zawartosc_article.length > 0&&zawartosc_content.length > 0) {
            $('#button_comment').removeAttr('disabled');
        }
});

$('#text-area').on('keyup', function() {
        zawartosc_content = $('#text-area').val();
        if(zawartosc_article.length === 0||zawartosc_content.length === 0) {
            $('#button_comment').attr('disabled', 'true');
        }
        else if(zawartosc_article.length > 0&&zawartosc_content.length > 0) {
            $('#button_comment').removeAttr('disabled');
        }
});
</script>
<script src={{asset("bootstrap/js/bootstrap.min.js")}}></script>
@stop