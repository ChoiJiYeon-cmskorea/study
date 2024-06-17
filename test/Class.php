<?php

class Test_List {
    protected $_lists = [];
    
    public function getList() {
        return $this->_lists;
    }
    
    public function addList($value) {
        $this->_lists[] = $value;
    }

    public function isExist($name) {
        return in_array($name, $this->_lists);
    }
}

class Test_Book extends Test_List {
    protected $_lists = array(
            'A',
            'B',
            'C'
    );

}

class Test_Member extends Test_List {
    protected $_lists = array(
            '가',
            '나',
            '다'
    );
}

class Test_Management {
    protected $_book;
    protected $_member;
    protected $_borrowInfo = array(
    );
    
    public function __construct(Test_List $book, Test_List $member) {
        $this->_book   = $book;
        $this->_member = $member;
    }
    

    public function isBorrowAble($book) {
        if (!$this->_book->isExist($book) || array_key_exists($book, $this->_borrowInfo)) {
            return false;
        }
        
        return true;
    }

    /**
     * 책을 빌린다.
     * @param string 회원명
     * @param string 책이름
     * @return string 불능사유
     */
    public function borrow($member, $book) {
        if (!$this->_member->isExist($member)) {
            return "등록된 회원이 아닙니다.";
        }
        
        if (!$this->_book->isExist($book)) {
            return "등록된 책이 아닙니다.";
        }
        
        if (!$this->isBorrowAble($book)) {
            return "책이 대여 중입니다.";
        }
        
        $this->_borrowInfo[$book] = $member;
        return '';
    }
    
    public function getBorrowList($member) {
        $lists = array();
        foreach ($this->_borrowInfo as $bookname => $name) {
            if ($name == $member) {
                $lists[] = $bookname;
            }
        }
        return $lists;
    }
}


$book = new Test_Book();
$member = new Test_Member();
$management = new Test_Management($book, $member);



var_dump($management->borrow("가", "D"));
var_dump($management->borrow("마", "A"));
var_dump($management->borrow("가", "A"));
var_dump($management->borrow("가", "A"));
var_dump($management->borrow("가", "B"));
var_dump($management->borrow("가", "C"));

var_dump($management->getBorrowList("가"));

var_dump($management->getBorrowList("나"));

