<x-layout>
 {{-- checkout list --}}
 <section class="container my-5" style="padding-top:5rem;">
  <div class="d-flex justify-content-start">
   <div>
    <a href="{{ url('/') }}" class="btn btn-sm btn-outline-success">Back To Home</a>
   </div>
  </div>
  <h3 class="text-center text-success">You have ordered successfully.</h3>
  <div class="row">
   <div class="col-lg-4 col-md-5 col-8 mx-auto offset-md-4">
    <div class="card my-5 p-4  text-center border-none shadow">
     <div class="d-flex ">
      <div class="me-4 ">
       Name :
      </div>
      <div>
       {{ $order->user->name }}
      </div>
     </div>
     <div class="d-flex">
      <div class="me-4">
       Email :
      </div>
      <div>
       {{ $order->user->email }}
      </div>
     </div>
     <div class="d-flex">
      <div class="me-4">
       Phone :
      </div>
      <div>
       {{ $order->user->phone }}
      </div>
     </div>
     <div class="d-flex">
      <div class="me-4">
       Address :
      </div>
      <div>
       {{ $order->user->address }}
      </div>
     </div>
     <div class="d-flex">
      <div class="me-4">
       Order Status :
      </div>
      <div>
       <small class="badge text-bg-{{ $order->status == "pending" ? "primary" : "" }}{{ $order->status == "delivering" ? "info" : "" }}{{ $order->status == "completed" ? "success" : "" }}

                            ">{{ $order->status }}</small>

      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="row justify-content-center">
   <div class="col-md-10">
    <div class="table-responsive">
     <table class="table">
      <thead>
       <tr>
        <th>No</th>
        <th>Product</th>
        <th>Specifications</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total Price</th>
       </tr>
      </thead>
      <tbody>
       @foreach ($orderProducts as $key => $orderProduct)
       <tr>
        <td>{{ ++$key }}</td>
        <td>{{ $orderProduct->product->name ?? $orderProduct->accessory->name }}</td>
        <td>
         <small class="badge text-bg-primary">{{ $orderProduct->color->name }}</small>
         <small class="badge text-bg-info">Storage - {{ $orderProduct->product_prices->storage->name ?? "" }}</small>
         <small class="badge text-bg-warning">RAM - {{ $orderProduct->product_prices->ram->name ?? "" }}</small>
        </td>
        <td>
         {{ $orderProduct->qty }} pc{{ $orderProduct->qty > 1 ? "s" : "" }}
        </td>
        <td>
         {{ number_format($orderProduct->unit_price ) }} MMK
        </td>
        <td>
         {{ number_format($orderProduct->total_price ) }} MMK
        </td>
       </tr>
       @endforeach
      </tbody>
      <tfoot>
       <tr>
        <th colspan="5">
         Grand Total
        </th>
        <td>
         {{ number_format($orderProducts->sum('total_price') ) }} MMK
        </td>
       </tr>
      </tfoot>
     </table>
    </div>
   </div>
  </div>

 </section>

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
$(document).ready(function() {
 $(".payment").click(function() {
  $('.payment_photo').removeClass('d-none');
 })
 $(".no_payment").click(function() {
  $('.payment_photo').addClass('d-none');
 })
})
</script>