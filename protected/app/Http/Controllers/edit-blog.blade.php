
<!-- #edit -->
<div class="container">
   <div class="form">
     <form role="form" method="POST" action="submit" >
       {{ csrf_field() }}
       <div class="form-row">
         <input type="hidden" name="code" value= "{{ $blog->id }}" required autofocus>
         <div class="form-group col-md-12">
           <input type="text" name="title" id="title" value="{{ $blog->title  }}" required />
           <div class="validation"></div>
         </div>

       <div class="form-group">
         <textarea class="form-control" type="text" name="content" id="content" required >{{ $blog->content  }}</textarea>
         <div class="validation"></div>
       </div>
       <div class="text-center"><button type="submit" name="submit">Update</button></div>
     </form>
   </div>
 </div>
</div>
<!-- #edit -->
