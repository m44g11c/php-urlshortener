<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Url Shortener</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-md-12 ">
          <div class="jumbotron mt-5">
            <h1 class="display-4 text-center">URL Shortener</h1>           
              <form action="result.php" method="post">
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
              {if isset($cur_record)}
                <div class='alert alert-success' role='alert'>Your link is <a href='http://urlshortenerphp/{$cur_record["short"]}'>urlshortenerphp/{$cur_record["short"]}</a>   Stat link is <a href='http://urlshortenerphp/{$cur_record["short"]}!'>urlshortenerphp/{$cur_record["short"]}!</a></div>
              {/if}
            </div>
          </div>
        </div>
      </div>
      {if isset($staturl)}
        {include file='stats.tpl'}
      {/if}
    </div>
  </body>
</html>