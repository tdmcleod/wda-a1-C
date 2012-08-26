<!doctype html>
<html>
    <head>

	<link type="text/css" rel="stylesheet" href="styles/styles.css" />
        <script>
                function validate_form(){
                    var frm = document.forms["wine_form"];
                    var valid = true;
  
                    console.log(frm.elements);
                    if(frm.elements["max_price"].value !="" && frm.elements["min_price"].value && frm.elements["max_price"].value < frm.elements["min_price"]){
                        alert("Please enter a maximum price greater than the minimum price");
                        valid = false;
                    }
                    
                    if(frm.elements["year_max"].value < frm.elements["year_min"].value){
                        alert("Please enter a maximum year greater than the minimum year");
                        valid=false;
                    }
                    
                    
                    return valid;
                    
                }
    </script>

	</head>
    
    <body>
        
        <div class="container-all">
            <div class="header-container">
                <div class="header-inner">
                 
                    <div class="header-left">
                        <a href="index.php" style="text-decoration: none;color: #666;">The Winestore</a>
                    </div>
                    
                    <div class="header-right">
                        
                        
                    </div>
                    
                </div>
                
            </div>