<!DOCTYPE>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    
    
<!--   <link href="{{ asset('/css/patient.css') }}" rel="stylesheet">-->
       <style>
        body {
            background-color: #1a0000;
        } 

    </style>
    
    </head>
<body>
    
    <div class="container-fluid">
    
                    <form method="POST" action="{{ route('admin.adminlogin') }}">
                        @csrf
                        <br><br><br>
                        <h1 class="text-danger d-flex justify-content-center">Admin Login</h1>
                        <div class="d-flex justify-content-center">
                        
                        
                        </div>
 
                        
                     
                        <div class="form-group row d-flex justify-content-center ">
                                                    <div class="col-lg-4 mt-4 ">
                               <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} " 
                                       name="email" value="{{ old('email') }}" required autofocus placeholder="Enter your E-mail">
                                                        

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
<br>
                        <div class="form-group row   d-flex justify-content-center">
                           

                            <div class="col-lg-4">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

           

                        <div class="form-group row  d-flex justify-content-center">
                            <div class="col-lg-4">
                              <p> <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button></p> 


                            </div>
                        </div>
                    </form>
        </div>
    </body>
</html>
