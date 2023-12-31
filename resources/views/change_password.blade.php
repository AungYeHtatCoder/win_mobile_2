<x-layout>
 <!-- profile section start -->
 <section style="padding-top: 9rem;">
  <div class="container d-flex justify-content-center">
   <div class="row">
    <div class="col-md-12">
     <form action="{{ url('/profile/changepassword/') }}" method="post">
      @csrf
      <table class="table">
       <tr>
        <td>Old Password</td>
        <td>:</td>
        <td>
         <input type="password" name="old_password" class="form-control" value="">
         @error('old_password')
         <p class="text-danger">*{{ $message }}</p>
         @enderror
        </td>
       </tr>
       <tr>
        <td>New Password</td>
        <td>:</td>
        <td>
         <input type="password" name="password" class="form-control" value="">
         @error('password')
         <p class="text-danger">*{{ $message }}</p>
         @enderror
        </td>
       </tr>
      </table>
      <div class="d-flex">
       <div class="text-center ">
        <a href="/profile" class="btn btn-danger">Back</a>
       </div>
       <div class="text-center mx-auto">
        <button class="btn btn-primary">Save</button>
       </div>

      </div>

     </form>
    </div>
   </div>
  </div>
 </section>
 <!-- profile section end -->

</x-layout>
