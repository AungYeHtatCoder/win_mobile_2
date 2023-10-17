<x-layout>

 <!-- profile section start -->
 <section style="padding-top: 10rem;">
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
     <div style="text-align: center;">
      <h4>Order History</h4>
     </div>
     <table class="mt-3 border table table-striped">
      <thead>
       <tr>
        <th>#</th>
        <th>Order ID</th>
        <th>Product</th>
        <th>Cost</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>
       </tr>
      </thead>
      <tbody>
       @foreach($orders as $key=> $order)
       <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $order->id }}</td>
        @if($order->product_id == "")
        <td>{{ $order->accessory->name}}</td>
        @else ($order->accessory_id == "")
        <td>{{ $order->product->name}}</td>
        @endif
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->created_at->format('Y-m-d') }}</td>
        <td></td>
        <td><a href="{{url('/order_detail/'.$order->id) }}" class="btn btn-sm btn-primary">Detail</a></td>
       </tr>
       @endforeach
      </tbody>
     </table>
    </div>
   </div>
  </div>
 </section>
 <!-- profile section end -->

</x-layout>