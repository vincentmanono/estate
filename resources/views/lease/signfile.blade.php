<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{ asset('assets/Canvas-Signature-Pad-Sign/custome.css') }}">
    <!-- Fonts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
</head>
<body>
    <div id="app">
        <main class="py-4">
            <div class="container">

                <div class="col-12 signing">
                            
                    <canvas id="myCanvas" ></canvas><br><br>
                    <input class="btn btn-success" type="button" value="Reset" id='resetSign'>
                    <button id="send" class="btn btn-success">Submit</button>

                    <textarea id="signature64" name="signed" style="display: none"></textarea>
              
            
            </div>

                <div class="wrapper">
                   
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="tenant">Tenant Name</label>
                                    <input id="tenant" class="form-control" disabled value="{{ $lease->user->name }}" type="text" name="tenant">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="manager">Manager Name</label>
                                    <input id="manager" class="form-control" disabled  value="{{ $lease->unit->property->user->name  }}" type="text" name="manager">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="unit">Unit Name</label>
                                    <input id="unit" class="form-control"  disabled value="{{ $lease->unit->name }}" type="text" name="unit">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="property">Property Name</label>
                                    <input id="property" class="form-control" disabled  value="{{ $lease->unit->property->name  }}" type="text" name="property">
                                </div>
                            </div>
                        </div>

                        <div class="form-group form-check">
                              <input id="my-input" class="form-check-input" type="checkbox" name="agree" value="yes">
                              <label class="form-check-label" for="agree">Please Agree to The Tearms and Conditions</label>
                        </div>
                        
                    
                </div>
            </div>
            
        </main>
    </div>

    <script src="{{ asset('assets/Canvas-Signature-Pad-Sign/sign.js') }}"></script>
    <script src="{{ asset('assets/Canvas-Signature-Pad-Sign/custome.js') }}"></script>

</body>
</html>
