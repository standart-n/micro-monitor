<?php class start {

function engine(&$q) {
	if ($this->init($q)) {
		$this->url($q);
		$this->settings($q);
			$q->monitor->engine($q);
	}
}

function init(&$q) { $rtn=true;
	if (!$q->base->tpl($q,"monitor")) $rtn=false;

	if (!$q->base->sql($q,"monitor")) $rtn=false;

	if (!$q->base->controls($q,"fn")) $rtn=false;
	if (!$q->base->controls($q,"monitor")) $rtn=false;
	if (!$q->base->controls($q,"validate")) $rtn=false;
	return $rtn;
}

function url(&$q) {
	if (isset($_REQUEST['id'])) { $q->url->id=intval($_REQUEST['id']); } else { $q->url->id=0; }
	if (isset($_REQUEST['action'])) { $q->url->action=strval($_REQUEST['action']); } else { $q->url->action="none"; }
}

function settings(&$q) {
	$q->cookie_time=time()+60*60*24*365;	
}


} ?>
