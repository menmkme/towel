<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Towel-</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.css') }}" />
      <!-- font awesome style -->
      <link rel="stylesheet" href="{{ asset('home/css/font-awesome.min.css') }}" />
      <!-- Custom styles for this template -->
      <link rel="stylesheet" href="{{ asset('home/css/style.css') }} "/>
      <!-- responsive style -->
      <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}" />

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
   </head>
   <body>

    @include('sweetalert::alert')
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->
         <!-- slider section -->
         @include('home.slider')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('home.why')
      <!-- end why section -->

      <!-- arrival section -->
      @include('home.new_arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('home.product')
      <!-- end product section -->

      {{-- Comment and reply system start here --}}

      <div style="text-align: center; padding-bottom: 30px">
        <h1 style="font-size: 30px; text-align: center; padding-top: 20px; padding-bottom: 20px;">Comments</h1>

        <form action="{{ url('add_comment') }}" method="POST">
            @csrf
            <textarea style="height: 150px; width: 600px;" name="comment" placeholder="Comment something here"></textarea>
            <br>
            <input type="submit" value="Comment Here" class="btn btn-success add-button" >
        </form>
      </div>

      <div style="padding-left: 20%">
        <h1 style="font-size: 20px; padding-bottom: 20px">All Comments</h1>

        @foreach ($comment as $comment)


        <div>
            <b>{{ $comment->name }}</b>
            <p>{{ $comment->comment }}</p>

            <a style="color: blue" href="javascript::void(0);" onclick="reply(this)" data-Commentid = "{{ $comment->id }}">Reply Here</a>

        @foreach ($reply as $replies)

        @if ($replies->comment_id == $comment->id)


        <div style="padding-left: 3%; padding-bottom: 10px;">
            <b>{{ $replies->name }}</b>
            <p>{{ $replies->reply }}</p>

            <a style="color: blue" href="javascript::void(0);" onclick="reply(this)" data-Commentid = "{{ $comment->id }}">Reply</a>

        </div>

        @endif

        @endforeach

        </div>

        @endforeach

        {{-- Reply TextBox --}}
        <div style="display: none" class="replyDiv">
        <form action="{{ url('add_reply') }}" method="POST">

            @csrf
            <input type="text" id="commentId" name="commentId" hidden>
            <textarea style="height: 100px; width: 400px;" name="reply" placeholder="Write something here"></textarea>
            <br><button type="submit" class="btn btn-success add-button" style="color: black">Reply</button>
            <a href="javascript::void(0);" class="btn btn-danger add-button" onclick="reply_close(this)">Close</a>

        </form>
        </div>
      </div>

      {{-- Comment and reply system end here --}}

      <!-- subscribe section -->
      @include('home.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('home.client')
      <!-- end client section -->
      <!-- footer start -->
      @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2023 All Thanks goes to ALLAH</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">Nmk</a>

         </p>
      </div>

      <script type="text/javascript">

        function reply(caller) {

            document.getElementById('commentId').value=$(caller).attr('data-Commentid');

            $('.replyDiv').insertAfter($(caller));

            $('.replyDiv').show();
        }

        function reply_close(caller) {


            $('.replyDiv').hide();
        }
      </script>

<script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>

      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>
