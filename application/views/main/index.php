<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="jumbotron mt-5">
        <h1 class="display-4 text-center">URL Shortener</h1>           
          <form action="/application/views/main/form.php" method="post">
            <div class="row">
              <div class="col-md-11 col-sm-10">
                <input type="url" class="form-control" placeholder="input url" name="url" autocomplete="off">
              </div>
              <div class="col-md-1 px-0">  
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>  
          </form>
        <hr class="my-4">
          <div>
            <?php if (isset($short)) { ?>
                <div class='alert alert-success' role='alert'>Your link is 
                  <a href='<?php echo $short?>'><?php echo $_SERVER['SERVER_NAME'].'/'.$short?></a>   Stat link is 
                  <a href='<?php echo $short?>!'><?php echo $_SERVER['SERVER_NAME'].'/'.$short?>!</a>
                </div>
            <?php } ?>
          </div>
      </div>
    </div>
  </div>
</div>
