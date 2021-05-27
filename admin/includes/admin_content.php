
<div class="container-fluid">

<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ADMIN
            <small>Subheading</small>
        </h1>

        <?php

        // Create User

        $user = new User();
        
        $user->username = "student";
        $user->password = "somethingweird";
        $user->first_name = "John";
        $user->last_name = "Bravo";

        $user->create();

        // Update User

        // $user = User::find_user_by_id(10);
        // $user->username = "vanessa";
        // $user->password = "123";
        // $user->first_name = "Vanessa";
        // $user->last_name = "WILLIAMS";

        // $user->update();

        // Delete User

        // $user = User::find_user_by_id(3);

        // $user->delete();

        // Update User

        // $user = User::find_user_by_id(9);

        // $user->password = "justapassword";
        // $user->last_name = "Williamson";

        // $user->save();

        // Create User

        // $user = new User();
        // $user->username = "Suave";
        // $user->save();

        ?>

        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>  <a href="index.php">Dashboard</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i> Blank Page
            </li>
        </ol>
    </div>
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->