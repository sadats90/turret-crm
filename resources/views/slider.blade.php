  <!DOCTYPE html>
  <html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- script scource of this page but causes problem  -->
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <!-- script scource of this page but causes problm ends -->
  </head>
  <body>
    <div class="wrapper">
      <div class="container">
        <h4 style="color:red;">Campaign Manager:<span>Search Customer By sales data</span></h4>
        <hr>
        <br>

        <form class="form-group" method="POST" action="{{ url('campaign') }}">
          {{csrf_field()}}

          <div class="row">
            <div class="col-md-6">

              <div data-role="header">
                <h1><i class="fa fa-shopping-cart" style="font-size:28px"></i>Buying Power</h1>
              </div>

              <div data-role="main" class="ui-content">


                <div data-role="rangeslider">
                  <label for="price-min">Average Basket Size:</label>
                  <input type="range" name="abs_min"  value="abs_min" min="0" max="100">
                  <label for="price-max">Price:</label>
                  <input type="range" name="abs_max"  value="abs_max" min="0" max="100">
                </div>
                <div data-role="rangeslider">
                  <label for="price-min">Average Basket Value:</label>
                  <input type="range" name="abv_min"  value="200" min="0" max="999999">
                  <label for="price-max">Price:</label>
                  <input type="range" name="abv_max"  value="800" min="0" max="999999">
                </div>
                <div data-role="rangeslider">
                  <label for="price-min">Total Buying In Period:</label>
                  <input type="range" name="tbp_min"  value="200" min="0" max="1000">
                  <label for="price-max">Price:</label>
                  <input type="range" name="tbp_max"  value="800" min="0" max="1000">
                </div>
                
              </div>
            </div>
            <div class="col-md-6">

              <div data-role="header">
                <h1><i class="fa fa-clock-o" style="font-size:28px"></i>   Buying Frequency</h1>
              </div>

              <div data-role="main" class="ui-content">

                <div data-role="rangeslider">
                  <label for="price-min">Min Number Of Visits in last 3 months:</label>
                  <input type="range" name="min_visit_min"  value="200" min="0" max="1000">
                  <label for="price-max">Price:</label>
                  <input type="range" name="min_visit_max"  value="800" min="0" max="1000">
                </div>
                <div data-role="rangeslider">
                  <label for="price-min">Last visit within how many months:</label>
                  <input type="range" name="last_min"  value="200" min="0" max="1000">
                  <label for="price-max">Price:</label>
                  <input type="range" name="last_max"  value="800" min="0" max="1000">
                </div>

              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6">

              <div data-role="header">
                <h1 ><i class="material-icons" style="font-size:28px" >local_mall</i> Product Choice</h1>
              </div>

              <div data-role="main" class="ui-content">

                <!-- for select -->
                <div class="row clearfix">
                  <div class="col-md-4">

                   <label>Gender</label>
                   <select name="gender">
                    <option >Select</option>
                    @foreach($gender as $g)
                    <option value="{{$g->GenderNAME}}" >{{$g->GenderNAME}}</option>
                    @endforeach

                  </select>

                </div>
                <div class="col-md-4">

                 <label>Size</label>
                 <select name="size">
                  <option>Select</option>
                  @foreach($size as $s)
                  <option value="{{$s->Article_Size_Code}}">{{$s->Article_Size_Code}}</option>
                  @endforeach
                </select>

              </div>
              <div class="col-md-4">



               <label>Color</label>
               <select  name="sort" id="sort">
                @foreach($colors as $color)
                <option>Select</option>
                <option>
                  {{$color->Color}}
                </option>
                @endforeach
              </select>

            </div>
            <div class="col-md-4">
              <label>Brand</label>


              <select>
                <option>Select</option>
                @foreach($brand as $b)
                <option>{{$b->Brand_mstID}}</option>
                @endforeach
              </select>

            </div>
            <div class="col-md-4">

             <label>Category</label>
             <select>
              <option >Select</option>
              @foreach($cat as $c)
              <option value="$c->Category_Code">{{$c->Category_Name}}</option>
              @endforeach
            </select>

          </div>
          <div class="col-md-4">

           <label>Sub Category</label>
           <select>
            <option >Select</option>
            @foreach($subcat as $sc)
            <option value="$sc->Sub_category_mstID">{{$sc->Sub_category_Name}}</option>
            @endforeach
          </select>

        </div>
      </div>
      <!-- for select -->
      <div data-role="rangeslider">
        <label for="price-min">Price:</label>
        <input type="range" name="prod_ch_min"  value="200" min="0" max="1000">
        <label for="price-max">Price:</label>
        <input type="range" name="prod_ch_max"  value="800" min="0" max="1000">
      </div>


    </div>
  </div>
  <div class="col-md-6">

    <div data-role="header">
      <h1><i class="fa fa-globe" style="font-size:28px"></i> Demography</h1>
    </div>

    <div data-role="main" class="ui-content">
     <!--  <form method="post" action="/action_page_post.php"> -->
       <div class="row">
        <div class="col-md-6">

         <label>Gender</label>
         <select >
          <option >Selct</option>
          @foreach($d_gender as $g)
          <option>{{$g->Customer_Gender}}</option>
          @endforeach

        </select>


      </div>
            <!-- <div class="col-md-4">



            </div>
            <div class="col-md-4">



            </div> -->

            <!-- <div class="col-md-3"><br>
              <h6>Area of Transaction</h6>
            </div> -->
            <div class="col-md-6">

              <label>Area</label>

              <select>
                <option>Select</option>
                @foreach($area as $a)
                <option>{{$a->Area_Name}}</option>
                @endforeach
              </select>

            </div>
            <!-- here goes the code -->
            <div class="col-md-6">

             <label>District</label>
             <select>
              <option >Select</option>
              @foreach($cat as $c)
              <option>{{$c->Category_Name}}</option>
              @endforeach
            </select>

          </div>
          <div class="col-md-6">

           <label>Store</label>
           <select>
            <option >Select</option>
            @foreach($subcat as $sc)
            <option>{{$sc->Sub_category_Name}}</option>
            @endforeach
          </select>

        </div>

      </div>
      <input class="btn btn-primary btn-sm" type="submit" name="submit" value="Submit">
      <!-- <button type="submit" value="submit" class="btn btn-primary">Deploy Filters</button> -->
    </form>
  </div>
</div>

</div>
</div>


<!-- table -->
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">ABS</th>
      <th scope="col">ABV</th>
      <th scope="col">Total Buy</th>
      <th scope="col">Gender</th>
      <th scope="col">Location</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      
    </tr>
  </tbody>
</table>
<!-- table -->
</div>
<div class="container">
  @foreach($abs as $s)

  <?php echo $s->Customer_Id;  ?><br>  <br />
  @endforeach
</div>
</body>

<style type="text/css">
  .wrapper {
    margin-right: auto; /* 1 */
    margin-left:  auto; /* 1 */

    max-width: 920px; /* 2 */
    height: 60%;
    padding-right: 10px; /* 3 */
    padding-left:  10px; /* 3 */
  }
</style>
</html>
