<!DOCTYPE html>
<html lang="en">
  <head>
    <x-app-layout>
   
    </x-app-layout>
    @include("admin.admincss")
  </head>
  <body>
  <div class="container-scroller">

     @include("admin.navbar")
     <div style="position: relative; top: 60px; right: -150px">
        
        <form action="{{url('/uploadproduct')}}" method="post" enctype="multipart/form-data">

            @csrf 

            <div>
                <label>Title</label>
                <input style="color: black" type="text" name="title" placeholder="Title" required="required">
            </div>
            <div>
                <label>Price</label>
                <input style="color: black" type="num" name="price" placeholder="Price" required="required">
            </div>
            <div>
                <label>Image</label>
                <input type="file" name="image" placeholder="Image" required="required">
            </div>
            <div>
                <label>Recipe</label>
                <input style="color: black" type="text" name="recipe" placeholder="Recipe" required="required">
            </div>

            <div>
                <input type="submit" value="Save">
            </div>
        </form>

        <div>
          <table background="white" style="padding-bottom: 30px">
            <tr>
              <th style="padding: 30px">Product Name</th>
              <th style="padding: 30px">Price</th>
              <th style="padding: 30px">Repice</th>
              <th style="padding: 30px">Image</th>
              <th style="padding: 30px">Action</th>


            </tr>
            @foreach($data as $data)
            <tr align="center">
              <td>{{$data->title}}</td>
              <td>{{$data->price}}</td>
              <td>{{$data->recipe}}</td>
              <td><img height='200px' width='200px' src="/productimage/{{$data->image}}"></td>
              <td><a href="{{url('/deleteproduct', $data->id)}}">Delete</a></td>

            </tr>
            @endforeach
          </table>

        </div>

     </div>

  </div>
    @include("admin.adminscript")
  </body>
</html>
 