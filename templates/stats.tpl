{if isset($stats)}
<div class="alert alert-dark" role="alert">
  Link: <a href="{$link}">{$link}</a> Clicks: {$counter}
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
    {foreach $stats as $key => $item}
      <tr>
        <th scope="row">{$item.r_date}</th>
        <td>{$item.ip}</td>
        <td>{$item.region}</td>
        <td>{$item.browser}</td>
        <td>{$item.version}</td>
        <td>{$item.os}</td>
      </tr>
    {/foreach}
  </tbody>
</table>
{else}        
    <div class="alert alert-info" role="alert">
      Link: <a href="{$link}">{$link}</a> No data yet
    </div>
{/if}    
