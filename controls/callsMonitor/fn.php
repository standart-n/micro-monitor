<?php class fn {

var $local="";

function loadModel($n) { $q=&$this->q; $m="";
    $mdl=$this->local.'models/'.$q->folder.'/mdl_'.$n.'.html';	
    if (file_exists($mdl)) { if (fopen($mdl,"r")) {
		$m.=file_get_contents($mdl);
	}	}	
	return $m;
}

function toModel(&$q,$s="",$tag="",$type="simple") {
	switch ($type) {
	case "simple":
		$q->html=str_replace("[".$tag."]",$s,$q->html);
	break;
	}
}

function getImage($r) { $s=""; $ex=false; $img=""; $p="img/price/"; $ext=".jpg";
	if (file_exists($p."SERIA".$r->SERIA.$ext)) { $img=$p."SERIA".$r->SERIA.$ext; }
	if (file_exists($p."SERIA".$r->SERIA."~".$ext)) { $img=$p."SERIA".$r->SERIA."~".$ext; }
	if (file_exists($p."PART".$r->PART_ID.$ext)) { $img=$p."PART".$r->PART_ID.$ext; }
	if (file_exists($p."PART".$r->PART_ID."~".$ext)) { $img=$p."PART".$r->PART_ID."~".$ext; }
	if (file_exists($p."NAME".$r->NAME_ID.$ext)) { $img=$p."NAME".$r->NAME_ID.$ext; }
	if (file_exists($p."NAME".$r->NAME_ID."~".$ext)) { $img=$p."NAME".$r->NAME_ID."~".$ext; }
	$s.=$img;
	return $s;
}

function toUTF($a) { $s="";
	$s.=trim(iconv("cp1251","UTF-8",$a));
	return $s;
}

function getUrlText($site="",$method="",$type="",$page="") { $s="";
	$s.=$site;
	$s.='/method:'.$method;
	$s.='/type:'.$type;
	$s.='/page:'.$page;
	return $s;
}

function getUrlPrice($site="",$method="",$type="",$page="",$group="",$portion="",$first="",$search="",$act="",$id="",$sort="",$grad="",$presence="") { $s="";
	$s.=$site;
	$s.='/method:'.$method;
	$s.='/type:'.$type;
	$s.='/page:'.$page;
	$s.='/group:'.$group;
	$s.='/portion:'.$portion;
	$s.='/first:'.$first;
	$s.='/search:'.$search;
	$s.='/act:'.$act;
	$s.='/id:'.$id;
	$s.='/sort:'.$sort;
	$s.='/grad:'.$grad;
	$s.='/presence:'.$presence;
	return $s;
}

} ?>
