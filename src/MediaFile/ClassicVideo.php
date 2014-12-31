<?php

/**
 * class Phata\Widgetfy\MediaFile\ClassicVideo
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
 * This file defines Phata\Widgetfy\MediaFile\ClassicVideo
 * which is a site definition that implements
 * Phata\Widgetfy\MediaFile\Common
 *
 * @package   Widgetfy
 * @author    Koala Yeung <koalay@gmail.com>
 * @copyright 2014 Koala Yeung
 * @licence   http://www.gnu.org/licenses/lgpl.html
 * @link      http://github.com/Phata/Widgetfy
 */

namespace Phata\Widgetfy\MediaFile;

class ClassicVideo implements Common {

    /**
     * Implements Phata\Widgetfy\MediaFile\Common::translate
     *
     * determine if the URL is translatable
     * by this site adapter
     * @param string[] $url_parsed result of parse_url($url)
     * @param string $url full url
     * @return boolean whether the url is translatable
     */
    public static function translatable($url_parsed, $url) {
        if (preg_match('/\/([^\/]+)\.(\w+)$/i', $url_parsed['path'], $matches) == 1) {
            $filename = htmlspecialchars($matches[1] . '.' . $matches[2]);
            $extension = strtolower($matches[2]);
            if ($extension == 'mpg') $extension = 'mpeg';
            return array(
                'filename' => $filename,
                'filetype' => $extension,
                'url' => $url,
            );
        }
        return FALSE;
    }

    /**
     * Implements Phata\Widgetfy\MediaFile\Common::translate
     *
     * translate the provided URL into
     * HTML embed code of it
     * @param string[] $url_parsed result of parse_url($url)
     * @param mixed[] $extra array of extra url information
     * @return mixed either embed string or NULL if not applicable
     */
    public static function translate($url_parsed, $extra) {
    	$width = 480; $height = 290;
        return array(
            'html' => '<object id="mediaplayer" width="'.$width.'" height="'.$height.'" '.
                'classid="clsid:22d6f312-b0f6-11d0-94ab-0080c74c7e95" '.
                'standby="loading windows media player components..." '.
                'type="application/x-oleobject">'.
                '<param name="FileName" value="'.$extra['filename'].'" />'.
                '<param name="autostart" value="false" />'.
                '<param name="ShowControls" value="true" />'.
                '<param name="ShowStatusBar" value="false" />'.
                '<param name="ShowDisplay" value="false" />'.
                '<embed type="application/x-mplayer2" '.
                'src="'.$extra['url'].'" '.
                'name="mediaplayer" width="'.$width.'" height="'.$height.'" '.
                'ShowControls="1" ShowStatusBar="1" ShowDisplay="0" '.
                'autostart="0"></embed>'.
                '</object>',
            'width' => $width,
            'height' => $height,
        );
	}
}