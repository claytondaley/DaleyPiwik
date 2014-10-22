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

interface ServerAnalytics
{
    /**
     * @param InjectServerAnalytics $object
     * @return mixed
     */
    public function injectAnalytics(InjectServerAnalytics $object);
    public function trackPageView($title);
}

trait ServerAnalyticsTrait {
    public function injectAnalytics(InjectServerAnalytics $object)
    {
        $object->addServerAnalytics($this);
    }
}