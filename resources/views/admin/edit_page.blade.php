<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
   @include('admin.css')
   <style type='text/css'>
        .post_title
        {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }
        .div_center
        {
            text-align: center;
            padding: 30px;
        }
        label
        {
            display: inline-block;
            width: 200px;
        }
   </style>
  </head>
  <body>
   @include('admin.header')
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      @include('admin.navbar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
      @if(session()->has('message'))
        <div class="alert alert-success">
            <button class="close" type="button" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif
      <h1 class='post_title'>Edit Post</h1>

        <form action="{{url('update_post', $post->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="div_center">
                    <label for="">Post Title</label>
                    <input type="text" name="title" value="{{$post->title}}">
                </div>
                <div class="div_center">
                    <label for="">Post Description</label>
                    <textarea name="description" >{{$post->description}}</textarea>
                </div>
                <div class="div_center">
                    <label for="">old image</label>
                    <img style="margin:auto;"height="100px" width="150px" src="/postimage/{{$post->image}}" alt="">
                </div>
                <div class="div_center">
                    <label for="">Update old image</label>
                    <input type="file" name="image">
                </div>
                <div class="div_center">
                    
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
        </form>
      </div>
       @include('admin.footer')
  </body>
</html>