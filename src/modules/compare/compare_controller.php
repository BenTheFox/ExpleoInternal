<?php
include("compare_model.php");
?>
<?php

function showName($user)
{
	$result = getName($user);
	echo $result['first_name'] . " " .$result['last_name'];
}

function showPhoto($user, $show_photo)
{
	if ($show_photo)
	{
		$result = getPhoto($user);
		$photo = $result['photo'];
		echo "<img src='$photo' alt='No Photo' height='150rem'>";
	}
}

function showBasic($user, $show_basic)
{
	if ($show_basic)
	{
		$result = getBasic($user);
		 echo "<hr>";
     echo "<strong>Email:</strong> " .$result['email'] ."<br>";
     echo "<strong>Gender:</strong> " .$result['gender'] ."<br>" ;
     echo "<strong>Location:</strong> " .$result['city'] .", " .$result['state'];
	}
}

function showSoft($user, $show_soft, $searched_sskill)
{
	$MAX_SKILLS_LIST = 5;
	if ($show_soft)
	{
		echo "<hr>";
		echo "<strong>Top Software Skills:</strong><br>";

		if (!is_null($searched_sskill)) {
			echo "$searched_sskill <br>";
			$MAX_SKILLS_LIST = $MAX_SKILLS_LIST - 1;
		}

		$result = getSoft($user);
		if ($result) {
    		for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
        {
					$skill = $result[$i][0];
					if ($skill != $searched_sskill) {
          	echo $skill ."<br>";
					}
        }
        if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
    }
	}
}

function showHard($user, $show_hard, $searched_hskill)
{
	$MAX_SKILLS_LIST = 5;
	if ($show_hard)
	{
		echo "<hr>";
		echo "<strong>Top Hardware Skills:</strong><br>";

		if (!is_null($searched_hskill)) {
			echo "$searched_hskill <br>";
			$MAX_SKILLS_LIST = $MAX_SKILLS_LIST - 1;
		}

		$result = getHard($user);
		if ($result)
		{
			for ($i = 0; $i < sizeof($result) && $i < $MAX_SKILLS_LIST; $i++) #REMOVED <=
			{
				$skill = $result[$i][0];
				if ($skill != $searched_hskill) {
					echo $skill ."<br>";
				}
			}
			if (sizeof($result) >= $MAX_SKILLS_LIST) { echo "...";}
    }

	}
}

function isSoftSkill($searched_skill) {
	$result = in_software_skills($searched_skill);
	return $result;
}
?>
