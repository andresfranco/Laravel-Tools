<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Comment</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Comment</h1>
            <form method = 'get' action = 'http://localhost/laravelbackend/public/comment'>
                <button class = 'btn blue'>Comment Index</button>
            </form>
            <table class = 'highlight bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>post_date : </i></b>
                        </td>
                        <td>{{$comment->post_date}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>comment : </i></b>
                        </td>
                        <td>{{$comment->comment}}</td>
                    </tr>
                    

                        
                </tbody>
            </table>
        </div>
    </body>
    <script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
</html>
