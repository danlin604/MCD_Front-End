<h2>Admin - {action}</h2>

{error_messages}

<form action="/admin/save/supplies" method="post" enctype="multipart/form-data">
    {fid}
    {fname}
    {fdescription}
    {receiving_unit}
    {receiving_cost}
    {stock_unit}
    {quantities_on_hand}
    {zsubmit} 
    <a class="btn btn-default" role="button" href="/admin/cancel">Cancel</a>
    <a class="btn btn-default" role="button" href="/admin/deleteRecord/supplies/{fid}">Delete</a>
</form>
