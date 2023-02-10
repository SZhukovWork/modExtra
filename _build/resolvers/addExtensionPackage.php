<?php
/** @var xPDOTransport $transport */
/** @var array $options */
/** @var modX $modx */
if ($transport->xpdo) {
    $modx =& $transport->xpdo;

    switch ($options[xPDOTransport::PACKAGE_ACTION]) {
        case xPDOTransport::ACTION_INSTALL:
            $modx->addExtensionPackage($transport->name, "[[++core_path]]components/{$transport->name}/model/");
            break;
        case xPDOTransport::ACTION_UPGRADE:
            break;
        case xPDOTransport::ACTION_UNINSTALL:
            break;
    }
}

return true;
