<h2>Try our delicious menu!</h2>

{sales_table}

<br>

<table class="table">
    <tr><th>Order #</th><th>Date/time</th><th>Amount</th></tr>
    
    {orders}
    <tr>
        <td><a href="/sales_controller/examine/{number}">{number}</a></td>
        <td>{datetime}</td>
        <td>{total}</td>
    </tr>
    {/orders}
</table>

<a class="btn btn-default" role="button" href="/sales_controller/neworder">Start a New Order</a>