<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>CrudImage laravel</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Laravel CRUD</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h2>Laravel CRUD With Multiple Image Upload</h2>
                </div>
                <div class="card-body">
                    <a href="{{ url('/create') }}" class="btn btn-success btn-sm" title="Add New Post">Add New Post</a>
                    <br/><br/>
                    <div class="table-responsive">
                    <h2>Blog Post List</h2>
                    @if (count($posts) < 1)
                        <div class="" style="color: red">
                            No posts created yet
                        </div>                    
                        
                    @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Description</th>
                                <th>Cover</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <th scope="row">{{ $post->id }}</th>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->author }}</td>
                                <td>{{ $post->body }}</td>
                                <td><img src="cover/{{ $post->cover }}" class="img-responsive" style="max-height:100px; max-width:100px" alt="" srcset=""></td>
                                    <td><a href="/edit/{{ $post->id }}" class="btn btn-outline-primary">Edit</a></td>
                                    <td>
                                        <form action="/delete/{{ $post->id }}" method="post">
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?');" type="submit">Delete</button>
                                        @csrf
                                        @method('delete')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>  
                        
                    @endif                  
                        
                    </div>  
                </div>                  
            </div>
        </div>                        
    </div>
</body>
</html>