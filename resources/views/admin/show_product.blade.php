<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Required meta tags -->

    @include('admin.css')

    <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }
        .font_size
        {
            text-align: center;
            font-size: 40px;
            padding-top: 20px;
        }
        .img_size
        {
            height: 70px;
            width: 100px;
        }
        .th_col
        {
            background: #f1959a;
        }
        .th_d
        {
            padding: 20px;
        }
        .btn {
            background-color: #f1959a;
            border: none;
            color: white;
            padding: 7px 9px;
            font-size: 16px;
            cursor: pointer;
        }

/* Darker background on mouse-over */
        .btn:hover {
             background-color: #d16a70;
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
        <div class="main-panel">
            <div class="content-wrapper" style="background: rgb(214, 208, 208)">

                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss = "alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif
                <h2 class="font_size">All Available Product</h2>
                <table class="center">
                    <tr class="th_col">

                        <td class="th_d">Title</td>
                        <td class="th_d">Description</td>
                        <td class="th_d">Quantity</td>
                        <td class="th_d">Catagory</td>
                        <td class="th_d">Price</td>
                        <td class="th_d">Discount</td>
                        <td class="th_d">Image</td>
                        <td class="th_d">Action</td>
                    </tr>

                    @foreach ($product as $product)
                    <tr style="color: #495057">

                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->catagory }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price }}</td>
                        <td>
                            <img class="img_size" src="/product/{{ $product->image }}">
                        </td>
                        <td>
                            <a onclick="confirmation(event)" href="{{ url('edit_product', $product->id)  }}"><button class="btn"><i class="fa fa-edit"></i></button></a>
                            <a onclick="confirmation(event)" href="{{ url('delete_product', $product->id)  }}"><button class="btn"><i class="fa fa-trash"></i></button></a>

                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script>
                    function confirmation(ev) {
                        ev.preventDefault();
                        var urlToRedirect = ev.currentTarget.getAttribute('href');
                        console.log(urlToRedirect);

                        swal({
                            title: "Are you sure to this Action",
                            text: "You will not be able to revert this!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willCancel) => {
                            if(willCancel) {

                                window.location.href = urlToRedirect;
                            }
                        });
                    }
                  </script>
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>
