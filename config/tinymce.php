<?php

return [

	'cdn' => '/vendor/js/tinymce/tinymce.min.js',

	'default' => [
		"selector" => ".tinymce",
		"language" => 'en',
		"theme" => "modern",
		"skin" => "tundora",
		"height" => "180",
		"plugins" => [
			"advlist autolink link image code lists charmap print preview hr anchor pagebreak spellchecker code fullscreen",
			"save table contextmenu directionality emoticons template paste textcolor code"
		],
		"toolbar" => "styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | preview media | forecolor backcolor | code",
		"relative_urls" => "false",
		"menubar" => "false"
	],

	// Custom
	
	/*'example' => [
		"selector" => "#example",
		"language" => 'pt_BR',
		"theme" => "modern",
		"skin" => "lightgray",
		"plugins" => [
	         "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
	         "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
	         "save table contextmenu directionality emoticons template paste textcolor"
		],
		"toolbar" => "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
	],*/

];