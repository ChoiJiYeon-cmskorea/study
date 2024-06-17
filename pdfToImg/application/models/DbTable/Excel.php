<?php
class Application_Model_DbTable_Excel extends Zend_Db_Table_Abstract
{
    protected $_name = 'php_excel';

    public function getList($pk)
    {
        $pk = (int)$pk;
        $row = $this->fetchRow('pk = ' . $pk);
        if (!$row) {
            throw new Exception("Could not find row $pk");
        }
        return $row->toArray();
    }

    public function addList($writer, $title, $content)
    {
        $data = array(
            'writer' => $writer,
            'title' => $title,
            'content' => $content,
            'insertTime' => date('Y-m-d'),
            'updateTime' => date('Y-m-d'),
        );
        $this->insert($data);
    }

    public function updateList($pk, $writer, $title, $content)
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