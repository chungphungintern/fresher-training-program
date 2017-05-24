<?php
include_once 'public/header.php';
include_once 'public/navbar.php';

// Initialize
const PI = 3.14;


class Circle
{
    private $r = 0;

    // Tinh dien tich
    function tinhDientich($r)
    {
        return $dientich = PI * pow($r, 2);
    }

    // Tinh chu vi
    function tinhChuvi($r)
    {
        return $chuvi = (2 * PI)/$r;
    }
}

if (isset($_POST['submit']))
{
    $n = isset($_POST['strn']) ? $_POST['strn'] : "";
    if ($n == "") {
        $err = "Hãy nhập vào bán kính";
    } else
    {
        $cc = new Circle();
        $dt = $cc->tinhDientich($n);
        $cv = round($cc->tinhChuvi($n), 3);

        $result = "Diện tích hình tròn: $dt" . "<br/>" . "Chu vi hình tròn: $cv";
    }
}

?>
<div class="panel panel-danger">
    <div class="panel-heading" style="font-weight: bold">Wanna Cry 3</div>
    <div class="panel-body" style="color:darkred">
        Tạo 1 class Circle.
        <p>Input: Bán kính</p>
        <p>1, Hãy viết hàm tính diện tích hình tròn</p>
        <p>2, Hãy viết hàm tính chu vi hình tròn</p>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-body">
                <form method="post" action="" id="printn">
                    <div class="form-group">
                        <input type="text" class="form-control" id="strn" name="strn" placeholder="Nhập vào bán kính" value="<?php echo $_POST['strn'] ?? ""; ?>">
                    </div>

                    <button type="submit" name="submit" class="btn btn-danger">Tính</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-9 <?php echo (isset($err) || isset($result)) ? "": "hidden"; ?>">
        <div class="panel panel-danger">
            <div class="panel-body">
                <p style="color:black">
                    <?php echo isset($err) ? $err:""; echo isset($result) ? $result:"";  ?>
                </p>
            </div>
        </div>
    </div>
</div>
<?php
include_once 'public/footer.php';
?>



