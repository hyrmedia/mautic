<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\CampaignBundle;

/**
 * Class CampaignEvents
 * Events available for CampaignBundle
 *
 * @package Mautic\CampaignBundle
 */
final class CampaignEvents
{
    /**
     * The mautic.campaign_pre_save event is thrown right before a form is persisted.
     *
     * The event listener receives a
     * Mautic\CampaignBundle\Event\CampaignEvent instance.
     *
     * @var string
     */
    const CAMPAIGN_PRE_SAVE   = 'mautic.campaign_pre_save';

    /**
     * The mautic.campaign_post_save event is thrown right after a form is persisted.
     *
     * The event listener receives a
     * Mautic\CampaignBundle\Event\CampaignEvent instance.
     *
     * @var string
     */
    const CAMPAIGN_POST_SAVE   = 'mautic.campaign_post_save';

    /**
     * The mautic.campaign_pre_delete event is thrown before a form is deleted.
     *
     * The event listener receives a
     * Mautic\CampaignBundle\Event\CampaignEvent instance.
     *
     * @var string
     */
    const CAMPAIGN_PRE_DELETE   = 'mautic.campaign_pre_delete';

    /**
     * The mautic.campaign_post_delete event is thrown after a form is deleted.
     *
     * The event listener receives a
     * Mautic\CampaignBundle\Event\CampaignEvent instance.
     *
     * @var string
     */
    const CAMPAIGN_POST_DELETE   = 'mautic.campaign_post_delete';

    /**
     * The mautic.campaign_on_build event is thrown before displaying the campaign builder form to allow adding of custom actions
     *
     * The event listener receives a
     * Mautic\CampaignBundle\Event\CampaignBuilderEvent instance.
     *
     * @var string
     */
    const CAMPAIGN_ON_BUILD  = 'mautic.campaign_on_build';

    /**
     * The mautic.campaign_on_event_execute event is thrown to execute a campaign event
     *
     * The event listener receives a
     * Mautic\CampaignBundle\Event\CampaignEvent instance.
     *
     * @var string
     */
    const CAMPAIGN_ON_EVENT_EXECUTE   = 'mautic.campaign_on_event_execute';
}