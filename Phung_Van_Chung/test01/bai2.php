<?php
$page = 'two';
include_once 'public/header.php';
include_once 'public/navbar.php';

require_once 'class.Fresher.php';

class Util extends FresherPHP
{

    public function getAgeMax(){
        $agemax = max($this->getAge());
        return $agemax;
    }
}

if(isset($_POST['submit']))
{
    
}
?>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-body">
                <form method="post" action="" id="printn">

                    <button type="submit" name="submit" class="btn btn-danger">Hiển thị</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'public/footer.php';
?>



