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
    // обработаем поле checkbox, или по аналогии любое другое
    case 'checkbox':
            $input ="<div class=\"checkbox checkbox--privacy-policy\">
              <label class=\"checkbox__label\">
                <input class=\"checkbox__input\" type=\"checkbox\" {$class} {$value}>
                <span class=\"checkbox__text\">{$cap}</span>
                <span class=\"checkbox__decore\">
                </span>
                <span class=\"checkbox__message\">Это поле обязательно для заполнения</span>
              </label>
            </div>";
        break;
	case 'file':
            $input = "<div class=\"input\">
						<label class=\"input__label-upload\" for=\"uploadFile\">
						  <span class=\"input__label-upload-icon\">+</span>
						  <span class=\"input__label-upload-text\">Схема укладки продукта в короб (макс.10 МБ)</span>
						  <span class=\"input__label-upload-fileName\">
						  </span>
						  <span class=\"input__label-upload-fileSize\">
						  </span>
						  <span class=\"input__label-upload-fileRemove\" title=\"Выбрать другой файл\">
							<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" viewBox=\"0 0 20 20\" fill=\"none\">
							  <g clip-path=\"url(#clip0_2924_9512)\">
								<path d=\"M15.625 4.375L4.375 15.625\" stroke=\"white\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
								<path d=\"M15.625 15.625L4.375 4.375\" stroke=\"white\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
							  </g>
							  <defs><clipPath id=\"clip0_2924_9512\"><rect width=\"20\" height=\"20\" fill=\"white\"/></clipPath></defs>
							</svg>
						  </span>
						</label>
						<input class=\"input__field {$class}\" type=\"file\" id=\"uploadFile\" name=\"{$name}\" value=\"{$value}\" accept=\".doc,.pdf\">
						<span class=\"input__message\">Обязательное поле</span>
					  </div>";
        break;
    // все остальные поля
    default:
        if ($name == "form_text_39"){
            $input = "<div class=\"input\">
						<input class=\"input__field {$class}\" type=\"text\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required}>
						<span class=\"input__message\">Обязательное поле</span>
					  </div>";
        }
        else if ($name == "form_text_40"){
            $input = "<div class=\"input\">
						  <input class=\"input__field {$class}\" type=\"tel\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required} data-input-mask=\"phone\">
						  <span class=\"input__message\">Обязательное поле</span>
					  </div>";
        }
        else if ($name == "form_text_41"){
            $input = "<div class=\"input\">
						  <input class=\"input__field {$class}\" type=\"text\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required}>
						  <span class=\"input__message\">Обязательное поле</span>
					  </div>";
        }
        else if ($name == "form_text_42"){
            $input = "<div class=\"input\">
						<input class=\"input__field {$class}\" type=\"text\" name=\"{$name}\" value=\"{$value}\" placeholder=\"{$cap}\" {$required}>
						<span class=\"input__message\">Обязательное поле</span>
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
