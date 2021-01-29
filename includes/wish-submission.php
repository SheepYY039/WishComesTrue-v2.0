<?php
	if (!empty($_GET['submit'])) {
		addStuff();
	}

	function addStuff()
	{
		$wish  = "'" . $_GET['wish'] . "'";
		$name  = "'" . $_GET['name'] . "'";
		$email = "'" . $_GET['email'] . "'";
		$phone = 'null';
		if (!empty($_GET['phone']) && $_GET['phone'] != '') {
			$phone = "'" . $_GET['phone'] . "'";
		}
		$people = "'" . $_GET['people'] . "'";
		$people = "'0'";
		if (!empty($_GET['people']) && $_GET['people'] != '') {
			$people = "'" . $_GET['people'] . "'";
		}
		$money = "'0'";
		if (!empty($_GET['money']) && $_GET['money'] != '') {
			$money = "'" . $_GET['money'] . "'";
		}
		$district = 'null';
		if (!empty($_GET['district']) && $_GET['district'] != '') {
			$district = "'" . $_GET['district'] . "'";
		}
		$starttime = 'null';
		if (!empty($_GET['starttime']) && $_GET['starttime'] != '') {
			$starttime = "'" . $_GET['starttime'] . "'";
		}
		$start = 'null';
		if (!empty($_GET['start']) && $_GET['start'] != '') {
			$start = "'" . $_GET['start'] . "'";
		}
		$end = 'null';
		if (!empty($_GET['end']) && $_GET['end'] != '') {
			$end = "'" . $_GET['end'] . "'";
		}
		$groups   = "'" . "'";
		$donating = "'" . "'";
		$projects = "'" . "'";
		if (!empty($_GET['minority'])) {
			$tempGroups = '';
			foreach ($_GET['minority'] as $selected_minority) {
				$tempGroups .= $selected_minority . ' | ';
			}
			$groups = "'" . $tempGroups . "'";
		}
		if (!empty($_GET['donation'])) {
			$tempDonating = '';
			foreach ($_GET['donation'] as $selected_donate) {
				$tempDonating .= $selected_donate . ' | ';
			}
			$donating = "'" . $tempDonating . "'";
		}
		if (!empty($_GET['project'])) {
			$tempProjects = '';
			foreach ($_GET['project'] as $selected_project) {
				$tempProjects .= $selected_project . ' | ';
			}
			$projects = "'" . $tempProjects . "'";
		}

		$info = 'null';
		if (!empty($_GET['comment']) && $_GET['comment'] != '') {
			$info = "'" . $_GET['comment'] . "'";
		}

		$servername = 'localhost';
		$username   = 'id15251966_requested_wishes';
		$password   = 'WCThk2020-WCThk2020';
		$dbname     = 'id15251966_wishes';

		// Create connection
		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if ($conn->connect_error) {
			die('Connection failed: ' . $conn->connect_error);
		}
		// echo 'Connected successfully<br/>';

		$sql = 'INSERT INTO `tbl_wishes` (`Wish_name`, `Organization_name`, `Email`, `Phone`, `Minority_groups`, `Donating_type`, `Project_type`, `People`, `Money`, `District`, `Event_time`, `Start_date`, `End_date`, `Additional_Information`) VALUES (' . $wish . ', ' . $name . ', ' . $email . ', ' . $phone . ', ' . $groups . ', ' . $donating . ', ' . $projects . ', ' . $people . ', ' . $money . ', ' . $district . ', ' . $starttime . ', ' . $start . ', ' . $end . ', ' . $info . ')';

		// here we need to add to db
		if (mysqli_query($conn, $sql)):
			header("Location: /?success=1");
			// echo 'New records created successfully<br>';
		 else:
			header("Location: /?error=1");
			// echo 'Error: ' . $sql . '<br>' . mysqli_error($conn);
		 endif;
	
		}

	?>