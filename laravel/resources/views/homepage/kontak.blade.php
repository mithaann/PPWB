@extends('layouts.template')
@section('content')
<!-- header section start -->
<section class="contact_section layout_padding">
   <div class="container">
     <div class="row">
       <div class="custom_heading-container ">
         <h2>
           Request A call back
         </h2>
       </div>
     </div>
   </div>
   <div class="container layout_padding2">
     <div class="row">
       <div class="col-md-5">
         <div class="form_contaier">
           <form>
             <div class="form-group">
               <label for="exampleInputName1">Name</label>
               <input type="text" class="form-control" id="exampleInputName1">
             </div>
             <div class="form-group">
               <label for="exampleInputNumber1">Phone Number</label>
               <input type="text" class="form-control" id="exampleInputNumber1">
             </div>
             <div class="form-group">
               <label for="exampleInputEmail1">Email </label>
               <input type="email" class="form-control" id="exampleInputEmail1">
             </div>
             <div class="form-group">
               <label for="exampleInputMessage">Message</label>
               <input type="text" class="form-control" id="exampleInputMessage">
             </div>
             <button type="submit" class="">Send</button>
           </form>
         </div>
       </div>
       <div class="col-md-7">
                    <img src="images/logom.png" alt="" style="width: 650px;">
                    <img src="images/fruit image.png" alt="">

         </div>
       </div>
     </div>
   </div>
 </section>
@endsection