<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
if (!empty($inPopup)):
    $view->extend('MauticCoreBundle:Default:slim.html.php');
endif;
?>

<div class="footer">
    <div class="has-icon">
        <input class="form-control" type="text" placeholder="<?php echo $view['translator']->trans('mautic.chat.chat.input.placeholder'); ?>" />
        <i class="fa fa-send form-control-icon"></i>
    </div>
</div>