<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['user_id'])) {

    $user_id = $_POST['user_id'];
    $username = $_POST['username_edit'];

    if ($_POST['password_edit'] == $_POST['password_edit2']) {
        $password = password_hash($_POST['password_edit'], PASSWORD_DEFAULT);
        $flag = true;
    } else {
        $flag = false;
    }

    if($flag) {
        $usertype = sanitizeInput($_POST['usertype']);
        $update_user_query = "UPDATE users 
                              SET username = :username,
                                  password = :password,
                                  usertype = :usertype WHERE 
                                  user_id = :user_id";
        $update_statement = execute_query($update_user_query, [
            ':username' => $username,
            ':password' => $password,
            ':user_id' => $user_id,
            ':usertype' => $usertype
        ]);
        echo "User information updated successfully.";
    } else {
        $error = "Passwords do not match.";
    }


    // if ($update_statement) {
        
    // } else {
    //     echo "Error updating user information.";
    // }
} else {
    $error = "All fields are required.";
}

$user_id = $_GET['user_id'];

$users_data_query = 
        "SELECT username, password, usertype
         FROM users
         WHERE user_id = :user_id";

$grab_user_data = execute_query($users_data_query, [':user_id' => $user_id]);

$user = $grab_user_data->fetch();  
?>

<h1>Edit User</h1>
<?php if($_SERVER["REQUEST_METHOD"] === "POST" && isset($error)): ?>
      <p class="error"><?= $error ?></p>
    <?php endif;?>
<form method="post" action="" class="form">
    <input type="hidden" name="user_id" value="<?= $user_id ?>">
    <h2>Userdata:</h2>
    <label for="username_edit">Username</label>
    <input type="text" name="username_edit" id="username_edit" value="<?= $user['username'] ?>">
    
    <label for="password_edit">Password</label>
    <input type="password" name="password_edit" id="password_edit">

    <label for="password_edit2">Retype password</label>
    <input type="password" name="password_edit2" id="password_edit2">
    
    <label for="usertype">User Type:</label>
        <select name="usertype" id="usertype">
            <option value="admin">Admin</option>
            <option value="regular">Regular</option>
            <option value="mod">Mod</option>
        </select>
   
    <button type="submit" onclick="return confirm('Are you sure you want to change the data of the user?')">Save Changes</button>
</form>
