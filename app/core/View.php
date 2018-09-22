<?php

namespace App\Core;

class View
{
	function generate($content_view, $data = null)
	{
		include '../views/TemplateView.php';
	}
}