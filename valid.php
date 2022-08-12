$fname = $femail = $fgender = "";
$fnameErr = $femailErr = $fgenderErr = "";

if(isset($_POST["submit"]))
{
    if(empty($_POST["name"]))
    {
        $fnameErr = "<p>Please enter name</p>";
    }
    else{
        if(preg_match("/^[A-Za-z ][A-Za-z0-9_]{7,29}$/" ,$_POST["name"]))
        {
            $fnameErr = "<p>Only letters and numbers are allowed";
        }
    }
}