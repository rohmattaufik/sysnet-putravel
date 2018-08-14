@extends('layouts.app')
@section('content')


<!-- #create -->
<div class="container">
   <div class="form">
     <form role="form" method="POST" action="position/create" >
       {{ csrf_field() }}
       <div class="form-row">
         <div class="form-group col-md-12">
           <input type="text" name="position_name"
                  class="form-control" id="name" placeholder="position_name*"
                  data-msg="Please enter at least 4 chars" required />
           <div class="validation"></div>
         </div>
       </div>
       <div class="text-center"><button type="submit" name="submit">Post</button></div>
     </form>
   </div>
 </div>
</div>
<!-- #create -->


<!-- #List -->
@foreach($data as $content)
  Title : {{ $content->position_name }}
  <br>
  Created_at : {{ $content->created_at }}
  <br>
  Created_by : {{ $content->created_by }}
  <br>
  <div class="form">
    <form role="form" method="POST" action="position/delete" >
      {{ csrf_field() }}
      <input type="hidden" name="code" value= "{{ $content->id }}" required autofocus>
      <div class="text-center"><button type="submit" name="submit">Delete</button></div>
    </form>
  <a href="position/edit/{{ $content->id }}"> Edit</a>
  </div>
  <br>
  <br>
  <br>
@endforeach
@stop
<!-- List -->
