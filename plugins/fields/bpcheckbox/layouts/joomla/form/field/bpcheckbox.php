<?php

/**
 * @package     ${package}
 *
 * @copyright   Copyright (C) ${build.year} ${copyrights},  All rights reserved.
 * @license     ${license.name}; see ${license.url}
 *
 * Field based on original Checkbox field from Joomla! CMS.
 */

use Joomla\CMS\Document\HtmlDocument;
use Joomla\CMS\Factory;

defined('JPATH_BASE') or die;

JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// This checkbox has a readmore
$has_readmore = stripos($displayData['text'], '<hr id="system-readmore" />') !== false;
if( $has_readmore ) {
    
    /* @var $doc HtmlDocument */
    $doc = Factory::getDocument();
    $doc->addScriptDeclaration("

        // BP Checkbox read more functionality
        jQuery(function($){
            $('.bpcheckbox-more').click(function(e){
                e.preventDefault();
                var el = $(this);
                el.next().show();
                el.remove();
            });
        });
    ");
}

$attributes = [];
foreach( $displayData['attributes'] AS $attribute=>$value ) {
    $attributes[] = $attribute.(!empty($value) ? '="'.$value.'"' : '');
}

?>
<label class="checkbox">
    <input type="checkbox" <?php echo implode(' ', $attributes) ?>/>
    <?php
    // Read more functionality
    if( $has_readmore ):
        $parts = explode('<hr id="system-readmore" />', $displayData['text'], 2);
    ?>
        <div><?php echo $parts[0] ?></div>
        <a href="#" class="bpcheckbox-more">
            <?php echo JText::_('PLG_FIELDS_BPCHECKBOX_MORE') ?>
        </a>
        <div style="display:none">
            <?php echo $parts[1] ?>
        </div>
    <?php
    // Only text
    else: ?>
        <div>
            <?php echo $displayData['text'] ?>
        </div>
    <?php endif ?>
</label>