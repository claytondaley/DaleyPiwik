<?php
/**
 * DaleyPiwik ZF2 Module
 * Copyright (C) 2014-2015 Clayton Daley III
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

namespace DaleyPiwik\Service;

use DaleyPiwik\Contract\ServerSideAnalytics;
use Piwik\PiwikTracker;

class PhpTracker extends ServerSideAnalytics
{
    public static $CAN_TRACK_PAGEVIEW = true;
    public static $CAN_TRACK_SITESEARCH = true;
    public static $CAN_TRACK_DOWNLOAD = true;
    public static $CAN_USE_USERID = true;

    /** @var $piwikTracker PiwikTracker */
    private $piwikTracker;

    /**
     * Initialize the PiwikTracker object (called by Factory after configuring tracker)
     * @param PiwikTracker $tracker
     */
    public function initTracker(PiwikTracker $tracker)
    {
        $this->piwikTracker = $tracker;
    }

    # see http://developer.piwik.org/api-reference/PHP-Piwik-Tracker

    public function trackPageView($title)
    {
        # die($this->piwikTracker->getUrlTrackPageView($title));
        $this->piwikTracker->doTrackPageView($title);
    }

    public function trackSiteSearch($keyword, $category, $countResults)
    {
        # die($this->piwikTracker->getUrlTrackSiteSearch($keyword, $category, $countResults));
        $this->piwikTracker->doTrackSiteSearch($keyword, $category, $countResults);
    }

    public function trackDownload($actionUrl)
    {
        # die($this->piwikTracker->getUrlTrackAction($actionUrl, 'download'));
        $this->piwikTracker->doTrackAction($actionUrl, 'download');
    }

    public function useUserId($userId)
    {
        $this->piwikTracker->setUserId($userId);
    }
}