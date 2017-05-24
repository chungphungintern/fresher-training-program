<?php
include_once 'public/header.php';
include_once 'public/navbar.php';

require_once 'class.Fresher.php';

if (isset($_POST['submit']))
{
    $fresherPhp = array([
        'first_name' => ' chung ',
        'last_name' => 'phung',
        'middle_name' => 'van',
        'birth_day' => '06/02/1997',
        'phone_number' => '0982167660'
    ],[
        'first_name' => ' Chung ',
        'last_name' => 'Phùng',
        'middle_name' => 'Văn',
        'birth_day' => '06/02/1997',
        'phone_number' => '0901337660'
    ]
    );
    $fresher = new FresherPHP($fresherPhp[1]);
    echo $fresher->getFullName() . "<br/>";
    echo $fresher->getPhoneBranch();

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



