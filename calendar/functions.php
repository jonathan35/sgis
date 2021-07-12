<?php
/*******************************************************
* functions.php -
*	global include file
*******************************************************/
require("config.php");

function auth($login = '', $passwd = '') 
{
	session_start();
	$auth     = 0;
	$register = false;
	$authdata = null;
	
	if(!empty($_SESSION['authdata'])) {
		$authdata = $_SESSION['authdata'];
	}
	
	# return false if login neither passed to func, nor in session
	if (empty($login) && empty($authdata['login'])) {
		return 0;
	}

	# get login passed to function
	if (!empty($login)) {
		$username = $login;
		$pw       = $passwd;
		$register = true;
	} else {
		$username = $authdata['login'];
		$pw       = $authdata['password'];
	}
	
	mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die(mysqli_error());
	mysqli_select_db(DB_NAME) or die(mysqli_error());
	
	$sql = "
		SELECT * FROM " . DB_TABLE_PREFIX . "users 
		WHERE username = '" . $username . "'";
	$result = mysqli_query($conn, $sql) or die(mysqli_error());
	$row = mysqli_fetch_assoc($result);
	
	# validate login, and register session data if appropriate 
	if ( $pw == $row["password"] ) {
		$auth = $row['userlevel'];

		if ($register) {
			$_SESSION['authdata'] = array(
				'login'     => $row['username'], 
				'password'  => $row['password'], 
				'userlevel' => $row['userlevel'], 
				'uid'       => $row['uid'],
			);
		}
	} else {
		# if passwords didn't match, delete authdata session data 
		unset($_SESSION['authdata']);
	}
	

   	return $auth;

}

# ###################################################################

function monthPullDown($month, $montharray)
{
	echo "<select name=\"month\">\n";

	$selected[$month - 1] = ' selected="selected"';

	for($i=0;$i < 12; $i++) {
		$val = $i + 1;
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$val\"$sel>$montharray[$i]</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function yearPullDown($year)
{
	echo "<select name=\"year\">\n";

	$selected[$year] = ' selected="selected"';
	$years_before_and_after = 3;
	$start_year = $year - $years_before_and_after;
	$end_year   = $year + $years_before_and_after;

	for($i=$start_year;$i <= $end_year; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function dayPullDown($day)
{
	echo "<select name=\"day\">\n";

	$selected[$day] = ' selected="selected"';

	for($i=1;$i <= 31; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function hourPullDown($hour, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_hour\">\n";
	
	$selected[$hour] = ' selected="selected"';

	for($i=0;$i <= 12; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function minPullDown($min, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_min\">\n";
	
	$selected[$min] = ' selected="selected"';

	for($i=0;$i < 60; $i+=5) {
		$disp_min = sprintf("%02d", $i);
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "\t<option value=\"$i\"$sel>$disp_min</option>\n";
	}

	echo "</select>\n\n";
}

# ###################################################################

function amPmPullDown($pm, $namepre)
{
	$sel = ' selected="selected"';
	$am  = null;
	if ($pm) { $pm = $sel; } else { $am = $sel; }

	echo "\n<select name=\"" . $namepre . "_am_pm\">\n";
	echo "	<option value=\"0\"$am>am</option>\n";
	echo "	<option value=\"1\"$pm>pm</option>\n";
	echo "</select>\n\n";
}

# ###################################################################

function javaScript()
{
?>
	<script language="javascript">
	function submitMonthYear() {
		document.monthYear.method = "post";
		document.monthYear.action = 
			"result.php?root=Mg==&month=" + document.monthYear.month.value + 
			"&year=" + document.monthYear.year.value+"#result";
		document.monthYear.submit();
	}
	
	function postMessage(day, month, year) {
		eval(
		"page" + day + " = window.open('eventform.php?d=" + day + "&m=" + 
		month + "&y=" + year + "', 'postScreen', 'toolbar=0,scrollbars=1," +
		"location=0,statusbar=0,menubar=0,resizable=1,width=340,height=400');"
		);
	}
	
	function openPosting(pId) {
		eval(
		"page" + pId + " = window.open('eventdisplay.php?id=" + pId + 
		"', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0,statusbar=0," +
		"menubar=0,resizable=1,width=340,height=400');"
		);
	}
	
	function loginPop(month, year) {
		eval("logpage = window.open('login.php?month=" + month + "&year=" + 
		year + "', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0," +
		"statusbar=0,menubar=0,resizable=1,width=340,height=400');"
		);
	}
	</script>
<?php
}

# ###################################################################

function footprint($auth, $m, $y) 
{
	global $lang;

	echo "
	<br><span class=\"footprint\">
	\n[ ";
	
	if ( $auth == 2 ) {
		echo "
		<a href=\"useradmin.php\">" . $lang['adminlnk'] . "</a>";
	} elseif ( $auth == 1 ) {
		echo "
		<a href=\"useradmin.php?flag=changepw\">" . $lang['changepw'] . "</a>>"
		 . $lang['logout'] . " </a>";
	} else {
//		echo "<a href=\"javascript:loginPop($m, $y)\">"
//		. $lang['login'] . "</a>";
	}
	echo " ]</span>";
}

/* for backup purpose */
/*
function footprint($auth, $m, $y) 
{
	global $lang;

	echo "
	<br><span class=\"footprint\">
	\n[ ";
	
	if ( $auth == 2 ) {
		echo "
		<a href=\"useradmin.php\">" . $lang['adminlnk'] . "</a> |
		<a href=\"login.php?action=logout&month=$m&year=$y\">" 
		. $lang['logout'] . "</a>";
	} elseif ( $auth == 1 ) {
		echo "
		<a href=\"useradmin.php?flag=changepw\">" . $lang['changepw'] . "</a> |
		<a href=\"login.php?action=logout&month=$m&year=$y\">"
		 . $lang['logout'] . " </a>";
	} else {
		echo "<a href=\"javascript:loginPop($m, $y)\">"
		. $lang['login'] . "</a>";
	}
	echo " ]</span>";
}
*/

# ###################################################################

function scrollArrows($m, $y)
{
	// set variables for month scrolling
	$nextyear  = ($m != 12) ? $y : $y + 1;
	$prevyear  = ($m != 1)  ? $y : $y - 1;
	$prevmonth = ($m == 1)  ? 12 : $m - 1;
	$nextmonth = ($m == 12) ? 1  : $m + 1;

	return "
	<a href=\"calendar.php?month=" . $prevmonth . "&year=" . $prevyear . "#result\">
	<img src=\"calendar/images/leftArrow.gif\" border=\"0\"></a>
	<a href=\"calendar.php?month=" . $nextmonth . "&year=" . $nextyear . "#result\">
	<img src=\"calendar/images/rightArrow.gif\" border=\"0\"></a>
	";
}

# ###################################################################

function writeCalendar($month, $year)
{
	$str = getDayNameHeader();
	$eventdata = getEventDataArray($month, $year);

	# get first row position of first day of month.
	$weekpos = getFirstDayOfMonthPosition($month, $year);

	# get user permission level
	$auth = (isset($_SESSION['authdata'])) 
		? $_SESSION['authdata']['userlevel'] 
		: false;

	# get number of days in month
	$days = date("t", mktime(0,0,0,$month,1,$year));

	# initialize day variable to zero, unless $weekpos is zero
	if ($weekpos == 0) $day = 1; else $day = 0;
	
	# initialize today's date variables for color change
	$timestamp = mktime() + CURR_TIME_OFFSET * 3600;
	$d = date('j', $timestamp); 
	$m = date('n', $timestamp); 
	$y = date('Y', $timestamp);

	# lookup for testing whether day is today
	$today["$y-$m-$d"] = 1;

	# loop writes empty cells until it reaches position of 1st day of 
	# month ($wPos).  It writes the days, then fills the last row with empty 
	# cells after last day
	while($day <= $days) {
		$str .="<tr>\n";
		
		# write row
		for($i=0;$i < 7; $i++) {
			# if cell is a day of month
			if($day > 0 && $day <= $days) {
				# set css class today if cell represents current date
				$class = (isset($today["$year-$month-$day"])) ? 'today' : 'day';

				$str .= "
				<td class=\"{$class}_cell\" valign=\"top\">
				<span class=\"day_number\">\n";
				
				if (1=='2') {//if ($auth) {
					$str .= "
					<a href=\"javascript: postMessage($day, $month, $year)\">
					$day</a>";
				} else {
					$str .= "$day";
				}	
				$str .= "</span><br>";
				
				if(!empty($eventdata[$day]["title"])) {
					// enforce title limit
					$eventcount = count($eventdata[$day]["title"]);
	
					if (MAX_TITLES_DISPLAYED < $eventcount) {
						$eventcount = MAX_TITLES_DISPLAYED;
					}
					
					// write title link if day's postings 
					for($j=0;$j < $eventcount;$j++) {
						$str .= "
						<span class=\"title_txt\">
						-<a href=\"javascript:openPosting("
						. $eventdata[$day]["id"][$j] . ")\">"
						. $eventdata[$day]["title"][$j] . "</a></span>"
						. $eventdata[$day]["timestr"][$j];
					}
				}

				$str .= "</td>\n";
				$day++;
			} elseif($day == 0)  {
     			$str .= "
				<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
				$weekpos--;
				if ($weekpos == 0) $day++;
     		} else {
				$str .= "
				<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
			}
     	}
		$str .= "</tr>\n\n";
	}
	$str .= "</table>\n\n";
	return $str;
}

# ###################################################################

function getDayNameHeader()
{
	global $lang;

	// adjust day name order if weekstart not Sunday
	if (WEEK_START != 0) {
		for($i=0; $i < WEEK_START; $i++) {
			$tempday = array_shift($lang['abrvdays']);
			array_push($lang['abrvdays'], $tempday);
		}
	}

	$s = "<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\">\n<tr>\n";

	foreach($lang['abrvdays'] as $day) {
		$s .= "\t<td class=\"column_header\">&nbsp;$day</td>\n";
	}

	$s .= "</tr>\n\n";
	return $s;
}

# ###################################################################

function getEventDataArray($month, $year)
{
	$auth = (isset($_SESSION['authdata'])) 
		? $_SESSION['authdata']['userlevel'] 
		: false;
		
	$eventdata = null;
	mysqli_connect(DB_HOST, DB_USER, DB_PASS) or die(mysqli_error());
	mysqli_select_db(DB_NAME) or die(mysqli_error());
	
	//$member_query=mysqli_query($conn, "select * from mem where status=1 and mem_login_name='".$_SESSION['userloginname']."'");
	//$member=mysqli_fetch_assoc($member_query);
	
	$member_query=mysqli_query($conn, "select * from qt_login where username='admin'");
	$member=mysqli_fetch_assoc($member_query);
	
	//$mem_project=$member['mem_project_code'];			
	//$string=$mem_project;			
	//$words = explode(",", $string );

	
	$sql = "SELECT id, d, title, start_time, end_time, ";
	
	if (TIME_DISPLAY_FORMAT == "12hr") {
		$sql .= "TIME_FORMAT(start_time, '%l:%i%p') AS stime, ";
		$sql .= "TIME_FORMAT(end_time, '%l:%i%p') AS etime ";
	} elseif (TIME_DISPLAY_FORMAT == "24hr") {
		$sql .= "TIME_FORMAT(start_time, '%H:%i') AS stime, ";
		$sql .= "TIME_FORMAT(end_time, '%H:%i') AS etime ";
	} else {
		echo "Bad time display format, check your configuration file.";
	}
	
	
	if ($auth) 
	{
		$sql .= "FROM " . DB_TABLE_PREFIX . "mssgs WHERE m = $month AND y = $year ORDER BY start_time";
	}
	else
	{
	 	$sql .= "FROM " . DB_TABLE_PREFIX . "mssgs WHERE m = $month AND y = $year ORDER BY start_time";
	}
	
	
	
	$result = mysqli_query($conn, $sql) or die(mysqli_error());
	
	while($row = mysqli_fetch_assoc($result)) {
		$day = $row["d"];
		$eventdata[$day]["id"][] = $row["id"];

		# set title string; limit char length and append ellipsis if necessary
		$title = stripslashes($row["title"]);
		$eventdata[$day]["title"][] = (strlen($title) > TITLE_CHAR_LIMIT)
			? substr($title, 0, TITLE_CHAR_LIMIT) . '...'
			: $title; 
		
		# set time string
		if (!($row["start_time"] == "55:55:55" 
			&& $row["end_time"] == "55:55:55")) {
			$starttime 
				= ($row["start_time"] == "55:55:55") ? "- -" : $row["stime"];
			$endtime 
				= ($row["end_time"] == "55:55:55") ? "- -" : $row["etime"];
			
			$timestr = "
			<div align=\"right\" class=\"time_str\">
			($starttime - $endtime)&nbsp;</div>\n";
		} else {
			$timestr = "<br />";
		}
		$eventdata[$day]["timestr"][] = $timestr;
	}
	return $eventdata;
}

# ###################################################################

function getFirstDayOfMonthPosition($month, $year)
{
	$weekpos = date("w", mktime(0,0,0,$month,1,$year));

	// adjust position if weekstart not Sunday
	if (WEEK_START != 0) {
		if ($weekpos < WEEK_START) {
			$weekpos = $weekpos + 7 - WEEK_START;
		} else {
			$weekpos = $weekpos - WEEK_START;
		}
	}
	return $weekpos;
}

# ###################################################################

?>
