<x-layout>
    {{-- checkout list --}}
    <section class="container my-5">
        <h3 class="text-center">Checkout Lists</h3>
        <div class="row">
            <div class="col-md-8 mb-3">
                <h4 class="text-start my-3">Delivery Information</h4>
                <form action="{{ url('/deliveryInfo') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" disabled name="name" value="{{ Auth::user()->name }}">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" disabled id="email" name="email" value="{{ Auth::user()->email }}">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="text" class="form-control" id="phone" required name="phone" value="{{ Auth::user()->phone }}" placeholder="Enter Phone Number">
                            </div>
                            @error('phone')
                            <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="mb-3">
                                <label for="address" class="form-label">Full Address</label>
                                <input type="text" class="form-control" required id="address" name="address" value="{{ Auth::user()->address }}" placeholder="Enter Full Address">
                            </div>
                            @error('address')
                            <span class="text-danger">*{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-outline-danger" type="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 mb-3">
                <h4 class="text-start my-3">Ordered Items - {{ $carts->count() }} pcs</h4>
                <div class="card p-3" style="overflow: scroll; height: 200px;">
                    @auth
                    @foreach ($carts as $cart)
                    @if ($cart->product_id)
                    <div class="row border mb-md-2 p-md-2">
                        <div class="col-md-12 d-flex">
                            <img src="{{ $cart->product->img1_url }}" class="img-fluid w-25" alt="">
                            <div class="mx-3 text-secondary">
                                <p class="mb-0">{{ $cart->product->name }}<sup class="text-success"><small>{{ $cart->product_prices->category->name }}</small></sup></p>
                                <small class="badge text-bg-primary">{{ $cart->color->name }}</small>
                                <small class="badge text-bg-primary">{{ $cart->product_prices->storage->name }}</small>
                                <small class="badge text-bg-primary">{{ $cart->product_prices->ram->name }}</small>
                                <small class="d-block">Qty : {{ $cart->qty }}</small>
                                <small class="d-block">Unit Price:
                                    {{ number_format($cart->unit_price) }}
                                    MMK
                                </small>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="row border mb-md-2 p-md-2">
                        <div class="col-md-12 d-flex justify-content-around">
                            <img src="{{ $cart->accessory->img1_url }}" class="img-fluid w-25" alt="">
                            <div class="mx-3 text-secondary">
                                <p class="mb-0">{{ $cart->accessory->name }}<sup class="text-success"><small>{{ $cart->accessory->category->name }}</small></sup></p>
                                <small>Color: {{ $cart->color->name }}</small>
                                <small class="d-block">Qty : {{ $cart->qty }}</small>
                                <small class="d-block">Unit Price:
                                    {{ number_format($cart->unit_price) }}
                                    MMK
                                </small>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endauth
                </div>

                <h4 class="mt-5">Payment Methods</h4>

                <form action="{{ url('/order') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="cod" class="form-label d-block no_payment">
                            <input type="radio" name="payment_method" id="cod" value="Cash On Delivery">
                            Cash On Delivery
                        </label>
                        <label for="kpay" class="form-label d-block payment">
                            <input type="radio" name="payment_method" id="kpay" value="KBZ Pay">
                            KBZ Pay
                        </label>
                        <label for="wpay" class="form-label d-block payment">
                            <input type="radio" name="payment_method" id="wpay" value="Wave Pay">
                            Wave Pay
                        </label>
                        <label for="yoma" class="form-label d-block payment">
                            <input type="radio" name="payment_method" id="yoma" value="Yoma Bank">
                            Yoma Bank
                        </label>
                        <label for="kbz" class="form-label d-bloc paymentk">
                            <input type="radio" name="payment_method" id="kbz" value="KBZ Bank">
                            KBZ Bank
                        </label>
                        <label for="aya" class="form-label d-block payment">
                            <input type="radio" name="payment_method" id="aya" value="AYA Bank">
                            AYA Bank
                        </label>
                        <label for="cb" class="form-label d-block payment">
                            <input type="radio" name="payment_method" id="cb" value="CB Bank">
                            CB Bank
                        </label>
                    </div>
                    @error('payment_method')
                    <span class="text-danger">*{{ $message }}</span>
                    @enderror
                    <div class="mb-3 payment_photo d-none">
                        <input type="file" name="payment_photo" id="" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-outline-danger" type="submit">Order Now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

</x-layout>
<script>
    $(document).ready(function(){
        $(".payment").click(function(){
            $('.payment_photo').removeClass('d-none');
        })
        $(".no_payment").click(function(){
            $('.payment_photo').addClass('d-none');
        })
    })
</script>
