<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset="UTF-8">
    <title> Laboratorul 3</title>
    <link rel="stylesheet" href="/assets/style.css">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Monoton" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<?php Session::init() ?>
<body>
<nav class = "nav1">
    <a class = "a1" href = "../../../index"> Poem translater </a>
    <?php
    if(Session::get('loggedIn')==true):  ?>
        <a href="<?php echo URL ;?>../../../dashboard/logout" class = "sign-in-up-position"> SIGN OUT </a>
        <a href = "../../../profile"" class = "sign-in-up-position"> <?php echo Session::get('username') ?> </a>
        <img src = "../../../<?php echo Session::get('photo') ?>" alt ="" id = "profile-picture"/>
    <?php else: ?>
        <a href = "../../../signin" class = "sign-in-up-position"> SIGN IN </a>
        <a href = "../../../signup" class = "sign-in-up-position"> SIGN UP </a>
    <?php endif; ?>
</nav>

<nav class = "menu-bar">
    <a href = "../../../poems"  > POEMS! </a>
    <a href = "../../../community"  > COMMUNITY </a>
    <a href = "../../../about-us"> ABOUT US! </a>
</nav>

<!-- MENU -->
<h1 class = "title"> <?php print_r($this->poemData->nume) ?> </h1>
<div class = "language-content">
    <h3> Language: </h3>
    <a href = "<?php echo strtolower($this->poemData->titlu)?>" >English </a>
    <a href = "#2"> French </a>
    <a href = "#3"> Russian </a>
</div>
<hr class = "hr1">
<div class = "poem-container" >
    <div class = "poem">
        <h1 class = "poem-title"> <?php print_r($this->poemData->titlu); ?> </h1>
        <span class = "verse">
            <?php
                print_r($this->poemData->poezie);
            ?>
        </span>

    </div>

    <div class = "poem">
        <h1 class = "poem-title"> Lead </h1>
        <div class="accordion">
            <div>
                <input type="checkbox" id="check-1" />
                <label for="check-1" class ="verse">
                               <span>
                                    The coffins of lead were lying sound asleep, <br>
                                    And the lead flowers and the funeral clothes - <br>
                                    I stood alone in the vault ... and there was wind ... <br>
                                    And the wreaths of lead creaked. <br>
                                    <br>
                                </span>
                </label>
                <div class = "verse-details">

                    <div class = "comment-form">
                        <span> <img src = "/assets/images/adnotation.png" class = "adnotation-icon" alt = ""> <strong> Adnotation: </strong> </span>
                        <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                        <button type = "submit" class = "comm-button"> Comment! </button>
                    </div>

                    <div class = "grid">
                        <div>
                            <span> <strong> Aaron Kris: </strong> </span>
                            <br>
                            <span> The author talks about graves.</span>
                        </div>
                        <div>
                            <span> <strong> Lily: </strong> </span>
                            <br>
                            <span> The author talks about his feelings, about the fact that he feels lonely. </span>
                        </div>
                        <a href = "#3" class = "no-link"> Load more.. <br> </a>
                    </div>

                    <div class = "verse-rate">
                        <span> <br> <img src = "/assets/images/rating.png" class = "adnotation-icon" alt =""> <strong> Rating: </strong> </span>
                        <form>
                            <label> 5 </label>
                            <input type="radio" name="rating" value="5"> <br>
                            <label> 4 </label>
                            <input type="radio" name="rating" value="4"> <br>
                            <label> 3 </label>
                            <input type="radio" name="rating" value="3">  <br>
                            <label> 2 </label>
                            <input type="radio" name="rating" value="2">  <br>
                            <label> 1 </label>
                            <input type="radio" name="rating" value="1">  <br>
                        </form>
                    </div>

                    <div>
                        <br>
                        <div class = "comment-form">
                            <span> <img src="/assets/images/comm-icon.png" class = "adnotation-icon" alt =""> <strong> Write your opinion! </strong> </span>
                            <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                            <button type = "submit" class = "comm-button"> Comment! </button>
                        </div>

                        <div>
                            <div class="grid">
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> Lovely </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> So much feelings in this verse.. </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> I like it </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> so cool </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> wow! </span>
                                </div>
                                <a href = "#3" class = "no-link"> Load more..  </a>
                            </div>
                            <br>
                            <div class = "comment-form">
                                <span> <img src="/assets/images/comm-icon.png"  class = "adnotation-icon" alt =""> <strong> Add your translation! </strong> </span>
                                <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                                <button type = "submit" class = "comm-button"> Post! </button>
                            </div>
                            <br>
                            <span> <strong> Other translations! </strong> </span>

                        </div>
                        <div class="accordion">
                            <div>
                                <input type="checkbox" id="check-3" />
                                <label for="check-3" class ="verse">
                                               <span>
                                                        Cercueils de plomb dormaient à poings fermés <br>
                                                        Comme fleurs de plomb, funéraire vêtement - <br>
                                                        Moi. Le caveau !... il y faisait du vent. <br>
                                                        Pour faire pendant, couronnes de plomb grinçaient.
                                                    <br>
                                                </span>
                                </label>
                                <div class = "verse-details">
                                    <div class = "comment-form">
                                        <span> <img src = "/assets/images/adnotation.png" class = "adnotation-icon" alt = ""> <strong> Adnotation: </strong> </span>
                                        <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                                        <button type = "submit" class = "comm-button"> Comment! </button>
                                    </div>

                                    <div class = "grid">
                                        <div>
                                            <span> <strong> Aaron Kris: </strong> </span>
                                            <br>
                                            <span> The author talks about graves.</span>
                                        </div>
                                        <div>
                                            <span> <strong> Lily: </strong> </span>
                                            <br>
                                            <span> The author talks about his feelings, about the fact that he feels lonely. </span>
                                        </div>
                                        <a href = "#3" class = "no-link"> Load more..  </a>
                                    </div>

                                    <div class = "verse-rate">
                                        <span> <br> <img src = "/assets/images/rating.png" class = "adnotation-icon" alt ="">  <strong> Rating: </strong> </span>
                                        <form>
                                            <label> 5 </label>
                                            <input type="radio" name="rating" value="5"> <br>
                                            <label> 4 </label>
                                            <input type="radio" name="rating" value="4"> <br>
                                            <label> 3 </label>
                                            <input type="radio" name="rating" value="3">  <br>
                                            <label> 2 </label>
                                            <input type="radio" name="rating" value="2">  <br>
                                            <label> 1 </label>
                                            <input type="radio" name="rating" value="1">  <br>
                                        </form>
                                    </div>

                                    <div>
                                        <br>
                                        <div class = "comment-form">
                                            <span> <img src="/assets/images/comm-icon.png" class = "adnotation-icon" alt ="">  <strong> Write your opinion! </strong> </span>
                                            <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                                            </textarea>
                                            <button type = "submit" class = "comm-button"> Comment! </button>
                                        </div>

                                        <div>
                                            <div class="grid">
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> Bacovia is the best! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> So deep! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> I love it! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> Poezia mea preferata! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> Splendid! </span>
                                                </div>
                                                <a href = "#3" class = "no-link"> Load more..  </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="accordion">
            <div>
                <input type="checkbox" id="check-2" />
                <label for="check-2" class = "verse">
                                <span>
                                    Upturned my lead beloved lay asleep <br>
                                    On the lead flower ... and I began to call - <br>
                                    I stood alone by the corpse ... and it was cold ... <br>
                                    And the wings of lead drooped. <br>
                                                           <br>
                                </span>
                </label>
                <div class = "verse-details">
                    <div class = "comment-form">
                        <span> <img src = "/assets/images/adnotation.png" class = "adnotation-icon" alt = ""> <strong> Adnotation: </strong> </span>
                        <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                        <button type = "submit" class = "comm-button"> Comment! </button>
                    </div>

                    <div class = "grid">
                        <div>
                            <span> <strong> Aaron Kris: </strong> </span>
                            <br>
                            <span> The author talks about graves.</span>
                        </div>
                        <div>
                            <span> <strong> Lily: </strong> </span>
                            <br>
                            <span> The author talks about his feelings, about the fact that he feels lonely. </span>
                        </div>
                        <a href = "#3" class = "no-link"> Load more.. <br> </a>

                    </div>
                    <div class = "verse-rate">
                        <span> <br> <img src = "/assets/images/rating.png" class = "adnotation-icon" alt ="">  <strong> Rating: </strong> </span>
                        <form>
                            <label> 5 </label>
                            <input type="radio" name="rating" value="5"> <br>
                            <label> 4 </label>
                            <input type="radio" name="rating" value="4"> <br>
                            <label> 3 </label>
                            <input type="radio" name="rating" value="3">  <br>
                            <label> 2 </label>
                            <input type="radio" name="rating" value="2">  <br>
                            <label> 1 </label>
                            <input type="radio" name="rating" value="1">  <br>
                        </form>
                    </div>

                    <div>
                        <br>
                        <div class = "comment-form">
                            <span> <img src="/assets/images/comm-icon.png" class = "adnotation-icon" alt ="">  <strong> Write your opinion! </strong> </span>
                            <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                            <button type = "submit" class = "comm-button"> Comment! </button>
                        </div>

                        <div>
                            <div class="grid">
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> Bacovia is the best! </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> So deep! </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> I love it! </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> Poezia mea preferata! </span>
                                </div>
                                <div>
                                    <span> <strong> Aaron Kris: </strong> </span>
                                    <br>
                                    <span> Splendid! </span>
                                </div>
                            </div>
                            <br>
                            <div class = "comment-form">
                                <span> <img src="/assets/images/comm-icon.png"  class = "adnotation-icon" alt ="">  <strong> Add your translation! </strong> </span>
                                <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                                <button type = "submit" class = "comm-button"> Post! </button>
                            </div>
                            <br>
                            <span> <strong> Other translations! </strong> </span>
                        </div>
                        <div class="accordion">
                            <div>
                                <input type="checkbox" id="check-4" />
                                <label for="check-4" class ="verse">
                                               <span>
                                                        Dos tourné, mon amour de plomb dormait <br>
                                                        Sur fleurs de plomb ; j’entrepris de l’appeler - <br>
                                                        Le mort - seul. Et moi… le froid y régnait… <br>
                                                        Toujours en plomb, ses ailes par terre pendaient. <br>
                                                    <br>
                                                </span>
                                </label>
                                <div class = "verse-details">
                                    <div class = "comment-form">
                                        <span> <img src = "/assets/images/adnotation.png" class = "adnotation-icon" alt = ""> <strong> Adnotation: </strong> </span>
                                        <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                            </textarea>
                                        <button type = "submit" class = "comm-button"> Comment! </button>
                                    </div>

                                    <div class = "grid">
                                        <div>
                                            <span> <strong> Aaron Kris: </strong> </span>
                                            <br>
                                            <span> The author talks about graves.</span>
                                        </div>
                                        <div>
                                            <span> <strong> Lily: </strong> </span>
                                            <br>
                                            <span> The author talks about his feelings, about the fact that he feels lonely. </span>
                                        </div>
                                        <a href = "#3" class = "no-link"> Load more..  </a>
                                    </div>

                                    <div class = "verse-rate">
                                        <span> <br> <img src = "/assets/images/rating.png" class = "adnotation-icon" alt ="">  <strong> Rating: </strong> </span>
                                        <form>
                                            <label> 5 </label>
                                            <input type="radio" name="rating" value="5"> <br>
                                            <label> 4 </label>
                                            <input type="radio" name="rating" value="4"> <br>
                                            <label> 3 </label>
                                            <input type="radio" name="rating" value="3">  <br>
                                            <label> 2 </label>
                                            <input type="radio" name="rating" value="2">  <br>
                                            <label> 1 </label>
                                            <input type="radio" name="rating" value="1">  <br>
                                        </form>
                                    </div>

                                    <div>
                                        <br>
                                        <div class = "comment-form">
                                            <span> <img src="/assets/images/comm-icon.png" class = "adnotation-icon" alt ="">  <strong> Write your opinion! </strong> </span>
                                            <textarea rows="4" cols="50" name="comment" class = "comm-box-accordion">
                                                            </textarea>
                                            <button type = "submit" class = "comm-button"> Comment! </button>
                                        </div>

                                        <div>
                                            <div class="grid">
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> Bacovia is the best! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> So deep! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> I love it! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> Poezia mea preferata! </span>
                                                </div>
                                                <div>
                                                    <span> <strong> Aaron Kris: </strong> </span>
                                                    <br>
                                                    <span> Splendid! </span>
                                                </div>
                                                <a href = "#3" class = "no-link"> Load more..  </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<hr class = "hr1">

<div class = "comment-main">
    <h1 class = "comment-title"> <img src = "/assets/images/comm-icon.png" class = "comment-icon" alt =""> Write your opinion! </h1>
    <textarea rows="4" cols="50" name="comment" class = "comment-box">
                </textarea>
    <button type = "submit" class = "comm-button"> Comment! </button>

    <h1 class = "comment-title"> <img src = "/assets/images/comments.png" class = "comment-icon" alt = ""> Comments! </h1>
    <div class = "comment-section">
        <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> Andrew: <span class = "comment-text-box"> Cool! </span> </span>
        <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> Smith: <span class = "comment-text-box"> So deep. </span> </span>
        <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> John: <span class = "comment-text-box"> I really like it! </span> </span>
        <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> William: <span class = "comment-text-box"> Amazing! </span> </span>
        <span> <img src = "/assets/images/person.png" class = "person-icon" alt =""> Drew: <span class = "comment-text-box"> Boring. </span> </span>
        <span> <a href = "#3" class = "no-link"> Load more..  </a> </span>
    </div>
</div>

<div id = "share-container">
    <h1> Share it! </h1>
    <a href = "#1"> <img src = "/assets/images/blogger.png" alt =""> </a>
    <a href = "#2"> <img src = "/assets/images/wordpress.png" alt =""> </a>
    <a href = "#3"> <img src = "/assets/images/medium.png" alt =""> </a>
</div>

</body>

</html>
