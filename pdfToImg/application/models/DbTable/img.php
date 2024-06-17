<?php
class Application_Model_DbTable_img extends Zend_Db_Table_Abstract
{
    protected $_name = 'file_img';

    public function getList($pk)
    {
        $pk = (int)$pk;
        $row = $this->fetchRow('pk = ' . $pk);
        if (!$row) {
            throw new Exception("Could not find row $pk");
        }
        return $row->toArray();
    }

    public function addImg(array $fileInfos)
    {
        //임시 파일 저장
        $filepath = APPLICATION_DATA;

        $filename = $filepath . DIRECTORY_SEPARATOR . iconv("UTF-8", "EUC-KR",$fileInfos['name']);

        move_uploaded_file($fileInfos['tmp_name'], $filename);
        //파일 내용 업로드
        $content = file_get_contents($filename);

        $data = array(
            'filename' => $fileInfos['name'],
            'fileSize' => $fileInfos['size'],
            'content'  => $content
        );
        $this->insert($data);
        //임시 파일 삭제
        unlink($filename);
    }

    public function selectList()
    {
        $data = array(
            'writer' => $writer,
            'title' => $title,
            'content' => $content,
            'updateTime' => date('Y-m-d'),
        );
        $this->update($data, 'pk = '. (int)$pk);
    }

    public function deleteList($pk)
    {
        $this->delete('pk =' . (int)$pk);
    }
}