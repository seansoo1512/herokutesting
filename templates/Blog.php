<!DOCTYPE html>
<html>
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0D9G225TXQ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0D9G225TXQ');
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.2/css/bulma.min.css">
    <link rel="icon" href="Z_logo.png">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
  </head>
  <body>
    <section class="hero is-primary is-small">
      <!-- Hero head: will stick at the top -->
      <div class="hero-head">
        <nav class="navbar">
          <div class="container">
            <a class="navbar-item" href="http://seansoo.tech">
              <div class="navbar-brand">
              <img src="ZhenXiang_simple_white.png" alt="Logo">
            </a>     
            <span class="navbar-item">
                <a class="button is-primary is-inverted" href="https://www.facebook.com/zhen.xiang.355">
                  <span class="icon">
                    <i class="fab fa-facebook"></i>
                  </span>
                </a>            
                <span class="navbar-item">
                  <a class="button is-primary is-inverted" href="https://twitter.com/zhenxiang1512">
                    <span class="icon">
                      <i class="fab fa-twitter"></i>
                    </span>
                  </a>                  
                  <span class="navbar-item">
                    <a class="button is-primary is-inverted" href="https://www.linkedin.com/in/zhenxiang1512/">
                      <span class="icon">
                        <i class="fab fa-linkedin"></i>
                      </span>
                    </a>
              <span class="navbar-item">
                <a class="button is-primary is-inverted">
                  <span class="icon">
                    <i class="fab fa-github"></i>
                  </span>
                </a>
                <span class="navbar-item">
                  <a class="button is-primary is-inverted" href="https://paypal.me/pools/c/8oW8JpXljv">
                    <span class="icon">
                      <i class="fab fa-paypal"></i>
                    </span>
                  </a>
              
              </div>
            </div>
          </div>
        </nav>
      </div>
      
  <!-- Hero content: will be in the middle -->
  <div class="hero-body">
    <div class="container has-text-centered">
      <h1 class="title">
        Blog
      </h1>
      <h2 class="subtitle">
        Hope you like it ;)
      </h2>
    </div>
  </div>

  <!-- Hero footer: will stick at the bottom -->
  <div class="hero-foot">
    <nav class="tabs is-boxed is-fullwidth">
      <div class="container">
        <ul>
          <ul>
            <li><a href = "index.html">Overview</a></li>
            <li><a href = "About.html">About Me</a></li>
            <li class="is-active"><a href="Blog.html">Blog</a></li>
            <li><a href = "Projects.html">Projects</a></li>
            <li><a href = "Contact.html">Contact</a></li>
          </ul>
        </ul>
      </div>
    </nav>
  </div>
</section>

<div class="container">
  <!-- START ARTICLE FEED -->
  <section class="articles">
      <div class="column is-8 is-offset-2">
          <!-- START ARTICLE -->
          <div class="card article">
              <div class="card-content">
                  <div class="media">
                      <div class="media-content has-text-centered">
                          <p class="title article-title">Blogs coming soon if anything interesting comes up</p>
                          <div class="tags has-addons level-item">
                              <span class="tag is-rounded is-info">@zhenxiang</span>
                              <span class="tag is-rounded">May 08, 2020</span>
                          </div>
                      </div>
                  </div>
                  <div class="content article-body">
                      
                  </div>
              </div>
          </div>
          <!-- END ARTICLE -->


        </div>
    </section>
  </div>

  
  <div class="container">
  <!-- START ARTICLE FEED -->
  <section class="articles">
      <div class="column is-8 is-offset-2">
          <!-- START ARTICLE -->
          <div class="card article">
              <div class="card-content">
              <div class="tile is-ancestor">
  <div class="tile is-vertical">
    <div class="tile">
      <div class="tile is-parent is-vertical">
        <article class="tile is-child notification is-primary">
          <p class="title">Comments</p>

          <p class="subtitle">
            <?php
            $servername = "localhost";
            $username = "shanehastings";
            $password = "shanehastings123";
            $dbname = "blog";
            // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
          $sql = "SELECT date, name, comment FROM comments ORDER BY date ASC";

          $result = $conn->query($sql);


          if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                  $strdate =  date("M jS, Y", strtotime($row["date"])); 
                  echo "<b>" . $row["name"] . " </b>" . $strdate . "<br>";
                  echo $row["comment"] ."<hr>";
                  
              }
          } else {
              echo "No news event.";
          }
          ?>
          </p>
      </div>
  </div>
</div>
                      </div>
                  </div>
                  <div class="content article-body">

                  </div>
              </div>
          </div>
          <!-- END ARTICLE -->


        </div>
    </section>
  </div>


<?php

    $servername = "localhost";
    $username = "shanehastings";
    $password = "shanehastings123";
    $dbname = "blog";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);



          if($_SERVER["REQUEST_METHOD"] == "POST"){



            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            // Dont trust user input lol
            $name = mysqli_real_escape_string($conn, $_POST["name"]);
            $comment = mysqli_real_escape_string($conn, $_POST["comment"]);
            $date = date("Y-m-d");
            $sql = "INSERT INTO comments (comment, name, date)
            VALUES ('".$comment."', '".$name."', '".$date."')";
        
            if ($conn->query($sql) === TRUE) {
                echo "";
            } else {
                echo "not-work" . $conn->error;
            }
        
            $conn->close();
        }
?>



<div class="container is-widescreen">
  <div class="notification">


  
<nav class="level">
  <!-- Left side -->
  <div class="level-left">
    <div class="level-item">
      <p class="subtitle is-5">
      <p class="title">Comments</p>
      </p>
    </div>
    <div class="level-item">
      
    <form action="Blog.php" method="POST">
      <input class="input is-rounded" name = "name" type="text" placeholder="Small input" cols="50" rows="10">
      <textarea class="textarea" name="comment" placeholder="Enter comment" cols = "50" rows="2"></textarea>
      <button class="button is-primary">Post</button>
        </p>
        </form>
      </div>
    </div>
  </div>

  
  </div>
</div>





  <footer class="footer">
    <div class="content has-text-centered">
      <p>
        <strong>Website</strong> by <a href="http://seansoo.tech">ZhenXiang</a>
      </p>
    </div>
  </footer>
</html>




