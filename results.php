<?php

    require('/home/stud/s3323843/.HTMLinfo/wda/A1/C/Smarty-3.1.11/libs/Smarty.class.php');
    require_once('utilities.php'); 
    $smarty = new Smarty();

    $smarty->setTemplateDir('Smarty-Work-Dir/templates/');
    $smarty->setCompileDir('Smarty-Work-Dir/templates_c/');
    $smarty->setConfigDir('Smarty-Work-Dir/configs/');
    $smarty->setCacheDir('Smarty-Work-Dir/cache/');
    
    
function process_form($form_array) {
    $fields_array = array
        (
        "wine_name" => " LIKE ",
        "winery_name" => " LIKE ",
        "region_name" => " LIKE ",
        "variety" => " LIKE ",
        "stock" => " >= ",
        "order" => " >= ",
        "year_min" => " >= ",
        "year_max" => " <= ",
        "max_price" => " <= ",
        "min_price" => " >= "
    );

    $query_terms = "";

    foreach ($form_array as $key => $value) {

        if (array_key_exists($key, $fields_array) && $value != "") {

            $query_terms .=" AND ";
            switch ($key) {
                case 'year_min': $query_terms.='wine.year >= ' . $value;
                    break;

                case 'year_max': $query_terms.='wine.year <= ' . $value;
                    break;

                case 'max_price': $query_terms.='items.price <=' . $value;
                    break;

                case 'min_price':$query_terms.='items.price >=' . $value;
                    break;

                case 'stock':$query_terms.='inventory.on_hand >=' . $value;
                    break;

                case 'order':$query_terms.='items.qty >=' . $value;
                    break;

                case 'wine_name': $query_terms.='wine.wine_name LIKE \'%' . $value . '%\'';
                    break;

                case 'winery_name': $query_terms.='winery.winery_name LIKE \'%' . $value . '%\'';
                    break;

                case 'region_name': $query_terms.='region.region_name LIKE \'%' . $value . '%\'';
                    break;

                case 'variety': $query_terms.='grape_variety.variety LIKE \'%' . $value. '%\'';
                    break;
            }
        }
    }
    return $query_terms;
}

function get_wine_info($search_params) {
    $conn = connect();

    $sql = "SELECT SUM(items.qty) as total_qty, SUM(items.price) as total_revenue, wine.wine_name,inventory.cost, items.price, items.qty, inventory.on_hand, 
        winery.winery_name, region.region_name,wine.year, grape_variety.variety   
    FROM wine,inventory,items, winery, region,grape_variety, wine_variety
    WHERE (wine.wine_id = items.wine_id AND wine.wine_id = inventory.wine_id 
    AND winery.winery_id = wine.winery_id AND winery.region_id = region.region_id AND wine.wine_id=wine_variety.wine_id 
    AND grape_variety.variety_id=wine_variety.variety_id" . 
      $search_params . ") GROUP BY wine.wine_id";
    
    
    $res = $conn->query($sql);
    return $res;    

}


?>

            
<?php get_wine_info(process_form($_POST));

$wines = get_wine_info(process_form($_POST));
    $smarty->assign('res',$wines);
    $smarty->debugging=true;    
    $smarty->display('results.tpl');

?>


      












