
<!-- #edit -->
<div class="container">
   <div class="form">
     <form role="form" method="POST" action="submit" >
       {{ csrf_field() }}
       <div class="form-row">
         <input type="hidden" name="code" value= "{{ $jabatan->id }}" required autofocus>
         <div class="form-group col-md-12">
           <input type="text" name="position_name" id="position_name" value="{{ $jabatan->position_name  }}" required />
           <div class="validation"></div>
         </div>
       </div>
       <div class="text-center"><button type="submit" name="submit">Update</button></div>
     </form>
   </div>
 </div>
</div>
<!-- #edit -->
