<x-layout>

 <!-- profile section start -->
 <section>
  <div class="container">
   <div class="row">
    <aside class="col-md-4 border p-3">
     <div class="d-flex flex-column justify-content-center align-items-center">
      <img src="{{ asset('assets/profile.png') }}" class="w-25 rounded-full" alt="">
      <h4>CL1234</h4>
      <a href="/change-password" class="text-secondary"><small>Change Password</small></a>
     </div>
     <ul class="list-group mt-2">
      <li class="list-group-item">
       <a href="/profile">Profile</a>
      </li>
      <li class="list-group-item">
       <a href="/order-history">Order History</a>
      </li>
     </ul>
    </aside>
    <div class="col-md-8">
     <form action="">
      <table class="table">
       <tr>
        <td>Client ID</td>
        <td>:</td>
        <td>CL1234</td>
       </tr>
       <tr>
        <td>Name</td>
        <td>:</td>
        <td>Kyaw Swar Htun</td>
       </tr>
       <tr>
        <td>Email</td>
        <td>:</td>
        <td>kyawswarhtun@gmail.com</td>
       </tr>
       <tr>
        <td>Phone</td>
        <td>:</td>
        <td>09-123456789</td>
       </tr>
       <tr>
        <td>Address</td>
        <td>:</td>
        <td>Rose Street, Madalay</td>
       </tr>
      </table>
      <div class="text-center">
       <a href="/profile-edit" class="btn btn-secondary">Edit</a>
      </div>
     </form>
    </div>
   </div>
  </div>
 </section>
 <!-- profile section end -->

</x-layout>