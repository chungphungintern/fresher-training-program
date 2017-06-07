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
        <img src="templates/img/logo.png" alt="NTQ Solution - Admin Control Panel"
             title="NTQ Solution - Admin Control Panel"/>
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
            <li><a href="index.php">List Users</a></li>
        </ul>

    </div>

    <div class="workplace">

        <div class="row-fluid">
            <div class="span12 search">
                <form>
                    <input type="text" class="span11" placeholder="Some text for search..." name="search"/>
                    <button class="btn span1" type="submit">Search</button>
                </form>
            </div>
        </div>
        <!-- /row-fluid-->

        <div class="row-fluid">

            <div class="span12">
                <div class="head">
                    <div class="isw-grid"></div>
                    <h1>Users Management</h1>

                    <div class="clear"></div>
                </div>
                <div class="block-fluid table-sorting">
                    <a href="?controller=UserController&action=addUser" class="btn btn-add">Add User</a>
                    <table cellpadding="0" cellspacing="0" width="100%" class="table" id="tSortable_2">
                        <thead>
                        <tr>
                            <th><input type="checkbox" id="checkAll"/></th>
                            <th width="15%" class="sorting"><a href="#">ID</a></th>
                            <th width="35%" class="sorting"><a href="#">Username</a></th>
                            <th width="20%" class="sorting"><a href="#">Activate</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Created</a></th>
                            <th width="10%" class="sorting"><a href="#">Time Updated</a></th>
                            <th width="10%">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($listUsers as $user) { ?>
                            <tr>
                                <td><input type="checkbox" name="checkbox"/></td>
                                <td><?php echo $user->user_id ?></td>
                                <td><?php echo $user->username ?></td>
                                <td><span class="text-success">
                                        <?php echo ($user->status == 1) ? 'Activated' :
                                            "<span class='text-error'>Deactivate<span></span>" ?>
                                    </span>
                                </td>
                                <td><?php echo date_format(date_create($user->user_time_created), "H:i d/m/Y") ?></td>
                                <td><?php echo date_format(date_create($user->user_time_updated), "H:i d/m/Y") ?></td>
                                <td><a href="?controller=UserController&action=editUser&id=<?php echo $user->user_id?>"
                                       class="btn btn-info">Edit</a></td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                    <div class="bulk-action">
                        <a href="#" class="btn btn-success">Activate</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div><!-- /bulk-action-->
                    <div class="dataTables_paginate">
                        <a class="first paginate_button paginate_button_disabled" href="#">First</a>
                        <a class="previous paginate_button paginate_button_disabled" href="#">Previous</a>
                        <span>
                            <a class="paginate_active" href="#">1</a>
                            <a class="paginate_button" href="#">2</a>
                        </span>
                        <a class="next paginate_button" href="#">Next</a>
                        <a class="last paginate_button" href="#">Last</a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>

        </div>
        <div class="dr"><span></span></div>

    </div>

</div>

</body>
</html>