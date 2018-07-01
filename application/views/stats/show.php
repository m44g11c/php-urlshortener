<div class="container">
  <div class="row">
    <div class="col-md-12 ">
      <div class="jumbotron mt-5">
        <?php 
        if ($vars['counter'] != null) {
        ?>
          <div class="alert alert-dark" role="alert">
            Link: <a href="<?php echo $vars['link']?>"><?php echo $vars['link']?></a> Clicks: <?php echo $vars['counter']?>
          </div>
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Ip</th>
                <th scope="col">Region</th>
                <th scope="col">Browser</th>
                <th scope="col">Version</th>
                <th scope="col">OS</th>
              </tr>
            </thead>
            <tbody>    

        <?php  
          foreach ($vars['data'] as $key => $cur_record) { ?>
            <tr>
              <th scope="row"><?php echo $cur_record['r_date']?></th>
              <td><?php echo $cur_record['ip']?></td>
              <td><?php echo $cur_record['region']?></td>
              <td><?php echo $cur_record['browser']?></td>
              <td><?php echo $cur_record['version']?></td>
              <td><?php echo $cur_record['os']?></td>
            </tr>
        <?php 
            }
        }   
          ?>        

            </tbody>
          </table>
        <?php if ($vars['no data'] == 'true') { ?>
              <div class="alert alert-info" role="alert">
                Link: <a href="<?php echo $vars['link']?>"><?php echo $vars['link']?></a> No data yet
              </div>
        <?php } ?>
          
        <hr class="my-4">
      </div>
    </div>
  </div>
</div>
