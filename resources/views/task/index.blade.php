<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasks Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/tasks-index.css') }}">
</head>
<body>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
    
    <h1>Tasks</h1>
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Panel Heading</h3>
                  </div>
                  <div class="col col-xs-6 text-right">
                    <a href="/tasks/create"><button type="button" class="btn btn-sm btn-primary btn-create">Create New</button></a>
                  </div>
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                    <thead>
                    <tr>
                        <th><em class="fa fa-cog"></em></th>
                        <th class="hidden-xs">UUID</th>
                        <th>Name</th>
                    </tr> 
                    </thead>
                    <tbody>
                          @foreach ($tasks as $task)
                            <tr>
                                <td align="center">
                                <a href="/tasks/{{ $task->uuid }}" class="btn btn-default"><em class="fa fa-ball"></em></a>
                                <a href="/tasks/{{ $task->uuid }}/edit" class="btn btn-default"><em class="fa fa-pencil"></em></a>
                                
                                <form action="/tasks/{{ $task->uuid }}" method="post">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit">
                                    <a class="btn btn-danger"><em class="fa fa-trash"></em></a>
                                  </button>
                                </form>
                                </td>
                                <td class="hidden-xs">{{ $task->uuid }}</td>
                                <td>{{ $task->name }}</td>
                            </tr>
                          @endforeach
                    </tbody>
                </table>
            
              </div>
            </div>

</div></div></div>
</body>
</html>