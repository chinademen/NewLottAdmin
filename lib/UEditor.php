<?php

class UEditor {

    public static function content($content = '', $config = []) {
        $defaultConfig = ['id' => 'ueditor', 'name' => 'ueditor', 'class' => 'ueditor'];
        $config = array_merge($defaultConfig, $config);
        $attr = self::makeConfig2String($config);
        echo "<script type='text/plain' {$attr}>{$content}</script>";
    }

    /**
     *    编辑器的CSS资源
     */
    public static function css() {
        echo '<link href="' . asset('/ueditor/themes/default/css/ueditor.min.css') . '?v=1.01" type="text/css" rel="stylesheet">' . PHP_EOL;
    }

    /**
     *    编辑器的JS资源
     */
    public static function js() {
        $locale = config('app.locale');
        echo '<script type="text/javascript" charset="utf-8" src="' . asset('/ueditor/ueditor.config.js') . '?v=1.01"></script>' . PHP_EOL;
        echo '<script type="text/javascript" charset="utf-8" src="' . asset('/ueditor/ueditor.all.min.js') . '?v=1.01"></script>' . PHP_EOL;
        echo '<script type="text/javascript" src="' . asset('/ueditor/lang/' . $locale . '/' . $locale . '.js?v=1.01') . '"></script>' . PHP_EOL;
    }

    /**
     * 生成编辑器的参数
     *
     * @param $config
     *
     * @return string
     */
    private static function makeConfig2String($config) {
        $string = '';
        foreach ($config as $k => $v) {
            $string .= " {$k}='{$v}'";
        }
        return $string;
    }

}