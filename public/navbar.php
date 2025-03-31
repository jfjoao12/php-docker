<link rel="stylesheet" href="/index.css" />
<div id="navbar-div">
        <div id="user-info">
                <?php if (isset($_SESSION["user_id"])): ?>
                        <p>Logged in as: <?= $_SESSION['username']; ?></p>
                <?php endif; ?>
        </div>

        <nav id="navbar">
                <ul>
                        <li><a href="/home">Home</a></li>
                        <li><a href="/list">List of games</a></li>
                        <?php if (isset($_SESSION['usertype']) == 'admin'): ?>
                                <li><a href="/insert">Create a new game</a></li>
                                <li><a href="/manage_users">Manage Users</a></li>
                        <?php endif; ?>
                </ul>
        </nav>
        <!-- <div id="user-navbar">
                <a href="?p=list">List of games</a> |
                <a href="?logout=true">LOGOUT</a>
        </div>

        <div id="admin-navbar">
                <a href="?p=insert">Create a new game</a> |
                <a href="?p=manage_users">Manage Users</a>
        </div> -->

        <div id="navbar-right">
                <div id="search-div">
                        <form action="./search" method="GET">
                                <!-- <input type="hidden" name="p" value="list"> -->
                                <input type="text" placeholder="search" id="search-bar" name="search">
                                <button type="submit" hidden>   </button>
                        </form>
                </div>

                <div id="login-logout">
                        <ul>
                                <?php if (isset($_SESSION["user_id"])): ?>
                                        <li><a href="/logout">logout</a></li>
                                <?php else:?>
                                        <li><a href="/login">Login</a></li>
                                        <li><a href="/register">Register</a></li>
                                <?php endif; ?>
                        </ul>
                </div>
        </div>
</div>




