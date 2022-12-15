<!-- @import '././scss/search.scss'; -->
<?php
include_once '../include/users.php';

$admin = isAdmin($_SESSION['id']);
?>
<link rel="stylesheet" href="./scss/search.scss">
<script src="./Scripts/search.js"></script>
<div class="search-overlay"></div>
<div class="scroll-cont">
  <div class="content">
    <div class="search">
      <div class="search__bg"></div>
      <div class="search__box">
        <input type="text" class="search__input" placeholder="Search"/>
        <div class="search__line"></div>
        <div class="search__close"></div>
      </div>
    </div>
    <p class="desc"></p>
  </div>
</div>