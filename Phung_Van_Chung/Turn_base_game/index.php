<?php

include_once 'public/header.php';
include_once 'public/navbar.php';

include_once 'Unit.php';

function displayBattle(Unit $unit_a, Unit $unit_b)
{
    // Name
    $name_a = $unit_a->name;
    $name_b = $unit_b->name;

    // Health
    $health_a = $unit_a->getHealth();
    $health_b = $unit_b->getHealth();

    // Total Damage
    $damage_a = $unit_a->totalDamage();
    $damage_b = $unit_b->totalDamage();

    // Total Defense
    $defense_a = $unit_a->totalDefense();
    $defense_b = $unit_b->totalDefense();

    // Damage cause
    $attack_normal_a = abs(($damage_a - $defense_b));
    $attack_crit_a = abs((($damage_a - $defense_b) * 2));
    $attack_normal_b = abs(($damage_b - $defense_a));
    $attack_crit_b = abs((($damage_b - $defense_a) * 2));

    $i = 0;
    while (($health_a > 0) && ($health_b > 0)) {
        $i += 1;
        echo "Turn $i: ";
        if ($unit_b->isBlock()) {
            echo "$name_a attacked $name_b but his attack has been blocked. Health: $health_b<br/>";
        } else if ($unit_a->isCritical()) {
            $health_b -= $attack_crit_a;
            echo "$name_a dealt a critial hit of $attack_crit_a($damage_a - $defense_b) * 2) damage to $name_b.Health: $health_b<br/>";
            if ($health_b <= 0) {
                echo "$name_b has been defeated by $name_a";
            }
        } else {
            $health_b -= $attack_normal_a;

            echo "$name_a dealt $attack_normal_a ($damage_a - $defense_b) damage to $name_b.Health: $health_b<br/>";
            if ($health_b <= 0) {
                echo "$name_b has been defeated by $name_a";
            }
        }

        // Turn b:
        if ($health_b > 0) {
            echo "Turn " . ($i += 1) . ": ";
            if ($unit_a->isBlock()) {
                echo "$name_b attacked $name_a but his attack has been blocked. Health: $health_a<br/>";
            } else if ($unit_b->isCritical()) {
                $health_a -= $attack_crit_b;
                echo "$name_b dealt a critial hit of $attack_crit_b($damage_b - $defense_a) * 2) damage to $name_a. Health: $health_a<br/>";
                if ($health_a <= 0) {
                    echo "$name_a has been defeated by $name_b";
                }
            } else {
                $health_a -= $attack_normal_b;

                echo "$name_b dealt $attack_normal_b ($damage_b - $defense_a) damage to $name_a. Health: $health_a<br/>";
                if ($health_a <= 0) {
                    echo "$name_a has been defeated by $name_b";
                }
            }
        }
    }
}

if (isset($_POST['submit'])) {
    $str_name_one = isset($_POST['str_name_one']) ? $_POST['str_name_one'] : "";
    $str_health_one = isset($_POST['str_health_one']) ? $_POST['str_health_one'] : "";
    $str_damage_one = isset($_POST['str_damage_one']) ? $_POST['str_damage_one'] : "";
    $str_defense_one = isset($_POST['str_defense_one']) ? $_POST['str_defense_one'] : "";
    $str_name_weapon_one = isset($_POST['str_name_weapon_one']) ? $_POST['str_name_weapon_one'] : "";
    $str_dame_weapon_one = isset($_POST['str_dame_weapon_one']) ? $_POST['str_dame_weapon_one'] : "";
    $str_crit_one = isset($_POST['str_crit_one']) ? $_POST['str_crit_one'] : "";
    $str_name_armor_one = isset($_POST['str_name_armor_one']) ? $_POST['str_name_armor_one'] : "";
    $str_defense_armor_one = isset($_POST['str_defense_armor_one']) ? $_POST['str_defense_armor_one'] : "";
    $str_block_one = isset($_POST['str_block_one']) ? $_POST['str_block_one'] : "";

    $str_name_two = isset($_POST['str_name_two']) ? $_POST['str_name_two'] : "";
    $str_health_two = isset($_POST['str_health_two']) ? $_POST['str_health_two'] : "";
    $str_damage_two = isset($_POST['str_damage_two']) ? $_POST['str_damage_two'] : "";
    $str_defense_two = isset($_POST['str_defense_two']) ? $_POST['str_defense_two'] : "";
    $str_name_weapon_two = isset($_POST['str_name_weapon_two']) ? $_POST['str_name_weapon_two'] : "";
    $str_dame_weapon_two = isset($_POST['str_dame_weapon_two']) ? $_POST['str_dame_weapon_two'] : "";
    $str_crit_two = isset($_POST['str_crit_two']) ? $_POST['str_crit_two'] : "";
    $str_name_armor_two = isset($_POST['str_name_armor_two']) ? $_POST['str_name_armor_two'] : "";
    $str_defense_armor_two = isset($_POST['str_defense_armor_two']) ? $_POST['str_defense_armor_two'] : "";
    $str_block_two = isset($_POST['str_block_two']) ? $_POST['str_block_two'] : "";


    if ($str_name_one == "" && $str_health_one == "" && $str_damage_one == "" && $str_defense_one == "" &&
        $str_name_weapon_one == "" && $str_dame_weapon_one == "" && $str_crit_one == "" &&
        $str_name_armor_one == "" && $str_defense_armor_one == "" && $str_block_one == "" &&
        $str_name_two == "" && $str_health_two == "" && $str_damage_two == "" && $str_defense_two == "" &&
        $str_name_weapon_two == "" && $str_dame_weapon_two == "" && $str_crit_two == "" &&
        $str_name_armor_two == "" && $str_defense_armor_two == "" && $str_block_two == ""
    ) {
        $error_message = "Please fill all data of character.";
    } else {
        $unit_one = array("$str_name_one", $str_health_one, $str_damage_one, $str_defense_one, "$str_name_weapon_one",
            $str_dame_weapon_one, $str_crit_one, "$str_name_armor_one", $str_defense_armor_one, $str_block_one);
        $unit_two = array("$str_name_two", $str_health_two, $str_damage_two, $str_defense_two, "$str_name_weapon_two",
            $str_dame_weapon_two, $str_crit_two, "$str_name_armor_two", $str_defense_armor_two, $str_block_two);

        $unit_one = new Unit($unit_one);
        $unit_two = new Unit($unit_two);
    }
}
?>
<form method="post" action="" id="printn">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-body">
                    <p class="text-center">
                        <img src="images/a.gif" alt="HTML5 Icon" style="width:128px;height:128px;">
                    </p>
                    <div class="form-group">
                        <label style="color:black">Info character:</label>
                        <input type="text" class="form-control" id="str_name_one" name="str_name_one"
                               placeholder="Input name"
                               value="<?php echo $_POST['str_name_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_health_one" name="str_health_one"
                               placeholder="Health"
                               value="<?php echo $_POST['str_health_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_damage_one" name="str_damage_one"
                               placeholder="Damage base"
                               value="<?php echo $_POST['str_damage_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_defense_one" name="str_defense_one"
                               placeholder="Defense base"
                               value="<?php echo $_POST['str_defense_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <label style="color:black">Weapon:</label>
                        <input type="text" class="form-control" id="str_name_weapon_one" name="str_name_weapon_one"
                               placeholder="Name"
                               value="<?php echo $_POST['str_name_weapon_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_dame_weapon_one" name="str_dame_weapon_one"
                               placeholder="Damage"
                               value="<?php echo $_POST['str_dame_weapon_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_crit_one" name="str_crit_one"
                               placeholder="Critial(%)"
                               value="<?php echo $_POST['str_crit_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <label style="color:black">Armor:</label>
                        <input type="text" class="form-control" id="str_name_armor_one" name="str_name_armor_one"
                               placeholder="Name"
                               value="<?php echo $_POST['str_name_armor_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_defense_armor_one" name="str_defense_armor_one"
                               placeholder="Defense"
                               value="<?php echo $_POST['str_defense_armor_one'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_block_one" name="str_block_one"
                               placeholder="Block(%)"
                               value="<?php echo $_POST['str_block_one'] ?? ""; ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h4 class="text-center">BLOODY ARENA</h4>
                    <p class="text-center">
                        <button type="submit" name="submit" class="btn btn-danger">Battle</button>
                    </p>
                </div>
                <div class="panel-body">
                    <p style="color:black">
                        <?php echo isset($error_message) ? $error_message : ""; ?>
                        <?php echo isset($unit_one) ? displayBattle($unit_one, $unit_two) : ""; ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-danger">
                <div class="panel-body">
                    <p class="text-center">
                        <img src="images/b.gif" alt="HTML5 Icon" style="width:128px;height:128px;">
                    </p>
                    <div class="form-group">
                        <label style="color:black">Info character:</label>
                        <input type="text" class="form-control" id="str_name_two" name="str_name_two"
                               placeholder="Input name"
                               value="<?php echo $_POST['str_name_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_health_two" name="str_health_two"
                               placeholder="Health"
                               value="<?php echo $_POST['str_health_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_damage_two" name="str_damage_two"
                               placeholder="Damage base"
                               value="<?php echo $_POST['str_damage_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_defense_two" name="str_defense_two"
                               placeholder="Defense base"
                               value="<?php echo $_POST['str_defense_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <label style="color:black">Weapon:</label>
                        <input type="text" class="form-control" id="str_name_weapon_two" name="str_name_weapon_two"
                               placeholder="Name"
                               value="<?php echo $_POST['str_name_weapon_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_dame_weapon_two" name="str_dame_weapon_two"
                               placeholder="Damage"
                               value="<?php echo $_POST['str_dame_weapon_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_crit_two" name="str_crit_two"
                               placeholder="Critial(%)"
                               value="<?php echo $_POST['str_crit_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <label style="color:black">Armor:</label>
                        <input type="text" class="form-control" id="str_name_armor_two" name="str_name_armor_two"
                               placeholder="Name"
                               value="<?php echo $_POST['str_name_armor_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_defense_armor_two" name="str_defense_armor_two"
                               placeholder="Defense"
                               value="<?php echo $_POST['str_defense_armor_two'] ?? ""; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="str_block_two" name="str_block_two"
                               placeholder="Block(%)"
                               value="<?php echo $_POST['str_block_two'] ?? ""; ?>">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php
include_once 'public/footer.php';
?>

