<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Edit Post</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Edit Post</h1>
            <form method = 'get' action = 'http://localhost/laravelbackend/public/post'>
                <button class = 'btn btn-danger'>Post Index</button>
            </form>
            <br>
            <form method = 'POST' action = 'http://localhost/laravelbackend/public/post/{{$post->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="title">title</label>
                    <input id="title" name = "title" type="text" class="form-control" value="{{$post->title}}">
                </div>
                
                <div class="form-group">
                    <label for="content">content</label>
                    <input id="content" name = "content" type="text" class="form-control" value="{{$post->content}}">
                </div>
                
                
                <button class = 'btn btn-primary from-control' type ='submit'>Update</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
