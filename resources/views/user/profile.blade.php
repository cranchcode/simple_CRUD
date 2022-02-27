<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Section</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="well well-sm">
                    <div class="media">
                        <a class="thumbnail pull-left" href="#">
                            <img class="media-object" src="http://critterapp.pagodabox.com/img/user.jpg">
                        </a>
                        <div class="media-body">
                            <h4 class="media-heading">{{ $user->firstName }} {{ $user->lastName }}</h4>
                            <p><span class="label label-info">{{ $user->username }}</span></p>

                                <form action="/profile/edit" method="get">
                                    <button type="submit">
                                        <a class="btn btn-xs btn-default"><span class="glyphicon glyphicon-comment"></span> Edit</a>
                                    </button>
                                </form>

                                <form action="/profile/delete" method="post">
                                    @csrf
                                    <button type="submit">
                                        <a class="btn btn-xs btn-default"><span class="glyphicon glyphicon-heart"></span> Delete</a>
                                    </button>
                                </form>

                                <form action="/tasks" method="get">
                                    <button type="submit">
                                        <a class="btn btn-xs btn-default"><span class="glyphicon glyphicon-ban-circle"></span> Tasks</a>
                                    </button>
                                </form>
                                
                                
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>