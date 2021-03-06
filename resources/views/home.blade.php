<!doctype html>
<html>
<head>
    @include('head')
</head>
<body>
<div class="container">

    <header class="row">
        @include('nav')
    </header>

    <div id="main" class="row">
        <blockquote>

            <p>
            Hi, my name is David Robb, I'm a web developer based in North Carolina, USA.
             I have 5 years of professional programming experience
             (after earning my BSc in Software Technology from Edinburgh Napier University).
             I specialize in creating responsive websites with user-friendly back-ends.
            </p>

            <p>
             This is a portfolio of some of the projects that I have worked on over the past
             few years. Most of them use Wordpress or Drupal with varying levels of PHP, JavaScript,
             CSS and MySQL customization depending on the project.
            </p>


            </blockquote>
        <hr>
        <!-- /.row -->
        @foreach($project as $item)
            <div class="row">
                <div class="col-md-7">
                    <a href='http://daverobbdesigns.com/project/{{$item['id']}}'>
                        <img class="img-responsive border" src=http://daverobbdesigns.com/images/{{$item['url_to_image']}} alt="">
                    </a>
                </div>
                <div class="col-md-5">
                    <h3>{{$item['name']}}</h3>
                    <p>{{$item['short_description']}}</p>
                    <a class="btn btn-primary" href=http://daverobbdesigns.com/project/{{$item['id']}}>View Project <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <!-- /.row -->

            <hr>

            @endforeach



                    <!-- Pagination -->
        {{--    <div class="row text-center">
                <div class="col-lg-12">
                    <ul class="pagination">
                        <li>
                            <a href="#">&laquo;</a>
                        </li>
                        <li class="active">
                            <a href="#">1</a>
                        </li>
                        <li>
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#">4</a>
                        </li>
                        <li>
                            <a href="#">5</a>
                        </li>
                        <li>
                            <a href="#">&raquo;</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.row -->

            <hr>--}}

    </div>

    <footer class="row">
        @include('footer')
    </footer>



</div>
</body>
</html>