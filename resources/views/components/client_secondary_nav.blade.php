<!-- secondary navbar section start  -->
<section class="container mt-4" style="padding-top:7rem">
    <div class="row secondary-nav">
        <div class="col-lg-9 d-lg-block d-none">
            <form class="search-box" action="{{ route('search') }}" method="get">
                <input type="search" placeholder="Search.." name="search" value="{{ request('search') }}" class="">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <!-- <span class="fas fa-search"></span> -->
        <select name="category" id="category" class="col-lg-2 col-md-3 col-sm-4 col-6 d-block select-box mb-3">
            <option value="choose">Choose Brands..</option>
            <option value="all">All Product</option>
            @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
            @endforeach
        </select>
    </div>
</section>
<!-- secondary navbar section end  -->