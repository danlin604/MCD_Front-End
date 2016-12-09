<h2>Admin - {action}</h2>

{error_messages}

<form action="/admin/save/recipes" method="post" enctype="multipart/form-data">
    {fid}
    {fname}
    {ketchup}
    {tomato}
    {mustard}
    {onions}
    {buns}
    {meat_patty}
    {mac_sauce}
    {fish_patty}
    {fries}
    {soft_drink}    
    {zsubmit} 
    <a class="btn btn-default" role="button" href="/admin/cancel">Cancel</a>
    <a class="btn btn-default" role="button" href="/admin/delete/recipes">Delete</a>
</form>
