<?php

namespace Alinea\Tools;

class Promote{
	static $charlist = "\\.";
	static function trans($object_or_serialized_string, $namespaces){
		$object = is_object($object_or_serialized_string)
			? serialize($object_or_serialized_string) 
			: $object_or_serialized_string;
			
		foreach($namespaces as $origin=>$destination){
			$origins[] = "#".strlen($origin).":\"".addcslashes($origin, self::$charlist)."#";
			$destinations[] = strlen($destination).":\"".$destination;
		}
		
		return unserialize(
			preg_replace(
				$origins,
				$destinations,
				$object
			)
		);
	}
}