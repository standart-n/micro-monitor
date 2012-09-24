<?php class tpl_monitor {

function monitor($q,$ms) { $s=""; $n="\r\n";
	$s.='<div id="monitor">'.$n;
	$s.=	'<table cellpadding="0" cellspacing="0" width="780px" align="center" border="0">'.$n;
	$s.=		'<tr valign="top">';
	$s.=			'<td align="center" width="120px">';
	$s.=				'<div class="monitor-table-caption">';
	$s.=					'№';
	$s.=				'</div>';
	$s.=			'</td>';
	$s.=			'<td align="center" width="100px">';
	$s.=				'<div class="monitor-table-caption">';
	$s.=					'тип';
	$s.=				'</div>';
	$s.=			'</td>';
	$s.=			'<td align="center" width="140px">';
	$s.=				'<div class="monitor-table-caption">';
	$s.=					'ip';
	$s.=				'</div>';
	$s.=			'</td>';
	$s.=			'<td align="center" width="140px">';
	$s.=				'<div class="monitor-table-caption">';
	$s.=					'статус';
	$s.=				'</div>';
	$s.=			'</td>';
	$s.=			'<td align="center" width="140px">';
	$s.=				'<div class="monitor-table-caption">';
	$s.=					'пользователь';
	$s.=				'</div>';
	$s.=			'</td>';
	$s.=			'<td align="center" width="140px">';
	$s.=				'<div class="monitor-table-caption">';
	$s.=					'профиль';
	$s.=				'</div>';
	$s.=			'</td>';
	$s.=		'</tr>'.$n;
	if (sizeof($ms)>0) {
		foreach ($ms as $r) { $cl="";
		  if ($r['phone']!="-") {
			if ((trim($r['status'])=="UNKNOWN") || (trim($r['status'])=="UNREACHABLE")) { 
				$cl.=" monitor-table-unknown"; 
			}
			$s.=		'<tr valign="top">';
			$s.=			'<td align="center">';
			$s.=				'<div class="monitor-table-line'.$cl.'">';
			$s.=					$r['phone'];
			$s.=				'</div>';
			$s.=			'</td>';
			$s.=			'<td align="center">';
			$s.=				'<div class="monitor-table-line'.$cl.'">';
			$s.=					$r['type'];
			$s.=				'</div>';
			$s.=			'</td>';
			$s.=			'<td align="center">';
			$s.=				'<div class="monitor-table-line'.$cl.'">';
			$s.=					$r['ip'];
			$s.=				'</div>';
			$s.=			'</td>';
			$s.=			'<td align="center">';
			$s.=				'<div class="monitor-table-line'.$cl.'">';
			$s.=					$r['status'];
			$s.=				'</div>';
			$s.=			'</td>';
			$s.=			'<td align="center">';
			$s.=				'<div class="monitor-table-line'.$cl.'"> ';
			$s.=					$r['user'];
			$s.=				'</div>';
			$s.=			'</td>';
			$s.=			'<td align="center">';
			$s.=				'<div class="monitor-table-line'.$cl.'"> ';
			$s.=					$r['profile'];
			if (isset($r['profile_id'])) { if (($r['profile_id']!="") && ($r['profile_id']!="-")) {
				$s.=					" (".$r['profile_id'].")";
			} }
			$s.=				'</div>';
			$s.=			'</td>';
			$s.=		'</tr>'.$n;
		  }
		}
	}
	$s.=	'</table>'.$n;
	$s.='</div>'.$n;
	return $s;
}

} ?>
