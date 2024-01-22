<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    {{-- <base href="/public"> --}}
    @include('admin.css')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style type="text/css">

            .div_center
            {
                text-align: center;
                padding: 40px;
                border: 3px solid #f1959a;
                width: 50%;
                margin: auto;
                border-inline-width: 20px;
                border-radius: 20px;
            }
            .h2_font
            {
                font-size: 40px;
                padding-bottom: 40px;
            }
            .text_color
            {
                color: black;
                padding-bottom: 10px;
            }
            .center
            {
                margin: auto;
                width: 50%;
                text-align: center;
                margin-top: 30px;
                border: 3px solid #f1959a;
            }
            .label
            {
                display: inline-block;
                width: 120px;
            }
            .div_design
            {
                padding-bottom: 15px;
            }
            .img
            {
                margin-left: 8%;
            }
    </style>

  </head>
  <body>
    @include('sweetalert::alert')
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.header')
        <!-- partial -->

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <div class="main-panel">
            <div class="content-wrapper" style="background: rgb(214, 208, 208)">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss = "alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                <div class="div_center">
                    <h2 class="h2_font">Edit Product</h2>
                    <form action="{{ url('/update_product', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="div_design">
                        <label class="label">Title:</label>
                        <input class="text_color" type="text" name="title" value="{{ $product->title }}" placeholder="write a title" required>
                        </div>

                        <div class="div_design">
                            <label class="label">Description:</label>
                            <input class="text_color" type="text" name="description" value="{{ $product->description }}" placeholder="write a description" required>
                            </div>

                            <div class="div_design">
                                <label class="label">Price:</label>
                                <input class="text_color" type="number" name="price" value="{{ $product->price }}" placeholder="write a price" required>
                                </div>

                                <div class="div_design">
                                    <label class="label">Discount:</label>
                                    <input class="text_color" type="number" name="discount_price" value="{{ $product->discount_price }}" placeholder="write a discount" required>
                                    </div>

                                <div class="div_design">
                                    <label class="label">Quantity:</label>
                                    <input class="text_color" type="number" name="quantity" value="{{ $product->quantity }}" min="0" placeholder="write a quantity" required>
                                    </div>

                                    <div class="div_design">
                                        <label class="label">Catagory</label>
                                        <select class="text_color" name="catagory" required>
                                            <option value="{{ $product->catagory }}" selected>{{ $product->catagory }}</option>

                                            @foreach ($catagory as $catagory)
                                            <option value="{{ $catagory->catagory_name }}">{{ $catagory->catagory_name }}</option>
                                            @endforeach



                                        </select>
                                    </div>

                                        <div class="div_design">
                                            <label class="img">Current Image:</label>
                                            <img src="/product/{{ $product->image }}" height="100" width="100" style="margin: auto">
                                            </div>

                                            <div class="div_design">
                                                <label class="img">Change Image:</label>
                                                <input class="" type="file" name="image" value="{{ $product->image }}">
                                                </div>

                                            <div class="div_design">

                                                <input type="submit" value="Edit Product" class="btn btn-success add-button" >
                                                </div>
                    </form>
                </div>

            </div>
          </div>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
