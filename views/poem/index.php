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
        <a href="../../../../profile"   class = "sign-in-up-position "> <?php echo Session::get('username') ?> </a>
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
    <a href = "../../../../scholarly"> SCHOLARLY </a>
</nav>

<!-- MENU -->
<?php if($this->poemData): ?>
<h1 class="title"> <?php print_r($this->poemData->nume_autor) ?> </h1>
<div class="language-content">
    <h3> Language: </h3>
    <a href="../../../poezie/<?php echo $this->poemData->autor_id .'/'. $this->poemData->titlu_ro .'/' ?>english"> English </a>
    <a href="../../../poezie/<?php echo $this->poemData->autor_id .'/'. $this->poemData->titlu_ro .'/' ?>french"> French </a>
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
        <h1 class="poem-title"> <?php echo $this->poemData->titlu_trad ?> </h1>
        <?php
        if($this->poemInfo) {
            $flag = 0;
            $cnt = 1;
            $last_value = $this->poemInfo->nr_strofa;
            $last_id = $this->poemInfo->id_strofa;
            if ($this->pdata) {
                foreach ($this->pdata as $row) {
                    if ($last_value == $row->nr_strofa && $flag == 0) {
                        echo '
            <div class="accordion">
                <div>
                    <input type="checkbox" id="check-' . $cnt . '" />  
                    <label for="check-' . $cnt . '" class="verse"> 
                        <span>';
                        if (Session::get('loggedIn') == true) {
                            if ($this->userInfo->admin) {
                                echo ' <form action = "../../../deleteTranslation/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id_strofa . '" method = "POST" class = "go-right">
                                             <input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-x" />
                                        </form>';
                            }
                        }
                        $cnt++;
                        echo $row->strofa;
                        echo '</span > 
                        </label >

                        <div class="verse-details" >';
                        if (Session::get('loggedIn') == true) {
                            echo '<div class="comment-form" >
                                <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Annotation: </strong > </span >
                                <form action="../../../verseAnnotation/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'" method="POST">
                                          <input class="comment-box" name="annotation" placeholder="Write something.." type="text"/>
                                          <input type="submit" value="Comment!" class="comm-button"/>
                                </form>
                                </div >';
                        } else echo '<span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Annotations: </strong > </span >';


                        echo '<div class="grid" >';
                        $last_adn_id = -1;
                        if ($this->annotations) {
                            foreach ($this->annotations as $val) {
                                if ($val->id_strofa_tradusa == $last_id && $last_adn_id != $val->id) {
                                    $last_adn_id = $val->id;
                                    echo "<div >";
                                    if (Session::get('loggedIn') == true) {
                                        if ($this->userInfo->admin) {
                                            echo ' <form action = "../../../deleteVerseAnnotation/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $val->id . '" method = "POST">';
                                            echo "<strong > $val->username  </strong >";
                                            echo '<input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-x" />
                                            </form>';
                                        } else echo "<strong > $val->username  </strong >";
                                    }  else echo "<strong > $val->username  </strong >";
                                        echo "<span > $val->adnotare </span>
                                        </div >";

                                }
                            }
                        }

                        echo '
                            </div >';
                        if (Session::get('loggedIn') == true) {
                            if($this->rateData) {
                                $flag = false;
                                foreach ($this->rateData as $elem) {
                                    if ($elem->id_strofa_tradusa == $row->id_strofa) $flag = true;
                                }
                            } else $flag = false;

                            if(!$flag) {
                                echo '<div class="verse-rate" >
                                        <span > <br > <img src = "/assets/images/rating.png" class="adnotation-icon" alt = "" > <strong > Rating: </strong > </span >
                                        <form action = "../../../verseRating/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id_strofa . '" method = "POST">
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
                                            <input type="submit" value="Rate it!" class = "comm-button">
                                        </form >
                                    </div >';
                            }
                        }

                        echo '<div > <br >';
                        if (Session::get('loggedIn') == true) {
                            echo '
                                <div class="comment-form" >
                                    <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Write your opinion! </strong > </span >
                                    <form action="../../../verseComments/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'"
                                      method="POST">
                                        <input class="comment-box" name="comm" placeholder="Write something.." type="text"/>
                                        <input type="submit" value="Comment!" class="comm-button"/>
                                    </form>
                                </div >';
                        } else echo '<span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Comments: </strong > </span >';
                        echo '<div >
                                    <div class="grid" >';
                        $last_comm_id = -1;
                        if ($this->commentaries) {
                            foreach ($this->commentaries as $val) {
                                if ($val->id_strofa_tradusa == $last_id && $last_comm_id != $val->id) {
                                    $last_comm_id = $val->id;
                                    echo "<div >";
                                    if (Session::get('loggedIn') == true) {
                                        if ($this->userInfo->admin) {
                                            echo ' <form action = "../../../deleteVerseComment/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $val->id . '" method = "POST">';
                                            echo "<strong > $val->username  </strong >";
                                            echo '<input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-x" />
                                            </form>';
                                        } else echo "<strong > $val->username  </strong >";
                                    }
                                    else echo "<strong > $val->username  </strong >";
                                    echo "<span > $val->comentariu </span>
                                        </div >";
                                }
                            }
                        }
                        echo ' 
                                    </div > ';
                        if (Session::get('loggedIn') == true) {
                            echo '  <br />
                                    <span> <strong> Share it! </strong> </span>
                                    <form action="../../../share/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'" method = "POST">
                                        <input type="image" src="/assets/images/wordpress.png" alt="Submit Form" class = "img-share" />
                                    </form>   ';
                            echo '<br />
                                    <div class="comment-form" >      
                                    <form action="../../../addTranslation/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_poezie_tradusa.'/'. $row->nr_strofa.'"
                                      method="POST">
                                        <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Add your translation! </strong > </span >
                                        <textarea rows = "4" cols = "50" name = "translate" class="comm-box-accordion" > </textarea >
                                        <button type = "submit" class="comm-button" > Post! </button >
                                    </div >
                                    </form>
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
                                                    if (Session::get('loggedIn') == true) {
                                                        if ($this->userInfo->admin) {
                                                            echo '<form action = "../../../deleteTranslation/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id_strofa . '" method = "POST" class ="go-x">
                                                                                            <input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x" />
                                                                                        </form>';
                                                        }
                                                    }
                                                    $cnt++;
                                                    echo $row->strofa;
                                                 echo '</span >
                                        </label >

                                    <div class="verse-details" >';
                        if (Session::get('loggedIn') == true) {
                            echo '<div class="comment-form" >
                                       <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Annotation: </strong > </span >
                                       <form action="../../../verseAnnotation/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'" method="POST">
                                           <input class="comment-box" name="annotation" placeholder="Write something.." type="text"/>
                                           <input type="submit" value="Comment!" class="comm-button"/>
                                       </form>
                                  </div >';
                        } else echo '<span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Annotations: </strong > </span >';

                        echo '<div class="grid" >';
                        $last_adn_id = -1;
                        if ($this->annotations) {
                            foreach ($this->annotations as $val) {
                                if ($val->id_strofa_tradusa == $last_id && $last_adn_id != $val->id) {
                                    $last_adn_id = $val->id;
                                    echo "<div >";
                                    if (Session::get('loggedIn') == true) {
                                        if ($this->userInfo->admin) {
                                            echo ' <form action = "../../../deleteVerseAnnotation/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $val->id . '" method = "POST">';
                                            echo "<strong > $val->username  </strong >";
                                            echo '<input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-x" />
                                            </form>';
                                        } else echo "<strong > $val->username  </strong >";
                                    }  else echo "<strong > $val->username  </strong >";
                                        echo "<span > $val->adnotare </span>
                                        </div >";

                                }
                            }
                        }

                        echo '</div >';

                        if (Session::get('loggedIn') == true) {
                            if($this->rateData) {
                                $flg = false;
                                foreach ($this->rateData as $elem) {
                                    if ($elem->id_strofa_tradusa == $row->id_strofa) $flg = true;
                                }
                            } else $flg = false;

                            if(!$flg) {
                                echo '<div class="verse-rate" >
                                        <span > <br > <img src = "/assets/images/rating.png" class="adnotation-icon" alt = "" > <strong > Rating: </strong > </span >
                                        <form action = "../../../verseRating/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id_strofa . '" method = "POST">
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
                                            <input type="submit" value="Rate it!" class = "comm-button">
                                        </form >
                                    </div >';
                            }
                        }

                        echo '<div > <br >';
                        if (Session::get('loggedIn') == true) {
                            echo '<div class="comment-form" >
                                      <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Write your opinion! </strong > </span >
                                      <form action="../../../verseComments/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'"
                                      method="POST">
                                        <input class="comment-box" name="comm" placeholder="Write something.." type="text"/>
                                        <input type="submit" value="Comment!" class="comm-button"/>
                                    </form>
                                  </div >';
                        } else echo '<span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Comments: </strong > </span >';

                        echo '<div >
                                    <div class="grid" >';
                        $last_comm_id = -1;
                        if ($this->commentaries) {
                            foreach ($this->commentaries as $val) {
                                if ($val->id_strofa_tradusa == $last_id && $last_comm_id != $val->id) {
                                    $last_comm_id = $val->id;
                                    echo "<div >";
                                    if (Session::get('loggedIn') == true) {
                                        if ($this->userInfo->admin) {
                                            echo ' <form action = "../../../deleteVerseComment/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $val->id . '" method = "POST">';
                                            echo "<strong > $val->username  </strong >";
                                            echo '<input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-x" />
                                            </form>';
                                        } else echo "<strong > $val->username  </strong >";
                                    }  else echo "<strong > $val->username  </strong >";
                                        echo "<span > $val->comentariu </span>
                                        </div >";
                                }
                            }
                        }
                        echo '</div > <br >';

                        echo ' <span> <strong> Share it! </strong> </span>
                                    <form action="../../../share/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'" method = "POST">
                                        <input type="image" src="/assets/images/wordpress.png" alt="Submit Form" class = "img-share" />
                                    </form> ';

                        echo '
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
                                    if (Session::get('loggedIn') == true) {
                                        if ($this->userInfo->admin) {
                                            echo '<form action = "../../../deleteTranslation/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id_strofa . '" method = "POST" class = "go-right">
                                                                <input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-x" />
                                                  </form>';
                                        }
                                    }
                                    $cnt++;
                                    echo $row->strofa;
                                    echo '</span >
                            </label >

                        <div class="verse-details" >';
                        if (Session::get('loggedIn') == true) {
                            echo '<div class="comment-form" >
                                <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Annotation: </strong > </span >
                                <form action="../../../verseAnnotation/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'" method="POST">
                                          <input class="comment-box" name="annotation" placeholder="Write something.." type="text"/>
                                          <input type="submit" value="Comment!" class="comm-button"/>
                                </form>
                            </div >';
                        }

                        echo ' <span > <img src = "/assets/images/adnotation.png" class="adnotation-icon" alt = "" > <strong > Annotations: </strong > </span > <div class="grid" >';
                        $last_adn_id = -1;
                        if ($this->annotations) {
                            foreach ($this->annotations as $val) {
                                if ($val->id_strofa_tradusa == $last_id && $last_adn_id != $val->id) {
                                    $last_adn_id = $val->id;
                                    echo "<div >";
                                    if (Session::get('loggedIn') == true) {
                                        if ($this->userInfo->admin) {
                                            echo '<form action = "../../../deleteVerseAnnotation/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $val->id . '" method = "POST">';
                                            echo "<strong > $val->username  </strong >";
                                            echo '<input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-x" />
                                            </form>';
                                        } else echo "<strong > $val->username  </strong >";
                                    }  else echo "<strong > $val->username  </strong >";
                                    echo "<span > $val->adnotare </span>
                                        </div >";
                                }
                            }
                        }

                        echo '
                            </div >';

                        if (Session::get('loggedIn') == true) {
                            if($this->rateData) {
                                $fl = false;
                                foreach ($this->rateData as $elem) {
                                    if ($elem->id_strofa_tradusa == $row->id_strofa) $fl = true;
                                }
                            } else $fl = false;

                            if(!$fl) {
                                echo '<div class="verse-rate" >
                                        <span > <br > <img src = "/assets/images/rating.png" class="adnotation-icon" alt = "" > <strong > Rating: </strong > </span >
                                        <form action = "../../../verseRating/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id_strofa . '" method = "POST">
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
                                            <input type="submit" value="Rate it!" class = "comm-button">
                                        </form >
                                    </div >';
                            }
                        }

                        echo '<div >
                                <br >';
                        if (Session::get('loggedIn') == true) {
                            echo '<div class="comment-form" >
                                    <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Write your opinion! </strong > </span >
                                    <form action="../../../verseComments/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'"
                                      method="POST">
                                        <input class="comment-box" name="comm" placeholder="Write something.." type="text"/>
                                        <input type="submit" value="Comment!" class="comm-button"/>
                                    </form>
                                </div >';
                        } else echo '<span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Comments: </strong > </span >';

                        echo '<div >
                                    <div class="grid" >';
                        $last_comm_id = -1;
                        if ($this->commentaries) {
                            foreach ($this->commentaries as $val) {
                                if ($val->id_strofa_tradusa == $last_id && $last_comm_id != $val->id) {
                                    $last_comm_id = $val->id;
                                    echo "<div >";
                                    if (Session::get('loggedIn') == true) {
                                        if ($this->userInfo->admin) {
                                            echo '<form action = "../../../deleteVerseComment/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $val->id . '" method = "POST">';
                                            echo "<strong > $val->username  </strong >";
                                            echo '<input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-x" />
                                            </form>';
                                        } else echo "<strong > $val->username  </strong >";
                                    }  else echo "<strong > $val->username  </strong >";
                                    echo "<span > $val->comentariu </span>
                                        </div >";
                                }
                            }
                        }
                        echo '
                                    </div >
                                    <br />';
                        if (Session::get('loggedIn') == true) {
                            echo ' 
                                    <span> <strong> Share it! </strong> </span>
                                    <form action="../../../share/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_strofa.'" method = "POST">
                                        <input type="image" src="/assets/images/wordpress.png" alt="Submit Form" class = "img-share" />
                                    </form> <br /> ';
                            echo '<div class="comment-form" >
                                           <form action="../../../addTranslation/'.$this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language.'/'.$row->id_poezie_tradusa.'/'. $row->nr_strofa.'"
                                                 method="POST">
                                                <span > <img src = "/assets/images/comm-icon.png" class="adnotation-icon" alt = "" > <strong > Add your translation! </strong > </span >
                                                <textarea rows = "4" cols = "50" name = "translate" class="comm-box-accordion textarea" > </textarea >
                                                <button type = "submit" class="comm-button" > Post! </button >
                                            </form>
                                        </div >';
                        }
                        echo '<br >
                                </div > ';
                        $flag = 1;
                    }
                }
                echo '</div> </div> </div> </div> </div >
                        </div >';
            }
        }
        ?>

    </div>
</div>
<?php endif; ?>

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
                    if($this->userInfo->admin) {
                        echo '<form action = "../../../deleteComm/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id . '">
                                                        <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>
                                                        <input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-comms" />
                                                  </form>';
                    }
                    else print_r('<span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>');
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
                                        if ($i > 5) {
                                            if($this->userInfo->admin) {
                                                echo '<form action = "../../../deleteComm/' . $this->poemData->autor_id . '/' . strtolower($this->poemData->titlu_ro) . '/' . $this->language . '/' . $row->id . '">
                                                        <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>
                                                        <input type="image" src="/assets/images/x.png" alt="Submit Form" class = "img-go-x go-comms" />
                                                  </form>';
                                            }
                                            else print_r('<span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>');
                                        }
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
                    print_r('<span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span>');
                    if ($i == 5) break;
                    $i++;
                }
            } ?>

            <div class="accordion">
                <div>
                    <input type="checkbox" id="check-500"/>
                    <label for="check-500" class="verse">
                                <span> Load more.. </span>
                    </label>

                    <div class="verse-details">
                        <div>
                            <div class="grid-comm">
                                <?php if ($this->commData) {
                                    $i = 1;
                                    foreach ($this->commData as $row) {
                                        if ($i > 5) echo' <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> ' . $row->nume . '  <span class = "comment-text-box"> ' . $row->text . '  </span> </span> ';
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


</body>

</html>