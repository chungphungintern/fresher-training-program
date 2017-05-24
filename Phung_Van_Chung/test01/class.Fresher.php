<?php
class FresherPHP
{
    public $first_name;
    public $last_name;
    public $middle_name;
    public $birth_day;
    public $phone_number;

    function __construct(array $arr)
    {
        $this->setFirstName($arr['first_name']);
        $this->setLastName($arr['last_name']);
        $this->setMiddleName($arr['middle_name']);
        $this->setBirthDay($arr['birth_day']);
        $this->setPhoneNumber($arr['phone_number']);
    }

    // Set function
    public function setFirstName($fn)
    {
        $this->first_name = trim($fn);
    }

    public function setLastName($ln)
    {
        $this->last_name = trim($ln);
    }

    public function setMiddleName($mn)
    {
        $this->middle_name = trim($mn);
    }

    public function setBirthDay($bd)
    {
        $this->birth_day = trim($bd);
    }

    public function setPhoneNumber($pn)
    {
        $this->phone_number = trim($pn);
    }

    // Get function
    public function getFirstName()
    {
        return $this->first_name;
    }

    public function getLastName()
    {
        return $this->last_name;
    }

    public function getMiddleName()
    {
        return $this->middle_name;
    }

    public function getBirthDay()
    {
        return $this->birth_day;
    }

    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    // Get fullname of Fresher
    public function getFullName()
    {
        return ucwords($fullName = $this->getLastName() . "&nbsp" . $this->getMiddleName() . "&nbsp" . $this->getFirstName());
    }

    // Get Age function
    public function getAge()
    {
        $year = substr($this->getBirthDay(), 6);
        $now = getdate();
        $age = $now['year'] - $year;
        return $age;
    }

    // Get branch function
    public function getPhoneBranch()
    {
        $result = "";
        if($this->isViettel())
        {
            $result .= "Nhà mạng sử dụng: VIETTEL";
        } elseif ($this->isVinaphone())
        {
            $result .= "Nhà mạng sử dụng: VINAPHONE";
        } elseif ($this->isMobiphone())
        {
            $result .= "Nhà mạng sử dụng: MOBIPHONE";
        } else
        {
            $result .= "Số điện thoại nhập vào định dạng không đúng, hoặc nhà mạng khác";
        }
        return $result;
    }

    public function isViettel()
    {
        $flag = false;
        $viettel = array("098", "097", "096", "0169", "0168", "0167", "0166", "0165", "0164", "0163", "0162");
        if($this->checkPhoneTenNumber())
        {
            $strphone = substr($this->getPhoneNumber(), 0, 3);
            foreach ($viettel as $value)
            {
                if((int) $value == (int) $strphone)
                {
                    $flag = true;
                }
            }
        } else
        {
            $strphone = substr($this->getPhoneNumber(), 0, 4);
            foreach ($viettel as $value)
            {
                if((int) $value == (int) $strphone)
                {
                    $flag = true;
                }
            }
        }

        return $flag;
    }

    public function isVinaphone()
    {
        $flag = false;
        $viettel = array("091", "094", "0123", "0124", "0125", "0127", "0129");
        if($this->checkPhoneTenNumber())
        {
            $strphone = substr($this->getPhoneNumber(), 0, 3);
            foreach ($viettel as $value)
            {
                if((int) $value == (int) $strphone)
                {
                    $flag = true;
                }
            }
        } else
        {
            $strphone = substr($this->getPhoneNumber(), 0, 4);
            foreach ($viettel as $value)
            {
                if((int) $value == (int) $strphone)
                {
                    $flag = true;
                }
            }
        }

        return $flag;
    }

    public function isMobiphone()
    {
        $flag = false;
        $viettel = array("090", "093", "0120", "0121", "0122", "0126", "0128");
        if($this->checkPhoneTenNumber())
        {
            $strphone = substr($this->getPhoneNumber(), 0, 3);
            foreach ($viettel as $value)
            {
                if((int) $value == (int) $strphone)
                {
                    $flag = true;
                }
            }
        } else
        {
            $strphone = substr($this->getPhoneNumber(), 0, 4);
            foreach ($viettel as $value)
            {
                if((int) $value == (int) $strphone)
                {
                    $flag = true;
                }
            }
        }

        return $flag;
    }

    public function checkPhoneTenNumber()
    {
        $flag = false;
        $ten = strlen($this->getPhoneNumber());
        if($ten == 10)
        {
            $flag = true;
        }
        return $flag;
    }

    public function checkPhoneElevenNumber()
    {
        $flag = false;
        $eleven = strlen($this->getPhoneNumber());
        if($eleven == 11)
        {
            $flag = true;
        }
        return $flag;
    }

}