<!DOCTYPE html>
<html>
<head>
    <title>Onit Transactions - Login Page</title>
</head>

<style type="text/css">
    body 
    {
        font-family: "HelveticaNeueBlack", "HelveticaNeue-Black", "Helvetica Neue Black", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosBold', "Arial Black", sans-serif; 

        font-weight:800; font-stretch:normal;
    }

    .red 
    {
        color: #D14139;
    }

    .container
    {
        width: 50%;
        margin: 0 auto;
    }

    .form 
    {
        background-color: black;
        padding: 3px;
        float: left;
        clear: both;
    }

    .form-group
    {
        display: flex;
    }

    h1 
    {
        float: left;
        clear: both;
        margin-right: 0 auto;
    }

    .form-control
    {
        flex: 1;
    }

    label
    {
        color: #fff;
    }

    input:-webkit-autofill,
    input:-webkit-autofill:hover, 
    input:-webkit-autofill:focus
    input:-webkit-autofill, 
    textarea:-webkit-autofill,
    textarea:-webkit-autofill:hover
    textarea:-webkit-autofill:focus,
    select:-webkit-autofill,
    select:-webkit-autofill:hover,
    select:-webkit-autofill:focus {
      border: 1px solid white;
      -webkit-text-fill-color: #D14139;
      -webkit-box-shadow: 0 0 0px 1000px #fff inset;
      transition: background-color 5000s ease-in-out 0s;
      margin: 5px;
      padding: 3px;
    }

    input[type="submit"]
    {
        background: black;
        color: white;
        border: none;
        flex: 1;
    }

    .btn-link
    {
        text-decoration: none;
        flex: 1;
        color: white;
        font-size: 10px;
    }

    #madmen-container
    {
        position: relative;
        float: left;
        clear: both;
    }

    #madmen-container #madmen-image
    {
        float: left;
        clear: both;
        margin: 0 auto;
    }

    #test-container
    {
        position: absolute;
        right: 60px;
        bottom: 0px;
        width: 50px;
        height: 360px;
    }

    #test-container img
    {
        position: absolute;
        left: 0;
    }

    #test-container img.transparent
    {
        opacity: 0;
    }

    @keyframes smoke1
    {
        0% {opacity: 0;}
        50% {opacity: 50;}
        100% {opacity: 100}
    }

    @keyframes smoke2
    {
        0% {opacity: 50;}
        50% {opacity: 0;}
        100% {opacity: 100}
    }

    @keyframes smoke3
    {
        0% {opacity: 100;}
        50% {opacity: 50;}
        100% {opacity: 0}
    }

    .top 
    {
        opacity: 0;
        animation-name: smoke1; 
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease;
    }

    .middle 
    {
        opacity: 0;
        animation-name: smoke2; 
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease;
    }

    .bottom 
    {
        opacity: 0;
        animation-name: smoke3; 
        animation-duration: 3s;
        animation-iteration-count: infinite;
        animation-timing-function: ease;
    }

</style>

<body>

    <div class="container">
        <h1><span class="red">ONIT</span> TRANSACTIONS</h1>

        <form class="form" role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                        </label>
                    </div>
            </div>

            <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Login">

                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
            </div>
        </form>


        <div id="madmen-container">
            <img id="madmen-image" src="/images/madmen-banner.png">
            <div id="test-container">
                <img class="bottom" src="/images/smoke-1.jpg">
                <img class="middle" src="/images/smoke-2.jpg">
                <img class="top" src="/images/smoke-3.jpg">
            </div>
        </div>
    </div>


</body>
</html>