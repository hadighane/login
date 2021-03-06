<?php
include ("config.php");
include ("model.php");
include ("members_model.php");
include ("Controller.php");
include ("note_controler.php");
@session_start();		
$x = new note();
$member_id = $x -> get_id ($_SESSION["email"]);

if($_POST){
if($_POST['note_id'] AND $_POST['title']){
$ret = $x->update_note($_POST['note_id'],$_POST['title'],$_POST['note']);
	if($ret){
		$alert =  "update success";
	}
	
}else{
	$alert =  "Title is req";
}
}
$notes = $x -> get_note ($member_id,$_GET['id']);
if(count($notes) > 0){
	$note = $notes[0];
}else{
	$alert =  "id not found";
	exit;
}

?>


<?php if($alert){?> <h1>Alert : <?php echo $alert;?> </h1> <?php } ?>

	<form action='' method='POST' id='form'>
	<br>
	<label for='note_title'>Give a Title to your note:</label>
	<input type='text' id='get_title' name='title' placeholder='Title' value="<?php echo $note['title'];?>"><br>
	<input type='hidden' name='note_id' value='<?php echo $note['id'];?>'>
	<label for='note_title'>Write your note:</label><br>
	<textarea name='note' cols='50' rows='10'><?php echo $note['note'];?></textarea><br>
	<br>
	<input type='submit' value='Save' form='form' name='save'>