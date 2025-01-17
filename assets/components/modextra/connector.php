<?php
$path = __DIR__;
while (!file_exists($path . '/config.core.php') && (strlen($path) > 1)) {
    $path = dirname($path);
}
require_once  $path. '/config.core.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
/** @noinspection PhpIncludeInspection */
require_once MODX_CONNECTORS_PATH . 'index.php';

/** @var modExtra $modExtra */
$modExtra = $modx->getService('modExtra', 'modExtra', MODX_CORE_PATH . 'components/modextra/model/');
$modx->lexicon->load('modextra:default');

// handle request
$corePath = $modx->getOption('modextra_core_path', null, $modx->getOption('core_path') . 'components/modextra/');
$path = $modx->getOption('processorsPath', $modExtra->config, $corePath . 'processors/');
$modx->getRequest();

/** @var modConnectorRequest $request */
$request = $modx->request;
$request->handleRequest([
    'processors_path' => $path,
    'location' => '',
]);
