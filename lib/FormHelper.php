<?php


class FormHelper {
    public $classes = [];
    public $errors;

    public $modelName;
    protected $model;
    public $dateObjects;
    public $langPrev;

    public function setClass($aClasses) {
        $this->classes = $aClasses;
    }

    public function setLangPrev($sLangPrev) {
        $this->langPrev = $sLangPrev;
    }

    public function setModel($model) {
        $this->model = $model;
    }

    public function setErrorObject($oErrors) {
        $this->errors = $oErrors;
    }

    public function input($name, $value = null, $options = [], $inputClass = '') {
        $sModelName = get_class($this->model);
        if (is_null($value) && is_object($this->model)) {
            $value = $this->model->$name;
        }
        $type = isset($options['type']) ? $options['type'] : $this->model->columnSettings[$name]['form_type'];

        // label
        $bLabel = (isset($options['label']) && !$options['label']) ? false : true;

        // empty for select object
        $sEmpty = isset($options['empty']) ? $options['empty'] : false;

        // todo: get require
        $bDiv = (isset($options['div']) && !$options['div']) ? false : true;
        $bMessage = (isset($options['message']) && !$options['message']) ? false : true;
        $sHtml = '';
        !$bDiv or $sHtml .= $this->openDiv($this->classes['div']);
        if ($bLabel) {
            $sLabel = isset($options['label']) ? $options['label'] : $name;
            $sLabel = ___($this->langPrev . $sLabel, null, 2);
            $bRequired = isset($this->model->columnSettings[$name]['required']) ? $this->model->columnSettings[$name]['required'] : false;
            $sHtml .= $this->makeLabel($name, $sLabel, $bRequired);
        }
        !$bDiv or $sHtml .= $this->openDiv($this->classes['input_div']);
        switch ($type) {
            case 'text':
                isset($options['class']) or $options['class'] = $this->classes['input'] . $inputClass;
                $sHtml .= Form::input($type, $name, $value, $options);
                break;
            case 'textarea':
                $sHtml .= Form::textarea($name, $value, $options);
                break;
            case 'select':
                isset($options['class']) or $options['class'] = $this->classes['select'];
                if (isset($options['empty'])) {

                    $sEmptyValue = $options['empty'] === true ? null : $options['empty'];
                    $aSelectOptions[null] = $sEmptyValue;
                    foreach ($options['options'] as $sTmpkey => $sTmpValue) {
                        $aSelectOptions[$sTmpkey] = $sTmpValue;
                    }
                    unset($sTmpkey, $sTmpValue);
                } else {
                    $aSelectOptions = &$options['options'];
                }

                $aOptions = ['id' => $name, 'class' => 'form-control ' . $inputClass];
                if (isset($options['style'])) {
                    $aOptions['style'] = $options['style'];
                }

                if (isset($options['multiple']) && $options['multiple']) {

                    !is_null($value) or $value = $this->model->$name;
                    $aValues = $value ? explode(',', $value) : [];

                    $old_model = $this->model;
                    unset($this->model);
                    foreach ($aSelectOptions as $v => $text) {
                        if ($v == '') {
                            continue;
                        }
                        $oTmpOptions = in_array($v, $aValues) ? ['checked' => 'checked'] : [];
                        $sHtml .= '<li><label>' . Form::input('checkbox', $name . '[]', $v, $oTmpOptions) . ' ' . $text . '<label></li>';
                    }
                    $this->model = $old_model;
                } else {
                    $sHtml .= Form::select($name, $aSelectOptions, $value, $aOptions);
                }
                break;
            case 'bool':
                isset($options['class']) or $options['class'] = $this->classes['radio'];
                $sHtml .= $this->makeRadio($name, $value, $options);
                break;
            case 'date':
                $sHtml .= $this->makeDate($name, $value, $options, $inputClass);
                break;
            case 'datetime':
                $sHtml .= $this->makeDatetime($name, $value, $options, $inputClass);
                break;
        }
        !$bDiv or $sHtml .= $this->closeDiv();
        !$bMessage or $sHtml .= $this->makeMessage($name);
        !$bDiv or $sHtml .= $this->closeDiv();
        return $sHtml;
    }

    function makeRadio($name, $value, $options = []) {
        $sHtml = Form::checkbox($name, 1, $value, $options);
        return $sHtml;
    }

    function makeDate($name, $value, $options, $inputClass) {

        $sHtml = '<input type="text"  class="form-control boot-day ' . $this->classes['date'] . $inputClass . '"  name="' . $name . '" value="' . $value . '" >';

        return $sHtml;
    }

    function makeDatetime($name, $value, $options, $inputClass) {
        $sHtml = '<input type="text"  class="form-control boot-time ' . $this->classes['date'] . $inputClass . '"  name="' . $name . '" value="' . $value . '" >';
        return $sHtml;
    }

    function makeLabel($sFor, $sLable, $bRequired = false, $sClass = null, $bDiv = false, $sDivClass = null) {
        $sHtml = $bDiv ? $this->openDiv($sDivClass) : '';
        !is_null($sClass) or $sClass = $this->classes['label'];
        $sRequired = $bRequired ? '*' : '';
        $sHtml .= Form::label($sFor, $sRequired . ___(MyString::humenlize($sLable)), ['class' => $sClass]);
        !$bDiv or $sHtml .= $this->closeDiv();
        return $sHtml;
    }

    function makeInput() {

    }

    function makeMessage($sObjName) {
        $sHtml = $this->openDiv($this->classes['msg_div']);
        $sLabelHtml = $this->makeLabel($sObjName, ':message', false, $this->classes['msg_label'], false);
        $sHtml .= $this->errors->first($sObjName, $sLabelHtml);
        $sHtml .= $this->closeDiv();
        return "\n" . $sHtml . "\n";
    }

    function openDiv($sClass = null) {
        $sHtml = "\n" . '<div';
        empty($sClass) or $sHtml .= ' class="' . $sClass . '"';
        $sHtml .= '>';
        return $sHtml . "\n";
    }

    function closeDiv() {
        return '</div>' . "\n";
    }

}
