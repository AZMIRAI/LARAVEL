<html>
<head>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

</head>
   <body>
   <div class="container">
      <form action="{{ route('post.update', ['id'=>$post->id,'page'=>$page]) }}" method="post" enctype="multipart/form-data">
      @csrf
        {{-- method spoofing --}}
        @method("put")
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title"
        value="{{ old('title') ? old('title') : $post->title }}"
        >
        {{-- // 에러 발생 시 --}}
           @error('title')
            <div>{{ $message }}</div>
         @enderror

      </div>
      <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content">
            {{ old('content') ? old('conent') : $post->content }}</textarea>
        {{-- // 에러 발생 시 --}}
           @error('content')
            <div>{{ $message }}</div>
         @enderror

      </div>
        <div class="form-group">
            <img class="img-thumbnail" width="20%" src="{{ $post->imagePath() }}">

        </div>
      <div class="form-group">
         <label for="file">File</label>
         <input type="file" id="file" name="imageFile">
         @error('imageFile')
            <div>{{ $message }}</div>
         @enderror

        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
     </form>
   </div>


   <script>
    ClassicEditor
            .create( document.querySelector( '#content' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
</body>
</html>
</html>
