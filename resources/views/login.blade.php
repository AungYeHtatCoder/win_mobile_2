<x-layout>

    <!-- content section start  -->
  <section class="logins" style="padding-top: 7rem;">
    <div class="row d-flex flex-column justify-content-center align-items-center">
      <form class="col-lg-4 col-md-6 col-sm-8 shadow p-3 bg-body rounded mt-5 mb-5">

        <h4 class="text-center p-3">Login here!</h4>
        <div class="form-group row mb-3">
          <div class="input-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
          </div>
        </div>
        <div class="form-group row mb-3">
          <div class="input-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
        </div>
        <div class="form-group row mb-3 fw-bold">
          <div class="col-sm-10 w-100 d-flex justify-content-between align-items-center">
            <a href="#" class="text-danger fw-bold">Forget password!</a>
            <button type="submit" class="btn btn-primary">Log in</button>
          </div>
        </div>

        <div class="form-group row mb-3">
          <a href="register.html" class="fw-bold">If you don't have an account, Register here!</a>
        </div>
      </form>
    </div>
  </section>

  <!-- content section end  -->



</x-layout>