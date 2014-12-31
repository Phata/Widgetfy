<?php

/**
 * Unit test for Phata\Widgetfy\Site\IGN
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
 * - Phata\Widgetfy\Site\IGN
 *
 * @package   Widgetfy
 * @author    Koala Yeung <koalay@gmail.com>
 * @copyright 2014 Koala Yeung
 * @licence   http://www.gnu.org/licenses/lgpl.html
 * @link      http://github.com/Phata/Widgetfy
 */

use Phata\Widgetfy\Site\IGN as IGN;

class IGNTest extends PHPUnit_Framework_TestCase {

    public function testTranslateVideo() {
    	$url = 'http://www.ign.com/videos/2011/05/19/'.
    		'call-of-duty-black-ops-kills-commentary-jungle-not-camping-monitoring?objectid=14349501';
        $url_parsed = parse_url($url);
        $this->assertNotFalse($extra = IGN::translatable($url_parsed, ''));
        $this->assertEquals(IGN::translate($url_parsed, $extra), array(
			'html' => '<iframe src="http://widgets.ign.com/video/embed/content.html?'.
				'slug=call-of-duty-black-ops-kills-commentary-jungle-not-camping-monitoring" '.
				'scrolling="no" allowfullscreen="" frameborder="0" '.
				'width="480" height="270"></iframe>',
			'width' => 480,
			'height' => 270 + 8,
		));
    }

}