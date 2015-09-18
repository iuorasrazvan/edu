<?php

class Anchor { 
	public function  createAnchor  ($destination, $link)  { 
		$anchor='<a href='.$destination.'>'.$link.'</a>'; 
		return $anchor; 
	
	}

}
