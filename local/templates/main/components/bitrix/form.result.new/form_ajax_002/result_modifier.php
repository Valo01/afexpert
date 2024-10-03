<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arResult["FORM_HEADER"] = preg_replace("#<form#", "<form class='hystmodal__window' role='dialog' aria-modal='true' novalidate data-validate", $arResult["FORM_HEADER"]);

$arResult['funcGetInputHtml'] = function($question, $arrVALUES) {
$id = $question['STRUCTURE'][0]['ID'];
$type = $question['STRUCTURE'][0]['FIELD_TYPE'];
$message = $question['STRUCTURE'][0]['MESSAGE'];
$cap = $question['CAPTION'];
$name = "form_{$type}_{$id}";
$value = isset($arrVALUES[$name]) ? htmlentities($arrVALUES[$name]) : '';
$required = $question['REQUIRED'] === 'Y' ? 'required' : '';
$class = '' . $question['STRUCTURE'][0]['FIELD_PARAM'];

switch ($type)
{
    // обработаем поле textarea, или по аналогии любое другое
    case 'checkbox':
            $input ="<label class=\"form-group\"> {$message}
            	<input type=\"checkbox\" {$class} {$value}>
            	<span class=\"checkbox\"></span>
            </label>";
        break;
    // все остальные поля
    default:
        if ($name == "form_text_6"){
            $input = "<div class=\"input\">
						<input class=\"input__field {$class}\" type=\"text\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required}>
						<span class=\"input__message\">Обязательное поле</span>
					  </div>";
        }
        else if ($name == "form_text_7"){
            $input = "<div class=\"input\">
						  <input class=\"input__field {$class}\" type=\"tel\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required} data-input-mask=\"phone\">
						  <span class=\"input__message\">Обязательное поле</span>
					  </div>";
        }
        else if ($name == "form_text_8"){
            $input = "<div class=\"input\">
						  <input class=\"input__field {$class}\" type=\"text\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required}>
						  <span class=\"input__message\">Обязательное поле</span>
					  </div>";
        }
        else if ($name == "form_text_9"){
            $input = "<div class=\"textarea\">
						<textarea class=\"textarea__field {$class}\" name=\"{$name}\" placeholder=\"{$cap}\" {$required}>{$value}</textarea>
						<span class=\"textarea__message\">Обязательное поле</span>
					  </div>";
        }
        else if ($cap == "REF" OR $cap == "TITLE"){
            $input = "<input class=\"input__field {$class}\" type=\"hidden\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required}>";
        } else {
            $input = "<div class=\"input\">
						<input class=\"input__field {$class}\" type=\"text\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required}>
						<span class=\"input__message\">Обязательное поле</span>
					  </div>";
        }
        break;
}
return $input;
};
