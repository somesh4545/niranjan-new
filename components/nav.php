<nav class="nav">
  <div class="wrapper container">
    <a href="/">
      <div class="logo">
        Niranjan
      </div>
    </a>


    <div style="display: flex; flex-direction: row; justify-content: center; align-items: center">
      <div class="search-container">
        <form action="/dbms/Search.php">
          <input type="text" placeholder="Search.." name="search" class="searchInput" autocomplete="off" />
          <button type="submit" class="searchBtn"><i class="fa fa-search"></i></button>
        </form>
      </div>


      <ul class="nav-list">
        <div class="top">
          <label for="" class="btn close-btn"><i class="fas fa-times"></i></label>
        </div>
        <li><a href="/dbms/index.php">Home</a></li>
        <li>
          <a href="" class="desktop-item">Categories <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showdrop2" />
          <label for="showdrop2" class="mobile-item">More <span><i class="fas fa-chevron-down"></i></span></label>
          <ul class="drop-menu2">
            <?php
            $sql = "SELECT * FROM `categories` where subcategory=0";
            $result = $conn->query($sql);

            while ($row = $result->fetch_assoc()) {
              $id = $row['id'];
              $name = $row['name'];
              echo "
                <li><a href='/dbms/Collection.php?id=$id'>$name</a></li>
              ";
            }
            ?>
          </ul>
        </li>
        <!-- <li>
          <a href="" class="desktop-item">Categories <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showMega" />
          <label for="showMega" class="mobile-item">Categories <span><i class="fas fa-chevron-down"></i></span></label>
          <div class="mega-box">
            <div class="content">

              <div class="row">
                <header>Skin Care</header>
                <ul class="mega-links">
                  <li><a href="#">Shop With Background</a></li>
                  <li><a href="#">Shop Mini Categories</a></li>
                  <li><a href="#">Shop Only Categories</a></li>
                  <li><a href="#">Shop Icon Categories</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Hair Care</header>
                <ul class="mega-links">
                  <li><a href="#">Shop With Background</a></li>
                  <li><a href="#">Shop Mini Categories</a></li>
                  <li><a href="#">Shop Only Categories</a></li>
                  <li><a href="#">Shop Icon Categories</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Body Care</header>
                <ul class="mega-links">
                  <li><a href="#">Sidebar</a></li>
                  <li><a href="#">Filter Default</a></li>
                  <li><a href="#">Filter Drawer</a></li>
                  <li><a href="#">Filter Dropdown</a></li>
                </ul>
              </div>
              <div class="row">
                <header>Sun Care</header>
                <ul class="mega-links">
                  <li><a href="#">Layout Zoom</a></li>
                  <li><a href="#">Layout Sticky</a></li>
                  <li><a href="#">Layout Sticky 2</a></li>
                  <li><a href="#">Layout Scroll</a></li>
                </ul>
              </div>
            </div>
          </div>
        </li> -->
        <li><a href="/products.php">Products</a></li>

        <?php
        if (!isset($_SESSION['cust_id'])) {
          echo '
            <li><a href="/dbms/auth/Login">Login</a></li>
            <li><a href="/dbms/auth/SignUp/">Signup</a></li>
            <li><a href="/dbms/orders.php">Orders</a></li>
          ';
        } else {
          echo '
            <li><a href="/dbms/orders.php">Orders</a></li>
            <li><a href="/dbms/functions.php?logout=true">Logout</a></li>
          ';
        }
        ?>


        <!-- <li>
          <a href="" class="desktop-item">More <span><i class="fas fa-chevron-down"></i></span></a>
          <input type="checkbox" id="showdrop2" />
          <label for="showdrop2" class="mobile-item">More <span><i class="fas fa-chevron-down"></i></span></label>
          <ul class="drop-menu2">
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Faq</a></li>
            <li><a href="/orders.php">Orders</a></li>
          </ul>
        </li> -->
        <!-- icons -->
        <li class="icons">
          <a href="/cart.php">
            <span>
              <img src="/dbms/images/shoppingBag.svg" alt="" />
              <!-- <small class="count d-flex">0</small> -->
            </span>
          </a>
          <!-- <span><i class="nav-heart fas fa-share"></i></span> -->

        </li>
      </ul>
      <label for="" class="btn open-btn"><i class="fas fa-bars"></i></label>
    </div>
  </div>
</nav>