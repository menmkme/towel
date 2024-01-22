<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
    <!-- Required meta tags -->

    @include('admin.css')

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
 /* Darker background on mouse-over */
        .btn:hover {
             background-color: #d16a70;
            }
</style>


  </head>
  <body>

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
                <div class="div_center">
                    <h2 class="h2_font" style="color: #495057">Send Email</h2>
                    <form action="{{ url('/send_user_email', $order->id) }}" method="POST">
                        @csrf
                        <div class="div_design">
                        <label class="label">Email Greeting:</label>
                        <input class="text_color" type="text" name="greeting" placeholder="write a greeting" required>
                        </div>

                        <div class="div_design">
                            <label class="label">Email First-Line:</label>
                            <input class="text_color" type="text" name="firstline" placeholder="write a firstline" required>
                            </div>

                            <div class="div_design">
                                <label class="label">Email Body:</label>
                                <input class="text_color" type="text" name="body" placeholder="write a body" required>
                                </div>

                                <div class="div_design">
                                    <label class="label">Email Button Name:</label>
                                    <input class="text_color" type="text" name="button" placeholder="write a ..." required>
                                    </div>

                                <div class="div_design">
                                    <label class="label">Email Url:</label>
                                    <input class="text_color" type="text" name="url" placeholder="write a url" required>
                                    </div>

                                    <div class="div_design">
                                        <label class="label">Email Last-Line:</label>
                                        <input class="text_color" type="text" name="lastline" min="0" placeholder="write a lastline" required>
                                        </div>


                                            <div class="div_design">

                                                <input type="submit" value="Send Email" class="btn btn-success add-button" style="color: #495057">
                                                </div>
                    </form>
                </div>
            </div>
        </div>
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
