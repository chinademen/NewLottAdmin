<?php

/*
 * 用于下载EXCEL文档的类
 * 
 * @author Frank
 * @update 2013-09-20 15:00
 * @update 2013-09-23 11:00
 */

class DownExcel {

    protected $_Instance = null;
    public $encoding = 'gb2312';
    public $columnAlignSet = false;
    public $columnTitles = false;
    public $defaultRowHeight = 20;

    function __construct() {
        $this->_Instance = new PHPExcel;
        $this->_Instance->setActiveSheetIndex(0);
    }

    /**
     * set the fist row of sheet
     * @param object $this->_Instance
     */
    public function setTitle($modelName, $aTitle) {
        $this->columnTitles = $aTitle;
        $i = 0;
        foreach ($aTitle as $sTitle) {
            $cCol = chr(0x41 + $i);
            $sCellName = $cCol . '1';
            //$this->_Instance->getActiveSheet()->setCellValue($sCellName, __('_' . $modelName . '.' . $sTitle));
            $this->_Instance->getActiveSheet()->setCellValue($sCellName, __($modelName . '.' . $sTitle));
            $this->_Instance->getActiveSheet()->getStyle($sCellName)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $i++;
        }
        $this->_Instance->getActiveSheet()->getRowDimension(1)->setRowHeight($this->defaultRowHeight);
    }

    /**
     * set other data
     * @param object $this->_Instance
     * @param array $aData
     */
    public function addData($aData, $iFromItem) {
        $oActiveSheet = $this->_Instance->getActiveSheet();
        $iDataCount = count($aData);
        $iData0Count = count($aData[0]);
        for ($i = 0; $i < $iDataCount; $i++) {
            $data = $aData[$i];
            $iRow = $i + $iFromItem;
            for ($j = 0; $j < $iData0Count; $j++) {
                $cCol = chr(0x41 + $j);
                $sCellName = $cCol . $iRow;
                if ($data[$j]) {
                    $bFormula = $data[$j]{0} == '=';
                    if ($bFormula) {
                        $data[$j] = str_replace('{$iRow}', $iRow, $data[$j]);
                    }
                }
                $oActiveSheet->setCellValue($sCellName, $data[$j]);
            }
            $oActiveSheet->getRowDimension($i)->setRowHeight($this->defaultRowHeight);
        }
        if ($this->columnAlignSet) {
            $iMaxColNumber = $j + 0x40;
            for ($col = 0x41; $col <= $iMaxColNumber; $col++) {
                $cCol = chr($col);
                $iCol = $col - 0x41;
                $sCells = $cCol . '2:' . $cCol . ($i + 1);
                $oActiveSheet->getStyle($sCells)->getAlignment()->setHorizontal($this->columnAlignSet[$iCol]);
            }
        }

        if ($aData) {
            for ($i = 0; $i < $iData0Count; $i++) {
                $oActiveSheet->getColumnDimensionByColumn($i)->setAutoSize(true);
            }
        }
    }

    /**
     * set other data
     * @param object $this->_Instance
     * @param array $aData
     */
    public function setData($aData) {
        $oActiveSheet = $this->_Instance->getActiveSheet();
        $iDataCount = count($aData);
        $iData0Count = count($aData[0]);
        for ($i = 0; $i < $iDataCount; $i++) {
            $data = $aData[$i];
            $iRow = $i + 2;
            for ($j = 0; $j < $iData0Count; $j++) {
                $cCol = chr(0x41 + $j);
                $sCellName = $cCol . $iRow;
                if ($data[$j]) {
                    $bFormula = $data[$j]{0} == '=';
                    if ($bFormula) {
                        $data[$j] = str_replace('{$iRow}', $iRow, $data[$j]);
                    }
                }
                $oActiveSheet->setCellValue($sCellName, $data[$j]);
            }
            $oActiveSheet->getRowDimension($i)->setRowHeight($this->defaultRowHeight);
        }
        if ($this->columnAlignSet) {
            $iMaxColNumber = $j + 0x40;
            for ($col = 0x41; $col <= $iMaxColNumber; $col++) {
                $cCol = chr($col);
                $iCol = $col - 0x41;
                $sCells = $cCol . '2:' . $cCol . ($i + 1);
                $oActiveSheet->getStyle($sCells)->getAlignment()->setHorizontal($this->columnAlignSet[$iCol]);
            }
        }

        if ($aData) {
            for ($i = 0; $i < count($aData[0]); $i++) {
                $oActiveSheet->getColumnDimensionByColumn($i)->setAutoSize(true);
            }
        }
    }

    public function Download($sFileName, $type = 'Excel5', $sOutPutType = 'Browser') {
        $aValidTypes = ['Excel2007', 'Excel5', 'PDF'];
        if (!in_array($type, $aValidTypes)) {
            return false;
        }

        $objWriter = PHPExcel_IOFactory::createWriter($this->_Instance, $type);
        // 生成xls文件
        if ($sOutPutType == 'Browser') {
            header('Content-Type: application/vnd.ms-excel;charset=' . $this->encoding);
            header('Content-Disposition: attachment;filename="' . basename($sFileName) . '.xls"');
            header('Cache-Control: max-age=0');
            $objWriter->save('php://output');
        } else {
            $objWriter->save($sFileName);
        }
        return true;
    }

    public function setSheetTitle($sSheetTitle) {
        $this->_Instance->getActiveSheet()->setTitle($sSheetTitle);
    }

    public function setActiveSheetIndex($iIndex = 0) {
        $this->_Instance->setActiveSheetIndex($iIndex);
    }

    public function createSheet($iSheetIndex = NULL) {
        $this->_Instance->createSheet($iSheetIndex);
    }

    public function setEncoding($sEncoding) {
        $this->encoding = $sEncoding;
    }

    public function setColumnAlignSet($aSet) {
        foreach ($this->columnTitles as $key => $sTitle) {
            if (array_key_exists($key, $aSet)) {
                switch (strtoupper($aSet[$key])) {
                    case 'LEFT':
                        $this->columnAlignSet[] = PHPExcel_Style_Alignment::HORIZONTAL_LEFT;
                        break;
                    case 'RIGHT':
                        $this->columnAlignSet[] = PHPExcel_Style_Alignment::HORIZONTAL_RIGHT;
                        break;
                    case 'CENTER':
                        $this->columnAlignSet[] = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
                        break;
                    default :
                        $this->columnAlignSet[] = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
                        break;
                }
            } else {
                $this->columnAlignSet[] = PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
            }
        }
    }

}
