<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_UPGRADE:
            $modx->removeExtensionPackage($transport->name);
        case xPDOTransport::ACTION_INSTALL:
            $ns = $modx->getObject("modNamespace",$transport->name);
            if(empty($ns)){
                $modx->log(MODX_LOG_LEVEL_ERROR,"Namespace not found");
                break;
            }
            $modx->addExtensionPackage($transport->name, str_replace("{core_path}","[[++core_path]]",$ns->get("path"))."model/");
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;
