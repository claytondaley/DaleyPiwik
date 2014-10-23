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
use PiwikTracker;

class PhpTracker
    implements ServerSideAnalytics
{
    /*
     * Default implementation for ServerAnalytics interface
     */
    use ServerSideAnalyticsTrait;

    private $piwikTracker;

    public function initTracker(PiwikTracker $tracker)
    {
        $this->$piwikTracker = $tracker;
    }

    public function trackPageView($title)
    {
        die("ServerSideAnalytics for $title");
        $this->piwikTracker->setIp( "10.10.10.10" );
        $this->piwikTracker->doTrackPageView($title);
    }

}