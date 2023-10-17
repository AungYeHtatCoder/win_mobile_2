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
     <form action="{{ url('/profile/update/'.Auth::user()->id) }}" method="post">
      @csrf
      <table class="table">
       <!-- <tr>
              <td>Client ID</td>
              <td>:</td>
              <td>CL1234</td>
            </tr> -->
       <tr>
        <td>Name</td>
        <td>:</td>
        <td>
         <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
        </td>
       </tr>
       <tr>
        <td>Email</td>
        <td>:</td>
        <td>
         <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
        </td>
       </tr>
       <tr>
        <td>Phone</td>
        <td>:</td>
        <td>
         <input type="text" name="phone" class="form-control" value="{{ Auth::user()->phone }}">
        </td>
       </tr>
       <tr>
        <td>Address</td>
        <td>:</td>
        <td>
         <input type="text" name="address" class="form-control" value="{{ Auth::user()->address }}">
        </td>
       </tr>
      </table>
      <div class="text-center">
       <button class="btn btn-primary">Save</button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </section>
 <!-- profile section end -->

</x-layout>