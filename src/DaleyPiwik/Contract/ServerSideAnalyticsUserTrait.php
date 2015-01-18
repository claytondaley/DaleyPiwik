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

namespace DaleyPiwik\Contract;

trait ServerSideAnalyticsUserTrait
{
    private $serverSideAnalyticsServices = [];

    /**
     * @param $service
     */
    function addServerSideAnalytics(ServerSideAnalyticsInterface $service)
    {
        $this->serverSideAnalyticsServices[] = $service;
    }

    /**
     * @param $title
     * @return bool
     */
    private function trackPageView($title)
    {
        $tracked = false;
        foreach ($this->serverSideAnalyticsServices as $service) {
            /** @var $service ServerSideAnalytics */
            if ($service::$CAN_TRACK_PAGEVIEW) {
                $service->trackPageView($title);
                $tracked = true;
            }
        }
        return $tracked;
    }

    /**
     * @param $keyword
     * @param $category
     * @param $countResults
     * @return bool
     */
    private function trackSiteSearch($keyword, $category, $countResults)
    {
        $tracked = false;
        foreach ($this->serverSideAnalyticsServices as $service) {
            /** @var $service ServerSideAnalytics */
            if ($service::$CAN_TRACK_SITESEARCH) {
                $service->trackSiteSearch($keyword, $category, $countResults);
                $tracked = true;
            }
        }
        return $tracked;
    }

    /**
     * @param $actionUrl
     * @return bool
     */
    private function trackDownload($actionUrl)
    {
        $tracked = false;
        foreach ($this->serverSideAnalyticsServices as $service) {
            /** @var $service ServerSideAnalytics */
            if ($service::$CAN_TRACK_SITESEARCH) {
                $service->trackDownload($actionUrl);
                $tracked = true;
            }
        }
        return $tracked;
    }
}