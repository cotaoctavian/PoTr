<!DOCTYPE html>
<html lang="ro-RO">
<head>
    <meta charset="utf-8">
    <title> PoTr REST API </title>
</head>
<body>
<article>
    <header>
        <h1 style="font-size:250% !important;">
            PoTr REST API
        </h1>
    </header>
    <section>
        <h2> 1. Descrierea REST API-ului </h2>
        <p> Acest REST API ofera datele dorite de catre utilizator legate de useri, poeme, adnotari, comentarii prin intermediul endpoint-urilor create.</p>
        <h3> Request-urile http stabilite pentru endpoint-uri sunt: </h3>
        <ol>
            <li><em>POST</em></li>
            <li><em>GET</em></li>
            <li><em>DELETE</em></li>
            <li><em>PUT</em></li>
        </ol>

        <p> Request-urile trimise vor trimite raspunsuri doar daca cheia de autorizare este introdusa in header, altfel se va returna o eroare in format json. </p>
        <p> Request-urile de tip <em>GET</em> au nevoie doar de cheia de autorizare. Pentru celelalte request-uri (<em>PUT</em>, <em>POST</em>, <em>DELETE</em>) trebuie introdus si un body de tip json cu informatiile
        specifice fiecarui endpoint.</p>

        <h3> Endpoint-urile disponibile sunt: </h3>
        <ul>
            <li>
                GET:
                <ul>
                    <li>
                        <em>potrapi.lc/annotation</em> - returneaza prin intermediul unui json toate adnotarile tuturor traducerilor.
                    </li>
                    <li>
                        <em>potrapi.lc/author</em> - returneaza prin intermediul unui json toti autorii.
                    </li>
                    <li>
                        <em>potrapi.lc/comments</em> - returneaza prin intermediul unui json toate comentariile poeziilor.
                    </li>
                    <li>
                        <em>potrapi.lc/poems</em> - returneaza prin intermediul unui json toate poeziile in limba romana.
                    </li>
                    <li>
                        <em>potrapi.lc/strofe</em> - returneaza prin intermediul unui json toate strofele traduse.
                    </li>
                    <li>
                        <em>potrapi.lc/user</em> - returneaza prin intermediul unui json datele userilor.
                    </li>
                    <li>
                        <em>potrapi.lc/versecomments</em> - returneaza prin intermediul unui json comentariile traducerilor.
                    </li>
                </ul>
            </li>
            <li> POST:
                <ul>
                    <li> <em>potrapi.lc/annotation/create</em> - creeaza o adnotare noua dupa informatiile introduse in body-ul request-ului. Exemplu body request:
                        <figure typeOf="sa:image">
                            <img src="uploads/create.JPG" alt="POST REQUEST BODY" style="width:25%;">
                        </figure>
                    </li>
                </ul>
            </li>
            <li> DELETE:
                <ul>
                    <li> <em>potrapi.lc/annotation/delete</em> - sterge o adnotare dupa informatiile introduse in body-ul request-ului. Exemplu body request:
                        <figure typeOf="sa:image">
                            <img src="uploads/delete.JPG" alt="DELETE REQUEST BODY" style="width:10%;">
                        </figure>
                    </li>
                </ul>
            </li>
            <li> PUT:
                <ul>
                    <li> <em>potrapi.lc/annotation/update</em> - modifica o adnotare dupa informatiile introduse in body-ul request-ului. Exemplu body request:
                        <figure typeOf="sa:image">
                            <img src="uploads/PUT.JPG" alt="PUT REQUEST BODY" style="width:15%;">
                        </figure>
                    </li>
                </ul>
            </li>
        </ul>

    </section>

</article>
</body>
</html>
