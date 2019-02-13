<?php
namespace Scripts;


use System\Script;

class CheckZipFile extends Script
{
    private $input_path;
    private $error_zip_files;

    public function __construct($argv)
    {
        $this->input_path = $this->checkInput($argv);
    }

    /**
     * zipfile을 체크하고자 하는 디렉토리 경로를 입력하면 정상적이지 않은 zipfile들의 목록을 출력합니다.
     */
    public function _process()
    {
        $this->collectErrors($this->input_path);
        $this->printResult();
    }

    /**
      * 이떄, 하위 디렉토리 중 . 또는 .. 은 제외하고 리턴합니다.
     * @param $directory_path
     * @return array
     */
    public function getFiles ($directory_path)
    {
        $files_arr = scandir($directory_path);
        $files_arr = $this->deleteDots($files_arr);

       return $files_arr;
    }

    /**
     * 입력 받은 argv가 유효한지 체크하는 함수
     * 유효하다면 zipfile을 체크하고자 하는 디렉토리 경로가 들어있는 부분만 리턴
     * @param $argv
     * @return string
     */
    private function checkInput($argv)
    {

        if (count($argv) < 2) {
            echo('경로가 입력되지 않았습니다.' . PHP_EOL);
            $this->help();
            exit();
        }

        if (count($argv) >= 3) {
            echo('두 개 이상의 경로가 입력되었습니다.' . PHP_EOL);
            $this->help();
            exit();
        }

        if (!file_exists($argv[1])) {
            echo('입력된 경로가 존재하지 않습니다.' . PHP_EOL);
            $this->help();
            exit();
        }

        return $this->modifyPathCorrect($argv[1]);
    }

    /**
     * CheckZipFile.php(본 파일)의 사용방법을 출력합니다.
     */
    private function help()
    {
        $msg = PHP_EOL;
        $msg .= '## HELP ##' . PHP_EOL;
        $msg .= '이 프로그램은 경로를 입력 받아 zip 파일의 정상 유무를 체크해줍니다.' . PHP_EOL;
        $msg .= '(경로가 디렉토리이면 하위 모든 zip 파일, 경로가 zip파일이면 해당 파일만 처리)' . PHP_EOL;
        $msg .= PHP_EOL;
        $msg .= '## EXAMPLE ##' . PHP_EOL;
        $msg .= 'php Manager.php Scripts/CheckZipfile.php [zip 파일 경로 혹은 zip 파일이 포함된 디렉토리 경로]' . PHP_EOL;
        echo $msg . PHP_EOL;
    }

    /**
     * zipfile을 체크하고자 하는 디렉토리 경로가 디렉토리인지 확인하고 아닐 시 오류 메세지를 출력하고 종료합니다.
     * zipfile을 체크하고자 하는 디렉토리 경로의 마지막 string이 /가 붙어있지 않다면 /를 붙여줍니다.
     * 디렉토리 경로의 파일들을 가져오고 각각의 파일이 디렉토리라면 그 디렉토리의 파일들을 다시 가져오고 디렉토리가 아니라면
       파일의 이름 뒤가 .zip인 파일들만 정상적인 zip 파일인지 확인합니다.
     * zip파일을 확인하는 과정에서 정상적인 zip파일인 경우는 넘어가고 정상적이지 않은 zip 파일들의 경로만 error_zip_files에 모읍니다.
     * @param $directory_path
     */
    public function collectErrors($directory_path)
    {

        $this->checkDir($directory_path);
        $directory_path = $this->modifyPathCorrect($directory_path);
        $file_name_list = $this->getFiles($directory_path);

//        $file_name_list[] = 'dummy.zip';


        foreach($file_name_list as $file_name) {
            $file_path = $directory_path . $file_name;
            if (is_dir($file_path)) {
                $this->collectErrors($file_path);

            } else {
//                var_dump($file_path);
                if(strpos($file_path, '.zip') !== false) {
//                    $unzip_result = shell_exec("unzip -Z1 " . $file_path);
//                     passthru("unzip -Z1 " . $file_path, $unzip_result);
                   $str = exec("unzip -Z1 " . $file_path . " 2>/dev/null", $unzip_result, $return_var);
//                    exec("nohup unzip -Z1 {$file_path} &> {$error_log_path} &", $output, $return_var);
//                    $rs = system("cat {$error_log_path}");
//                    $str = shell_exec("unzip -Z1 " . $file_path . " 2>/dev/null");

                    if($return_var === 9){
                        $this->error_zip_files[] = $file_path;
                    }
                    $unzip_result = [];
                }
            }
        }
    }

    /**
     * zipfile을 체크하고자 하는 디렉토리 경로의 마지막 string이 /가 붙어있지 않다면 /를 붙여서 리턴
     * @param $dir_path
     * @return string
     */
    public function modifyPathCorrect($dir_path)
    {
        if(substr($dir_path, -1) === '/') {
            return $dir_path;
        } else{
            return $dir_path . '/';
        }
    }

    /**
     * 입력받은 파일명들의 배열의 원소들 중 . 또는 .. 이 있다면 제거합니다.
     * 제거 후 나머지 목록 리턴
     * @param $files_arr
     * @return array
     */
    public function deleteDots($files_arr)
    {
        $result_arr = [];
        foreach($files_arr as $file_name) {
            if ($file_name === '.' || $file_name === '..') {
                continue;
            } else {
                $result_arr[] = $file_name;
            }
        }
      return $result_arr;
    }

    /**
     * 입력받은 경로가 디렉토리 경로인지 확인합니다.
     * 디렉토리 경로라면 그 경로를 그대로 리턴하고 디렉토리 경로가 아니라면 오류 메세지를 출력합니다.
     * @param $path
     * @return mixed
     */
    public function checkDir($path)
    {
        if (is_dir($path)) {
            return $path;
        } else {
            echo('입력받은 경로가 디렉토리가 아닙니다. 입력받은 경로 : ' . $path . PHP_EOL);
            exit();
        }
    }

    /**
     * 정상적이지 않은 zip 파일들의 목록(배열)을 출력합니다.
     */
    public function printResult()
    {
        echo('잘못된 zip files 목록' . PHP_EOL);
        print_r($this->error_zip_files);
    }
}