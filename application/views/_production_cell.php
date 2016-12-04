<!--
<a href="/sales/{id}" title="{id}">
	<p><b>{name}</b></p>
</a>

<b>Description:</b>
<p>{description}</p>

<b>Ingredients</b>
<p>{ingredients}</p>
-->

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>

<table>
  <tr>
    <th>Name</th>
    <th>Description</th>
    <th>Ingredients</th>
  </tr>


  <tr>
    <td>{id}</td>
    <td>{Desc}</td>
    <td>{ingredients}</td>
  </tr>


</table>