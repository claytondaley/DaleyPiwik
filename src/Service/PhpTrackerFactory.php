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

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

require_once __DIR__ . "/../../libs/PiwikTracker/PiwikTracker.php";

class PhpTrackerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $sl)
    {
        $phpTracker = new PhpTracker();
        # Get DaleyPiwik config
        $config = $sl->get('Config')['DaleyPiwik'];
        /** @noinspection SpellCheckingInspection */
        $piwikTracker = PiwikTracker( $idSite = $config['site_id'], $config['server'] );
        /** @noinspection SpellCheckingInspection */
        $piwikTracker->setTokenAuth( $config['api_token'] );
        $phpTracker.connect($piwikTracker);
    }
}

