<!DOCTYPE html>
<html>

<head>
<meta charset="utf-8">
  <title>Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="favicon.ico">
</head>


<body>
<div class="container">
        <!--Row 1: Header-->
      <div class="row">
          <div class="col-0 col-md-2"></div>
          <div class="col-12 col-md-8">
            <div class="header">
                  <a href="/" class="logo"><img class="photo" src="images/logo.PNG" alt="JDict Japanese English Dictionary" height="100px"></a>
                  <div class="header-right">
                    <a href="list-of-lists.html">My vocab lists</a>
                        
                  </div>
            </div>
        </div>
        <div class="col-0 col-md-2"></div>
        </div>
    <div class="row">
      <div class="col-0 col-md-3"></div>
      <div class="col-12 col-md-6">
      
      <form action="verify-credentials.php" method="POST" id="signInForm" name="signInForm" >
        
          <div class="form-group">
            <label>Email address: </label>
            <input 
              required 
              name="email"
              type="text" 
              class="form-control" 
            />
          </div>
        
          <div class="form-group">
            <label>Password: </label>
            <input 
              required
              name="pwd"
              type="password" 
              id="pwd"
              class="form-control" 
            />
          </div>

          <button type="submit" class="btn btn-primary" >Sign in</button>


      </form> 
                

      

      </div>

      <div class="col-0 col-md-3" ></div>
    </div>
</div>

</body>
</html>