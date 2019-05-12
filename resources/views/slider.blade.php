<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
  <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div class="container">
  <h4 style="color:red;">Campaign Manager:<span>Search Customer By sales data</span></h4>
  
  <div class="row">
    <div class="col-md-6">

      <div data-role="header">
        <h1>Buying Power</h1>
      </div>

      <div data-role="main" class="ui-content">
        <form method="post" action="/action_page_post.php">
          <div data-role="rangeslider">
            <label for="price-min">Average Basket Size:</label>
            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
          </div>
          <div data-role="rangeslider">
            <label for="price-min">Average Basket Value:</label>
            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
          </div>
          <div data-role="rangeslider">
            <label for="price-min">Total Buying In Period:</label>
            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
          </div>
          <input type="submit" data-inline="true" value="Submit">

        </form>
      </div>
    </div>
     <div class="col-md-6">
      
      <div data-role="header">
        <h1>Buying Frequency</h1>
      </div>

      <div data-role="main" class="ui-content">
        <form method="post" action="/action_page_post.php">
          <div data-role="rangeslider">
            <label for="price-min">Min Number Of Visits in last 3 months:</label>
            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
          </div>
          <div data-role="rangeslider">
            <label for="price-min">Last visit within how many months:</label>
            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
          </div>
          <input type="submit" data-inline="true" value="Submit">

        </form>
      </div>
    </div>
    
  </div>
  <div class="row">
    <div class="col-md-6">

      <div data-role="header">
        <h1>Product Choice</h1>
      </div>

      <div data-role="main" class="ui-content">
        <form method="post" action="/action_page_post.php">
          <div data-role="rangeslider">
            <label for="price-min">Price:</label>
            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
          </div>

          <input type="submit" data-inline="true" value="Submit">

        </form>
      </div>
    </div>
     <div class="col-md-6">
      
      <div data-role="header">
        <h1>Demography</h1>
      </div>

      <div data-role="main" class="ui-content">
        <form method="post" action="/action_page_post.php">
          <div data-role="rangeslider">
            <label for="price-min">Price:</label>
            <input type="range" name="price-min" id="price-min" value="200" min="0" max="1000">
            <label for="price-max">Price:</label>
            <input type="range" name="price-max" id="price-max" value="800" min="0" max="1000">
          </div>
          <input type="submit" data-inline="true" value="Submit">

        </form>
      </div>
    </div>
    
  </div>
  </div>
</body>
</html>
