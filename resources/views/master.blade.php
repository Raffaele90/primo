<html>
<head>
    <script src="js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/graph.js"></script>

    <script type="text/javascript" src="js/raf.js"></script>

    <script src="go-debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gojs/1.6.7/go-debug.js"></script>

    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"
          media="all">
    <link rel="stylesheet" href="css/raf.css" type="text/css"
          media="all">

    <title>App Name - @yield('title')</title>
</head>
<body>

@section('sidebar')
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Brand</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Personaggi <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="insert_personaggio">Insert Personaggio <span
                                            class="sr-only">(current)</span></a></li>
                            <li><a href="edit_personaggio">Edit Personaggio</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Eventi <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Insert Evento <span
                                            class="sr-only">(current)</span></a></li>
                            <li><a href="#">Edit Evento</a></li>

                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                           aria-expanded="false">Luoghi <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Insert Luogo <span
                                            class="sr-only">(current)</span></a></li>
                            <li><a href="#">Edit Luogo</a></li>

                        </ul>
                    </li>


                </ul>


            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
@show

<div class="container">
    @yield('content')
</div>


</body>
</html>
