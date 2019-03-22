<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {
    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';

    /**
     * The API  safeKey
     *
     * @var string
     */
    protected $safeKey = '';

    /**
     * The Merchant Identity
     *
     * @var string
     */
    protected $identity = '';


    /**
     * Creates the application.
     *
     * @return \Illuminate\Foundation\Application
     */
    public function createApplication() {
        $app = require __DIR__ . '/../bootstrap/app.php';

        $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

        return $app;
    }


    /**
     * Generate signatures
     *
     * @param $aData
     * @param $sSafeKey
     *
     * @return string
     */
    protected function _compileSign($aData, $sSafeKey) {
        $sString = http_build_query($aData);
        $sString = urlencode(urldecode($sString));
        $sString .= $sSafeKey;
        return md5($sString);
    }

}
