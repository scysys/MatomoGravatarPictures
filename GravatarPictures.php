<?php
/**
 * Piwik - free/libre analytics platform
 *
 * @link https://matomo.org
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPL v3 or later
 */

namespace Piwik\ Plugins\ GravatarPictures;

class GravatarPictures extends\ Piwik\ Plugin {
  public function getListHooksRegistered() {
    return array(
      'Live.getExtraVisitorDetails' => array(
        'after' => true,
        'function' => 'linkBuilder'
      )
    );
  }
  public function linkBuilder( & $result ) {
    $email = $result[ 'userId' ];
    $hash = md5( strtolower( $email ) );
    $base = 'https://www.gravatar.com/avatar/';
    $url = $base . $hash . '?s=120&r=pg&d=' . $_SERVER[ 'HTTP_HOST' ] . '/plugins/Live/images/unknown_avatar.png';
    $result[ 'visitorAvatar' ] = $url;
  }
}