<?php
/* Smarty version 3.1.32, created on 2018-05-25 09:28:30
  from 'C:\Users\User\Dropbox\projects\smarty\templates\main.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b07d73ed4e868_96103358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b59e8752008c80fe03f9990cdad7775fdc00db7a' => 
    array (
      0 => 'C:\\Users\\User\\Dropbox\\projects\\smarty\\templates\\main.tpl',
      1 => 1527240506,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:stats.tpl' => 1,
  ),
),false)) {
function content_5b07d73ed4e868_96103358 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
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
              <?php if (isset($_smarty_tpl->tpl_vars['cur_record']->value)) {?>
                <div class='alert alert-success' role='alert'>Your link is <a href='http://smarty/<?php echo $_smarty_tpl->tpl_vars['cur_record']->value["short"];?>
'>smarty/<?php echo $_smarty_tpl->tpl_vars['cur_record']->value["short"];?>
</a>   Stat link is <a href='http://smarty/<?php echo $_smarty_tpl->tpl_vars['cur_record']->value["short"];?>
!'>smarty/<?php echo $_smarty_tpl->tpl_vars['cur_record']->value["short"];?>
!</a></div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
      <?php if (isset($_smarty_tpl->tpl_vars['staturl']->value)) {?>
        <?php $_smarty_tpl->_subTemplateRender('file:stats.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
      <?php }?>
    </div>
  </body>
</html><?php }
}
