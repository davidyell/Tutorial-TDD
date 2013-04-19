<?php

/**
 * Description of autoloadCarInferfaces
 *
 * @author David Yell <neon1024@gmail.com>
 */

foreach (scandir(dirname(__FILE__).'/CarInterface') as $filename) {
    $path = dirname(__FILE__).'/CarInterface/'.$filename;

    if (is_file($path)) {
        require_once $path;
    }
}
