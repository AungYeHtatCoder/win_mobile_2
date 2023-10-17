<x-layout>

 <!-- profile section start -->
 <section style="padding-top: 10rem;">
  <div class="container">
   <div class="row">
    <div class="col-md-10 mx-auto">
     <div>
      <h4 style="text-align: center;">Order Detail</h4>
      <a href="{{ url('/order_history') }}" class="btn btn-sm btn-danger ml-auto">Back</a>
     </div>

     <table class="mt-3 border table table-striped">
      <thead>
       <tr>
        <th>Product</th>
        <th>Color</th>
        <th>Qty</th>
        <th>Unit Price</th>
        <th>Total Price</th>
       </tr>
      </thead>
      <tbody>
       <tr>
        @if($details->product_id == "")
        <td>{{ $details->accessory->name}}</td>
        @else ($details->accessory_id == "")
        <td>{{ $details->product->name}}</td>
        @endif
        <td>{{ $details->color->name }}</td>
        <td>{{ $details->qty }}</td>
        <td>{{ $details->unit_price }}</td>
        <td>{{ $details->total_price }}</td>
       </tr>

      </tbody>
     </table>
    </div>
   </div>
  </div>

 </section>
 <!-- profile section end -->

</x-layout>