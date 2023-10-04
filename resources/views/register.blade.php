<x-layout>
<!-- content section start  -->
  <section class="registers " style="padding-top: 5rem;">
    <div class="row d-flex flex-column justify-content-center align-items-center">
      <form class="col-md-6 shadow p-3 bg-body rounded mt-5 mb-5 d-flex flex-column justify-content-center align-items-center">

        <h4 class="text-center p-3">Register here!</h4>

        <div class="form-group row mb-3">
          <div class="input-group">
            <label for="firstname">First Name</label>
            <!-- <div class="input-group-addon fs-4">
              <span class="input-group-text"><i class="fas fa-user"></i></span>
            </div> -->
            <input type="text" class="form-control" name="firstname" >
          </div>
        </div>
        <div class="form-group row mb-3">
          <div class="input-group">
            <label for="firstname">Last Name</label>
            <input type="email" class="form-control" name="email" >
          </div>
        </div>
        <div class="form-group row mb-3">
          <div class="input-group">
            <label for="firstname">Email</label>
            <input type="text" class="form-control" name="" >
          </div>
        </div>
        <div class="form-group row mb-3">
          <div class="input-group">
            <label for="firstname" >Phone</label>
            <input type="text" class="form-control" name="" >
          </div>
        </div>
        <div class="form-group row mb-3">
          <div class="input-group">
            <label for="firstname">Password</label>
            <input type="password" class="form-control" name="password" >
          </div>
        </div>

        <div class="form-group row mb-3 fw-bold">
          <div class="col-sm-10 w-100 d-flex justify-content-between align-items-center">
            <div class="form-check me-5">
              <input class="form-check-input" type="checkbox" id="gridCheck1">
              <label class="form-check-label" for="gridCheck1">
                Remember Login
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Register</button>
          </div>
        </div>

        <div class="form-group row mb-3">
          <a href="login.html" class="fw-bold">Already have an account? login here..</a>
        </div>
        
      </form>
    </div>
  </section>


  <!-- content section end  -->

</x-layout>