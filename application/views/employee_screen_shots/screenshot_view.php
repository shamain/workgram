<?php

$sThumbTemplate = <<<HTML
<li><a href="#" rel="nofollow" title="{title}"><img src="{fileurl}" alt="{title}" /></a></li>
HTML;

 $sImageTemplate = <<<HTML
<div class="sliderkit-panel">
    <img src="{fileurl}" alt="{title}" />
    <div class="sliderkit-panel-textbox">
        <div class="sliderkit-panel-text">
            <h4>{title}</h4>
            <p>{description}</p>
        </div>
       <div class="sliderkit-panel-overlay"></div>
  </div>
</div>
HTML;

$sThumbs = $sImages = '';
$sFolder = 'data_images/';

 $aUnits = array(

    'pic1.jpg' => 'Image 1', 'pic2.jpg' => 'Image 2', 'pic3.jpg' => 'Image 3', 'pic4.jpg' => 'Image 4',
    'pic5.jpg' => 'Image 5', 'pic6.jpg' => 'Image 6', 'pic7.jpg' => 'Image 7', 'pic8.jpg' => 'Image 8',
    'pic9.jpg' => 'Image 9', 'pic10.jpg' => 'Image 10'
);

foreach ($aUnits as $sFileName => $sTitle) {
    $sThumbs .= strtr($sThumbTemplate, array('{fileurl}' => $sFolder . 't_' . $sFileName, '{title}' => $sTitle));
    $sImages .= strtr($sImageTemplate, array('{fileurl}' => $sFolder . $sFileName, '{title}' => $sTitle, '{description}' => $sTitle . ' photo description here'));
    }

 

header("Content-Type: application/json");
require_once('Services_JSON.php');
$oJson = new Services_JSON();
echo $oJson->encode(array('thumbs' => $sThumbs, 'images' => $sImages));

 

?>

