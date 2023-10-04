<x-layout>

      <!-- profile section start -->
    <section style="padding-top: 10rem;">
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
          <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Order ID</th>
                  <th>Product</th>
                  <th>Cost</th>
                  <th>Pay By</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>545121</td>
                  <td>iPhone 14 Pro</td>
                  <td>$ 420</td>
                  <td>K-pay</td>
                  <td>12-04-2023</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>484512</td>
                  <td>Gaming Head Phone</td>
                  <td>$ 50</td>
                  <td>Cash on Delivary</td>
                  <td>12-04-2023</td>
                </tr>
              </tbody>
          </table>
        </div>
      </div>
      </div>
    </section>
    <!-- profile section end -->

</x-layout>