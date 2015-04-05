<?php     //start php tag
//include yhenda.php page for database connection
Include('yhenda.php');
//if submit is not blanked i.e. it is clicked.
If(isset($_REQUEST['submit'])!='')
{
If($_REQUEST['name']=='' || $_REQUEST['username']=='' || $_REQUEST['password']=='' ||$_REQUEST['email']==''  || $_REQUEST['telefon']=='' || $_REQUEST['ettevote']=='')
{
Echo "please fill the empty field.";
}
Else
{
$sql="INSERT INTO user(name, username, password, email, telefon, ettevote) values('".$_REQUEST['name']."', '".$_REQUEST['username']."', '".$_REQUEST['password']."', '".$_REQUEST['email']."', '".$_REQUEST['telefon']."', '".$_REQUEST['ettevote']."')";
$res=mysql_query($sql);
If($res)
{
Echo "Record successfully inserted";
}
Else
{
Echo "There is some problem in inserting record";
}


}
}

?>
