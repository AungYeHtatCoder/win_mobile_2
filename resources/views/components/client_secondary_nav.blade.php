<!-- secondary navbar section start  -->
<section class="container" style="padding-top: 10rem;">

 <div class="row secondary-nav">

  <div class="col-lg-9 col-md-8 d-sm-none d-none d-lg-block d-md-block">
   <form class="search-box">
    <input type="search" placeholder="Search.." name="search" class=" ">
    <button type="submit"><i class="fa fa-search"></i></button>
   </form>
  </div>

  <!-- <span class="fas fa-search"></span> -->

  <select name="category" id="category" class="col-lg-2 col-md-3 col-sm-4 col-4   d-block  select-box">
   <option value="choose">Choose Brands..</option>
   @foreach($brands as $brand)
   <option value="{{ $brand->name }}"><span class="fas fa-greater-than"></span><a href="">{{ $brand->name }}</a>
   </option>
   @endforeach
  </select>
 </div>

</section>
<!-- secondary navbar section end  -->