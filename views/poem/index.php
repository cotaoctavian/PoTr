<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>
        <?php print_r($this->poemData->titlu_ro); ?> </title>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php Session::init() ?>

<body>
<nav class="nav1">
    <a class="a1" href="../../../../index"> Poem translater </a>
    <?php if (Session::get('loggedIn') == true): ?>
        <a href="<?php echo URL; ?>../../../../dashboard/logout" class="sign-in-up-position"> SIGN OUT </a>
        <a href="../../../../profile" " class = "sign-in-up-position "> <?php echo Session::get('username') ?> </a>
        <img src="../../../../<?php echo Session::get('photo') ?>" alt="" id="profile-picture"/>
    <?php else: ?>
        <a href="../../../../signin" class="sign-in-up-position"> SIGN IN </a>
        <a href="../../../../signup" class="sign-in-up-position"> SIGN UP </a>
    <?php endif; ?>
</nav>

<nav class="menu-bar">
    <a href="../../../../poems/authorsPoem/1"> POEMS! </a>
    <a href="../../../../community"> COMMUNITY </a>
    <a href="../../../../aboutus"> ABOUT US! </a>
</nav>

<!-- MENU -->
<h1 class="title"> <?php print_r($this->poemData->nume_autor) ?> </h1>
<div class="language-content">
    <h3> Language: </h3>
    <a href="../../../poezie/<?php echo $this->poemData->autor_id .'/'. $this->poemData->titlu_ro .'/' ?>english">English </a>
    <a href="#2"> French </a>
    <a href="#3"> Russian </a>
</div>
<hr class="hr1">
<div class="poem-container">
    <div class="poem">
        <h1 class="poem-title"> <?php print_r($this->poemData->titlu_ro); ?> </h1>
        <span class="verse">
            <?php
            print_r($this->poemData->poezie);
            ?>
        </span>

    </div>

    <div class="poem">
        <h1 class="poem-title"> Lead </h1>
        <?php $flag = 0;
        $cnt = 1;
        $last_value = $this->poemData->nr_strofa;
        $last_id = $this->poemData->id_strofa;
        foreach ($this->pdata as $row) {
            if ($last_value == $row->nr_strofa && $flag == 0) {
                echo '
            <div class="accordion">
                <div>
                    <input type="checkbox" id="check-' . $cnt . '" />
                    <label for="check-' . $cnt . '" class="verse">
                        <span>';
                $cnt++;
                echo $row->strofa;
                echo '</span >
                        </label >

                        <div class="verse-details" >';
                            if(Session::get('loggedIn') == true) {
                                echo '<div class="comment-form" >
                                <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Adnotation: </strong > </span >
                                <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" >
                                                    </textarea >
                                <button type = "submit" class="comm-button" > Comment!</button >
                                </div >';
                            }
                            else echo '<span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Adnotations: </strong > </span >';


                            echo '<div class="grid" >';
                $last_adn_id = -1;
                foreach ($this->pdata as $val) {
                    if ($last_value == $val->nr_strofa && $val->id_strofa == $last_id && $last_adn_id != $val->adn_id) {
                        $last_adn_id = $val->adn_id;
                        echo "<div >
                                             <span > <strong > $val->username  </strong > </span >
                                            <br >
                                            <span > $val->adnotare </span >
                                        </div >";
                    }
                }

                echo '<a href = "#3" id = "no-link" > Load more .. <br > </a >
                            </div >';
                                if(Session::get('loggedIn') == true) {
                                    echo '<div class="verse-rate" >
                                    <span > <br > <img src = "/assets/images/rating.png" class="adnotation-icon" alt = "" > <strong > Rating: </strong > </span >
                                    <form >
                                        <label > 5 </label >
                                        <input type = "radio" name = "rating" value = "5" > <br >
                                        <label > 4 </label >
                                        <input type = "radio" name = "rating" value = "4" > <br >
                                        <label > 3 </label >
                                        <input type = "radio" name = "rating" value = "3" > <br >
                                        <label > 2 </label >
                                        <input type = "radio" name = "rating" value = "2" > <br >
                                        <label > 1 </label >
                                        <input type = "radio" name = "rating" value = "1" > <br >
                                    </form >
                                </div >';
                                }

                         echo '<div > <br >' ;
                                if(Session::get('loggedIn') == true){
                                echo'
                                <div class="comment-form" >
                                    <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Write your opinion! </strong > </span >
                                    <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" >
                                                    </textarea >
                                    <button type = "submit" class="comm-button" > Comment!</button >
                                </div >';
                                }
                                else echo '<span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Comments: </strong > </span >';
                                echo '<div >
                                    <div class="grid" >';
                $last_comm_id = -1;
                foreach ($this->pdata as $val) {
                    if ($last_value == $val->nr_strofa && $val->id_strofa == $last_id && $last_comm_id != $val->comm_id) {
                        $last_comm_id = $val->comm_id;
                        echo "<div >
                                                 <span > <strong > $val->username  </strong > </span > <br >
                                                 <span > $val->comentariu </span >
                                                </div >";
                    }
                    else break;
                }
                echo ' <a href = "#3" id = "no-link" > Load more .. </a >
                                    </div > ';
                                    if(Session::get('loggedIn') == true) {
                                        echo '<br />
                                    <div class="comment-form" >
                                        <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Add your translation! </strong > </span >
                                        <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" > </textarea >
                                        <button type = "submit" class="comm-button" > Post!</button >
                                    </div >
                                    <br >';
                                    }
                                echo '</div >';
                $flag = 1;
            } else if ($last_value == $row->nr_strofa && $flag == 1 && $last_id != $row->id_strofa) {

                $last_id = $row->id_strofa;
                echo '<div class="accordion" >
                                 <div>  
                                     <span > <strong > Other translations! </strong > </span > </div>
                                     <div >
                                        <input type = "checkbox" id = "check-' . $cnt . '" />
                                        <label for="check-' . $cnt . '" class="verse" >
                                                 <span >';
                                    $cnt++;
                                    echo $row->strofa;
                                    echo '</span >
                                        </label >

                                    <div class="verse-details" >';
                                        if(Session::get('loggedIn') == true) {
                                            echo '<div class="comment-form" >
                                            <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Adnotation: </strong > </span >
                                            <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" >
                                                                </textarea >
                                            <button type = "submit" class="comm-button" > Comment!</button >
                                            </div >';
                                        }
                                        else echo '<span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Adnotations: </strong > </span >';

                                echo '<div class="grid" >';
                                $last_adn_id = -1;
                                foreach ($this->pdata as $val) {
                                    if ($last_value == $val->nr_strofa && $val->id_strofa == $last_id && $last_adn_id != $val->adn_id) {
                                        $last_adn_id = $val->adn_id;
                                        echo "<div >
                                               <span > <strong > $val->username  </strong > </span >
                                               <br >
                                               <span > $val->adnotare </span >
                                         </div >";
                    }
                }

                echo '<a href = "#3" id = "no-link" > Load more .. <br > </a >
                                      </div >';

                                      if(Session::get('loggedIn') == true){
                                          echo '<div class="verse-rate" >
                                            <span > <br > <img src = "/assets/images/rating.png" class="adnotation-icon" alt = "" > <strong > Rating: </strong > </span >
                                            <form >
                                                <label > 5 </label >
                                                <input type = "radio" name = "rating" value = "5" > <br >
                                                <label > 4 </label >
                                                <input type = "radio" name = "rating" value = "4" > <br >
                                                <label > 3 </label >
                                                <input type = "radio" name = "rating" value = "3" > <br >
                                                <label > 2 </label >
                                                <input type = "radio" name = "rating" value = "2" > <br >
                                                <label > 1 </label >
                                                <input type = "radio" name = "rating" value = "1" > <br >
                                            </form >
                                          </div >';
                                      }

                                        echo '<div > <br >';
                                                if(Session::get('loggedIn') == true){
                                                    echo'<div class="comment-form" >
                                                        <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Write your opinion! </strong > </span >
                                                        <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" >
                                                                        </textarea >
                                                        <button type = "submit" class="comm-button" > Comment!</button >
                                                    </div >';
                                                }
                                                else echo '<span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Comments: </strong > </span >';

                                     echo '<div >
                                    <div class="grid" >';
                $last_comm_id = -1;
                foreach ($this->pdata as $val) {
                    if ($last_value == $val->nr_strofa && $val->id_strofa == $last_id && $last_comm_id != $val->comm_id) {
                        $last_comm_id = $val->comm_id;
                        echo "<div >
                                             <span > <strong > $val->username  </strong > </span > <br >
                                             <span > $val->comentariu </span >
                                             </div >";
                    }
                }
                echo ' <a href = "#3" id = "no-link" > Load more .. </a >
                                    </div >
                                    <br >';
                                    if(Session::get('loggedIn')){
                                    echo '<div class="comment-form" >
                                        <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Add your translation! </strong > </span >
                                        <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" > </textarea >
                                        <button type = "submit" class="comm-button" > Post!</button >
                                    </div >';
                                    }
                                    echo '<br >
                                </div >
                            </div >
                            </div >
                            </div>
                        </div>';
            } else if ($last_value != $row->nr_strofa && ($flag == 0 || $flag == 1)) {
                $last_value = $row->nr_strofa;
                $last_id = $row->id_strofa;
                $flag = 1;
                echo '</div > </div>';

                echo '<div class="accordion" >
                         <div >
                            <input type = "checkbox" id = "check-' . $cnt . '" />
                            <label for="check-' . $cnt . '" class="verse" >
                                     <span >';
                $cnt++;
                echo $row->strofa;
                echo '</span >
                            </label >

                        <div class="verse-details" >';
                            if(Session::get('loggedIn') == true){
                            echo '<div class="comment-form" >
                                <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Adnotation: </strong > </span >
                                <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" >
                                                    </textarea >
                                <button type = "submit" class="comm-button" > Comment!</button >
                            </div >';
                            }

                            echo ' <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Adnotations: </strong > </span > <div class="grid" >';
                $last_adn_id = -1;
                foreach ($this->pdata as $val) {
                    if ($last_value == $val->nr_strofa && $val->id_strofa == $last_id && $last_adn_id != $val->adn_id) {
                        $last_adn_id = $val->adn_id;
                        echo "<div >
                                         <span > <strong > $val->username  </strong > </span > <br >
                                         <span > $val->adnotare </span >
                                         </div >";
                    }
                }

                echo '<a href = "#3" id = "no-link" > Load more .. <br > </a >
                            </div >';

                            if(Session::get('loggedIn') == true){
                            echo '<div class="verse-rate" >
                                <span > <br > <img src = "/assets/images/rating.png" class="adnotation-icon" alt = "" > <strong > Rating: </strong > </span >
                                <form >
                                    <label > 5 </label >
                                    <input type = "radio" name = "rating" value = "5" > <br >
                                    <label > 4 </label >
                                    <input type = "radio" name = "rating" value = "4" > <br >
                                    <label > 3 </label >
                                    <input type = "radio" name = "rating" value = "3" > <br >
                                    <label > 2 </label >
                                    <input type = "radio" name = "rating" value = "2" > <br >
                                    <label > 1 </label >
                                    <input type = "radio" name = "rating" value = "1" > <br >
                                </form >
                            </div >';
                            }

                            echo '<div >
                                <br >';
                                if(Session::get('loggedIn') == true){
                                echo '<div class="comment-form" >
                                    <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Write your opinion! </strong > </span >
                                    <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" >
                                                    </textarea >
                                    <button type = "submit" class="comm-button" > Comment!</button >
                                </div >';
                                }
                                else echo '<span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Comments: </strong > </span >';

                                echo '<div >
                                    <div class="grid" >';
                $last_comm_id = -1;
                foreach ($this->pdata as $val) {
                    if ($last_value == $val->nr_strofa && $val->id_strofa == $last_id && $last_comm_id != $val->comm_id) {
                        $last_comm_id = $val->comm_id;
                        echo "<div >
                                            <span > <strong > $val->username  </strong > </span > <br >
                                            <span > $val->comentariu </span >
                                             </div >";
                    }
                }
                echo ' <a href = "#3" id = "no-link" > Load more .. </a >
                                    </div >
                                    <br >';
                                    if(Session::get('loggedIn') == true){
                                        echo '<div class="comment-form" >
                                            <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Add your translation! </strong > </span >
                                            <textarea rows = "4" cols = "50" name = "comment" class="comm-box-accordion" > </textarea >
                                            <button type = "submit" class="comm-button" > Post!</button >
                                        </div >';
                                    }
                                    echo '<br >
                                </div > ';
                $flag = 1;
            }
        }
        echo '</div> </div> </div> </div> </div >
                        </div >';
        ?>

    </div>
</div>

<hr class="hr1">

<div class="comment-main">
    <?php if (Session::get('loggedIn') == true): ?>
        <h1 class="comment-title"><img src="/assets/images/comm-icon.png" class="comment-icon" alt=""> Write your
            opinion! </h1>
        <form action="../../../poezie/<?php echo $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language ?>"
              method="POST">
            <input class="comment-box" name="comment" placeholder="Write something.." type="text"/>
            <input type="submit" value="Comment!" class="comm-button"/>
        </form>

        <h1 class="comment-title"><img src="/assets/images/comments.png" class="comment-icon" alt=""> Comments! </h1>
        <div class="comment-section">
            <?php
            if ($this->commData) {
                $i = 1;
                foreach ($this->commData as $row) {
                    print_r('<span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>');
                    if ($i == 5) break;
                    $i++;
                }
            } ?>

            <div class="accordion">
                <div>
                    <input type="checkbox" id="check-500"/>
                    <label for="check-500" class="verse">
                                    <span>
                            <?php echo '<span> <a href = "" id = "no-link"> Load more.. </a> </span>'; ?>
                                    </span>
                    </label>

                    <div class="verse-details">
                        <div>
                            <div class="grid-comm">
                                <?php if ($this->commData) {
                                    $i = 1;
                                    foreach ($this->commData as $row) {
                                        if ($i > 5) print_r(' <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span> ');
                                        $i++;
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    <?php else: ?>


        <h1 class="comment-title"><img src="/assets/images/comments.png" class="comment-icon" alt=""> Comments! </h1>
        <div class="comment-section">
            <?php if ($this->commData) {
                $i = 1;
                foreach ($this->commData as $row) {
                    print_r('
                    <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>');
                    if ($i == 5) break;
                    $i++;
                }
            } ?>

            <div class="accordion">
                <div>
                    <input type="checkbox" id="check-500"/>
                    <label for="check-500" class="verse">
                                <span>
                            <?php echo '<span> <a href = "" id = "no-link"> Load more.. </a> </span>'; ?>
                                </span>
                    </label>

                    <div class="verse-details">
                        <div>
                            <div class="grid-comm">
                                <?php if ($this->commData) {
                                    $i = 1;
                                    foreach ($this->commData as $row) {
                                        if ($i > 5) print_r(' <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>');
                                        $i++;
                                    }
                                } ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    <?php endif; ?>
</div>


<div id = "table-share">
    <h1> Share it! </h1>
    <form action = "/../../poem/share/<?php echo $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language ?>" method = "POST">
        <input type="image" src="/assets/images/wordpress.png" alt="Submit Form" class = "img-share" />
    </form>

    <form action = "" method = "POST">
        <input type="image" src="/assets/images/blogger.png" alt="Submit Form" class = "img-share" />
    </form>

    <form action = "" method = "POST">
        <input type="image" src="/assets/images/medium.png" alt="Submit Form" class = "img-share" />
    </form>

<div>
</body>

</html>