<?php class sql_monitor {

function getPoint($q,$phone) { $s="";
	$s.="SELECT * FROM VW_USER_COMP WHERE (PHONE='$phone') AND (TRUNC_DATE=current_date) ORDER by TRUNC_DATE DESC";
	return $s;
}

} ?>
