<?php 
$clogs = $sandals = $socks = 0;
$fnameErr = $femailErr = $fgenderErr =$fItemError=$fphoneErr=$fpostalErr=$faddress=$fcity=$fccn=$fexpMonth= "";
$fexpYear=$fpassErr="";


if(isset($_POST["submit"]))
{
    if($_POST["clogs"] == "0" && $_POST["sandals"] == "0" && $_POST["socks"] == "0")
    {
        $fItemError = "Select at least 1 item";
    }
    if(empty($_POST["name"]))
    {
        $fnameErr = "Please enter name";
    }
    else
    {
        if(!preg_match("/^[a-zA-Z ]*$/" ,$_POST["name"]))
        {
            $fnameErr = "Only letters and numbers are allowed";
        }
    }
    if(empty($_POST["email"]))
    {
        $femailErr = "Please enter email";
    }
    else
    {
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL))
        {
        $femailErr = "Enter valid email";
        }
    }
    if(empty($_POST["phone"]))
    {
        $fphoneErr = "Please enter phone number";
    }
    else{
        if(!is_numeric($_POST["phone"]))
        {
            $fphoneErr = "Please enter valid phone number";
        }
    }
    if(empty($_POST["postal"]))
    {
        $fpostalErr = "Please enter postal number";
    }
    else
    {
        if(!preg_match("/^[ABCEGHJ-NPRSTVXY]\d[ABCEGHJ-NPRSTV-Z][ -]?\d[ABCEGHJ-NPRSTV-Z]\d$/i" ,$_POST["postal"]))
        {
            $fpostalErr = "Invalid postcode";
        }
    }
    if(empty($_POST["address"]))
    {
        $faddress = "Please enter address ";
    }
    if(empty($_POST["city"]))
    {
        $fcity = "Please enter city ";
    }
    if(empty($_POST["ccn"]))
    {
        $fccn = "Please enter credit card number";
    }
    else
    {
        if(!preg_match("/^[0-9][0-9][0-9][0-9][-][0-9][0-9][0-9][0-9][-][0-9][0-9][0-9][0-9][-][0-9][0-9][0-9][0-9]$/i" ,$_POST["ccn"]))
        {
            $fccn = "Invalid credit card number";
        }
    }
    if(empty($_POST["expMonth"]))
    {
        $fexpMonth = "Please enter expiry month";
    }
    else
    {
        if(!preg_match("/^[A-Z]{3}$/i" ,$_POST["expMonth"]))
        {
            $fexpMonth = "Invalid expiry month";
        }
    }
    if(empty($_POST["expYear"]))
    {
        $fexpYear = "Please enter expiry year";
    }
    else
    {
        if(!preg_match("/^[0-9][0-9][0-9][0-9]$/i" ,$_POST["expYear"]))
        {
            $fexpYear = "Invalid expiry year";
        }
    }
    if(empty($_POST["pass1"]))
    {
        $fpassErr = "Please create a password";
    }
    if(empty($_POST["pass2"]))
    {
        $fpassErr = "Please create a password";
    }
    else
    {
        if($_POST["pass1"] != $_POST["pass2"])
        {
            $fpassErr = "Passwords do not match";
        }
    }

       
    
}

// define variables and set to empty values
$clogsnumberToShow = $hstToShowAfter =  $hstToShowBefore = $addressToShow = $sandalsnumberToShow = $socksnumberToShow = $nameToShow = $phoneToShow = $postcodeToShow = $cityToShow = $provinceToShow = $subtotalToShow = $emailToShow = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clogsnumberToShow = test_input($_POST["clogs"]);
    $sandalsnumberToShow = test_input($_POST["sandals"]);
    $socksnumberToShow = test_input($_POST["socks"]);
    $phoneToShow =  test_input($_POST["phone"]);
    $postcodeToShow = test_input($_POST["postal"]);
    $cityToShow = test_input($_POST["city"]);
    $addressToShow = test_input($_POST["address"]);
    $provinceToShow = test_input($_POST["province"]);
    $nameToShow = test_input($_POST["name"]);
    $emailToShow = test_input($_POST["email"]);
    $subtotalToShow = $clogsnumberToShow * 10 + $sandalsnumberToShow * 15 + $socksnumberToShow * 5;
    $hstToShowBefore = 0.13 * $subtotalToShow;
    $hstToShowAfter = $subtotalToShow + $hstToShowBefore;
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shop for Crocs</title>
    <link rel="stylesheet" href="stylesheets/shop.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="header">
        <a href="#default" id="logo" ><img class="logo" src="https://1000logos.net/wp-content/uploads/2018/11/Crocs.jpg" alt="CompanyLogo" ></a>
        <div class="header-right">
          <a href="homePage.html">Home</a>
          <a class="active" href="shop.php">Shop</a>
          <a href="#contact">Contact</a>
          <a href="#about">About</a>
        </div>
      </div>
    <header>
        <h1 id="title">Crocs</h1>
        <p id="backHome"><b>Main page</b></p>
    </header>

    <form id="mainForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <span id="numberTextClogs"></span><br>
        <label for="clogsnumber">Number of clogs @ $10</label><br>
        <input type="number" name="clogs" id="clogsnumber" value="0">
        <span class="text-danger"><?php echo $fItemError; ?></span><br><br>
        
        <span id="numberTextSandals"></span><br>
        <label for="sandalsnumber">Number of sandals @ $15</label><br>
        <input type="number" name="sandals" id="sandalsnumber" value="0">
        <span class="text-danger"><?php echo $fItemError; ?></span><br><br>
        
        <span id="numberTextSocks"></span><br>
        <label for="socksnumber">Number of socks @ $5</label><br>
        <input type="number" name="socks" id="socksnumber" value="0">
        <span class="text-danger"><?php echo $fItemError; ?></span><br><br>
        

        <label for="name">Name:</label><br>
        <input type="text" name="name" id="name" placeholder="John Doe">
        <span class="text-danger"><?php echo $fnameErr; ?></span><br>

        <span id="errorPhone"></span><br>
        <label for="phone">Phone:</label><br>
        <input type="text" name="phone" id="phone" placeholder="1231231234">
        <span class="text-danger"><?php echo $fphoneErr; ?></span><br>

        <span id="errorPost"></span><br>
        <label for="postcode">Postcode:</label><br>
        <input type="text" name="postal" id="postcode" placeholder="A1B 1X1">
        <span class="text-danger"><?php echo $fpostalErr; ?></span><br><br>

        <label for="address">Address:</label><br>
        <input type="text" name="address" id="address">
        <span class="text-danger"><?php echo $faddress; ?></span><br><br>

        <label for="city">City:</label><br>
        <input type="text" name="city" id="city">
        <span class="text-danger"><?php echo $fcity; ?></span><br><br>

        <label for="province">Choose a province:</label><br>
        <select id="province" name="province">
            <option value="alberta">Alberta</option>
            <option value="britishColumbia">British Columbia</option>
            <option value="manitoba">Manitoba</option>
            <option value="newBrunswick">New Brunswick</option>
            <option value="newfoundlandAndLabrador">Newfoundland and Labrador</option>
            <option value="novaScotia">Nova Scotia</option>
            <option value="ontario">Ontario</option>
            <option value="priceEdwardIsland">Prince Edward Island</option>
            <option value="quebec">Quebec</option>
            <option value="saskatchewan">Saskatchewan</option>
        </select><br>
        
        <span id="errorCCN"></span><br>
        <label for="ccn">Credit card number:</label><br>
        <input id="ccn" name="ccn" maxlength="19" placeholder="XXXX-XXXX-XXXX-XXXX">
        <span class="text-danger"><?php echo $fccn; ?></span><br>

        <span id="errorCCm"></span><br>
        <label for="ccexpiresmonth">Credit card expiry month:</label><br>
        <input id="ccexpiresmonth" type="text" name="expMonth" title="Three letter month code in caps" maxlength="3" placeholder="MMM">
        <span class="text-danger"><?php echo $fexpMonth; ?></span><br>

        <span id="errorCCex"></span><br>
        <label for="ccexpiresyear">Credit card expiry year:</label><br>
        <input id="ccexpiresyear" name="expYear" maxlength="4" placeholder="yyyy">
        <span class="text-danger"><?php echo $fexpYear; ?></span><br>

        <br>
        <label for="email">Email:</label><br>
        <input id="email" name="email" type="text" placeholder="user@domain.com">
        <span class="text-danger" ><?php echo $femailErr; ?></span><br><br>

        <label for="password">Password:</label><br>
        <input id="password" name="pass1" type="password">
        <span class="text-danger" ><?php echo $fpassErr; ?></span><br>

        <span id="errorPassword"></span><br>
        <label for="passwordconfirm">Confirm password:</label><br>
        <input id="passwordconfirm" name="pass2" type="password">
        <span class="text-danger" ><?php echo $fpassErr; ?></span><br>

       <br>
        <input type="submit" name="submit" value="Submit Order" id="button">
    </form>
    <table>
        <caption>RECEIPT</caption>
        <tr>
            <td id="rName">First name :</td>
            <td id="rNameValue"><?php echo $nameToShow; ?></td>
        </tr>
        <tr>
            <td id="email">Email :</td>
            <td id="emailValue"><?php echo $emailToShow; ?></td>
        </tr>
        <tr>
            <td id="clogsBought">Clogs bought :</td>
            <td id="clogsBoughtValue"><?php echo $clogsnumberToShow; ?></td>
        </tr>
        <tr>
            <td id="sandalsBought">Sandals bought :</td>
            <td id="sandalsBoughtValue"><?php echo $sandalsnumberToShow; ?></td>
        </tr>
        <tr>
            <td id="socksBought">Socks bought :</td>
            <td id="socksBoughtValue"><?php echo $socksnumberToShow; ?></td>
        </tr>
        <tr>
            <td id="phone">Phone number : </td>
            <td id="phoneValue"><?php echo $phoneToShow; ?></td>
        </tr>
        <tr>
            <td id="cityh">City : </td>
            <td id="cityValue"><?php echo $cityToShow; ?></td>
        </tr>
        <tr>
            <td id="post">Post code : </td>
            <td id="postValue"><?php echo $postcodeToShow; ?></td>
        </tr>
        <tr>
            <td id="prov">Province : </td>
            <td id="provValue"><?php echo $provinceToShow; ?></td>
        </tr>
        <tr>
            <td id="address">Address : </td>
            <td id="addressValue"><?php echo $addressToShow; ?></td>
        </tr>
        <tr>
            <td id="subTotal">Subtotal : </td>
            <td id="subTotalValue"><?php echo $subtotalToShow; ?></td>
        </tr>
        <tr>
            <td id="hst">HST : </td>
            <td id="hstValue"><?php echo $hstToShowBefore; ?></td>
        </tr>
        <tr>
            <td id="total">Total : </td>
            <td id="totalValue"><?php echo $hstToShowAfter; ?></td>
        </tr>
        
    </table>
    <footer>
        <p id="footer">© Smit Mehta & Iulia Danilov</p>
    </footer>
    
</body>
</html>