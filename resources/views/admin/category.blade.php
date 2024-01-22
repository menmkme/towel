<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->

    @include('admin.css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
            }
            .center
            {
                margin: auto;
                width: 50%;
                text-align: center;
                margin-top: 30px;
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
                <div class="div_center" style="color: #495057">
                    <h2 class="h2_font">Add Catergory</h2>
                    <form action="{{ url('/add_catagory') }}" method="POST">
                        @csrf
                        <input class="text_color" type="text" name="catagory" placeholder="write catgory name"></br></br>
                        <input type="submit" value="Add Catagory" class="btn btn-success add-button" style="color: #495057">
                    </form>
                </div>

                <div class="div_center">

                    <table class="center" style="color: #495057">

                    <tr >
                        <td>Catagory Name</td>
                        <td>Action</td>
                    </tr>
                    @foreach ($data as $data)
                       <tr>
                        <td>{{ $data->catagory_name }}</td>
                        <td>
                            <a onclick="confirmation(event)" href="{{ url('delete_catagory', $data->id) }}"><button class="btn"><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                    @endforeach

                </table>

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
    <script>
        function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title: "Are you sure to this Catagory",
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
