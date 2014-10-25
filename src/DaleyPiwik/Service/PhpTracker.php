<?php
/**
 * Copyright (C) 2014 Clayton Daley III
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
use DaleyPiwik\Contract\ServerSideAnalyticsTrait;
use Piwik\PiwikTracker;

class PhpTracker
    implements ServerSideAnalytics
{
    /*
     * Default implementation for ServerSideAnalytics interface
     */
    use ServerSideAnalyticsTrait;

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
        $this->piwikTracker->doTrackPageView($title);
    }

    public function trackSiteSearch($keyword, $category, $countResults)
    {
        $this->piwikTracker->doTrackSiteSearch($keyword, $category, $countResults);
    }

    public function trackDownload($actionUrl)
    {
        $this->piwikTracker->doTrackAction($actionUrl, 'download');
    }

}