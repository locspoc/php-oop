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

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users() {
        // global $database;
        // $result_set = $database->query("SELECT * FROM users");
        // return $result_set;
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id) {
        global $database;
        // $result_set = $database->query("SELECT * FROM users WHERE id=$user_id LIMIT 1");
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id = $user_id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;

        // $found_user = mysqli_fetch_array($result_set);
        // if(!empty($the_result_array)) {

        //     $first_item = array_shift($the_result_array);
        //     return $first_item;

        // } else {

        //     return false;

        // }

        return $found_user;
    }

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while($row = mysqli_fetch_array($result_set)) {

            $the_object_array[] = self::instantiation($row);

        }

        return $the_object_array;
    }

    public static function instantiation($the_record){

        $the_object = new self;

        // $the_object->id         = $found_user['id'];
        // $the_object->username   = $found_user['username'];
        // $the_object->password   = $found_user['password'];
        // $the_object->first_name = $found_user['first_name'];
        // $the_object->last_name  = $found_user['last_name'];

        foreach ($the_record as $the_attribute => $value) {
            
            if($the_object->has_the_attribute($the_attribute)) {

                $the_object->$the_attribute = $value;

            } 

        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute) {

        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);

    }

}

?>