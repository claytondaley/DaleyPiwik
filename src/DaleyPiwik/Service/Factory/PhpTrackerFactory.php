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

namespace DaleyPiwik\Service\Factory;

use Piwik\PiwikTracker;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use DaleyPiwik\Service\PhpTracker;

class PhpTrackerFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $sl
     * @return PhpTracker
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        # Get DaleyPiwik config
        $config = $sl->get('config')['DaleyPiwik'];
        /** @noinspection SpellCheckingInspection */
        $piwikTracker = new PiwikTracker( $idSite = $config['site_id'], $config['server'] );
        if (array_key_exists('cookie_config', $config)) {
            /** @noinspection SpellCheckingInspection */
            $piwikTracker->enableCookies( $config['cookie_config']['domain'], $config['cookie_config']['path'] );
        }
        /** @noinspection SpellCheckingInspection */
        $piwikTracker->setTokenAuth( $config['api_token'] );

        $phpTracker = new PhpTracker();
        $phpTracker->initTracker($piwikTracker);
        return $phpTracker;
    }
}

