<?php

// User Class
// 1. It goes to the find_all method
// 2. The find_all returns the find_by_query() results
// 3. The find_by_query() does a couple of things:
//     1. It makes the query 
//     2. Fetches the data from the database table using a while loop and it returns it in $row
//     3. Passes the results ($row) to the installation (installation - weird name I know) method
//     4. Returns the object in the $title_object_array variable that it gets from the installation method
//     5. And that will be the result that find_all() returns when we user User::find_all()

// What the installation method is doing
//     1. Gets the calling class name.
//     2. Creates an instance of the class.
//     3. It loops through the $the_record variable that has all the records
//     4. It checks to see if the properties exist on that object with the other method has_the_property()
//     5. If the keys from the record which basically are the columns from db table are found or equal the object properties then it assigns the values to them
//     6. Finally it returns the object!

// The purpose of this is to basically create our own API to deal with the database query so that in the future we can 
// plug in other API's. Keep in mind, there's still a couple of things we need to improve to make this way better, cleaner and more universal.

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name');
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function verify_user($username, $password) {

        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

} // End Of User Class

?>