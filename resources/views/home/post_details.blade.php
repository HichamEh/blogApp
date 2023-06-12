<!DOCTYPE html>
<html lang="en">
   <head>
      
      <base href="/public">
      @include('home.homecss')
     </head>
   <body>
      
      <div class="header_section">
        @include('home.header')
        
      </div>
      <div style="text-align:center;" class="col-md-12">
                     <div><img src="/postimage/{{$post->image}}" style="padding:20px;margin:auto;height: 400px;width: 550px" ></div>
                     <h3><b>{{$post->title}}</b></h3>
                     <h4>{{$post->description}}</h4>
                     <p>post by <b>{{$post->name}}</b></p>
                  </div>
    
     @include('home.footer')    
   </body>
</html>