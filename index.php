<?php
$db_hostname = 'localhost';
$db_username = 'alexaich_lte';
$db_password = 'Alex3141';
$db_database = 'alexaich_lte';
$email_to = "countries@lte.alexaichinger.com";
$email_subject = "New Country Submitted";

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db($db_database, $con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-8910782-5', 'auto');
      ga('send', 'pageview');

  </script>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="stylesheet.css">
  <title>iPhone SE LTE Check</title>
</head>
<body>
    <div class="search-form">
        <h1>Type in Your Country/Countries</h1>
        <form class="" action="" method="post">  
            <input type="text" name="search_term1" >
            <input type="text" name="search_term2" >
            <input type="text" name="search_term3" >
            <input type="submit" value="Submit" >  
        </form> 
    </div> 
    <?php
    if (!empty($_REQUEST['search_term1'])) {

        $search_term1 = mysql_real_escape_string($_REQUEST['search_term1']);     

        $sql = "SELECT * FROM countries WHERE Country LIKE '%".$search_term1."%'"; 
        $r_query = mysql_query($sql); 
        $row = mysql_fetch_array($r_query);

        if ( !empty($row[0])){  
            echo "<h2>" .$row['Country'];
            echo ":</h2>";
            echo $row['lte'];
            echo '<br>';     
        } else { 
            echo "<h2>";
            echo "Country not found";
            echo "</h2>";
            $email_content .= $search_term1;
        } 

    }

    if (!empty($_REQUEST['search_term2'])) {

        $search_term2 = mysql_real_escape_string($_REQUEST['search_term2']);     

        $sql = "SELECT * FROM countries WHERE Country LIKE '%".$search_term2."%'"; 
        $r_query = mysql_query($sql); 
        $row = mysql_fetch_array($r_query);

        if ( !empty($row[0])){  
            echo "<h2>" .$row['Country'];
            echo ":</h2> ";
            echo $row['lte'];
            echo '<br>';     
        } else { 
            echo "<h2>";
            echo "Country not found";
            echo "</h2>";
            $email_content .= $search_term2;
        } 
    }

    if (!empty($_REQUEST['search_term3'])) {

        $search_term3 = mysql_real_escape_string($_REQUEST['search_term3']);     

        $sql = "SELECT * FROM countries WHERE Country LIKE '%".$search_term3."%'"; 
        $r_query = mysql_query($sql); 
        $row = mysql_fetch_array($r_query);

        if ( !empty($row[0])){  
            echo "<h2>" .$row['Country'];
            echo ":</h2> ";
            echo $row['lte'];
            echo '<br>';     
        } else { 
            echo "<h2>";
            echo "Country not found";
            echo "</h2>";
            $email_content .= $search_term3;
        }  
    }

    @mail($email_to, $email_subject, $email_content);
    ?>


    <br>
    <br>
    <img src="iphone-models.png" alt="LTE Bands for iPhone SE Models" height="" width="80%">

</body>
</html>