@extends('welcome')
@section('content')
<ul>
    @foreach($categories as $category)
    <li><a href="{{route("category.get", ["id"=>$category->id])}}">{{$category->name}}</a></li>
    @endforeach
</ul>
<form method="POST">
  <div class="form-group">
    <label>Category name</label>
    <input id="input_label" name="name" type="text" class="form-control" placeholder="...">
  </div>
  <div class="btn-group" role="group" aria-label="...">
    <button id="button_od_dodawania" type="submit" class="btn btn-default" disabled="">Create</button>
    <button type="reset" class="btn btn-default">Cancel</button>
  </div>
</form>
<script>
    $('#input_label').on('keyup', function() {
        var zawartosc = $('#input_label').val();
        if(zawartosc.length === 0) {
            $('#button_od_dodawania').attr('disabled', 'true');
        }
        else if(zawartosc.length > 0) {
            $('#button_od_dodawania').removeAttr('disabled');
        }
    })
</script>
@stop