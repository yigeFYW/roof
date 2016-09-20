<?php
namespace App\Upload;
 /**
 * @package Upload
 * @version 2.0
 * @author Mr.adam
 */

class Upload
{
    protected $options = array(
        0 => array(
            'name' => '',
            'type' => '',
            'tmp_name' => '',
            'error' => '',
            'size' => ''
        )
    );

    protected $file_type = array(
        0=>"image/jpeg",
        1=>"image/png",
        2=>"image/x-png",
        3=>"audio/mpeg",
        4=>"image/gif",
        5=>"application/zip",
        6=>"text/plain",
        7=>"application/msexcel",
        8=>"application/pdf",
        9=>"application/msword",
        10=>"inode/x-empty"
    );

    protected $file = null;

    protected $num = 1;

    protected $index = 0;

    protected $type = "array";

    protected $error = array();

    protected $max_size = 0;
    //构造方法
    public function __construct($data = 0){

        /**
         * 传入一个资源,为空则为$_FILES
         * $param resource or null
         *
         */
        if ($data) {
            //判断文件是否存在
            $this->file = $data;
            $this->type = "resource";
            if (is_numeric($data) && (!empty(reset($_FILES)))) {
                $this->type = "array";
                $this->file = reset($_FILES);
                $this->num = count($this->file['name']);
                $this->index = $data;
                return false;
            }
            if (!file_exists($data)) {
                $this->error[] = "文件不存在!";
                return false;
            }
        } else if (!empty($_FILES)) {
            $this->file = reset($_FILES);
            $this->num = count($this->file['name']);
        }

        $this->getInfo();
        $this->max_size = $this->max_size();
        return false;
    }

    /**
     * 分析文件信息
     * @param mixed *文件的绝对地址*
     */
    public function getInfo(){
        if($this->type == "array"){
            if($this->num > 1){
                foreach($this->file as $k=>$v){
                    $i = 0;
                    foreach($v as $value){
                        $this->options[$i][$k] = $value;
                        $i++;
                    }
                }
            }else{
                $this->options[0]['name'] = $this->file['name'][0];
                $this->options[0]['type'] = $this->file['type'][0];
                $this->options[0]['tmp_name'] = $this->file['tmp_name'][0];
                $this->options[0]['error'] = $this->file['error'][0];
                $this->options[0]['size'] = $this->file['size'][0];
            }
        }else{
            $stat = stat($this->file);
            $this->options[0]['size'] = $stat['size'];
            $this->options[0]['type'] = mime_content_type($this->file);
            $this->options[0]['name'] = basename($this->file);
        }
    }

    //获取信息
    public function info(){
        return $this->options;
    }

    /**
     * 获取PHP.ini中post_max_size的值
     */
    protected function max_size(){
        return $this->return_bytes( ini_get ('post_max_size' ));
    }

    protected function return_bytes ( $val ) {
        $val  =  trim ( $val );
        $last  =  strtolower ( $val [ strlen ( $val )- 1 ]);
        switch( $last ) {
            case 'g' :
                $val  *=  1024 ;
            case 'm' :
                $val  *=  1024 ;
            case 'k' :
                $val  *=  1024 ;
        }
        return  $val ;
    }


    /**
     *读取错误信息
     */
    public function getError(){
        return $this->error;
    }


    /*
     * 获取文件名后缀(包含.)
     *
     */
    public function getExt($file_name){
        return strrchr($file_name,'.');
    }

    /**
     * 执行保存操作
     *
     */

    public function up_file($new_name,$path="/admins",$index = 0){
        //检测类型是否通过
        if(!$this->check_mimi($this->options[$index]['type'])){
            $this->error[] = "文件类型是不被允许的类型!";
            return false;
        }

        //检测文件大小是否通过
        if(!$this->check_size($this->options[$index]['size'])){
            $this->error[] = "文件过大!";
            return false;
        }

        //检测文件是否存在
        if(!$this->options[$index]['tmp_name']){
            $this->error[] = "该文件上传失败!";
            return false;
        }

        //获取文件名称
        $name = $this->getName($new_name);
        $ext = $this->getExt($new_name);

        //创建目录
        $path = $this->create_dir($path);
        if(!$path){
            $this->error[] = "目录创建失败!";
            return false;
        }

        //组合文件名
        $up_path = $path.'/'.$name.$ext;
        //移动文件
        if(!move_uploaded_file($this->options[$index]['tmp_name'], $up_path)){
            $this->error[] = '文件上传失败!';
            return false;
        }else{
            //检测是否有这个文件
            if(!file_exists($up_path)){
                $this->error[] = '文件上传失败!';
                return false;
            }
            return $up_path;
        }
    }

    /*
     * 检测文件大小 传入bit
     *
     */
    public function check_size($bit){
        if($bit < ($this->max_size)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 检测文件type
     */

    public function check_mimi($mimi){
        if(in_array($mimi,$this->file_type)){
            return true;
        }else{
            return false;
        }
    }

    /*
     * 递归创建目录
     *
     */
    public function create_dir($path){
        //判断是否有这个目录
        if(is_dir($path)||mkdir($path,0777,true)){
            return $path;
        }else{
            return false;
        }
    }

    /*
     * 获取不包含后缀的文件名
     */
    public function getName($fname){
        return substr($fname,0,strpos($fname,'.'));
    }

}