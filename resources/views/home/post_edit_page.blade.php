<!DOCTYPE html>
<html lang="en">
   <head>
    <base href="/public">
      <!-- basic -->
      @include('home.homecss')
      <style type="text/css">
        .div_deg{
            text-align: center;
            background-color: black;
        }
        .img_deg{
            height: 150px;
            width: 250px;
            margin: auto;
        }
        label{
            font-size: 18px;
            font-weight: bold;
            width: 200px;
            color: white;
        }
        .input_deg{
            padding: 30px;
        }
        .title_deg{
            padding: 30px;
            font-size: 30px;
            font-weight: bold;
            color: white;
        }
      </style>
     </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
        @include('home.header')
          
        <div class="div_deg">
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">x</button>
            {{session()->get('message')}}
        </div>
        @endif
            <h1 class="title_deg">Edit Post</h1>
            <form action="{{url('edit_post_data', $data->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input_deg">
                    <label for="">Title</label>
                    <input type="text" name="title" value="{{$data->title}}">
                </div>
                <div class="input_deg">
                    <label for="">Description</label>
                    <textarea name="description">{{$data->description}}</textarea>
                </div>
                <div class="input_deg">
                    <label for="">Current Image</label>
                    <img class="img_deg" src="/postimage/{{$data->image}}" alt="">
                </div>
                <div class="input_deg">
                    <label for="">Change Current Image</label>
                    <input type="file" name="image" >
                </div>
                <div class="input_deg">
               
                    <input type="submit" value="Update" class="btn btn-outline-secondary" >
                </div>
            </form>
        </div>
       
      </div>
     
     @include('home.footer')    
   </body>
</html>