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

namespace DaleyPiwik\Contract;

interface ServerSideAnalyticsInterface
{
    /**
     * @param ServerSideAnalyticsUserInterface $object
     */
    public function injectAnalytics(ServerSideAnalyticsUserInterface $object);
    public function trackPageView($title);
    public function trackSiteSearch($keyword, $category, $countResults);
    public function trackDownload($actionUrl);
    public function useUserId($userId);
}