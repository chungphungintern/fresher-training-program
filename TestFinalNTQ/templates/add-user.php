<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>NTQ Solution Admin Control Panel</title>

    <link rel="icon" type="image/ico" href="favicon.ico"/>

    <link href="templates/css/stylesheets.css" rel="stylesheet" type="text/css"/>

</head>
<body>

<div class="header">
    <a class="logo" href="index.php">
        <img src="templates/img/logo.png" alt="NTQ Solution - Admin Control Panel" title="NTQ Solution - Admin Control Panel"/>
    </a>

</div>

<div class="menu">

    <div class="breadLine">
        <div class="arrow"></div>
        <div class="adminControl active">
            Hi, <?php echo $_SESSION['name']?>
        </div>
    </div>

    <div class="admin">
        <div class="image">
            <img src="templates/img/users/avatar.jpg" class="img-polaroid"/>
        </div>
        <ul class="control">
            <li><span class="icon-cog"></span> <a href="?controller=UserController&action=editUser&id=<?php echo $_SESSION['id']?>">Update Profile</a></li>
            <li><span class="icon-share-alt"></span> <a href="?controller=UserController&action=logoutUser">Logout</a></li>
        </ul>
    </div>

    <ul class="navigation">
        <li>
            <a href="index.php">
                <span class="isw-user"></span><span class="text">Users</span>
            </a>
        </li>
    </ul>

</div>

<div class="content">


    <div class="breadLine">

        <ul class="breadcrumb">
            <li><a href="index.php">List Users</a> <span class="divider">></span></li>
            <li class="active">Add</li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid">
                    <form method="post" enctype="multipart/form-data" action="">
                    	<div class="row-form">
                            <div class="span3">Username:</div>
                            <div class="span9"><input type="text" name="username" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div>
                    	<div class="row-form">
                            <div class="span3">Email:</div>
                            <div class="span9"><input type="text" name="email" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div>
                    	<div class="row-form">
                            <div class="span3">Password:</div>
                            <div class="span9"><input type="password" name="pass" placeholder="some text value..."/></div>
                            <div class="clear"></div>
                        </div>
                    	<div class="row-form">
                            <div class="span3">Upload Avatar:</div>
                            <div class="span9"><input type="file" name="file" size="19"></div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                            <div class="span3">Activate:</div>
                            <div class="span9">
                                <select name="status">
                                    <option value="2">choose a option...</option>
                                    <option value="1">Activate</option>
                                    <option value="0">Deactivate</option>
                                </select>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="row-form">
                        	<button class="btn btn-success" type="submit" name="submit">Create</button>
							<div class="clear"></div>
                        </div>
                    </form>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>

</body>
</html>