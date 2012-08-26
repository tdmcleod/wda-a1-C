{include file="header.tpl"}
<div class="main-container">
    <div class="main-inner">

        <div class="search-container">
            <form onsubmit="return validate_form();" method="POST" action="results.php" id="wine_form">
                <table>
                    <tr>
                        <td>Wine</td>
                        <td><input class="search-main" type="text" id="wine_name" name="wine_name" /></td>
                    </tr>
                    <tr>
                        <td>Winery Name</td>
                        <td><input class="search-main" type="text" id="winery_name" name="winery_name" /></td>
                    </tr>
                    <tr>
                        <td>Region</td>
                        <td><select name="region_name">
			{foreach $regions as $region_name}
				{$region_name}
			{/foreach}

			</select></td>
                    </tr>
                    <tr>
                        <td>Variety</td>
                        <td><select name="variety">
			{foreach $variety as $var}
				{$var}
			{/foreach}
			
			</select></td>
                    </tr>
                    
                    <tr>
                        <td>Year Range</td>
                        <td><select name="year_min">
			{foreach $years as $year}
				{$year}
			{/foreach}
			
</select><select name="year_max">{foreach $years as $year}
				{$year}
			{/foreach}</select></td>
                    </tr>
                    <tr>
                        <td>Min Wines in Stock</td>
                        <td><input class="search-main" type="text" id="min_stock" name="stock" /></td>
                    </tr>
                    <tr>
                        <td>Min Wines in Ordered</td>
                        <td><input class="search-main" type="text" id="min_order" name="order" /></td>
                    </tr>
                    <tr>
                        <td>Price Range</td>
                        <td><input class="search-main" type="text" id="min_price" name="min_price" style="width:110px;margin-right:5px;" /><input class="search-main" type="text" id="max_price" name="max_price" style="width:110px;" /> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="submit" id="submit" class="btn" /></td>
                    </tr>

                </table>

            </form>

         

        </div>

    </div>
</div>

{include file="footer.tpl"}