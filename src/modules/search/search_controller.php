<?php

require_once("search_model.php");
if(!isset($_SESSION))
{
    session_start();
}

$_SESSION['errorMessage'] = null;

if(isset($_POST['user_skill'])) {
    $skill = $_POST['user_skill'];
    $user_with_skill = queryUserBySkill($skill);
    $_SESSION['search_results'] = $user_with_skill;
    // print_r($_SESSION['search_results']);
    // print_r($user_with_skill);
    #header("Location: search_view.php");
    include("search_view.php");?>
	<div class="container">
	<hr>
	<form class="form-horizontal" id="choose_users" action="../compare/compare_view.php" target="_blank" method="post">
	<div class="container" style='display:flex;'>
		<h1>Search Results</h1>
		<?php if (count($user_with_skill) > 0) { ?>
		<input id="compare" type="submit" name="compare" value="Compare" class="btn btn-primary" style="margin-left: auto;">
	</div>
	<div class="container" style="height: 50%; overflow-y: auto;">
		<table style='border-collapse:separate; border-spacing: 0 0.5em; width: 100%;'>
		<?php foreach($user_with_skill as $row) : ?>
		<tr>
			<?php $photo = $row['photo'];
			echo "<td style='border-top: 1px solid #ddd;
				   border-left: 1px solid #ddd;
				   border-bottom: 1px solid #ddd;
				   border-radius: 10px 0 0 10px;
				   color: #ffffff;
				   font-size: 20px;'
				   bgcolor='#006a66'
				   align='center'>
				   <img src='$photo' alt='No Photo' height='42' style='margin: 5px 0;'>
			</td>"; ?>
			<td style='border-top: 1px solid #ddd;
				   border-bottom: 1px solid #ddd;
				   color: #ffffff;
				   font-size: 20px;'
				   bgcolor='#006a66'
				   align='center'>
				   <?php echo $row['name']; ?>
			</td>
			<td style='border-top: 1px solid #ddd;
				   border-bottom: 1px solid #ddd;
				   color: #ffffff;
				   font-size: 20px;'
				   bgcolor='#006a66'
				   align='center'>
				   <?php echo $skill; ?>
			</td>
			<?php
			$checkval = intval($row['userID']);
			echo "<td style='border-top: 1px solid #ddd;
					 border-right: 1px solid #ddd;
					 border-bottom: 1px solid #ddd;
					 border-radius: 0 10px 10px 0;
					 color: #ffffff;
					 font-size: 20px;'
					 bgcolor='#006a66'
					 align='center'>
				<input type='checkbox' name='selected_compare[]' id='selected_compare' value='$checkval' />
					Add
			      </td>";
			?>
		</tr>
		<?php endforeach;?>
		</table>
	</div>
		</form>
	<?php }
	else {
		echo "</div><div class='container' style='display:flex;'><h2><br>No Results Found</h2></div>";
	} ?>
	</div>
<?php }
else {
  header("Location: search_view.php");
  exit();
}
?>
