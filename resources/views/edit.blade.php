<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                <h2>Edit Post</h2>
                </div>
                <div class="card-body">
                    <form action="/update/{{ $posts->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put")
                        <input type="text" name="title" class="form-control m-2" placeholder="title" value="{{ $posts->title }}">
                        <input type="text" name="author" class="form-control m-2" placeholder="author" value="{{ $posts->author }}">
                        <Textarea name="body" cols="20" rows="4" class="form-control m-2" placeholder="body">{{ $posts->body }}</Textarea>
                         
                        <label class="m-2">Cover Image</label>
                        <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="cover">
     
                        <label class="m-2">Images</label>
                        <input type="file" id="input-file-now-custom-3" class="form-control m-2" name="images[]" multiple>
     
                        <button type="submit" class="btn btn-success mt-3 ">Submit</button>
                    </form>
                     
                        <form action="/deletecover/{{ $posts->id }}" method="post">
                        <button class="btn text-danger">X</button>
                        @csrf
                        @method('delete')
                        </form>
                        <img src="/cover/{{ $posts->cover }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                        <br>
                         
                        @if (count($posts->images)>0)
                        @foreach ($posts->images as $img)
                        <form action="/deleteimage/{{ $img->id }}" method="post">
                             <button class="btn text-danger">X</button>
                             @csrf
                             @method('delete')
                        </form>
                        <img src="/images/{{ $img->image }}" class="img-responsive" style="max-height: 100px; max-width: 100px;" alt="" srcset="">
                        @endforeach
                        @endif
                         
                </div>                  
            </div>
        </div>                        
    </div>
</body>
</html>