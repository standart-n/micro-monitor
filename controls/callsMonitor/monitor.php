<?php class monitor {

function engine(&$q) { 
	$this->initPears($q);
	$q->fn->toModel($q,$this->showMonitor($q),"content");
}

function initPears(&$q) {
	
	require "AsteriskManager.php";
	$params = array('server' => '127.0.0.1', 'port' => '5038');
	$ast = new Net_AsteriskManager($params);
	try {
		$ast->connect();
	} catch (PEAR_Exception $e) {
		echo $e;
	}
	
	try {
		$ast->login('admin', 'yJaBkTn');
	} catch(PEAR_Exception $e) {
		echo $e;
	}

	try {
		$PeersStatus = $ast->getSipPeers();
	}  catch (PEAR_Exception $e) {
		echo $e;
	}
	
	$q->peersStatus=$PeersStatus;
	
}

function showMonitor(&$q) { $s=""; $ms=array(); $i=-1;
	if (isset($q->peersStatus)) {
		foreach (explode("\r\n\r\n",$q->peersStatus) as $line) { $i++;
			foreach (array("phone","type","status","ip","user","profile") as $key) {
			  $ms[$i][$key]="-";
			}
			foreach (explode("\r\n",$line) as $str) {
				$v=explode(":",$str);
				if (isset($v[0])) { $var=$v[0]; } else { $var=""; }
				if (isset($v[1])) { $val=$q->validate->ast($v[1]); } else { $val=""; }
				switch ($var) {
					case "ObjectName":
						$ms[$i]['phone']=$val; 
						$phone=$val;
					break;
					case "Channeltype":
						$ms[$i]['type']=$val;
					break;
					case "Status":
						$ms[$i]['status']=$val;
					break;
					case "IPaddress":
						$ms[$i]['ip']=$val;
					break;
				}
			}
			if (isset($phone)) { if (($phone!="") && ($phone!="-")) {
				
				$sql=$q->sql_monitor->getPoint($q,$phone);
				$query=ibase_query($q->fdb_it,$sql);
				if (isset($query)) { if ($query) {
					$r=ibase_fetch_object($query);
					if (isset($r)) { if (isset($r->USER_ID)) {
						$ms[$i]['user']=$q->fn->toUTF($r->SUSER);
						$ms[$i]['profile']=$q->fn->toUTF($r->SPROFILE);
						$ms[$i]['profile_id']=$q->fn->toUTF($r->PROFILE_ID);
					} }
				} }
			} }
		}
	}
	$s.=$q->tpl_monitor->monitor($q,$ms);
	return $s;
}

} ?>



