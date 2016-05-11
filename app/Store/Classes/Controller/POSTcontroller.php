<?php
/**
 * Created by PhpStorm.
 * User: Maheus Felicio
 * Date: 11/05/2016
 * Time: 10:44
 */

namespace Store\Classes\Controller;


class POSTController
{
    public static function verifyPostParameters(&$post)
    {
        if (isset($post) && !empty($post)) {
            foreach ($post as $item) {
                if (empty($item)) {
                    return false;
                }
            }

            return true;
        } else {
            return false;
        }
    }
}