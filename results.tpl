
<div class="main-container">
    <div class="main-inner">
        <div class="results-container">
<table><thead>
            <tr><th style='text-align:left;width:60px;'></th>
                <th>Wine Name</th>
                <th>Variety</th>        
                <th>Year</th>
                <th>Winery Name</th>
                <th>Region Name</th>
                <th>Inventory Cost</th>
                <th>Stock on Hand</th>
                <th>Quantity Sold</th>
                <th>Total Revenue</th>                
            </tr>
        </thead>
        <tbody>
           {foreach $res as $r}
	    <tr>
		<td>$r@iteration</td>
	        <td>$r.wine_name</td>
		<td><$r.variety/td>
		<td>$r.year</td>
		<td><$r.winery_name/td>
		<td>$r.region_name</td>
		<td>$r.cost</td>
		<td>$r.on_hand</td>
		<td>$r.total_qty</td>
		<td>$r.total_revenue</td>
	    </tr>
           {/foreach}
	</tbody>
</table>	
  </div>
    </div>
</div>