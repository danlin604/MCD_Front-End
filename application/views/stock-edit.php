<h2>Admin - {action}</h2>

{error_messages}

<form action="/admin/save/stock" method="post" enctype="multipart/form-data">
    {fid}
    {fname}
    {fdescription}
    {fprice}
    {fcurrAvail}
    {zsubmit} 
    <a class="btn btn-default" role="button" href="/admin/cancel">Cancel</a>
    <a class="btn btn-default" role="button" href="/admin/delete/stock">Delete</a>
</form>
