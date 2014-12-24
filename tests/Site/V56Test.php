<?php

/**
 * Unit test for Widgetarian\Widgetfy\Site\V56
 *
 * Licence:
 *
 * This file is part of Widgetfy.
 *
 * Widgetfy is free software: you can redistribute
 * it and/or modify it under the terms of the GNU
 * Lesser General Public License as published by the
 * Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * Widgetfy is distributed in the hope that it will
 * be useful, but WITHOUT ANY WARRANTY; without even
 * the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.  See the GNU Lesser
 * General Public Licensefor more details.
 *
 * You should have received a copy of the GNU Lesser
 * General Public License along with Widgetfy.  If
 * not, see <http://www.gnu.org/licenses/lgpl.html>.
 *
 * Description:
 *
 * This file is a unit test for
 * - Widgetarian\Widgetfy\Site\V56
 *
 * @package   Widgetfy
 * @author    Koala Yeung <koalay@gmail.com>
 * @copyright 2014 Koala Yeung
 * @licence   http://www.gnu.org/licenses/lgpl.html
 * @link      http://github.com/Widgetarian/Widgetfy
 */

use Widgetarian\Widgetfy\Site\V56 as V56;

class V56Test extends PHPUnit_Framework_TestCase {

    public function testTranslateVideo() {
        $url = parse_url('http://www.56.com/u74/v_MTI4MDY5MDE1.html');
        $this->assertNotFalse($extra = V56::translatable($url));
        $this->assertEquals(V56::translate($url, $extra), array(
            'html' => '<iframe src="http://www.56.com/iframe/MTI4MDY5MDE1" '.
                'width="560" height="470" frameborder="0" '.
                'allowfullscreen scrolling="no"></iframe>',
            'width' => 560,
            'height' => FALSE,
        ));
    }

}