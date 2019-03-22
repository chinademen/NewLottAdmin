<?php

/**
 * 文件上传记录
 *
 * @author leon01
 */

namespace App\Http\Controllers;

use Auth;
use Config;
use Storage;
use Validator;
use App\Models\FileProcess;

class FileProcessController extends AdminBaseController {

    protected $modelName = 'App\Models\FileProcess';

    protected function beforeRender() {
        parent::beforeRender();
    }

    public function ueditorDispatchServer() {

        $action = $this->request->get('action');


        switch ($action) {
            //获取配置项
            case 'config':
                return $this->ueditorConfig();
                break;
            //图片上传
            case 'upload_image':
                return $this->upload('images');
                break;
            //截图
            case 'upload_scrawl':
                break;
            //视频上传
            case 'upload_video':
                break;

            case 'upload_file':
                break;

            /* 列出图片 */
            case 'list_image':
                return $this->fileList();
                break;
            /* 列出文件 */
            case 'list_file':
                break;

            /* 抓取远程文件 */
            case 'catch_image':
                break;

            default:
                break;
        }

    }

    /**
     * 文件上传
     *
     * @param string $sSubDir
     *
     * @return $this|\Illuminate\Http\JsonResponse|\Illuminate\View\View
     */
    public function upload($sSubDir = '') {
        if ($this->request->method() == "POST") {

            try {
                $file = $this->request->file('file');

                $aUploadFileLog = [];
                if (empty($file) || !$this->request->hasFile('file') || empty($sSubDir)) {
                    throw new \Exception('file is empty');
                }

                $iMaxSize = Config::get('upload-file.maxSize.pic');
                $aAllowExt = Config::get('upload-file.allowType');

                if (!$file->isValid()) {
                    throw new \Exception('upload error!');
                }

                //获取文件扩展名
                $sExt = $file->getClientOriginalExtension();
                $sMime = $file->getClientMimeType();

                $iSize = $file->getClientSize();
                $sOriginalName = $file->getClientOriginalName();


                //验证文件类型和文件大小
                if ($iSize > $iMaxSize) {
                    throw new \Exception('Size is more than ' . $iMaxSize / 1024 . 'kb');
                }


                if (!in_array($sMime, $aAllowExt)) {
                    throw new \Exception('file type ' . $sMime . ' is not in=>!' . json_encode($aAllowExt));
                }


                //拼接文件名
                $sFileNewName = date('YmdHis') . '-' . uniqid() . '.' . $sExt; //生成新的文件名
                $sDirName = $sSubDir . DIRECTORY_SEPARATOR . date('Ymd', time()) . DIRECTORY_SEPARATOR;


                //上传处理
                if (!$sPath = $file->storeAs($sDirName, $sFileNewName, 'uploads')) {
                    throw new \Exception('Store File error!');
                }

                //记录上传日志
                $aUploadFileLog['size'] = $iSize;
                $aUploadFileLog['ext'] = $sExt;
                $aUploadFileLog['original_file_name'] = $sOriginalName;
                $aUploadFileLog['new_file_name'] = $sPath;
                $aUploadFileLog['created_user'] = Auth::user()->username;

                $oFileProcess = new FileProcess();
                $oFileProcess->fill($aUploadFileLog);
                if (!$oFileProcess->save()) {
                    throw new \Exception($oFileProcess->getValidationErrorString());
                }

                //保存文件上传路径
                return response()->json([
                    'state' => 'SUCCESS',
                    'url' => DIRECTORY_SEPARATOR . $sPath,
                    'title' => $sFileNewName,
                    'original' => $sOriginalName,
                    'type' => $sExt,
                    'size' => $iSize
                ]);

            } catch (\Exception $e) {
                return response()->json([
                    'state' => $e->getMessage(),
                    'url' => '',
                    'title' => '',
                    'original' => '',
                    'type' => '',
                    'size' => ''
                ]);
            }
        }
        return $this->render();

    }

    /**
     * 获取配置项
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function ueditorConfig() {
        $aConfig = Config::get('ueditor.upload');

        return response()->json($aConfig);
    }

    /**
     * 获取某文件夹下的文件列表
     *
     * @param string $sType
     *
     * @return \Illuminate\Http\JsonResponse
     */
    private function fileList($sType = 'images') {
        $aFiles = Storage::disk('uploads')->allFiles($sType);

        $size = $this->request->get('size', 10);
        $start = $this->request->get('start', 0);
        $end = $start + $size;

        $data = $list = [];

        /* 获取指定范围的列表 */
        $len = count($aFiles);
        for ($i = min($end, $len) - 1; $i < $len && $i >= 0 && $i >= $start; $i--) {
            $list[] = ['url' => '/' . $aFiles[$i], 'mtime' => 000000];
        }

        $data = [
            'state' => 'SUCCESS',
            'list' => $list,
            'start' => $start,
            'total' => count($aFiles)
        ];
        return response()->json($data, 200, [], JSON_UNESCAPED_UNICODE);
    }

}