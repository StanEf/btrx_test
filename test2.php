<?php
/**
 * Created by PhpStorm.
 * User: seva
 * Date: 15.04.2017
 * Time: 21:50
 */
// hello
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
echo 'after header</br>';

function showMeTestMsg(){
    return 'in showMeTestMsg</br>';
}



//exit();
function GetSocialButtons()
{
    global $APPLICATION;
    $strResult = '';
    $strShow = $APPLICATION->GetProperty('not_show_social_shared','');
    if ('Y' != $strShow)
    {
        ob_start();
        ?><?$APPLICATION->IncludeComponent(
        "bitrix:main.include",
        "",
        Array(
            "AREA_FILE_SHOW" => "file",
            "PATH" => "/social-buttons.php",
            "EDIT_TEMPLATE" => ""
        ),
        false
    );?><?
        $strResult = ob_get_contents();
        ob_clean();
        ob_end_clean();
    }
    return $strResult;
}
//exit();
function ShowSocialButtons()
{
    global $APPLICATION;
    $APPLICATION->AddBufferContent("GetSocialButtons");
}
//ShowSocialButtons();
?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>