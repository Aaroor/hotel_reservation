<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="theme-color" content="#212121">
  <meta name="msapplication-TileColor" content="#212121"/>
  <title>Calculator</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('calc/css/bootstrap.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('calc/css/creative.min.css') }}">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
</head>

<body style="background-color: #000000">
 
  <div class="container">
    <div class="col-md-4 col-md-offset-4 calculator" align="center">
      <div class="row displayBox">
        <p class="displayText" id="display">0</p>
      </div>
      <div class="row numberPad">
        <div class="col-md-9">
          <div class="row">
            <button class="btn clear hvr-back-pulse" id="clear">C</button>
            <button class="btn btn-calc hvr-radial-out" id="sqrt">√</button>
            <button class="btn btn-calc hvr-radial-out hvr-radial-out" id="square">x<sup>2</sup></button>
          </div>
          <div class="row">
            <button class="btn btn-calc hvr-radial-out" id="seven">7</button>
            <button class="btn btn-calc hvr-radial-out" id="eight">8</button>
            <button class="btn btn-calc hvr-radial-out" id="nine">9</button>
          </div>
          <div class="row">
            <button class="btn btn-calc hvr-radial-out" id="four">4</button>
            <button class="btn btn-calc hvr-radial-out" id="five">5</button>
            <button class="btn btn-calc hvr-radial-out" id="six">6</button>
          </div>
          <div class="row">
            <button class="btn btn-calc hvr-radial-out" id="one">1</button>
            <button class="btn btn-calc hvr-radial-out" id="two">2</button>
            <button class="btn btn-calc hvr-radial-out" id="three">3</button>
          </div>
          <div class="row">
            <button class="btn btn-calc hvr-radial-out" id="plus_minus">&#177;</button>
            <button class="btn btn-calc hvr-radial-out" id="zero">0</button>
            <button class="btn btn-calc hvr-radial-out" id="decimal">.</button>
          </div>
        </div>
        <div class="col-md-3 operationSide">
          <button id="divide" class="btn btn-operation hvr-fade">÷</button>
          <button id="multiply" class="btn btn-operation hvr-fade">×</button>
          <button id="subtract" class="btn btn-operation hvr-fade">−</button>
          <button id="add" class="btn btn-operation hvr-fade">+</button>
          <button id="equals" class="btn btn-operation equals hvr-back-pulse">=</button>
        </div>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="{{ asset('calc/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('calc/js/calculate.js') }}"></script>
</body>

</html>
