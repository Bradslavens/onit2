<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Onit Transactions - Transaction Coordinator">
    <meta name="author" content="Slavens, Inc., Bradley Slavens">
    {{-- <link rel="icon" href="../../favicon.ico"> --}}
    <title>Onit Transactions Sign In Page</title>

    <!-- Bootstrap core CSS -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="/css/viewport-bug-workaround.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="/css/signin.css" rel="stylesheet">
    @yield('stylesheet')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/css/custom.css">
    
  </head>

  <body>  

  <div class="container">
      <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-main" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand" href="#">Onit Transactions</a>
                </div>
                {{-- nab bar header --}}

                <div class="collapse navbar-collapse" id="nav-main">
                  <ul class="nav navbar-nav">

                    <li class="active"><a href="{{route('home')}}">Home</a></li>
                    <li><a class="link" href="{{route('admin.home')}}">Admin</a></li>
                    
                  </ul>
                  {{-- nav navbar-nab --}}

                  <form class="navbar-form navbar-left" method="POST" action="{{route('logout')}}">{{csrf_field()}}<button class="btn btn-default" type="submit" value="Logout">Logout</button></form>
                
                </div>
                {{-- navbar collapse --}}

              </div>
              {{-- container fluid --}}
            </nav>
            {{-- nav bar --}}

          </div>
          {{-- col-md-8 col-md-offset-2 --}}
      </div>
      {{-- row --}}
  </div>
  {{-- container --}}


    @yield('content') <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript" src="/js/tooltip.js"></script>

    @yield('script')
    
  </body>
</html>
