<?php
if (session_id()== ''){
header('location:/acme/index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Mary Reiko Elsmore">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../css/acmestylesheet.css" type="text/css" rel="stylesheet" media="screen">  
        <title>Acme Admin Page</title>
    </head>
    <body>
        <div id="page-container">
        <header>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/header.php'; ?>
        </header>
        <nav>
            <?php echo $navList; ?>
        </nav>
        <main>
            <div>
                <h1><?php if (isset($upfirstName)) {echo "$upfirstName";} elseif(isset($clientData['clientFirstname'])) {echo"$clientData[clientFirstname]"; }?>
             <?php if (isset($uplastName)) {echo "$uplastName";} elseif(isset($clientData['clientLastname'])) {echo"$clientData[clientLastname]"; }?></h1>
                <p>You are logged in.</p>
            </div>
                <?php
                    $firstname = $_SESSION['clientData']['clientFirstname'];
                    $lastname = $_SESSION['clientData']['clientLastname'];
                    $emailaddress = $_SESSION['clientData']['clientEmail'];
                    $level = $_SESSION['clientData']['clientLevel'];       
                    echo"
                        <ul>
                            <li>First name: $firstname</li>
                            <li>Last name: $lastname</li>
                            <li>Email: $emailaddress</li>
                        </ul>"; 
                ?>
                <p><a href="/acme/accounts/index.php?action=client-update">Update Account Information</a></p>
                <?php
                if ($level == 3){
                echo '<h1>Administrative Functions</h1>
                <p>Use the link below to manage products</p>
                <a href="/acme/products/index.php?action=product-mgmt">Products</a><br>';
                }
                ?>
        </main>
        <footer>
            <?php include $_SERVER['DOCUMENT_ROOT'] . '/acme/common/footer.php'; ?>
        </footer>
        </div>
    </body>
</html>