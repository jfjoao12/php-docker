<?php

  // if(isset($_GET['search'])) {
  //   $search_query = 
  //   "SELECT pages.page_id, pages.date, games.game_name, users.username, users.usertype
  //   FROM pages 
  //   JOIN games ON pages.game_id = games.game_id 
  //   JOIN users ON pages.user_id = users.user_id
  //   WHERE (games.game_name LIKE :search_term OR
  //          users.username  LIKE :search_term OR
  //          pages.date      LIKE :search_term)";

  //   $search_term = $_GET['search'];

  //   execute_query($search_query, [':search_term' => $search_term ]);
  // }


?>


<form action="?p=list&search=">
  <input type="text" placeholder="search" id="search-bar">
  <label for="search-bar">Search it up bro</label>
  <button type="submit">SEARCH!</button>
</form>