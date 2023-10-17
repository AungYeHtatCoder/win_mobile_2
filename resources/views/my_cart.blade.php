<x-layout>
    {{-- <x-client_secondary_navbar /> --}}
    <!-- content section start  -->
    <section class="container mt-md-5" id="cart" style="overflow: hidden;">
        <div class="row">
            <div class="col-md-8 mx-1">
                @auth
                @foreach ($carts as $cart)
                @if ($cart->product_id)
                <div class="row border mb-md-2 p-md-2">
                    <div class="col-md-9 d-flex">
                        <img src="{{ $cart->product->img1_url }}" class="img-fluid w-25" alt="">
                        <div class="mx-3 text-secondary">
                            <h5>{{ $cart->product->name }}<sup class="text-success"><small>{{ $cart->product_prices->category->name }}</small></sup></h5>
                            <h6>Color: {{ $cart->color->name }}</h6>
                            <span class="d-block">Storage: {{ $cart->product_prices->storage->name }}</span>
                            <span class="d-block">RAM: {{ $cart->product_prices->ram->name }}</span>
                            <span class="d-block">Total Price:
                                {{ number_format($cart->qty * $cart->unit_price) }}
                                MMK
                            </span>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veniam.</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <form action="{{ url('/cart/update/'.$cart->id) }}" method="POST" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12 mb-3 d-flex align-items-center p-md-2 p-sm-1">
                                    <label for="qty" class="col-form-label">Qty:</label>
                                    <input type="number" name="qty" value="{{ $cart->qty }}" class="form-control m-2" id="qty">
                                </div>
                                <div
                                    class="col-lg-12 col-md-6 col-sm-12 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="m-1">
                                        <a href="{{ url('/cart/delete/'.$cart->id) }}" class="btn btn-outline-warning">Remove</a>
                                    </div>
                                    <div class="m-1">
                                        <button class="btn btn-outline-danger" type="submit">Update</button>
                                        {{-- <a href="" class="btn btn-outline-danger">Update</a> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                <div class="row border mb-md-2 p-md-2">
                    <div class="col-md-9 d-flex">
                        <img src="{{ $cart->accessory->img1_url }}" class="img-fluid w-25" alt="">
                        <div class="mx-3 text-secondary">
                            <h5>{{ $cart->accessory->name }}<sup class="text-success"><small>{{ $cart->accessory->category->name }}</small></sup></h5>
                            <h6>Color: {{ $cart->color->name }}</h6>
                            {{-- <span class="d-block">Storage: {{ $cart->product_prices->storage->name }}</span> --}}
                            {{-- <span class="d-block">RAM: {{ $cart->product_prices->ram->name }}</span> --}}
                            <span class="d-block">Total Price:
                                {{ number_format($cart->qty * $cart->unit_price) }}
                                MMK
                            </span>
                            {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, veniam.</p> --}}
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <form action="{{ url('/cart/update/'.$cart->id) }}" method="POST" class="form-group">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12 col-md-6 col-sm-12 mb-3 d-flex align-items-center p-md-2 p-sm-1">
                                    <label for="qty" class="col-form-label">Qty:</label>
                                    <input type="number" name="qty" value="{{ $cart->qty }}" class="form-control m-2" id="qty">
                                </div>
                                <div
                                    class="col-lg-12 col-md-6 col-sm-12 mb-3 d-flex justify-content-center align-items-center">
                                    <div class="m-1">
                                        <a href="{{ url('/cart/delete/'.$cart->id) }}" class="btn btn-outline-warning">Remove</a>
                                    </div>
                                    <div class="m-1">
                                        <button class="btn btn-outline-danger" type="submit">Update</button>
                                        {{-- <a href="" class="btn btn-outline-danger">Update</a> --}}
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
                @endauth
            </div>
            @auth
            <div class="col-md-3 shadow p-3 bg-body rounded h-50">
                <h4 class="text-center">Total</h4>
                <div class="col-lg-12 d-flex justify-content-between">
                    <h6>Order Items</h6> <strong class="fw-bold">{{ $carts->count() }}</strong>
                </div>
                <div class="col-lg-12 d-flex justify-content-between">
                    <h6>Sub total</h6> <strong class="text-success fw-bold">
                        {{ number_format($carts->sum(function($cart) {
                            return $cart->qty * $cart->unit_price;
                        })) }} MMK
                    </strong>
                </div>

                <div class="col-lg-12 w-100 mt-3 text-center">
                    <a href="{{ url('/checkout') }}" class="btn btn-primary btn-block checkout">Check Out</a>
                </div>
            </div>
            @endauth
            @guest
            <div class="text-center">
                <p class="text-center">Please Login First</p>
                <a href="{{ route('login') }}">Login Here</a>
            </div>
            @endguest
        </div>
    </section>
    <!-- content section end  -->

</x-layout>
