<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Comment</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Comment</h1>
            <form method = 'get' action = 'http://localhost/laravelbackend/public/comment'>
                <button class = 'btn blue'>Comment Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost/laravelbackend/public/comment/{{$comment->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="input-field col s6">
                    <input id="post_date" name = "post_date" type="text" class="validate" value="{{$comment->post_date}}">
                    <label for="post_date">post_date</label>
                </div>
                
                <div class="input-field col s6">
                    <input id="comment" name = "comment" type="text" class="validate" value="{{$comment->comment}}">
                    <label for="comment">comment</label>
                </div>
                                
                <button class = 'btn red' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
    <script>
    $('select').material_select();
    </script>
</html>
