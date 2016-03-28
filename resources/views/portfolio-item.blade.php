<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portfolio Item - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="http://daverobbdesigns.com/public/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="http://daverobbdesigns.com/public/css/portfolio-item.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="http://daverobbdesigns.com/public/css/lity.css" rel="stylesheet">
    <script src="http://daverobbdesigns.com/public/js/lity.min.js"></script>

</head>

<body>

    <!-- Navigation -->
    <header class="row">
        @include('nav')
    </header>

    <!-- Page Content -->
    <div class="container">


                <!-- Portfolio Item Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">{{ $project['name'] }}



                    <small>{{ Html::link($project['url']) }}</small>
                </h1>
                <p>View full website image by clicking on the image bellow</p>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <a href='http://daverobbdesigns.com/public/images/long/{{$project['url_to_long_image']}}' data-lity><img class="img-responsive" src='http://daverobbdesigns.com/public/images/portfolio/{{$project['url_to_portfolio_image']}}' /></a>
                {{--<img class="img-responsive" src="http://placehold.it/750x500" alt="">--}}
            </div>

            <div class="col-md-4">
                <h3>Project Description</h3>

                <p>{!!$project['description']!!}</p>

               <h3>Project Technical Details</h3>

                <p>{!!$project['technology']!!}</p>

               {{-- <ul>

                @foreach ($tags as $tag)
                    <li>{{ $tag->name }}</li>
                @endforeach

                </ul>
--}}
            </div>

        </div>
                <!-- /.row -->

        <!-- Screen Shots -->
       {{-- <div class="row">

            <div class="col-lg-12">
                <h3 class="page-header">Other Screen Shots</h3>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

            <div class="col-sm-3 col-xs-6">
                <a href="#">
                    <img class="img-responsive portfolio-item" src="http://placehold.it/500x300" alt="">
                </a>
            </div>

        </div>--}}
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        
        <footer class="row">
            @include('footer')
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


</body>

</html>
