<x-layout>
 <!-- profile section start -->
 <section style="padding: 5rem;">
  <div class="container">
   <div class="row">
    <aside class="col-md-4 border p-3">
     <div class="d-flex flex-column justify-content-center align-items-center">
      <img src="{{ Auth::user()->profile }}" class="w-25 rounded-full" alt="">
      <h4>{{ Auth::user()->name }}</h4>
      <a href="/change-password" class="text-secondary"><small>Change Password</small></a>
     </div>
     <ul class="list-group mt-2">
      <li class="list-group-item">
       <a href="/profile">Profile</a>
      </li>
      <li class="list-group-item">
       <a href="{{ url('/order_history') }}">Order History</a>
      </li>
     </ul>
    </aside>
    <div class="col-md-8">
     <form action="">
      <table class="table">
       {{-- <tr>
              <td>Client ID</td>
              <td>:</td>
              <td>CL1234</td>
            </tr> --}}
       <tr>
        <td>Name</td>
        <td>:</td>
        <td>{{ Auth::user()->name }}</td>
       </tr>
       <tr>
        <td>Email</td>
        <td>:</td>
        <td>{{ Auth::user()->email }}</td>
       </tr>
       <tr>
        <td>Phone</td>
        <td>:</td>
        <td>{{ Auth::user()->phone ?? "" }}</td>
       </tr>
       <tr>
        <td>Address</td>
        <td>:</td>
        <td>{{ Auth::user()->address ?? "" }}</td>
       </tr>
      </table>
      <div class="text-center">
       <a href="{{ url('/profile-edit') }}" class="btn btn-secondary">Edit</a>
      </div>
     </form>
    </div>

   </div>
   </form>
  </div>
  </div>
  </div>
 </section>
 <!-- profile section end -->

</x-layout>
