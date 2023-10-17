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
     <form action="{{ url('/profile/changeprofile/'. Auth::user()->id) }}" method="post" enctype="multipart/form-data">
      @csrf
      <ul class="list-group mt-2">
       <li class="list-group-item">
        <input type="file" name="profile" class="form-control">
       </li>
       <li class="list-group-item">
        <button type="submit" class="btn btn-primary">UpdateProfile</button>
       </li>
      </ul>
     </form>

    </aside>
    <div class="col-md-8">
     <form action="{{ url('/profile/update/'.Auth::user()->id) }}" method="post" enctype="multipart/form-data">
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
       <a href="/profile" class="btn btn-primary">Cancel</a>
       <button class="btn btn-primary">Save</button>
      </div>
     </form>
    </div>
   </div>
  </div>
 </section>
 <!-- profile section end -->

</x-layout>
<script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetAlert.js') }}"></script>
@if (Session::has('success'))
<script>
showSweetAlert("Success!", "{{ Session::get('success') }}", "success");
</script>
@endif
@if (Session::has('error'))
<script>
showSweetAlert("Sorry!", "{{ Session::get('error') }}", "error");
</script>
@endif
<script>