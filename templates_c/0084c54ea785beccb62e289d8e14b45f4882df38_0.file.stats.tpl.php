<?php
/* Smarty version 3.1.32, created on 2018-05-25 10:37:12
  from 'C:\Users\User\Dropbox\projects\url_shortener_php\templates\stats.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.32',
  'unifunc' => 'content_5b07e758a44539_76592133',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0084c54ea785beccb62e289d8e14b45f4882df38' => 
    array (
      0 => 'C:\\Users\\User\\Dropbox\\projects\\url_shortener_php\\templates\\stats.tpl',
      1 => 1527244620,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b07e758a44539_76592133 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['stats']->value)) {?>
<div class="alert alert-dark" role="alert">
  Link: <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value;?>
</a> Clicks: <?php echo $_smarty_tpl->tpl_vars['counter']->value;?>

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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['stats']->value, 'item', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['item']->value) {
?>
      <tr>
        <th scope="row"><?php echo $_smarty_tpl->tpl_vars['item']->value['r_date'];?>
</th>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['ip'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['region'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['browser'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['version'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['item']->value['os'];?>
</td>
      </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
  </tbody>
</table>
<?php } else { ?>        
    <div class="alert alert-info" role="alert">
      Link: <a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['link']->value;?>
</a> No data yet
    </div>
<?php }?>    
<?php }
}
