<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @include('admin.css')

    <style type="text/css">
        .center
        {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
            border-inline-width: 20px;
            border-radius: 20px;
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
            background-color: f1959a;
            border: none;
            color: white;
            padding: 7px 9px;
            font-size: 16px;
            cursor: pointer;
        }

/* Darker background on mouse-over */
        .btn:hover {
             background-color: #94494d;
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

        <div class="main-panel">
            <div class="content-wrapper" style="background: rgb(214, 208, 208)">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss = "alert" aria-hidden="true">x</button>
                    {{ session()->get('message') }}
                </div>
                @endif

                <h2 class="font_size">All Available Order</h2>
                <div class="font_size">
                    <form action="{{ url('search') }}" method="GET">
                        @csrf
                        <input type="text" name="search" placeholder="search something" style="color: black">
                        <button class="btn" ><i class="fa fa-search"></i></button>
                    </form>
                </div>
                <div>
                    <table class="center" style="width: 800px;">
                    <tr class="th_col">

                        <td class="th_d">Name</td>
                        {{-- <td class="th_d">Email</td> --}}
                        <td class="th_d">Address</td>
                        <td class="th_d">Phone</td>
                        <td class="th_d">Product title</td>
                        <td class="th_d">Price</td>
                        <td class="th_d">Payment Status</td>
                        <td class="th_d">Delivery Status</td>
                        {{-- <td class="th_d">Image</td> --}}
                        <td class="th_d">Delivered</td>
                        <td class="th_d">Print PDF</td>
                        <td class="th_d">Send Email</td>
                    </tr>

                    @forelse ($order as $order)
                    <tr style="color: #495057">

                        <td>{{ $order->name }}</td>
                        {{-- <td>{{ $order->email }}</td> --}}
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->product_title }}</td>
                        <td>{{ $order->price }}</td>
                        <td>{{ $order->payment_status }}</td>
                        <td>{{ $order->delivery_status }}</td>
                        {{-- <td>
                            <img class="img_size" src="/product/{{ $order->image }}">
                        </td> --}}
                        <td>
                            {{-- <a onclick="return confirm('Are you sure to edit this')" href="{{ url('edit_product', $order->id)  }}"><button class="btn"><i class="fa fa-edit"></i></button></a> --}}
                            {{-- <a onclick="return confirm('Are you sure to delete this')" href="{{ url('delete_product', $order->id)  }}"><button class="btn"><i class="fa fa-trash"></i></button></a> --}}

                            @if ($order->delivery_status == 'Processing')


                            <a onclick="confirmation(event)" href="{{ url('delivered', $order->id)  }}"><button class="btn"><i class="fa fa-truck"></i></button></a>

                            @else
                                <p style="color: #495057">Delivered</p>
                            @endif
                        </td>

                        <td>
                            <a  href="{{ url('print_order', $order->id)  }}"><button class="btn"><i class="fa fa-print"></i></button></a>
                        </td>

                        <td>
                            <a  href="{{ url('send_email', $order->id)  }}"><button class="btn"><i class="fa fa-envelope"></i></button></a>
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="16">
                            No Data Found
                        </td>
                    </tr>

                    @endforelse
                </table>


                </div>

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
                title: "Are you sure is delivered",
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
