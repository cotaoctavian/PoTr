<!DOCTYPE html>
<html lang="ro-RO">
<head>
    <meta charset="utf-8">
    <title> Documentatie PoTr </title>
</head>
<body>
<article>
    <header>
        <h1 style="font-size:250% !important;">
            PoTr - Poem Translater
        </h1>
        <section typeof=sa:AuthorList>
            <h2 style="font-size:150% !important;">
                Dezvoltat de:
            </h2>
            <ul style="list-style-type : none;">
                <li typeOf="sa:ContributorRole" property="schema:Author">
							<span typeof="schema:Person">
								<span property="schema:name">Băcăoanu Adriana-Bianca</span>
							</span>
                </li>
                <li typeOf="sa:ContributorRole" property="schema:Author">
							<span typeof="schema:Person">
								<span property="schema:name">Coța Ștefan-Octavian</span>
							</span>
                </li>
            </ul>
        </section>
    </header>
    <section>
        <h2> 1. Descrierea aplicației </h2>
        <p> &emsp; &emsp; Poem Translater este o platforma care se ocupa cu traducerea poemelor in diferite limbi.
            Fiecare poem are posibilitatea de a detine una sau mai multe traduceri provenite de la mai multi utilizatori
            care depun timp in aducerea constanta de noi traduceri. Traducerile primesc rating pentru calitatea
            versurilor traduse, iar cele mai bune traduceri vor fi afisate in prezentarea unui poem. In privinta
            celorlalte traduceri va exista posibilitatea de a le vizualiza in subsolul fiecarei strofe alaturi de
            comentariile si adnotarile aferente.</p>
        La accesarea site-ului utilizatorii vor putea vizualiza logo-u si un tabel cu cele mai noi poezii traduse,
        perioada de cand au fost adaugate si numarul de vizualizari acumulate pana in acel moment. </p>
        In poems, utilizatorii pot vizualiza un tabel cu autori si pentru fiecare un tabel cu poeziile disponibile ale
        acestuia. Pentru fiecare poezie utilizatorii pot vizualiza traducerea poeziei, comentariile, adnotarile si
        notele ce au fost adaugate. Daca un utilizator doreste sa adauge o traducere, un comentariu,o adnotare sau sa
        ofere note acesta are nevoie de un cont pe care il poate creea pe pagina de sign_up. Utilizatorii ce au cont
        deja au posibilitatea de a distribui poeme pe diverse platforme de blogging. La crearea contului utilizatorului
        i se va atribui un profil in care isi poate seta o poza si o descriere sugestiva sau isi poate schimba parola.
        Pentru cei ce au deja cont se pot autentifica pe pagina de login. Cei ce si-au uitat parola, o pot reseta pe
        pagina de reset_password.</p>
        In pagina community, utilizatorul poate vizualiza doua topuri, unul cu cei mai activi utilizatori si unul cu
        cele mai comentate poezii.
        <p> &emsp; &emsp; Pentru dezvoltarea aplicației vor fi utilizate: HTML și CSS pentru front-end, PHP pentru
            back-end, MySQL pentru baza de date.
    </section>
    <section>
        <h2> 2. Baza de date a aplicației </h2>
        <figure typeOf="sa:image">
            <img src="assets/uploads/DB.JPG" alt="Diagrama bazei de date" style="width:100%;">
            <figcaption style="text-align: center;">Fig. 1: Diagrama BD</figcaption>
        </figure>
        <p>
            &emsp; &emsp; Pentru a stoca informațiile despre poezii, autori, useri avem nevoie de o baza de date. Baza
            de date contine următoarele tabele:
        </p>
        <ol>
            <li><em>User</em> reține toate informațiile de care este nevoie pentru profilul userilor: username, email,
                profile picture, descriere, etc.
            </li>
            <li><em>Poezie română</em> reține toate informațiile despre poezia în română.</li>
            <li><em>Poezie tradusă</em> reține informațiile despre traducerile introduse de către useri cât și limba în
                care este tradusă.
            </li>
            <li><em>Strofa tradusă</em> reține datele celui care a tradus strofa, strofa în sine, numărul acesteia, cât
                și rating-ul împreună cu vizualizările sale.
            </li>
            <li><em>Autor</em> este o tabelă ce se focusează pe datele autorului.</li>
            <li><em>Comm poezie</em> reține comentariile introduse de către useri pe întreaga poezie.</li>
            <li><em>Comm strofa</em> reține comentariile introduse de către useri pentru o anumită strofă.</li>
            <li><em>Adnotări</em> reține adnotările introduse de către useri pentru o anumită strofă.</li>
            <li><em>Rating</em> reține rating-ul oferit de către user pentru fiecare traducere în parte.</li>
        </ol>
    </section>
    <section>
        <h2>3. Diagrame UseCase </h2>
        <p> Adminul se ocupa de administrarea site-ului, de a asigura traduceri corecte, comentarii fara limbaj
            licentios de care traducatorii pot da dovada. Aceste are dreptul de a sterge comentarii, traduceri si
            adnotari. La fel ca si traducatorii, acesta poate sa traduca si el la randul lui, sa dea share la poeme, sa
            adauge comentarii, adnotari si sa lase un rating la o anumita traducere.
            Traducerile vor fi sortate descrescator dupa rating pentru a asigura tuturor userilor cele mai bune
            traduceri.</p>
        <figure typeOf="sa:image">
            <img src="assets/uploads/tw_admin.png" alt="UseCase Diagram" style="width:100%;">
            <figcaption style="text-align: center;">Fig. 2: Diagrama Use Case a adminului</figcaption>
        </figure>
        <p> Traducatorul, la fel ca si administratorul are dreptul la a adauga traduceri, comentarii, adnotari, share si
            a lasa rating. Acesta poate vizualiza informatii in legatura cu cele mai noi traduceri prin intermediul un
            flux de stiri RSS, de asemenea poate afla informatii despre cei mai activi useri si despre cele mai
            comentate poezii. Traducatorul detine un cont cu care se poate loga la site, iar daca acesta doreste sa-si
            schimbe parola va avea posibilitatea de a face asta din profilul care contine si adaugarea unei poze de
            profil cat si o descriere alaturi de butonul de logout in caz ca doreste sa se deconecteze.</p>
        <figure typeOf="sa:image">
            <img src="assets/uploads/tw_traducator.png" alt="UseCase Diagram" style="width:100%;">
            <figcaption style="text-align: center;">Fig. 3: Diagrama Use Case a traducatorului</figcaption>
        </figure>
        <p> User-ul va putea sa vizualizeze site-ul chiar daca nu detine un cont, dar acesta nu va avea dreptul la
            adaugarea de noi traduceri, comentarii, share sau rating, respectiv tot ce tine de profilul unui utilizator
            care detine un cont, insa va putea sa citeasca poezii, traduceri, comentarii si sa se informeze despre orice
            detalii legate de noile traduceri ale poemelor, despre cei mai activi useri sau cele mai comentate
            poezii.</p>
        <figure typeOf="sa:image">
            <img src="assets/uploads/tw_user.png" alt="UseCase Diagram" style="width:100%;">
            <figcaption style="text-align: center;">Fig. 4: Diagrama Use Case a user-ului</figcaption>
        </figure>
    </section>
    <section>
        <h2>4. Diagrame C4 </h2>
        <figure typeOf="sa:image">
            <img src="assets/uploads/C1-System Software.png" alt="UseCase Diagram">
            <figcaption style="text-align: center;">Fig. 5: Diagrama C1 - Software System</figcaption>
        </figure>
        <figure typeOf="sa:image">
            <img src="assets/uploads/C2-Container.png" alt="UseCase Diagram">
            <figcaption style="text-align: center;">Fig. 6: Diagrama C2 - Container</figcaption>
        </figure>
        <figure typeOf="sa:image">
            <img src="assets/uploads/C3-Component.png" alt="UseCase Diagram">
            <figcaption style="text-align: center;">Fig. 7: Diagrama C3 - Component</figcaption>
        </figure>

        <h2>5. Funcționalitățile aplicației</h2>
        <section>
            <ul>
                <li>signup - posibilitatea unui utilizator de a-și face un cont și de a beneficia de anumite
                    funcționalități
                </li>
                <li>login - posibilitatea de a se conecta la contul sau.</li>
                <li>RSS_tabel_traduceri_noi - posibilitatea utilizatorilor de a vedea cele mai noi traduceri ce vor fi
                    expuse via un flux de știri RSS.
                </li>
                <li>setari - accesul la adaugarea unei descrieri sau poze, modificarea parolei, cat si posibilitatea de
                    a se deconecta.
                </li>
                <li>adaugarePoza - posibilitatea unui utilizator logat de a-și adăuga o poză de profil</li>
                <li>adaugareDescriere - posibilitatea unui utilizator de a-și adăuga o descriere(citat, motto,etc) la
                    profil
                </li>
                <li>resetareParola - posibilitatea unui utilizator logat de a-și schimba parola</li>
                <li>logout - posibilitatea unui utilizator de a se deconecta de la contul său</li>
                <li>tabelUseriActivi - posibilitatea utilizatorilor de a vedea topul cu cei mai activi utilizatori</li>
                <li>celeMaiComentatePoezii - posibilitatea utilzatorilor de a vedea topul cu cele mai comentate poezii
                </li>
                <li>tabelPoezii - afisarea tuturor poeziilor ale poetului selectat</li>
                <li>vizualizarePoezie - posibilitatea de a vedea toate traducerile poeziei selectate, respectiv
                    comentarii, adnotari, cat si distribuirea poeziei pe o platforma cum ar fi WordPress, Medium sau
                    Blogspot
                </li>
                <li>traducereStrofa - posibilitatea de a adăuga o nouă traducere unei strofe de către un utilizator
                    logat
                </li>
                <li>adaugaAdnotare - posibilitatea de a adăuga o adnotare unei strofe de către un utilzator logat</li>
                <li>comentariuStrofa - posibilitatea unui utilizator logat să își exprime părerea în legutură cu o
                    strofă tradusă într-un comentariu
                </li>
                <li>comentariuPoezie - la fel ca funcționalitatea precedentă doar că comentariu este adăugat la întreaga
                    poezie
                </li>
                <li>sharePoem - posibilitatea unui utilizator logat de a distribui un poem pe o platforma de blogging
                </li>
                <li>stergereComentariu - posibiliatea administratorului de a ștege comentarii( considerate neadecvate
                    sau din alte motive) adăugate unor strofe de utilizatori sau intregii poezii
                </li>
                <li>stergereTraducere - posibilitatea administratorului de a șterge anumite traduceri adăugate de
                    utilizatori
                </li>
                <li>stergereAdnotare - posibilitatea administratorului de a șterge anumite adnotari adăugate de
                    utilizatori
                </li>
                <li>vizualizareTraduceri - userii, traducatorii, cat si adminii site-ului pot vizualiza toate
                    traducerile disponibile
                </li>
                <li>vizualizareComentarii - userii, traducatorii si adminii site-ului pot vizualiza comentariile
                    traducerilor cat si comentariile intregii poezii
                </li>
                <li>vizualizareAdnotari - userii, traducatorii si adminii site-ului pot vizualiza comentariile</li>
            </ul>
        </section>

        <section>
            <h2>6. Stadii de dezvoltare ale proiectului</h2>
            <ol>
                <li>Crearea bazei de date;</li>
                <li>Popularea bazei de date (cu poeme și autori în stadiul de început, după care vor fi inserate date la
                    efectuarea operațiilor în aplicație);
                </li>
                <li>
                    Elaborarea modelului:
                    <ul>
                        <li>Realizarea legăturii cu baza de date;</li>
                        <li>Crearea modelelor care se vor ocupa cu interogarea bazei de date.</li>
                        <li>Crearea de controllere prin care apelăm funcțiile implementate în modele și salvarea datelor
                            returnate de către funcțiile din modele în view pentru ca mai târziu să se poată
                            utiliza aceste date în anumite scopuri(listarea autorilor, prezentarea poeziilor,
                            comentariilor, adnotărilor, etc.)
                        </li>
                    </ul>
                </li>
                <li>Verificarea tuturor funcțiilor create pentru a ne asigura că totul este în ordine.</li>
            </ol>
        </section>
        <section>
            <h2> 7. Github </h2>
            <ol>
                <li>  S-a creat un repository privat în care s-a introdus în primă fază partea I a proiectului. </li>
                <li>  S-au creat task-uri in README care s-au bifat imediat ce task-ul a fost efectuat. </li>
                <li>  S-a folosit .gitignore pentru a nu se da push fisierelor nedorite. </li>
                <li>  Am lucrat împreună pe branch-ul master, fiecărei modificari locale i s-a dat commit urmat de push. </li>
                <li>  Fiecare push are un mesaj specific update-ului dat pentru a fi clar ceea ce s-a lucrat si ce contine acel push. </li>
                <li>  Pentru a evita conflictele s-a avut grijă ca la fiecare push sa dam pull înainte, iar merge-urile au fost efectuate manual cu ajutorul IDE-ului (PhpStorm), în cazurile în care a fost nevoie să dăm merge. </li>
                <li>  Pe parcursul semestrului fiecare parte a fost adaugata pe git la timp, iar modificarile aduse asupra codului au fost adaugate frecvent, nu s-a introdus totul deodata.
                </li>
            </ol>

        </section>
        <section>
            <h2>8. Împărțirea task-urilor</h2>
            <ul>
                <li>
                    Bacaoanu Adriana-Bianca se va ocupa de: sign-in, sign-up, logout, reset-password, adaugare_poza,
                    adaugare-bio, tabelul cu cei mai activi utilizatori si tabelul cu cele mai comentate poezii, tabelul
                    cu ultimele traduceri adaugate, tabelul cu poetii si poemele acestora.
                </li>
                <li>
                    Cota Stefan-Octavian se va ocupa de: adaugare_comentarii, adaugare_adnotari, adaugare_rating,
                    adaugare_traducere, share, stergereComentarii, stergereTraduceri.
                </li>
            </ul>
        </section>
        <section>
            <h2>9. Bibliografie</h2>
            <ol>
                <li><a href="https://www.draw.io/"> Draw.io </a></li>
                <li><a href="https://w3c.github.io/scholarly-html/"> Scholarly HTML </a></li>
                <li><a href="https://profs.info.uaic.ro/~adiftene/Scoala/2019/IP/index.html"> Diagrame UML, USE CASE,
                        C4. </a></li>
                <li><a href="https://profs.info.uaic.ro/~andrei.panu/"> Resurse legate de proiect </a></li>
                <li><a href="https://profs.info.uaic.ro/~busaco/teach/courses/web/web-projects.html"> Informare necesare
                        pentru realizarea componentelor cât și a unor funcționalități. </a></li>
                <li><a href="https://developer.wordpress.org/rest-api/"> REST API </a></li>
            </ol>
        </section>
</article>
</body>