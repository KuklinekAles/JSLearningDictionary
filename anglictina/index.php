<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/uikit.min.css">
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <title>Učení slovíček</title>
    <style>
        .hidden {
            display: none;
        }
        .word-form {
            margin: 20px 0;
        }
        .word-form input {
            margin: 10px 0;
        }
        .feedback-correct {
            color: green;
        }
        .feedback-incorrect {
            color: red;
        }
        .stats {
            margin: 15px 0;
            padding: 15px;
            background: #D6D58E;
            border-radius: 10px;
        }
        .pronunciation-btn {
            margin-left: 10px;
        }

        hr {
            color: #005C53 !important;
        }

        h1 {
            color: white;font-weight: bolder;text-align: center;
        }
        .uk-button-primary {
            background-color: #042940 !important;
        }
        .uk-button-default {
            background-color: #D6D58E !important;
            color: #042940 !important;
            border: 1px solid #D6D58E !important ;
        }
        #question {
            color: #005C53 !important;
        }

    /* MODAl */
      .tense-group {
                margin-bottom: 30px;
                padding: 20px;
                border: 1px solid #ddd;
                border-radius: 8px;
            }
            .tense-name {
                color: #DBF227;
              background-color:black;padding:5px;
                font-size: 1.2em;
                margin-bottom: 10px;
            }
            .example {
                color: #4b5563;
                font-style: italic;
                margin: 5px 0;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin: 10px 0;
            }
            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f3f4f6;
            }
    </style>
</head>
<body>
<div class="uk-container uk-container-xsmall" style="border:1px solid gray; background-color: #DBF227">
    <h1 class="uk-text-uppercase uk-margin-medium-top">Procvičování slovíček</h1>
<nav aria-label="Breadcrumb">
    <ul class="uk-breadcrumb">
        <li><a href="../index.php">Výběr jazyků</a></li>
         <li><a href="index.php">Angličtina</a></li>

    </ul>
</nav>
    <div id="add-words" class="hidden word-form">
        <h2>Přidat slovíčka</h2>
        <div class="uk-margin">
            <label class="uk-form-label" for="language">Jazyk:</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" id="language" placeholder="Např. čeština">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="word">Slovo:</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" id="word" placeholder="Např. Cat">
            </div>
        </div>
        <div class="uk-margin">
            <label class="uk-form-label" for="translation">Překlad:</label>
            <div class="uk-form-controls">
                <input class="uk-input" type="text" id="translation" placeholder="Např. Kočka">
            </div>
        </div>
        <button id="add-word-btn" class="uk-button uk-button-primary">Přidat</button>
    </div>

    <div id="practice" class="hidden">
        <div class="uk-text-center">
            <h2>Angličtina</h2>
            <p id="question" class="uk-text-large"></p>
            <button id="pronunciation-btn" class="uk-button uk-button-default pronunciation-btn" uk-icon="icon: play">
                Přehrát výslovnost
            </button>
        </div>

        <div class="uk-margin">
            <input class="uk-input uk-form-width-large" type="text" id="answer" placeholder="Vaše odpověď">
        </div>

        <div class="uk-margin uk-text-center">
            <button id="submit-answer" class="uk-button uk-button-primary">Odpovědět</button>
            <button id="dont-know-btn" class="uk-button uk-button-default">Nevím</button>
        </div>

        <p id="feedback" class="uk-text-center"></p>
        <div id="score" class="stats uk-text-center">
            <p id="score-display">Správně: 0 | Špatně: 0 | Celkem: 0</p>
            <div class="uk-progress">
                <div id="progress-bar" class="uk-progress-bar" style="width: 0%"></div>
            </div>
        </div>
    </div>

    <div class="uk-margin uk-text-center">
        <button id="start-practice" class="uk-button uk-button-primary">Začít procvičovat</button>
        <button id="toggle-add-words" class="uk-button uk-button-default">Přidat nová slovíčka</button>
    </div>

    <footer class="uk-margin-large-top uk-text-center">
        <button uk-toggle="target: #my-id" type="button" class="uk-button uk-button-link">Zobrazit základní gramatiku</button>

        <hr>
        <span class="uk-text-small" style="color:black">2025 COPYLEFT Aleš Kuklínek</span> <br>
        <span  class="uk-text-small" style="color:black" id="count"></span>
<br>
   </footer>
    <br><br><br><br>
</div>


<div id="my-id" uk-modal>
    <div class="uk-modal-dialog uk-modal-body">
        <h2 class="uk-modal-title"></h2>


     <div class="tense-group">
         <h2>Přítomný čas</h2>

         <div class="tense-name">Present Simple (Přítomný prostý čas)</div>
         <p>Použití: pravidelné činnosti, obecné pravdy</p>
         <p class="example">0. I work every day. (Pracuji každý den.)</p>
         <p class="example">1.The sun rises in the east. (Slunce vychází na východě.)</p>
        <p class="example">2. She drinks coffee in the morning. (Pije kávu ráno.)</p>
        <p  class="example">3. They live in London. (Žijí v Londýně.)</p>
        <p  class="example">4. The train leaves at 8 AM. (Vlak odjíždí v 8 hodin.)</p>
        <p class="example">5. He plays tennis on Sundays. (V neděli hraje tenis.)</p>
        <p class="example">6. Water boils at 100 degrees. (Voda se vaří při 100 stupních.)</p>
        <p class="example">7. Dogs bark. (Psi štěkají.)</p>
        <p class="example">8. I study English twice a week. (Studuji angličtinu dvakrát týdně.)</p>
        <p class="example">9. She works as a doctor. (Pracuje jako doktorka.)</p>
        <p class="example">10. The sun sets in the west. (Slunce zapadá na západě.)</p>
         <div class="tense-name">Present Continuous (Přítomný průběhový čas)</div>
         <p>Použití: právě probíhající děje</p>
       <p class="example">1. I am working now. (Právě teď pracuji.)</p>
             <p class="example">2. She is reading a book at the moment. (Momentálně čte knihu.)</p>
             <p class="example"> 3. They are playing football in the garden. (Hrají fotbal na zahradě.)</p>
             <p  class="example">4. It is raining outside. (Venku prší.)</p>
             <p class="example">5. We are learning English this year. (Tento rok se učíme angličtinu.)</p>
             <p class="example">6. He is writing an email to his boss. (Píše email svému šéfovi.)</p>
             <p class="example">7. The children are sleeping upstairs. (Děti spí nahoře.)</p>
             <p class="example">8. I am living with my parents temporarily. (Dočasně bydlím u rodičů.)</p>
             <p class="example">9. They are building a new house. (Staví nový dům.)</p>
             <p class="example">10. She is preparing dinner in the kitchen. (Připravuje večeři v kuchyni.)</p>
         </ol>

         <div class="tense-name">Present Perfect (Předpřítomný čas)</div>
         <p>Použití: děje s vazbou na přítomnost</p>
          <p class="example">1. I have worked here for 5 years. (Pracuji zde 5 let.)</p>
                <p class="example">2. She has visited Paris three times. (Navštívila Paříž třikrát.)</p>
                <p class="example">3. They have just arrived home. (Právě přišli domů.)</p>
                <p class="example">4. I have never seen snow. (Nikdy jsem neviděl sníh.)</p>
                <p class="example">5. He has broken his leg. (Zlomil si nohu.)</p>
                <p class="example">6. We have known each other since childhood. (Známe se od dětství.)</p>
                <p class="example">7. She has already finished her homework. (Už dokončila svůj domácí úkol.)</p>
                <p class="example">8. They have lived in many countries. (Žili v mnoha zemích.)</p>
                <p class="example">9. I have lost my keys. (Ztratil jsem klíče.)</p>
                <p class="example">10. The train has left the station. (Vlak odjel ze stanice.)</p>

         <div class="tense-name">Present Perfect Continuous</div>
         <p>Použití: děje trvající do přítomnosti</p>
          <p class="example">1. I have been working all day. (Pracuji celý den.)</p>
                <p class="example">2. It has been raining since morning. (Prší od rána.)</p>
                <p class="example">3. They have been studying for three hours. (Učí se už tři hodiny.)</p>
                <p class="example">4. She has been living here since 2010. (Žije zde od roku 2010.)</p>
                <p class="example">5. We have been waiting for an hour. (Čekáme už hodinu.)</p>
                <p class="example">6. He has been playing tennis for ten years. (Hraje tenis už deset let.)</p>
                <p class="example">7. I have been learning English since January. (Učím se angličtinu od ledna.)</p>
                <p class="example">8. They have been building this house for months. (Staví tento dům už měsíce.)</p>
                <p class="example">9. She has been cooking all afternoon. (Vaří celé odpoledne.)</p>
                <p class="example">10. We have been traveling around Europe. (Cestujeme po Evropě.)</p>
     </div>

     <div class="tense-group">
         <h2>Minulé časy</h2>

         <div class="tense-name">Past Simple (Minulý prostý čas)</div>
         <p>Použití: ukončené děje v minulosti</p>
         <p class="example">1. I worked yesterday. (Včera jsem pracoval.)</p>
               <p class="example">2. She visited her grandmother last week. (Minulý týden navštívila svou babičku.)</p>
               <p class="example">3. They went to Paris last summer. (Minulé léto jeli do Paříže.)</p>
               <p class="example">4. He bought a new car. (Koupil nové auto.)</p>
               <p class="example">5. We saw a movie last night. (Včera večer jsme viděli film.)</p>
               <p class="example">6. The train arrived late. (Vlak přijel pozdě.)</p>
               <p class="example">7. I studied English at school. (Studoval jsem angličtinu ve škole.)</p>
               <p class="example">8. She wrote a letter to her friend. (Napsala dopis své kamarádce.)</p>
               <p class="example">9. They lived in London for ten years. (Žili v Londýně deset let.)</p>
               <p class="example">10. He played tennis when he was young. (Hrál tenis, když byl mladý.)</p>

         <div class="tense-name">Past Continuous (Minulý průběhový čas)</div>
         <p>Použití: děje probíhající v určitém momentě v minulosti</p>
  <p class="example">1. I was working at 6 PM yesterday. (Včera v 6 hodin jsem pracoval.)</p>
        <p class="example">2. She was reading when I called. (Četla, když jsem zavolal.)</p>
        <p class="example">3. They were playing football all afternoon. (Celé odpoledne hráli fotbal.)</p>
        <p class="example">4. It was raining when we left. (Když jsme odcházeli, pršelo.)</p>
        <p class="example">5. We were sleeping when the phone rang. (Spali jsme, když zazvonil telefon.)</p>
        <p class="example">6. He was studying while his sister was cooking. (Učil se, zatímco jeho sestra vařila.)</p>
        <p class="example">7. The children were playing in the garden. (Děti si hrály na zahradě.)</p>
        <p class="example">8. I was walking home when I met him. (Šel jsem domů, když jsem ho potkal.)</p>
        <p class="example">9. They were watching TV at that time. (V tu dobu se dívali na televizi.)</p>
        <p class="example">10. She was working on her project all night. (Celou noc pracovala na svém projektu.)</p>
         <div class="tense-name">Past Perfect (Předminulý čas)</div>
         <p>Použití: děj, který předcházel jinému ději v minulosti</p>
         <p class="example">I had worked before he came. (Pracoval jsem předtím, než přišel.)</p>

         <div class="tense-name">Past Perfect Continuous</div>
         <p>Použití: děj trvající do určitého momentu v minulosti</p>
         <p class="example">I had been working for 3 hours when he arrived. (Pracoval jsem 3 hodiny, když přišel.)</p>
     </div>

     <div class="tense-group">
         <h2>Budoucí časy</h2>

         <div class="tense-name">Future Simple (will)</div>
         <p>Použití: budoucí děje, spontánní rozhodnutí</p>
         <p class="example">I will work tomorrow. (Zítra budu pracovat.)</p>

         <div class="tense-name">Going to</div>
         <p>Použití: plánované děje v budoucnosti</p>
         <p class="example">I am going to work tomorrow. (Zítra budu pracovat.)</p>

         <div class="tense-name">Future Continuous</div>
         <p>Použití: děje probíhající v určitém momentě v budoucnosti</p>
         <p class="example">I will be working at 6 PM tomorrow. (Zítra v 6 hodin budu pracovat.)</p>

         <div class="tense-name">Future Perfect</div>
         <p>Použití: děje dokončené do určitého momentu v budoucnosti</p>
         <p class="example">I will have worked here for 6 years by next June. (Příští červen to bude 6 let, co zde pracuji.)</p>
     </div>
    </div>
</div>


<script>
    const words = [
        { language: 'čeština', word: 'Doctor', translation: 'Lékař' },
        { language: 'čeština', word: 'Nurse', translation: 'Zdravotní sestra' },
        { language: 'čeština', word: 'Teacher', translation: 'Učitel' },
        { language: 'čeština', word: 'Professor', translation: 'Profesor' },
        { language: 'čeština', word: 'Engineer', translation: 'Inženýr' },
        { language: 'čeština', word: 'Lawyer', translation: 'Právník' },
        { language: 'čeština', word: 'Architect', translation: 'Architekt' },
        { language: 'čeština', word: 'Police Officer', translation: 'Policista' },
        { language: 'čeština', word: 'Firefighter', translation: 'Hasič' },
        { language: 'čeština', word: 'Chef', translation: 'Kuchař' },
        { language: 'čeština', word: 'Waiter', translation: 'Číšník' },
        { language: 'čeština', word: 'Waitress', translation: 'Servírka' },
        { language: 'čeština', word: 'Pilot', translation: 'Pilot' },
        { language: 'čeština', word: 'Flight Attendant', translation: 'Letuška' },
        { language: 'čeština', word: 'Driver', translation: 'Řidič' },
        { language: 'čeština', word: 'Artist', translation: 'Umělec' },
        { language: 'čeština', word: 'Actor', translation: 'Herec' },
        { language: 'čeština', word: 'Actress', translation: 'Herečka' },
        { language: 'čeština', word: 'Musician', translation: 'Hudebník' },
        { language: 'čeština', word: 'Singer', translation: 'Zpěvák' },
        { language: 'čeština', word: 'Dancer', translation: 'Tanečník' },
        { language: 'čeština', word: 'Writer', translation: 'Spisovatel' },
        { language: 'čeština', word: 'Journalist', translation: 'Novinář' },
        { language: 'čeština', word: 'Photographer', translation: 'Fotograf' },
        { language: 'čeština', word: 'Designer', translation: 'Návrhář' },
        { language: 'čeština', word: 'Programmer', translation: 'Programátor' },
        { language: 'čeština', word: 'Developer', translation: 'Vývojář' },
        { language: 'čeština', word: 'Accountant', translation: 'Účetní' },
        { language: 'čeština', word: 'Manager', translation: 'Manažer' },
        { language: 'čeština', word: 'CEO', translation: 'Generální ředitel' },
        { language: 'čeština', word: 'Secretary', translation: 'Sekretářka' },
        { language: 'čeština', word: 'Receptionist', translation: 'Recepční' },
        { language: 'čeština', word: 'Salesperson', translation: 'Prodavač' },
        { language: 'čeština', word: 'Cashier', translation: 'Pokladní' },
        { language: 'čeština', word: 'Mechanic', translation: 'Mechanik' },
        { language: 'čeština', word: 'Electrician', translation: 'Elektrikář' },
        { language: 'čeština', word: 'Plumber', translation: 'Instalatér' },
        { language: 'čeština', word: 'Carpenter', translation: 'Truhlář' },
        { language: 'čeština', word: 'Construction Worker', translation: 'Stavební dělník' },
        { language: 'čeština', word: 'Farmer', translation: 'Farmář' },
        { language: 'čeština', word: 'Gardener', translation: 'Zahradník' },
        { language: 'čeština', word: 'Veterinarian', translation: 'Veterinář' },
        { language: 'čeština', word: 'Dentist', translation: 'Zubař' },
        { language: 'čeština', word: 'Pharmacist', translation: 'Lékárník' },
        { language: 'čeština', word: 'Psychologist', translation: 'Psycholog' },
        { language: 'čeština', word: 'Therapist', translation: 'Terapeut' },
        { language: 'čeština', word: 'Scientist', translation: 'Vědec' },
        { language: 'čeština', word: 'Researcher', translation: 'Výzkumník' },
        { language: 'čeština', word: 'Biologist', translation: 'Biolog' },
        { language: 'čeština', word: 'Chemist', translation: 'Chemik' },
        { language: 'čeština', word: 'Physicist', translation: 'Fyzik' },
        { language: 'čeština', word: 'Mathematician', translation: 'Matematik' },
        { language: 'čeština', word: 'Astronomer', translation: 'Astronom' },
        { language: 'čeština', word: 'Geologist', translation: 'Geolog' },
        { language: 'čeština', word: 'Archaeologist', translation: 'Archeolog' },
        { language: 'čeština', word: 'Historian', translation: 'Historik' },
        { language: 'čeština', word: 'Anthropologist', translation: 'Antropolog' },
        { language: 'čeština', word: 'Sociologist', translation: 'Sociolog' },
        { language: 'čeština', word: 'Economist', translation: 'Ekonom' },
        { language: 'čeština', word: 'Financial Analyst', translation: 'Finanční analytik' },
        { language: 'čeština', word: 'Investment Banker', translation: 'Investiční bankéř' },
        { language: 'čeština', word: 'Insurance Agent', translation: 'Pojišťovací agent' },
        { language: 'čeština', word: 'Real Estate Agent', translation: 'Realitní makléř' },
        { language: 'čeština', word: 'Travel Agent', translation: 'Cestovní agent' },
        { language: 'čeština', word: 'Tour Guide', translation: 'Průvodce' },
        { language: 'čeština', word: 'Translator', translation: 'Překladatel' },
        { language: 'čeština', word: 'Interpreter', translation: 'Tlumočník' },
        { language: 'čeština', word: 'Editor', translation: 'Editor' },
        { language: 'čeština', word: 'Publisher', translation: 'Vydavatel' },
        { language: 'čeština', word: 'Librarian', translation: 'Knihovník' },
        { language: 'čeština', word: 'Curator', translation: 'Kurátor' },
        { language: 'čeština', word: 'Museum Director', translation: 'Ředitel muzea' },
        { language: 'čeština', word: 'Gallery Owner', translation: 'Majitel galerie' },
        { language: 'čeština', word: 'Art Dealer', translation: 'Obchodník s uměním' },
        { language: 'čeština', word: 'Film Director', translation: 'Filmový režisér' },
        { language: 'čeština', word: 'Producer', translation: 'Producent' },
        { language: 'čeština', word: 'Screenwriter', translation: 'Scenárista' },
        { language: 'čeština', word: 'Cinematographer', translation: 'Kameraman' },
        { language: 'čeština', word: 'Film Editor', translation: 'Střihač' },
        { language: 'čeština', word: 'Sound Engineer', translation: 'Zvukař' },
        { language: 'čeština', word: 'Lighting Technician', translation: 'Osvětlovač' },
        { language: 'čeština', word: 'Makeup Artist', translation: 'Maskér' },
        { language: 'čeština', word: 'Costume Designer', translation: 'Kostýmní výtvarník' },
        { language: 'čeština', word: 'Set Designer', translation: 'Scénograf' },
        { language: 'čeština', word: 'Stunt Person', translation: 'Kaskadér' },
        { language: 'čeština', word: 'Theatre Director', translation: 'Divadelní režisér' },
        { language: 'čeština', word: 'Choreographer', translation: 'Choreograf' },
        { language: 'čeština', word: 'Conductor', translation: 'Dirigent' },
        { language: 'čeština', word: 'Composer', translation: 'Skladatel' },
        { language: 'čeština', word: 'Radio Host', translation: 'Moderátor rádia' },
        { language: 'čeština', word: 'TV Presenter', translation: 'Televizní moderátor' },
        { language: 'čeština', word: 'News Anchor', translation: 'Zpravodaj' },
        { language: 'čeština', word: 'Sports Commentator', translation: 'Sportovní komentátor' },
        { language: 'čeština', word: 'Weather Forecaster', translation: 'Meteorolog' },
        { language: 'čeština', word: 'Coach', translation: 'Trenér' },
        { language: 'čeština', word: 'Personal Trainer', translation: 'Osobní trenér' },
        { language: 'čeština', word: 'Athletic Trainer', translation: 'Sportovní trenér' },
        { language: 'čeština', word: 'Sports Agent', translation: 'Sportovní agent' },
        { language: 'čeština', word: 'Professional Athlete', translation: 'Profesionální sportovec' },
        { language: 'čeština', word: 'Referee', translation: 'Rozhodčí' },
        { language: 'čeština', word: 'Judge', translation: 'Soudce' },
        { language: 'čeština', word: 'Prosecutor', translation: 'Státní zástupce' },
        { language: 'čeština', word: 'Defense Attorney', translation: 'Obhájce' },
        { language: 'čeština', word: 'Paralegal', translation: 'Právní asistent' },
        { language: 'čeština', word: 'Court Reporter', translation: 'Soudní zapisovatel' },
        { language: 'čeština', word: 'Bailiff', translation: 'Soudní vykonavatel' },
        { language: 'čeština', word: 'Detective', translation: 'Detektiv' },
        { language: 'čeština', word: 'Private Investigator', translation: 'Soukromý detektiv' },
        { language: 'čeština', word: 'Security Guard', translation: 'Bezpečnostní pracovník' },
        { language: 'čeština', word: 'Military Officer', translation: 'Vojenský důstojník' },
        { language: 'čeština', word: 'Soldier', translation: 'Voják' },
        { language: 'čeština', word: 'Paramedic', translation: 'Záchranář' },
        { language: 'čeština', word: 'Emergency Medical Technician', translation: 'Zdravotnický záchranář' },
        { language: 'čeština', word: 'Surgeon', translation: 'Chirurg' },
        { language: 'čeština', word: 'Anesthesiologist', translation: 'Anesteziolog' },
        { language: 'čeština', word: 'Radiologist', translation: 'Radiolog' },
        { language: 'čeština', word: 'Pediatrician', translation: 'Pediatr' },
        { language: 'čeština', word: 'Cardiologist', translation: 'Kardiolog' },
        { language: 'čeština', word: 'Neurologist', translation: 'Neurolog' },
        { language: 'čeština', word: 'Psychiatrist', translation: 'Psychiatr' },
        { language: 'čeština', word: 'Optometrist', translation: 'Optometrista' },
        { language: 'čeština', word: 'Physical Therapist', translation: 'Fyzioterapeut' },
        { language: 'čeština', word: 'Occupational Therapist', translation: 'Ergoterapeut' },
        { language: 'čeština', word: 'Speech Therapist', translation: 'Logoped' },
        { language: 'čeština', word: 'Nutritionist', translation: 'Nutriční specialista' },
        { language: 'čeština', word: 'Dietitian', translation: 'Dietolog' },
        { language: 'čeština', word: 'Massage Therapist', translation: 'Masér' },
        { language: 'čeština', word: 'Apple', translation: 'Jablko' },
        { language: 'čeština', word: 'Banana', translation: 'Banán' },
        { language: 'čeština', word: 'Orange', translation: 'Pomeranč' },
        { language: 'čeština', word: 'Grapes', translation: 'Hrozny' },
        { language: 'čeština', word: 'Strawberry', translation: 'Jahoda' },
        { language: 'čeština', word: 'Cherry', translation: 'Třešeň' },
        { language: 'čeština', word: 'Lemon', translation: 'Citron' },
        { language: 'čeština', word: 'Potato', translation: 'Brambora' },
        { language: 'čeština', word: 'Tomato', translation: 'Rajče' },
        { language: 'čeština', word: 'Carrot', translation: 'Mrkev' },
        { language: 'čeština', word: 'Cucumber', translation: 'Okurka' },
        { language: 'čeština', word: 'Pepper', translation: 'Paprika' },
        { language: 'čeština', word: 'Onion', translation: 'Cibule' },
        { language: 'čeština', word: 'Garlic', translation: 'Česnek' },
        { language: 'čeština', word: 'Milk', translation: 'Mléko' },
        { language: 'čeština', word: 'Butter', translation: 'Máslo' },
        { language: 'čeština', word: 'Cheese', translation: 'Sýr' },
        { language: 'čeština', word: 'Bread', translation: 'Chléb' },
        { language: 'čeština', word: 'Rice', translation: 'Rýže' },
        { language: 'čeština', word: 'Pasta', translation: 'Těstoviny' },
        { language: 'čeština', word: 'Chicken', translation: 'Kuře' },
        { language: 'čeština', word: 'Beef', translation: 'Hovězí' },
        { language: 'čeština', word: 'Pork', translation: 'Vepřové' },
        { language: 'čeština', word: 'Fish', translation: 'Ryba' },
        { language: 'čeština', word: 'Egg', translation: 'Vejce' },
        { language: 'čeština', word: 'Coffee', translation: 'Káva' },
        { language: 'čeština', word: 'Tea', translation: 'Čaj' },
        { language: 'čeština', word: 'Juice', translation: 'Džus' },
        { language: 'čeština', word: 'Water', translation: 'Voda' },
        { language: 'čeština', word: 'Wine', translation: 'Víno' },
        { language: 'čeština', word: 'Beer', translation: 'Pivo' },
        { language: 'čeština', word: 'Cake', translation: 'Dort' },
        { language: 'čeština', word: 'Cookie', translation: 'Sušenka' },
        { language: 'čeština', word: 'Chocolate', translation: 'Čokoláda' },
        { language: 'čeština', word: 'Candy', translation: 'Bonbón' },
        { language: 'čeština', word: 'Ice cream', translation: 'Zmrzlina' },
        { language: 'čeština', word: 'Salt', translation: 'Sůl' },
        { language: 'čeština', word: 'Pepper', translation: 'Pepř' },
        { language: 'čeština', word: 'Oil', translation: 'Olej' },
        { language: 'čeština', word: 'Vinegar', translation: 'Ocet' },
        { language: 'čeština', word: 'Soup', translation: 'Polévka' },
        { language: 'čeština', word: 'Salad', translation: 'Salát' },
        { language: 'čeština', word: 'Car', translation: 'Auto' },
        { language: 'čeština', word: 'Bicycle', translation: 'Kolo' },
        { language: 'čeština', word: 'Train', translation: 'Vlak' },
        { language: 'čeština', word: 'Airplane', translation: 'Letadlo' },
        { language: 'čeština', word: 'Boat', translation: 'Loď' },
        { language: 'čeština', word: 'Bus', translation: 'Autobus' },
        { language: 'čeština', word: 'Truck', translation: 'Kamion' },
        { language: 'čeština', word: 'Motorcycle', translation: 'Motorka' },
        { language: 'čeština', word: 'Taxi', translation: 'Taxi' },
        { language: 'čeština', word: 'House', translation: 'Dům' },
        { language: 'čeština', word: 'Apartment', translation: 'Byt' },
        { language: 'čeština', word: 'Room', translation: 'Pokoj' },
        { language: 'čeština', word: 'Kitchen', translation: 'Kuchyň' },
        { language: 'čeština', word: 'Bathroom', translation: 'Koupelna' },
        { language: 'čeština', word: 'Bed', translation: 'Postel' },
        { language: 'čeština', word: 'Pillow', translation: 'Polštář' },
        { language: 'čeština', word: 'Blanket', translation: 'Deka' },
        { language: 'čeština', word: 'Chair', translation: 'Židle' },
        { language: 'čeština', word: 'Table', translation: 'Stůl' },
        { language: 'čeština', word: 'Window', translation: 'Okno' },
        { language: 'čeština', word: 'Door', translation: 'Dveře' },
        { language: 'čeština', word: 'Wall', translation: 'Zeď' },
        { language: 'čeština', word: 'Roof', translation: 'Střecha' },
        { language: 'čeština', word: 'Floor', translation: 'Podlaha' },
        { language: 'čeština', word: 'Garden', translation: 'Zahrada' },
        { language: 'čeština', word: 'Tree', translation: 'Strom' },
        { language: 'čeština', word: 'Flower', translation: 'Květina' },
        { language: 'čeština', word: 'Grass', translation: 'Tráva' },
        { language: 'čeština', word: 'Sky', translation: 'Nebe' },
        { language: 'čeština', word: 'Sun', translation: 'Slunce' },
        { language: 'čeština', word: 'Moon', translation: 'Měsíc' },
        { language: 'čeština', word: 'Star', translation: 'Hvězda' },
        { language: 'čeština', word: 'Cloud', translation: 'Mrak' },
        { language: 'čeština', word: 'Rain', translation: 'Déšť' },
        { language: 'čeština', word: 'Snow', translation: 'Sníh' },
        { language: 'čeština', word: 'Wind', translation: 'Vítr' },
        { language: 'čeština', word: 'Thunder', translation: 'Hrom' },
        { language: 'čeština', word: 'Lightning', translation: 'Blesk' },
        { language: 'čeština', word: 'Mountain', translation: 'Hora' },
        { language: 'čeština', word: 'River', translation: 'Řeka' },
        { language: 'čeština', word: 'Lake', translation: 'Jezero' },
        { language: 'čeština', word: 'Ocean', translation: 'Oceán' },
        { language: 'čeština', word: 'Beach', translation: 'Pláž' },
        { language: 'čeština', word: 'Forest', translation: 'Les' },
        { language: 'čeština', word: 'Desert', translation: 'Poušť' },
        { language: 'čeština', word: 'Hill', translation: 'Kopec' },
        { language: 'čeština', word: 'Valley', translation: 'Údolí' },
        { language: 'čeština', word: 'Rock', translation: 'Skála' },
        { language: 'čeština', word: 'Sand', translation: 'Písek' },
        { language: 'čeština', word: 'Animal', translation: 'Zvíře' },
        { language: 'čeština', word: 'Dog', translation: 'Pes' },
        { language: 'čeština', word: 'Bird', translation: 'Pták' },
        { language: 'čeština', word: 'Fish', translation: 'Ryba' },
        { language: 'čeština', word: 'Horse', translation: 'Kůň' },
        { language: 'čeština', word: 'Cow', translation: 'Kráva' },
        { language: 'čeština', word: 'Pig', translation: 'Prase' },
        { language: 'čeština', word: 'Sheep', translation: 'Ovce' },
        { language: 'čeština', word: 'Goat', translation: 'Koza' },
        { language: 'čeština', word: 'Lion', translation: 'Lev' },
        { language: 'čeština', word: 'Tiger', translation: 'Tygr' },
        { language: 'čeština', word: 'Elephant', translation: 'Slon' },
        { language: 'čeština', word: 'Monkey', translation: 'Opice' },
        { language: 'čeština', word: 'Bear', translation: 'Medvěd' },
        { language: 'čeština', word: 'Rabbit', translation: 'Králík' },
        { language: 'čeština', word: 'Wolf', translation: 'Vlk' },
        { language: 'čeština', word: 'Fox', translation: 'Liška' },
        { language: 'čeština', word: 'Deer', translation: 'Jelen' },
        { language: 'čeština', word: 'Bee', translation: 'Včela' },
        { language: 'čeština', word: 'Butterfly', translation: 'Motýl' },
        { language: 'čeština', word: 'Ant', translation: 'Mravenec' },
        { language: 'čeština', word: 'Spider', translation: 'Pavouk' },
        { language: 'čeština', word: 'Snake', translation: 'Had' },
        { language: 'čeština', word: 'Frog', translation: 'Žába' },
        { language: 'čeština', word: 'Turtle', translation: 'Želva' },
        { language: 'čeština', word: 'Crocodile', translation: 'Krokodýl' },
        { language: 'čeština', word: 'Penguin', translation: 'Tučňák' },
        { language: 'čeština', word: 'Polar bear', translation: 'Lední medvěd' },
        { language: 'čeština', word: 'Dolphin', translation: 'Delfín' },
        { language: 'čeština', word: 'Shark', translation: 'Žralok' },
        { language: 'čeština', word: 'Whale', translation: 'Velryba' },
        { language: 'čeština', word: 'Octopus', translation: 'Chobotnice' },
        { language: 'čeština', word: 'Crab', translation: 'Krab' },
        { language: 'čeština', word: 'Lobster', translation: 'Humr' },
        { language: 'čeština', word: 'Seagull', translation: 'Racek' },
        { language: 'čeština', word: 'Eagle', translation: 'Orel' },
        { language: 'čeština', word: 'Parrot', translation: 'Papoušek' },
        { language: 'čeština', word: 'Owl', translation: 'Sova' },
        { language: 'čeština', word: 'Peacock', translation: 'Páv' },
        { language: 'čeština', word: 'Chicken', translation: 'Kuře' },
        { language: 'čeština', word: 'Duck', translation: 'Kachna' },
        { language: 'čeština', word: 'Goose', translation: 'Husa' },
        { language: 'čeština', word: 'Turkey', translation: 'Krůta' },
        { language: 'čeština', word: 'Bat', translation: 'Netopýr' },
        { language: 'čeština', word: 'Ladybug', translation: 'Beruška' },
        { language: 'čeština', word: 'Mosquito', translation: 'Komár' },
        { language: 'čeština', word: 'Fly', translation: 'Moucha' },
        { language: 'čeština', word: 'Horsefly', translation: 'Ovád' },
        { language: 'čeština', word: 'Wasp', translation: 'Vosa' },
        { language: 'čeština', word: 'Hornet', translation: 'Sršeň' },
        { language: 'čeština', word: 'Beehive', translation: 'Úl' },
        { language: 'čeština', word: 'Nest', translation: 'Hnízdo' },
        { language: 'čeština', word: 'Cliff', translation: 'Útes' },
        { language: 'čeština', word: 'Island', translation: 'Ostrov' },
        { language: 'čeština', word: 'Peninsula', translation: 'Poloostrov' },
        { language: 'čeština', word: 'Waterfall', translation: 'Vodopád' },
        { language: 'čeština', word: 'Cave', translation: 'Jeskyně' },
        { language: 'čeština', word: 'Volcano', translation: 'Sopka' },
        { language: 'čeština', word: 'Glacier', translation: 'Ledovec' },
        { language: 'čeština', word: 'Plain', translation: 'Rovina' },
        { language: 'čeština', word: 'Jungle', translation: 'Džungle' },
        { language: 'čeština', word: 'Savannah', translation: 'Savana' },
        { language: 'čeština', word: 'Steppe', translation: 'Step' },
        { language: 'čeština', word: 'Meadow', translation: 'Louka' },
        { language: 'čeština', word: 'Pond', translation: 'Rybník' },
        { language: 'čeština', word: 'Coral', translation: 'Korál' },
        { language: 'čeština', word: 'Reef', translation: 'Útes' },
        { language: 'čeština', word: 'Earth', translation: 'Země' },
        { language: 'čeština', word: 'Moon', translation: 'Měsíc' },
        { language: 'čeština', word: 'Sun', translation: 'Slunce' },
        { language: 'čeština', word: 'Star', translation: 'Hvězda' },
        { language: 'čeština', word: 'Planet', translation: 'Planeta' },
        { language: 'čeština', word: 'Galaxy', translation: 'Galaxie' },
        { language: 'čeština', word: 'Universe', translation: 'Vesmír' },
        { language: 'čeština', word: 'Comet', translation: 'Kometa' },
        { language: 'čeština', word: 'Asteroid', translation: 'Asteroid' },
        { language: 'čeština', word: 'Meteor', translation: 'Meteorit' },
        { language: 'čeština', word: 'Orbit', translation: 'Oběžná dráha' },
        { language: 'čeština', word: 'Space', translation: 'Vesmír' },
        { language: 'čeština', word: 'Rocket', translation: 'Raketa' },
        { language: 'čeština', word: 'Astronaut', translation: 'Astronaut' },
        { language: 'čeština', word: 'Satellite', translation: 'Satelit' },
        { language: 'čeština', word: 'Telescope', translation: 'Dalekohled' },
        { language: 'čeština', word: 'Gravity', translation: 'Gravitace' },
        { language: 'čeština', word: 'Light', translation: 'Světlo' },
        { language: 'čeština', word: 'Darkness', translation: 'Temnota' },
        { language: 'čeština', word: 'Shadow', translation: 'Stín' },
        { language: 'čeština', word: 'Mirror', translation: 'Zrcadlo' },
        { language: 'čeština', word: 'Glass', translation: 'Sklo' },
        { language: 'čeština', word: 'Metal', translation: 'Kov' },
        { language: 'čeština', word: 'Plastic', translation: 'Plast' },
        { language: 'čeština', word: 'Wood', translation: 'Dřevo' },
        { language: 'čeština', word: 'Stone', translation: 'Kámen' },
        { language: 'čeština', word: 'Brick', translation: 'Cihla' },
        { language: 'čeština', word: 'Concrete', translation: 'Beton' },
        { language: 'čeština', word: 'Clay', translation: 'Hlína' },
        { language: 'čeština', word: 'Ceramic', translation: 'Keramika' },
        { language: 'čeština', word: 'Paper', translation: 'Papír' },
        { language: 'čeština', word: 'Cardboard', translation: 'Kartón' },
        { language: 'čeština', word: 'Cotton', translation: 'Bavlna' },
        { language: 'čeština', word: 'Wool', translation: 'Vlna' },
        { language: 'čeština', word: 'Silk', translation: 'Hedvábí' },
        { language: 'čeština', word: 'Leather', translation: 'Kůže' },
        { language: 'čeština', word: 'Fabric', translation: 'Tkanina' },
        { language: 'čeština', word: 'Thread', translation: 'Nit' },
        { language: 'čeština', word: 'Needle', translation: 'Jehla' },
        { language: 'čeština', word: 'Scissors', translation: 'Nůžky' },
        { language: 'čeština', word: 'Knife', translation: 'Nůž' },
        { language: 'čeština', word: 'Fork', translation: 'Vidlička' },
        { language: 'čeština', word: 'Spoon', translation: 'Lžíce' },
        { language: 'čeština', word: 'Plate', translation: 'Talíř' },
        { language: 'čeština', word: 'Bowl', translation: 'Miska' },
        { language: 'čeština', word: 'Cup', translation: 'Hrnek' },
        { language: 'čeština', word: 'Glass', translation: 'Sklenice' },
        { language: 'čeština', word: 'Bottle', translation: 'Láhev' },
        { language: 'čeština', word: 'Jar', translation: 'Sklenice' },
        { language: 'čeština', word: 'Can', translation: 'Plecho' },
        { language: 'čeština', word: 'Pan', translation: 'Pánev' },
        { language: 'čeština', word: 'Pot', translation: 'Hrnec' },
        { language: 'čeština', word: 'Oven', translation: 'Trouba' },
        { language: 'čeština', word: 'Fridge', translation: 'Lednička' },
        { language: 'čeština', word: 'Freezer', translation: 'Mrazák' },
        { language: 'čeština', word: 'Microwave', translation: 'Mikrovlnka' },
        { language: 'čeština', word: 'Toaster', translation: 'Touster' },
        { language: 'čeština', word: 'Blender', translation: 'Mixér' },
        { language: 'čeština', word: 'Kettle', translation: 'Konvice' },
        { language: 'čeština', word: 'Dishwasher', translation: 'Myčka' },
        { language: 'čeština', word: 'Sink', translation: 'Dřez' },
        { language: 'čeština', word: 'Faucet', translation: 'Kohoutek' },
        { language: 'čeština', word: 'Soap', translation: 'Mýdlo' },
        { language: 'čeština', word: 'Shampoo', translation: 'Šampon' },
        { language: 'čeština', word: 'Towel', translation: 'Ručník' },
        { language: 'čeština', word: 'Toothbrush', translation: 'Kartáček na zuby' },
        { language: 'čeština', word: 'Toothpaste', translation: 'Zubní pasta' },
        { language: 'čeština', word: 'Comb', translation: 'Hřeben' },
        { language: 'čeština', word: 'Mirror', translation: 'Zrcadlo' },
        { language: 'čeština', word: 'Razor', translation: 'Břitva' },
        { language: 'čeština', word: 'Scissors', translation: 'Nůžky' },
        { language: 'čeština', word: 'Chair', translation: 'Židle' },
        { language: 'čeština', word: 'Table', translation: 'Stůl' },
        { language: 'čeština', word: 'Desk', translation: 'Psací stůl' },
        { language: 'čeština', word: 'Sofa', translation: 'Pohovka' },
        { language: 'čeština', word: 'Bed', translation: 'Postel' },
        { language: 'čeština', word: 'Wardrobe', translation: 'Skříň' },
        { language: 'čeština', word: 'Drawer', translation: 'Zásuvka' },
        { language: 'čeština', word: 'Lamp', translation: 'Lampa' },
        { language: 'čeština', word: 'Light', translation: 'Světlo' },
        { language: 'čeština', word: 'Curtain', translation: 'Závěs' },
        { language: 'čeština', word: 'Carpet', translation: 'Koberec' },
        { language: 'čeština', word: 'Floor', translation: 'Podlaha' },
        { language: 'čeština', word: 'Wall', translation: 'Zeď' },
        { language: 'čeština', word: 'Ceiling', translation: 'Strop' },
        { language: 'čeština', word: 'Window', translation: 'Okno' },
        { language: 'čeština', word: 'Door', translation: 'Dveře' },
        { language: 'čeština', word: 'Key', translation: 'Klíč' },
        { language: 'čeština', word: 'Lock', translation: 'Zámek' },
        { language: 'čeština', word: 'Handle', translation: 'Klička' },
        { language: 'čeština', word: 'Roof', translation: 'Střecha' },
        { language: 'čeština', word: 'Chimney', translation: 'Komín' },
        { language: 'čeština', word: 'Fence', translation: 'Plot' },
        { language: 'čeština', word: 'Garden', translation: 'Zahrada' },
        { language: 'čeština', word: 'Tree', translation: 'Strom' },
        { language: 'čeština', word: 'Flower', translation: 'Květina' },
        { language: 'čeština', word: 'Grass', translation: 'Tráva' },
        { language: 'čeština', word: 'Bush', translation: 'Keř' },
        { language: 'čeština', word: 'Path', translation: 'Cesta' },
        { language: 'čeština', word: 'Road', translation: 'Silnice' },
        { language: 'čeština', word: 'Bridge', translation: 'Most' },
        { language: 'čeština', word: 'River', translation: 'Řeka' },
        { language: 'čeština', word: 'Lake', translation: 'Jezero' },
        { language: 'čeština', word: 'Sea', translation: 'Moře' },
        { language: 'čeština', word: 'Ocean', translation: 'Oceán' },
        { language: 'čeština', word: 'Mountain', translation: 'Hora' },
        { language: 'čeština', word: 'Hill', translation: 'Kopec' },
        { language: 'čeština', word: 'Valley', translation: 'Údolí' },
        { language: 'čeština', word: 'Cave', translation: 'Jeskyně' },
        { language: 'čeština', word: 'Desert', translation: 'Poušť' },
        { language: 'čeština', word: 'Forest', translation: 'Les' },
        { language: 'čeština', word: 'Jungle', translation: 'Džungle' },
        { language: 'čeština', word: 'Island', translation: 'Ostrov' },
        { language: 'čeština', word: 'Beach', translation: 'Pláž' },
        { language: 'čeština', word: 'Sand', translation: 'Písek' },
        { language: 'čeština', word: 'Rock', translation: 'Skála' },
        { language: 'čeština', word: 'Cliff', translation: 'Útes' },
        { language: 'čeština', word: 'Waterfall', translation: 'Vodopád' },
        { language: 'čeština', word: 'Volcano', translation: 'Sopka' },
        { language: 'čeština', word: 'Cloud', translation: 'Mrak' },
        { language: 'čeština', word: 'Rain', translation: 'Déšť' },
        { language: 'čeština', word: 'Snow', translation: 'Sníh' },
        { language: 'čeština', word: 'Wind', translation: 'Vítr' },
        { language: 'čeština', word: 'Storm', translation: 'Bouřka' },
        { language: 'čeština', word: 'Lightning', translation: 'Blesk' },
        { language: 'čeština', word: 'Thunder', translation: 'Hrom' },
        { language: 'čeština', word: 'Fog', translation: 'Mlha' },
        { language: 'čeština', word: 'Ice', translation: 'Led' },
        { language: 'čeština', word: 'Frost', translation: 'Mráz' },
        { language: 'čeština', word: 'Temperature', translation: 'Teplota' },
        { language: 'čeština', word: 'Heat', translation: 'Horko' },
        { language: 'čeština', word: 'Cold', translation: 'Chlad' },
        { language: 'čeština', word: 'Spring', translation: 'Jaro' },
        { language: 'čeština', word: 'Summer', translation: 'Léto' },
        { language: 'čeština', word: 'Autumn', translation: 'Podzim' },
        { language: 'čeština', word: 'Winter', translation: 'Zima' },
        { language: 'čeština', word: 'Morning', translation: 'Ráno' },
        { language: 'čeština', word: 'Afternoon', translation: 'Odpoledne' },
        { language: 'čeština', word: 'Evening', translation: 'Večer' },
        { language: 'čeština', word: 'Night', translation: 'Noc' },
        { language: 'čeština', word: 'Midnight', translation: 'Půlnoc' },
        { language: 'čeština', word: 'Sunrise', translation: 'Východ slunce' },
        { language: 'čeština', word: 'Sunset', translation: 'Západ slunce' },
        { language: 'čeština', word: 'Day', translation: 'Den' },
        { language: 'čeština', word: 'Week', translation: 'Týden' },
        { language: 'čeština', word: 'Month', translation: 'Měsíc' },
        { language: 'čeština', word: 'Year', translation: 'Rok' },
        { language: 'čeština', word: 'Decade', translation: 'Desetiletí' },
        { language: 'čeština', word: 'Century', translation: 'Století' },
        { language: 'čeština', word: 'Millennium', translation: 'Tisíciletí' },
        { language: 'čeština', word: 'Clock', translation: 'Hodiny' },
        { language: 'čeština', word: 'Watch', translation: 'Hodinky' },
        { language: 'čeština', word: 'Calendar', translation: 'Kalendář' },
        { language: 'čeština', word: 'Schedule', translation: 'Rozvrh' },
        { language: 'čeština', word: 'Appointment', translation: 'Schůzka' },
        { language: 'čeština', word: 'Meeting', translation: 'Setkání' },
        { language: 'čeština', word: 'Event', translation: 'Událost' },
        { language: 'čeština', word: 'Celebration', translation: 'Oslava' },
        { language: 'čeština', word: 'Party', translation: 'Párty' },
        { language: 'čeština', word: 'Wedding', translation: 'Svatba' },
        { language: 'čeština', word: 'Birthday', translation: 'Narozeniny' },
        { language: 'čeština', word: 'Holiday', translation: 'Dovolená' },
        { language: 'čeština', word: 'Festival', translation: 'Festival' },
        { language: 'čeština', word: 'Anniversary', translation: 'Výročí' },
        { language: 'čeština', word: 'Gift', translation: 'Dárek' },
        { language: 'čeština', word: 'Cake', translation: 'Dort' },
        { language: 'čeština', word: 'Candle', translation: 'Svíčka' },
        { language: 'čeština', word: 'Balloon', translation: 'Balónek' },
        { language: 'čeština', word: 'Decoration', translation: 'Dekorace' },
        { language: 'čeština', word: 'Fireworks', translation: 'Ohňostroj' },
        { language: 'čeština', word: 'Invitation', translation: 'Pozvánka' },
        { language: 'čeština', word: 'Guest', translation: 'Host' },
        { language: 'čeština', word: 'Host', translation: 'Hostitel' },
        { language: 'čeština', word: 'Drink', translation: 'Nápoj' },
        { language: 'čeština', word: 'Food', translation: 'Jídlo' },
        { language: 'čeština', word: 'Music', translation: 'Hudba' },
        { language: 'čeština', word: 'Dance', translation: 'Tanec' },
        { language: 'čeština', word: 'Song', translation: 'Píseň' },
        { language: 'čeština', word: 'Singer', translation: 'Zpěvák' },
        { language: 'čeština', word: 'Band', translation: 'Kapela' },
        { language: 'čeština', word: 'Instrument', translation: 'Nástroj' },
        { language: 'čeština', word: 'Piano', translation: 'Klavír' },
        { language: 'čeština', word: 'Guitar', translation: 'Kytara' },
        { language: 'čeština', word: 'Drums', translation: 'Bicí' },
        { language: 'čeština', word: 'Violin', translation: 'Housle' },
        { language: 'čeština', word: 'Flute', translation: 'Flétna' },
        { language: 'čeština', word: 'Trumpet', translation: 'Trumpeta' },
        { language: 'čeština', word: 'Keyboard', translation: 'Klavírní klávesy' },
        { language: 'čeština', word: 'Microphone', translation: 'Mikrofon' },
        { language: 'čeština', word: 'Speaker', translation: 'Reproduktor' },
        { language: 'čeština', word: 'Headphones', translation: 'Sluchátka' },
        { language: 'čeština', word: 'Radio', translation: 'Rádio' },
        { language: 'čeština', word: 'Television', translation: 'Televize' },
        { language: 'čeština', word: 'Channel', translation: 'Kanál' },
        { language: 'čeština', word: 'Program', translation: 'Pořad' },
        { language: 'čeština', word: 'Movie', translation: 'Film' },
        { language: 'čeština', word: 'Actor', translation: 'Herec' },
        { language: 'čeština', word: 'Actress', translation: 'Herečka' },
        { language: 'čeština', word: 'Director', translation: 'Režisér' },
        { language: 'čeština', word: 'Screen', translation: 'Obrazovka' },
        { language: 'čeština', word: 'Scene', translation: 'Scéna' },
        { language: 'čeština', word: 'Script', translation: 'Scénář' },
        { language: 'čeština', word: 'Camera', translation: 'Kamera' },
        { language: 'čeština', word: 'Stage', translation: 'Jeviště' },
        { language: 'čeština', word: 'Audience', translation: 'Publikum' },
        { language: 'čeština', word: 'Performance', translation: 'Představení' },
        { language: 'čeština', word: 'Show', translation: 'Show' },
        { language: 'čeština', word: 'Competition', translation: 'Soutěž' },
        { language: 'čeština', word: 'Contestant', translation: 'Soutěžící' },
        { language: 'čeština', word: 'Judge', translation: 'Porotce' },
        { language: 'čeština', word: 'Prize', translation: 'Cena' },
        { language: 'čeština', word: 'Trophy', translation: 'Troféj' },
        { language: 'čeština', word: 'Winner', translation: 'Vítěz' },
        { language: 'čeština', word: 'Loser', translation: 'Poražený' },
        { language: 'čeština', word: 'Game', translation: 'Hra' },
        { language: 'čeština', word: 'Player', translation: 'Hráč' },
        { language: 'čeština', word: 'Team', translation: 'Tým' },
        { language: 'čeština', word: 'Coach', translation: 'Trenér' },
        { language: 'čeština', word: 'Referee', translation: 'Rozhodčí' },
        { language: 'čeština', word: 'Goal', translation: 'Gól' },
        { language: 'čeština', word: 'Match', translation: 'Zápas' },
        { language: 'čeština', word: 'Stadium', translation: 'Stadion' },
        { language: 'čeština', word: 'Spectator', translation: 'Divák' },
        { language: 'čeština', word: 'Cheer', translation: 'Povzbuzení' },
        { language: 'čeština', word: 'Victory', translation: 'Vítězství' },
        { language: 'čeština', word: 'Defeat', translation: 'Porážka' },
        { language: 'čeština', word: 'Draw', translation: 'Remíza' },
        { language: 'čeština', word: 'Score', translation: 'Skóre' },
        { language: 'čeština', word: 'Point', translation: 'Bod' },
        { language: 'čeština', word: 'Round', translation: 'Kolo' },
        { language: 'čeština', word: 'Level', translation: 'Úroveň' },
        { language: 'čeština', word: 'Challenge', translation: 'Výzva' },
        { language: 'čeština', word: 'Task', translation: 'Úkol' },
        { language: 'čeština', word: 'Quest', translation: 'Dobrodružství' },
        { language: 'čeština', word: 'Adventure', translation: 'Dobrodružství' },
        { language: 'čeština', word: 'Hero', translation: 'Hrdina' },
        { language: 'čeština', word: 'Villain', translation: 'Záporák' },
        { language: 'čeština', word: 'Battle', translation: 'Bitva' },
        { language: 'čeština', word: 'War', translation: 'Válka' },
        { language: 'čeština', word: 'Peace', translation: 'Mír' },
        { language: 'čeština', word: 'Army', translation: 'Armáda' },
        { language: 'čeština', word: 'Soldier', translation: 'Voják' },
        { language: 'čeština', word: 'Weapon', translation: 'Zbraň' },
        { language: 'čeština', word: 'Sword', translation: 'Meč' },
        { language: 'čeština', word: 'Shield', translation: 'Štít' },
        { language: 'čeština', word: 'Helmet', translation: 'Helma' },
        { language: 'čeština', word: 'Armor', translation: 'Brnění' },
        { language: 'čeština', word: 'Arrow', translation: 'Šíp' },
        { language: 'čeština', word: 'Bow', translation: 'Luk' },
        { language: 'čeština', word: 'Gun', translation: 'Zbraň' },
        { language: 'čeština', word: 'Bullet', translation: 'Kulka' },
        { language: 'čeština', word: 'Tank', translation: 'Tank' },
        { language: 'čeština', word: 'Submarine', translation: 'Ponorka' },
        { language: 'čeština', word: 'Aircraft', translation: 'Letadlo' },
        { language: 'čeština', word: 'Pilot', translation: 'Pilot' },
        { language: 'čeština', word: 'Captain', translation: 'Kapitán' },
        { language: 'čeština', word: 'Sailor', translation: 'Námořník' },
        { language: 'čeština', word: 'Ship', translation: 'Loď' },
        { language: 'čeština', word: 'Boat', translation: 'Člun' },
        { language: 'čeština', word: 'Harbor', translation: 'Přístav' },
        { language: 'čeština', word: 'Port', translation: 'Přístav' },
        { language: 'čeština', word: 'Dock', translation: 'Molo' },
        { language: 'čeština', word: 'Anchor', translation: 'Kotva' },
        { language: 'čeština', word: 'Compass', translation: 'Kompas' },
        { language: 'čeština', word: 'Map', translation: 'Mapa' },
        { language: 'čeština', word: 'Navigation', translation: 'Navigace' },
        { language: 'čeština', word: 'Journey', translation: 'Cesta' },
        { language: 'čeština', word: 'Trip', translation: 'Výlet' },
        { language: 'čeština', word: 'Travel', translation: 'Cestování' },
        { language: 'čeština', word: 'Tourist', translation: 'Turista' },
        { language: 'čeština', word: 'Guide', translation: 'Průvodce' },
        { language: 'čeština', word: 'Hotel', translation: 'Hotel' },
        { language: 'čeština', word: 'Hostel', translation: 'Hostel' },
        { language: 'čeština', word: 'Luggage', translation: 'Zavazadlo' },
        { language: 'čeština', word: 'Suitcase', translation: 'Kufr' },
        { language: 'čeština', word: 'Backpack', translation: 'Batoh' },
        { language: 'čeština', word: 'Ticket', translation: 'Lístek' },
        { language: 'čeština', word: 'Passport', translation: 'Pas' },
        { language: 'čeština', word: 'Visa', translation: 'Víza' },
        // Přidání slovíček z přírodních věd
        { language: 'čeština', word: 'Atom', translation: 'Atom' },
        { language: 'čeština', word: 'Molecule', translation: 'Molekula' },
        { language: 'čeština', word: 'Element', translation: 'Prvek' },
        { language: 'čeština', word: 'DNA', translation: 'DNA' },
        { language: 'čeština', word: 'Cell', translation: 'Buňka' },
        { language: 'čeština', word: 'Protein', translation: 'Protein' },
        { language: 'čeština', word: 'Gene', translation: 'Gen' },
        { language: 'čeština', word: 'Evolution', translation: 'Evoluce' },
        { language: 'čeština', word: 'Physics', translation: 'Fyzika' },
        { language: 'čeština', word: 'Chemistry', translation: 'Chemie' },
        { language: 'čeština', word: 'Biology', translation: 'Biologie' },
        { language: 'čeština', word: 'Quantum', translation: 'Kvantum' },
        { language: 'čeština', word: 'Force', translation: 'Síla' },
        { language: 'čeština', word: 'Mass', translation: 'Hmotnost' },
        { language: 'čeština', word: 'Energy', translation: 'Energie' },
        { language: 'čeština', word: 'Electron', translation: 'Elektron' },
        { language: 'čeština', word: 'Neuron', translation: 'Neuron' },
        { language: 'čeština', word: 'Virus', translation: 'Virus' },
        { language: 'čeština', word: 'Bacteria', translation: 'Bakterie' },
        { language: 'čeština', word: 'Fungi', translation: 'Houbové' },
        { language: 'čeština', word: 'Plasma', translation: 'Plazma' },
        { language: 'čeština', word: 'Cell Division', translation: 'Dělení buněk' },
        { language: 'čeština', word: 'Organism', translation: 'Organismus' },
        { language: 'čeština', word: 'Ecosystem', translation: 'Ekosystém' },
        { language: 'čeština', word: 'Climate', translation: 'Klima' },
        { language: 'čeština', word: 'Matter', translation: 'Látka' },
        { language: 'čeština', word: 'Oxygen', translation: 'Kyslík' },
        { language: 'čeština', word: 'Carbon', translation: 'Uhlík' },
        { language: 'čeština', word: 'Photosynthesis', translation: 'Fotosyntéza' },
        { language: 'čeština', word: 'Chlorophyll', translation: 'Chlorofyl' },
        { language: 'čeština', word: 'Genetics', translation: 'Genetika' },
        { language: 'čeština', word: 'Ecology', translation: 'Ekologie' },
        { language: 'čeština', word: 'Tissue', translation: 'Tkáň' },
        { language: 'čeština', word: 'Organ', translation: 'Orgán' },
        { language: 'čeština', word: 'Synthesis', translation: 'Syntéza' },
        { language: 'čeština', word: 'Species', translation: 'Druh' },
        { language: 'čeština', word: 'Thermodynamics', translation: 'Termodynamika' },
        { language: 'čeština', word: 'Neutron', translation: 'Neutron' },
        { language: 'čeština', word: 'Proton', translation: 'Proton' },
        { language: 'čeština', word: 'Cell Membrane', translation: 'Buněčná membrána' },
        { language: 'čeština', word: 'Organism', translation: 'Organismus' },
        { language: 'čeština', word: 'Homo Sapiens', translation: 'Homo sapiens' },
        { language: 'čeština', word: 'Evolutionary Biology', translation: 'Evoluční biologie' },
        { language: 'čeština', word: 'Paleontology', translation: 'Paleontologie' },
        { language: 'čeština', word: 'Genomics', translation: 'Genomika' },
        { language: 'čeština', word: 'Embryology', translation: 'Embryologie' },
        { language: 'čeština', word: 'Astronomy', translation: 'Astronomie' },
        { language: 'čeština', word: 'Cosmology', translation: 'Kosmologie' },
        { language: 'čeština', word: 'Volcano', translation: 'Sopka' },
        { language: 'čeština', word: 'Meteorology', translation: 'Meteorologie' },
        { language: 'čeština', word: 'Seismology', translation: 'Seismologie' },
        { language: 'čeština', word: 'Geology', translation: 'Geologie' },
        { language: 'čeština', word: 'Oceanography', translation: 'Oceánografie' },
        { language: 'čeština', word: 'Botany', translation: 'Botanika' },
        { language: 'čeština', word: 'Zoology', translation: 'Zoologie' },
        { language: 'čeština', word: 'Mycology', translation: 'Mykologie' },
        { language: 'čeština', word: 'Herbivores', translation: 'Býložravci' },
        { language: 'čeština', word: 'Carnivores', translation: 'Masožravci' },
        { language: 'čeština', word: 'Omnivores', translation: 'Všežravci' },
        { language: 'čeština', word: 'Symbiosis', translation: 'Symbióza' },
        { language: 'čeština', word: 'Trophic Levels', translation: 'Troficové úrovně' },
        { language: 'čeština', word: 'Habitat', translation: 'Biotop' },
        { language: 'čeština', word: 'Ecological Niche', translation: 'Ekologická nika' },
        { language: 'čeština', word: 'Chloroplast', translation: 'Chloroplast' },
        { language: 'čeština', word: 'Photosynthesis', translation: 'Fotosyntéza' },
        { language: 'čeština', word: 'Respiration', translation: 'Dýchání' },
        { language: 'čeština', word: 'Biosphere', translation: 'Biosféra' },
        { language: 'čeština', word: 'Biogeochemical Cycles', translation: 'Biogeochemické cykly' },
        { language: 'čeština', word: 'Ozone Layer', translation: 'Ozonová vrstva' },
        { language: 'čeština', word: 'Nitrogen Cycle', translation: 'Dusíkový cyklus' },
        { language: 'čeština', word: 'Carbon Cycle', translation: 'Uhlíkový cyklus' },
        { language: 'čeština', word: 'Water Cycle', translation: 'Koloběh vody' },
        { language: 'čeština', word: 'Endangered Species', translation: 'Ohrožené druhy' },
        { language: 'čeština', word: 'Extinction', translation: 'Vyhynutí' },
        { language: 'čeština', word: 'Biodiversity', translation: 'Biodiverzita' },
        { language: 'čeština', word: 'Pollution', translation: 'Znečištění' },
        { language: 'čeština', word: 'Sustainability', translation: 'Udržitelnost' },
        { language: 'čeština', word: 'Renewable Energy', translation: 'Obnovitelná energie' },
        { language: 'čeština', word: 'Fossil Fuels', translation: 'Fosilní paliva' },
        { language: 'čeština', word: 'Geothermal Energy', translation: 'Geotermální energie' },
        { language: 'čeština', word: 'Wind Energy', translation: 'Větrná energie' },
        { language: 'čeština', word: 'Solar Energy', translation: 'Solární energie' },
        { language: 'čeština', word: 'Hydroelectric Power', translation: 'Vodní energie' },
        { language: 'čeština', word: 'Electromagnetic Waves', translation: 'Elektromagnetické vlny' },
        { language: 'čeština', word: 'Radioactivity', translation: 'Radioaktivita' },
        { language: 'čeština', word: 'Isotope', translation: 'Izotop' },
        { language: 'čeština', word: 'Periodicity', translation: 'Periodičnost' },
        { language: 'čeština', word: 'Acid', translation: 'Kyselina' },
        { language: 'čeština', word: 'Base', translation: 'Zásada' },
        { language: 'čeština', word: 'Salt', translation: 'Sůl' },
        { language: 'čeština', word: 'Oxidation', translation: 'Oxidace' },
        { language: 'čeština', word: 'Reduction', translation: 'Redukce' },
        { language: 'čeština', word: 'Solubility', translation: 'Rozpustnost' },
        { language: 'čeština', word: 'Catalyst', translation: 'Katalyzátor' },
        { language: 'čeština', word: 'Endothermic Reaction', translation: 'Endotermní reakce' },
        { language: 'čeština', word: 'Exothermic Reaction', translation: 'Exotermní reakce' },
        { language: 'čeština', word: 'Mountain', translation: 'Hora' },
        { language: 'čeština', word: 'Valley', translation: 'Údolí' },
        { language: 'čeština', word: 'River', translation: 'Řeka' },
        { language: 'čeština', word: 'Lake', translation: 'Jezero' },
        { language: 'čeština', word: 'Ocean', translation: 'Oceán' },
        { language: 'čeština', word: 'Forest', translation: 'Les' },
        { language: 'čeština', word: 'Tree', translation: 'Strom' },
        { language: 'čeština', word: 'Bush', translation: 'Keř' },
        { language: 'čeština', word: 'Flower', translation: 'Květina' },
        { language: 'čeština', word: 'Grass', translation: 'Tráva' },
        { language: 'čeština', word: 'Sand', translation: 'Písek' },
        { language: 'čeština', word: 'Rock', translation: 'Kámen' },
        { language: 'čeština', word: 'Hill', translation: 'Kopec' },
        { language: 'čeština', word: 'Desert', translation: 'Poušť' },
        { language: 'čeština', word: 'Island', translation: 'Ostrov' },
        { language: 'čeština', word: 'Beach', translation: 'Pláž' },
        { language: 'čeština', word: 'Sky', translation: 'Nebe' },
        { language: 'čeština', word: 'Cloud', translation: 'Mrak' },
        { language: 'čeština', word: 'Rain', translation: 'Déšť' },
        { language: 'čeština', word: 'Snow', translation: 'Sníh' },
        { language: 'čeština', word: 'Wind', translation: 'Vítr' },
        { language: 'čeština', word: 'Sun', translation: 'Slunce' },
        { language: 'čeština', word: 'Moon', translation: 'Měsíc' },
        { language: 'čeština', word: 'Star', translation: 'Hvězda' },
        { language: 'čeština', word: 'Lightning', translation: 'Blesk' },
        { language: 'čeština', word: 'Thunder', translation: 'Hrom' },
        { language: 'čeština', word: 'Fog', translation: 'Mlha' },
        { language: 'čeština', word: 'Storm', translation: 'Bouře' },
        { language: 'čeština', word: 'Rainbow', translation: 'Duha' },
        { language: 'čeština', word: 'Animal', translation: 'Zvíře' },
        { language: 'čeština', word: 'Bird', translation: 'Pták' },
        { language: 'čeština', word: 'Fish', translation: 'Ryba' },
        { language: 'čeština', word: 'Dog', translation: 'Pes' },
        { language: 'čeština', word: 'Cat', translation: 'Kočka' },
        { language: 'čeština', word: 'Horse', translation: 'Kůň' },
        { language: 'čeština', word: 'Cow', translation: 'Kráva' },
        { language: 'čeština', word: 'Sheep', translation: 'Ovce' },
        { language: 'čeština', word: 'Goat', translation: 'Koza' },
        { language: 'čeština', word: 'Pig', translation: 'Prase' },
        { language: 'čeština', word: 'Chicken', translation: 'Slepice' },
        { language: 'čeština', word: 'Duck', translation: 'Kachna' },
        { language: 'čeština', word: 'Butterfly', translation: 'Motýl' },
        { language: 'čeština', word: 'Bee', translation: 'Včela' },
        { language: 'čeština', word: 'Ant', translation: 'Mravenec' },
        { language: 'čeština', word: 'Spider', translation: 'Pavouk' },
        { language: 'čeština', word: 'Snake', translation: 'Had' },
        { language: 'čeština', word: 'Lion', translation: 'Lev' },
        { language: 'čeština', word: 'Tiger', translation: 'Tygr' },
        { language: 'čeština', word: 'Bear', translation: 'Medvěd' },
        { language: 'čeština', word: 'Wolf', translation: 'Vlk' },
        { language: 'čeština', word: 'Fox', translation: 'Liška' },
        { language: 'čeština', word: 'Deer', translation: 'Jelen' },
        { language: 'čeština', word: 'Elephant', translation: 'Slon' },
        { language: 'čeština', word: 'Monkey', translation: 'Opice' },
        { language: 'čeština', word: 'Kangaroo', translation: 'Klokan' },
        { language: 'čeština', word: 'Crocodile', translation: 'Krokodýl' },
        { language: 'čeština', word: 'Dolphin', translation: 'Delfín' },
        { language: 'čeština', word: 'Shark', translation: 'Žralok' },
        { language: 'čeština', word: 'Whale', translation: 'Velryba' },
        { language: 'čeština', word: 'Penguin', translation: 'Tučňák' },
        { language: 'čeština', word: 'Frog', translation: 'Žába' },
        { language: 'čeština', word: 'Rabbit', translation: 'Králík' },
        { language: 'čeština', word: 'Mouse', translation: 'Myš' },
        { language: 'čeština', word: 'Rat', translation: 'Krysa' },
        { language: 'čeština', word: 'Squirrel', translation: 'Veverka' },
        { language: 'čeština', word: 'Hedgehog', translation: 'Ježek' },
        { language: 'čeština', word: 'Octopus', translation: 'Chobotnice' },
        { language: 'čeština', word: 'Crab', translation: 'Krab' },
        { language: 'čeština', word: 'Jellyfish', translation: 'Medúza' },
        { language: 'čeština', word: 'Starfish', translation: 'Hvězdice' },
        { language: 'čeština', word: 'Snail', translation: 'Šnek' },
        { language: 'čeština', word: 'Worm', translation: 'Červ' },
        { language: 'čeština', word: 'Fly', translation: 'Moucha' },
        { language: 'čeština', word: 'Mosquito', translation: 'Komár' },
        { language: 'čeština', word: 'Lizard', translation: 'Ještěrka' },
        { language: 'čeština', word: 'Camel', translation: 'Velbloud' },
        { language: 'čeština', word: 'Peacock', translation: 'Páv' },
        { language: 'čeština', word: 'Owl', translation: 'Sova' },
        { language: 'čeština', word: 'Parrot', translation: 'Papoušek' },
        { language: 'čeština', word: 'Eagle', translation: 'Orel' },
        { language: 'čeština', word: 'Hawk', translation: 'Jestřáb' },
        { language: 'čeština', word: 'Crow', translation: 'Vrána' },
        { language: 'čeština', word: 'Pigeon', translation: 'Holub' },
        { language: 'čeština', word: 'Flamingo', translation: 'Plameňák' },
        { language: 'čeština', word: 'Seagull', translation: 'Racek' },
        { language: 'čeština', word: 'Rooster', translation: 'Kohout' },
        { language: 'čeština', word: 'Turkey', translation: 'Krocan' },
        { language: 'čeština', word: 'Beetle', translation: 'Brouk' },
        { language: 'čeština', word: 'Screenwriter', translation: 'Scenárista' }, { language: 'čeština', word: 'Cameraman', translation: 'Kameraman' }, { language: 'čeština', word: 'Sound Engineer', translation: 'Zvukař' }, { language: 'čeština', word: 'Lighting Technician', translation: 'Osvětlovač' }, { language: 'čeština', word: 'Costume Designer', translation: 'Kostymér' }, { language: 'čeština', word: 'Makeup Artist', translation: 'Maskér' }, { language: 'čeština', word: 'Graphic Designer', translation: 'Grafický návrhář' }, { language: 'čeština', word: 'Web Developer', translation: 'Webový vývojář' }, { language: 'čeština', word: 'Mobile Developer', translation: 'Mobilní vývojář' }, { language: 'čeština', word: 'Data Scientist', translation: 'Datový vědec' }, { language: 'čeština', word: 'Cybersecurity Specialist', translation: 'Specialista na kyberbezpečnost' }, { language: 'čeština', word: 'Blockchain Developer', translation: 'Vývojář blockchainu' }, { language: 'čeština', word: 'Network Engineer', translation: 'Síťový inženýr' }, { language: 'čeština', word: 'Database Administrator', translation: 'Správce databáze' }, { language: 'čeština', word: 'Systems Analyst', translation: 'Systémový analytik' }, { language: 'čeština', word: 'IT Support Specialist', translation: 'Specialista IT podpory' }, { language: 'čeština', word: 'Hardware Engineer', translation: 'Inženýr hardware' }, { language: 'čeština', word: 'Robotics Engineer', translation: 'Inženýr robotiky' }, { language: 'čeština', word: 'Automation Engineer', translation: 'Inženýr automatizace' }, { language: 'čeština', word: 'Automotive Engineer', translation: 'Automobilový inženýr' }, { language: 'čeština', word: 'Biomedical Engineer', translation: 'Biomedicínský inženýr' }, { language: 'čeština', word: 'Civil Engineer', translation: 'Inženýr stavebnictví' }, { language: 'čeština', word: 'Electrical Engineer', translation: 'Elektroinženýr' }, { language: 'čeština', word: 'Environmental Engineer', translation: 'Inženýr životního prostředí' }, { language: 'čeština', word: 'Mechanical Engineer', translation: 'Strojní inženýr'},{ language: 'čeština', word: 'Babysitter', translation: 'Hlídačka dětí' }, { language: 'čeština', word: 'Nanny', translation: 'Chůva' }, { language: 'čeština', word: 'Daycare Worker', translation: 'Pracovník v péči o děti' }, { language: 'čeština', word: 'Kindergarten Teacher', translation: 'Učitel v mateřské škole' }, { language: 'čeština', word: 'Child Psychologist', translation: 'Dětský psycholog' }, { language: 'čeština', word: 'Pediatric Nurse', translation: 'Dětská zdravotní sestra' }, { language: 'čeština', word: 'Pediatrician', translation: 'Pediatr' }, { language: 'čeština', word: 'Childcare Provider', translation: 'Péče o děti' }, { language: 'čeština', word: 'Youth Counselor', translation: 'Poradce pro mládež' }, { language: 'čeština', word: 'Child Protection Worker', translation: 'Pracovník ochrany dětí' }, { language: 'čeština', word: 'Early Childhood Educator', translation: 'Pedagog raného dětství' }, { language: 'čeština', word: 'Nursery Teacher', translation: 'Učitel v jeslích' }, { language: 'čeština', word: 'Childcare Assistant', translation: 'Asistent péče o děti' }, { language: 'čeština', word: 'Child Welfare Worker', translation: 'Pracovník sociální péče o děti'},{ language: 'čeština', word: 'Airport', translation: 'Letiště' }, { language: 'čeština', word: 'Airplane', translation: 'Letadlo' }, { language: 'čeština', word: 'Baggage', translation: 'Zavazadla' }, { language: 'čeština', word: 'Boarding Pass', translation: 'Palubní lístek' }, { language: 'čeština', word: 'Customs', translation: 'Celnice' }, { language: 'čeština', word: 'Destination', translation: 'Cíl cesty' }, { language: 'čeština', word: 'Flight', translation: 'Let' }, { language: 'čeština', word: 'Gate', translation: 'Brána' }, { language: 'čeština', word: 'Hotel', translation: 'Hotel' }, { language: 'čeština', word: 'Itinerary', translation: 'Itinerář' }, { language: 'čeština', word: 'Journey', translation: 'Cesta' }, { language: 'čeština', word: 'Luggage', translation: 'Zavazadla' }, { language: 'čeština', word: 'Passport', translation: 'Pas' }, { language: 'čeština', word: 'Reservation', translation: 'Rezervace' }, { language: 'čeština', word: 'Souvenir', translation: 'Suvenýr' }, { language: 'čeština', word: 'Tourist', translation: 'Turista' }, { language: 'čeština', word: 'Travel', translation: 'Cestování' }, { language: 'čeština', word: 'Visa', translation: 'Vízum' }, { language: 'čeština', word: 'Accommodation', translation: 'Ubytování' }, { language: 'čeština', word: 'Backpack', translation: 'Batoh' }, { language: 'čeština', word: 'Bus', translation: 'Autobus' }, { language: 'čeština', word: 'Bus Ticket', translation: 'Autobusová jízdenka' }, { language: 'čeština', word: 'Car Rental', translation: 'Půjčovna aut' }, { language: 'čeština', word: 'Departure', translation: 'Odlet' }, { language: 'čeština', word: 'Driver’s License', translation: 'Řidičský průkaz' }, { language: 'čeština', word: 'Excursion', translation: 'Výlet' }, { language: 'čeština', word: 'Ferry', translation: 'Trajekt' }, { language: 'čeština', word: 'Guidebook', translation: 'Průvodce' }, { language: 'čeština', word: 'Journey', translation: 'Cesta' }, { language: 'čeština', word: 'Maps', translation: 'Mapy' }, { language: 'čeština', word: 'Metro', translation: 'Metro' }, { language: 'čeština', word: 'Passport Control', translation: 'Pasová kontrola' }, { language: 'čeština', word: 'Railway', translation: 'Železnice' }, { language: 'čeština', word: 'Route', translation: 'Trasa' }, { language: 'čeština', word: 'Sights', translation: 'Památky' }, { language: 'čeština', word: 'Ticket', translation: 'Vstupenka' }, { language: 'čeština', word: 'Tour Guide', translation: 'Průvodce' }, { language: 'čeština', word: 'Train', translation: 'Vlak' }, { language: 'čeština', word: 'Travel Agency', translation: 'Cestovní kancelář' }, { language: 'čeština', word: 'Traveler', translation: 'Cestovatel' }, { language: 'čeština', word: 'Trolley', translation: 'Vozík' }, { language: 'čeština', word: 'Vacation', translation: 'Dovolená' }, { language: 'čeština', word: 'Airport Security', translation: 'Letištní bezpečnost' }, { language: 'čeština', word: 'Baggage Claim', translation: 'Výdej zavazadel' }, { language: 'čeština', word: 'Currency Exchange', translation: 'Směnárna' }, { language: 'čeština', word: 'Departure Lounge', translation: 'Odletová hala' }, { language: 'čeština', word: 'Emergency Contact', translation: 'Nouzový kontakt' }, { language: 'čeština', word: 'First Class', translation: 'První třída' }, { language: 'čeština', word: 'Travel Insurance', translation: 'Cestovní pojištění' },{ language: 'čeština', word: 'Beach', translation: 'Pláž' }, { language: 'čeština', word: 'Sand', translation: 'Písek' }, { language: 'čeština', word: 'Waves', translation: 'Vlny' }, { language: 'čeština', word: 'Ocean', translation: 'Oceán' }, { language: 'čeština', word: 'Seashore', translation: 'Pobřeží' }, { language: 'čeština', word: 'Lifeguard', translation: 'Plavčík' }, { language: 'čeština', word: 'Surfboard', translation: 'Surfovací prkno' }, { language: 'čeština', word: 'Swimming', translation: 'Plavání' }, { language: 'čeština', word: 'Snorkeling', translation: 'Šnorchlování' }, { language: 'čeština', word: 'Diving', translation: 'Potápění' }, { language: 'čeština', word: 'Sunbathing', translation: 'Opalování' }, { language: 'čeština', word: 'Towel', translation: 'Ručník' }, { language: 'čeština', word: 'Beach Umbrella', translation: 'Plážový slunečník' }, { language: 'čeština', word: 'Beach Chair', translation: 'Plážové lehátko' }, { language: 'čeština', word: 'Sunscreen', translation: 'Opalovací krém' }, { language: 'čeština', word: 'Hat', translation: 'Klobouk' }, { language: 'čeština', word: 'Sunglasses', translation: 'Sluneční brýle' }, { language: 'čeština', word: 'Cooler', translation: 'Chladič' }, { language: 'čeština', word: 'Ice Cream', translation: 'Zmrzlina' }, { language: 'čeština', word: 'Flip Flops', translation: 'Žabky' }, { language: 'čeština', word: 'Seashells', translation: 'Mořské mušle' }, { language: 'čeština', word: 'Beach Ball', translation: 'Plážový míč' }, { language: 'čeština', word: 'Frisbee', translation: 'Frisbee' }, { language: 'čeština', word: 'Tide', translation: 'Příliv' }, { language: 'čeština', word: 'Starfish', translation: 'Mořská hvězdice' }, { language: 'čeština', word: 'Crab', translation: 'Krab' }, { language: 'čeština', word: 'Jellyfish', translation: 'Medúza' }, { language: 'čeština', word: 'Dolphin', translation: 'Delfín' }, { language: 'čeština', word: 'Shark', translation: 'Žralok' }, { language: 'čeština', word: 'Boat', translation: 'Loď' }, { language: 'čeština', word: 'Kayak', translation: 'Kajak' }, { language: 'čeština', word: 'Paddle', translation: 'Pádlo' }, { language: 'čeština', word: 'Fishing', translation: 'Rybářství' }, { language: 'čeština', word: 'Fishing Rod', translation: 'Rybářský prut' }, { language: 'čeština', word: 'Bonfire', translation: 'Táborový oheň' }, { language: 'čeština', word: 'Barbecue', translation: 'Grilování' }, { language: 'čeština', word: 'Shell', translation: 'Mušle' }, { language: 'čeština', word: 'Saltwater', translation: 'Slaná voda' }, { language: 'čeština', word: 'Skimboarding', translation: 'Skimboarding' }, { language: 'čeština', word: 'Parasailing', translation: 'Parasailing' }, { language: 'čeština', word: 'Kite Surfing', translation: 'Kitesurfing' }, { language: 'čeština', word: 'Wind Surfing', translation: 'Windsurfing' }, { language: 'čeština', word: 'Jet Ski', translation: 'Vodní skútr' }, { language: 'čeština', word: 'Beach Hut', translation: 'Plážová chatka' }, { language: 'čeština', word: 'Boardwalk', translation: 'Dřevěné molo' }, { language: 'čeština', word: 'Beach Volleyball', translation: 'Plážový volejbal' }, { language: 'čeština', word: 'Beach Towel', translation: 'Plážový ručník' }, { language: 'čeština', word: 'Sunglasses', translation: 'Sluneční brýle'},

{
        "language": "čeština",
        "word": "Head",
        "translation": "Head"
    },
    {
        "language": "čeština",
        "word": "Arm",
        "translation": "Arm"
    },
    {
        "language": "čeština",
        "word": "Leg",
        "translation": "Leg"
    },
    {
        "language": "čeština",
        "word": "Hand",
        "translation": "Hand"
    },
    {
        "language": "čeština",
        "word": "Foot",
        "translation": "Foot"
    },
    {
        "language": "čeština",
        "word": "Eye",
        "translation": "Eye"
    },
    {
        "language": "čeština",
        "word": "Ear",
        "translation": "Ear"
    },
    {
        "language": "čeština",
        "word": "Nose",
        "translation": "Nose"
    },
    {
        "language": "čeština",
        "word": "Mouth",
        "translation": "Mouth"
    },
    {
        "language": "čeština",
        "word": "Back",
        "translation": "Back"
    },
    {
        "language": "čeština",
        "word": "Chest",
        "translation": "Chest"
    },
    {
        "language": "čeština",
        "word": "Fingers",
        "translation": "Fingers"
    },
    {
        "language": "čeština",
        "word": "Hair",
        "translation": "Hair"
    },
    {
        "language": "čeština",
        "word": "Skin",
        "translation": "Skin"
    },
    {
        "language": "čeština",
        "word": "Teeth",
        "translation": "Teeth"
    },
    {
        "language": "čeština",
        "word": "Family",
        "translation": "Family"
    },
    {
        "language": "čeština",
        "word": "Friend",
        "translation": "Friend"
    },
    {
        "language": "čeština",
        "word": "Neighbor",
        "translation": "Neighbor"
    },
    {
        "language": "čeština",
        "word": "Child",
        "translation": "Child"
    },
    {
        "language": "čeština",
        "word": "Parent",
        "translation": "Parent"
    },
    {
        "language": "čeština",
        "word": "Teacher",
        "translation": "Teacher"
    },
    {
        "language": "čeština",
        "word": "Doctor",
        "translation": "Doctor"
    },
    {
        "language": "čeština",
        "word": "Nurse",
        "translation": "Nurse"
    },
    {
        "language": "čeština",
        "word": "Student",
        "translation": "Student"
    },
    {
        "language": "čeština",
        "word": "Artist",
        "translation": "Artist"
    },
    {
        "language": "čeština",
        "word": "Worker",
        "translation": "Worker"
    },
    {
        "language": "čeština",
        "word": "Engineer",
        "translation": "Engineer"
    },
    {
        "language": "čeština",
        "word": "Store",
        "translation": "Store"
    },
    {
        "language": "čeština",
        "word": "Shop",
        "translation": "Shop"
    },
    {
        "language": "čeština",
        "word": "Cashier",
        "translation": "Cashier"
    },
    {
        "language": "čeština",
        "word": "Product",
        "translation": "Product"
    },
    {
        "language": "čeština",
        "word": "Price",
        "translation": "Price"
    },
    {
        "language": "čeština",
        "word": "Discount",
        "translation": "Discount"
    },
    {
        "language": "čeština",
        "word": "Sale",
        "translation": "Sale"
    },
    {
        "language": "čeština",
        "word": "Receipt",
        "translation": "Receipt"
    },
    {
        "language": "čeština",
        "word": "Credit card",
        "translation": "Credit card"
    },
    {
        "language": "čeština",
        "word": "Cart",
        "translation": "Cart"
    },
    {
        "language": "čeština",
        "word": "Bag",
        "translation": "Bag"
    },
    {
        "language": "čeština",
        "word": "Customer",
        "translation": "Customer"
    },
    {
        "language": "čeština",
        "word": "Football",
        "translation": "Football"
    },
    {
        "language": "čeština",
        "word": "Basketball",
        "translation": "Basketball"
    },
    {
        "language": "čeština",
        "word": "Tennis",
        "translation": "Tennis"
    },
    {
        "language": "čeština",
        "word": "Running",
        "translation": "Running"
    },
    {
        "language": "čeština",
        "word": "Swimming",
        "translation": "Swimming"
    },
    {
        "language": "čeština",
        "word": "Cycling",
        "translation": "Cycling"
    },
    {
        "language": "čeština",
        "word": "Baseball",
        "translation": "Baseball"
    },
    {
        "language": "čeština",
        "word": "Hockey",
        "translation": "Hockey"
    },
    {
        "language": "čeština",
        "word": "Yoga",
        "translation": "Yoga"
    },
    {
        "language": "čeština",
        "word": "Gymnastics",
        "translation": "Gymnastics"
    },
    {
        "language": "čeština",
        "word": "Marathon",
        "translation": "Marathon"
    },
    {
        "language": "čeština",
        "word": "Book",
        "translation": "Book"
    },
    {
        "language": "čeština",
        "word": "Notebook",
        "translation": "Notebook"
    },
    {
        "language": "čeština",
        "word": "Pen",
        "translation": "Pen"
    },
    {
        "language": "čeština",
        "word": "Pencil",
        "translation": "Pencil"
    },
    {
        "language": "čeština",
        "word": "Eraser",
        "translation": "Eraser"
    },
    {
        "language": "čeština",
        "word": "Desk",
        "translation": "Desk"
    },
    {
        "language": "čeština",
        "word": "Teacher",
        "translation": "Teacher"
    },
    {
        "language": "čeština",
        "word": "Student",
        "translation": "Student"
    },
    {
        "language": "čeština",
        "word": "Lesson",
        "translation": "Lesson"
    },
    {
        "language": "čeština",
        "word": "Homework",
        "translation": "Homework"
    },
    {
        "language": "čeština",
        "word": "Exam",
        "translation": "Exam"
    },
    {
        "language": "čeština",
        "word": "Classroom",
        "translation": "Classroom"
    },
    {
        "language": "čeština",
        "word": "Art",
        "translation": "Art"
    },
    {
        "language": "čeština",
        "word": "Music",
        "translation": "Music"
    },
    {
        "language": "čeština",
        "word": "Dance",
        "translation": "Dance"
    },
    {
        "language": "čeština",
        "word": "Theater",
        "translation": "Theater"
    },
    {
        "language": "čeština",
        "word": "Film",
        "translation": "Film"
    },
    {
        "language": "čeština",
        "word": "Literature",
        "translation": "Literature"
    },
    {
        "language": "čeština",
        "word": "Museum",
        "translation": "Museum"
    },
    {
        "language": "čeština",
        "word": "Festival",
        "translation": "Festival"
    },
    {
        "language": "čeština",
        "word": "History",
        "translation": "History"
    },
    {
        "language": "čeština",
        "word": "Tradition",
        "translation": "Tradition"
    },
    {
        "language": "čeština",
        "word": "Language",
        "translation": "Language"
    },
    {
        "language": "čeština",
        "word": "Eyes",
        "translation": "Eyes"
    },
    {
        "language": "čeština",
        "word": "Nose",
        "translation": "Nose"
    },
    {
        "language": "čeština",
        "word": "Mouth",
        "translation": "Mouth"
    },
    {
        "language": "čeština",
        "word": "Lips",
        "translation": "Lips"
    },
    {
        "language": "čeština",
        "word": "Ears",
        "translation": "Ears"
    },
    {
        "language": "čeština",
        "word": "Eyebrows",
        "translation": "Eyebrows"
    },
    {
        "language": "čeština",
        "word": "Cheeks",
        "translation": "Cheeks"
    },
    {
        "language": "čeština",
        "word": "Chin",
        "translation": "Chin"
    },
    {
        "language": "čeština",
        "word": "Forehead",
        "translation": "Forehead"
    },
    {
        "language": "čeština",
        "word": "Hair",
        "translation": "Hair"
    },
    {
        "language": "čeština",
        "word": "Teeth",
        "translation": "Teeth"
    },
    {
        "language": "čeština",
        "word": "Smile",
        "translation": "Smile"
    },
    {
        "language": "čeština",
        "word": "Heart",
        "translation": "Heart"
    },
    {
        "language": "čeština",
        "word": "Brain",
        "translation": "Brain"
    },
    {
        "language": "čeština",
        "word": "Stomach",
        "translation": "Stomach"
    },
    {
        "language": "čeština",
        "word": "Muscle",
        "translation": "Muscle"
    },
    {
        "language": "čeština",
        "word": "Bone",
        "translation": "Bone"
    },
    {
        "language": "čeština",
        "word": "Skin",
        "translation": "Skin"
    },
    {
        "language": "čeština",
        "word": "Blood",
        "translation": "Blood"
    },
    {
        "language": "čeština",
        "word": "Vein",
        "translation": "Vein"
    },
    {
        "language": "čeština",
        "word": "Artery",
        "translation": "Artery"
    },
    {
        "language": "čeština",
        "word": "Lungs",
        "translation": "Lungs"
    },
    {
        "language": "čeština",
        "word": "Finger",
        "translation": "Finger"
    },
    {
        "language": "čeština",
        "word": "Toes",
        "translation": "Toes"
    },
    {
        "language": "čeština",
        "word": "Cousin",
        "translation": "Cousin"
    },
    {
        "language": "čeština",
        "word": "Grandmother",
        "translation": "Grandmother"
    },
    {
        "language": "čeština",
        "word": "Grandfather",
        "translation": "Grandfather"
    },
    {
        "language": "čeština",
        "word": "Uncle",
        "translation": "Uncle"
    },
    {
        "language": "čeština",
        "word": "Aunt",
        "translation": "Aunt"
    },
    {
        "language": "čeština",
        "word": "Colleague",
        "translation": "Colleague"
    },
    {
        "language": "čeština",
        "word": "Boss",
        "translation": "Boss"
    },
    {
        "language": "čeština",
        "word": "Employee",
        "translation": "Employee"
    },
    {
        "language": "čeština",
        "word": "Citizen",
        "translation": "Citizen"
    },
    {
        "language": "čeština",
        "word": "Market",
        "translation": "Market"
    },
    {
        "language": "čeština",
        "word": "Mall",
        "translation": "Mall"
    },
    {
        "language": "čeština",
        "word": "Checkout",
        "translation": "Checkout"
    },
    {
        "language": "čeština",
        "word": "Online shop",
        "translation": "Online shop"
    },
    {
        "language": "čeština",
        "word": "Barcode",
        "translation": "Barcode"
    },
    {
        "language": "čeština",
        "word": "Brand",
        "translation": "Brand"
    },
    {
        "language": "čeština",
        "word": "Fashion",
        "translation": "Fashion"
    },
    {
        "language": "čeština",
        "word": "Jewelry",
        "translation": "Jewelry"
    },
    {
        "language": "čeština",
        "word": "Gift",
        "translation": "Gift"
    },
    {
        "language": "čeština",
        "word": "Player",
        "translation": "Player"
    },
    {
        "language": "čeština",
        "word": "Coach",
        "translation": "Coach"
    },
    {
        "language": "čeština",
        "word": "Goal",
        "translation": "Goal"
    },
    {
        "language": "čeština",
        "word": "Court",
        "translation": "Court"
    },
    {
        "language": "čeština",
        "word": "Track",
        "translation": "Track"
    },
    {
        "language": "čeština",
        "word": "Team",
        "translation": "Team"
    },
    {
        "language": "čeština",
        "word": "Referee",
        "translation": "Referee"
    },
    {
        "language": "čeština",
        "word": "Tournament",
        "translation": "Tournament"
    },
    {
        "language": "čeština",
        "word": "Competition",
        "translation": "Competition"
    },
    {
        "language": "čeština",
        "word": "University",
        "translation": "University"
    },
    {
        "language": "čeština",
        "word": "Library",
        "translation": "Library"
    },
    {
        "language": "čeština",
        "word": "Lecture",
        "translation": "Lecture"
    },
    {
        "language": "čeština",
        "word": "Diploma",
        "translation": "Diploma"
    },
    {
        "language": "čeština",
        "word": "Professor",
        "translation": "Professor"
    },
    {
        "language": "čeština",
        "word": "Lab",
        "translation": "Lab"
    },
    {
        "language": "čeština",
        "word": "Presentation",
        "translation": "Presentation"
    },
    {
        "language": "čeština",
        "word": "Schedule",
        "translation": "Schedule"
    },
    {
        "language": "čeština",
        "word": "Knowledge",
        "translation": "Knowledge"
    },
    {
        "language": "čeština",
        "word": "Painting",
        "translation": "Painting"
    },
    {
        "language": "čeština",
        "word": "Sculpture",
        "translation": "Sculpture"
    },
    {
        "language": "čeština",
        "word": "Drama",
        "translation": "Drama"
    },
    {
        "language": "čeština",
        "word": "Classic",
        "translation": "Classic"
    },
    {
        "language": "čeština",
        "word": "Novel",
        "translation": "Novel"
    },
    {
        "language": "čeština",
        "word": "Poetry",
        "translation": "Poetry"
    },
    {
        "language": "čeština",
        "word": "Exhibition",
        "translation": "Exhibition"
    },
    {
        "language": "čeština",
        "word": "Artist",
        "translation": "Artist"
    },
    {
        "language": "čeština",
        "word": "Cultural heritage",
        "translation": "Cultural heritage"
    },
    {
        "language": "čeština",
        "word": "Freckles",
        "translation": "Freckles"
    },
    {
        "language": "čeština",
        "word": "Wrinkles",
        "translation": "Wrinkles"
    },
    {
        "language": "čeština",
        "word": "Beard",
        "translation": "Beard"
    },
    {
        "language": "čeština",
        "word": "Mustache",
        "translation": "Mustache"
    },
    {
        "language": "čeština",
        "word": "Blush",
        "translation": "Blush"
    },
    {
        "language": "čeština",
        "word": "Complexion",
        "translation": "Complexion"
    },
    {
        "language": "čeština",
        "word": "Jawline",
        "translation": "Jawline"
    },
    {
        "language": "čeština",
        "word": "Pores",
        "translation": "Pores"
    },
    {
        "language": "čeština",
        "word": "Eyelashes",
        "translation": "Eyelashes"
    },


    ];

  class VocabularyTrainer {
    constructor() {
        this.currentWord = null;
        this.stats = {
            correct: 0,
            incorrect: 0,
            total: 0
        };
        this.initializeElements();
        this.initializeEventListeners();
    }

    initializeElements() {
        this.elements = {
            addWordsDiv: document.getElementById('add-words'),
            practiceDiv: document.getElementById('practice'),
            questionEl: document.getElementById('question'),
            answerEl: document.getElementById('answer'),
            feedbackEl: document.getElementById('feedback'),
            scoreDisplay: document.getElementById('score-display'),
            progressBar: document.getElementById('progress-bar')
        };
    }

    initializeEventListeners() {
        document.getElementById('add-word-btn').addEventListener('click', () => this.addWord());
        document.getElementById('start-practice').addEventListener('click', () => this.startPractice());
        document.getElementById('submit-answer').addEventListener('click', () => this.checkAnswer());
        document.getElementById('dont-know-btn').addEventListener('click', () => this.dontKnow());
        document.getElementById('toggle-add-words').addEventListener('click', () => this.toggleAddWords());
        document.getElementById('pronunciation-btn').addEventListener('click', () => this.playPronunciation());
        document.getElementById('answer').addEventListener('keydown', (e) => {
            if (e.key === 'Enter') this.checkAnswer();
        });
    }

    dontKnow() {
        if (!this.currentWord) return;

        this.stats.incorrect++;
        this.stats.total++;
        this.elements.feedbackEl.textContent = `Nevadí! Správná odpověď je: ${this.currentWord.translation}`;
        this.elements.feedbackEl.className = 'feedback-incorrect';
        this.updateStats();
        setTimeout(() => this.nextQuestion(), 2000);
    }

    addWord() {
        const language = document.getElementById('language').value.trim();
        const word = document.getElementById('word').value.trim();
        const translation = document.getElementById('translation').value.trim();

        if (language && word && translation) {
            words.push({ language, word, translation });
            UIkit.notification({
                message: 'Slovíčko úspěšně přidáno!',
                status: 'success'
            });
            this.clearInputs();
        } else {
            UIkit.notification({
                message: 'Prosím vyplňte všechna pole.',
                status: 'warning'
            });
        }
    }

    clearInputs() {
        ['language', 'word', 'translation'].forEach(id => {
            document.getElementById(id).value = '';
        });
    }

    startPractice() {
        if (words.length === 0) {
            UIkit.notification({
                message: 'Nejdříve přidejte slovíčka!',
                status: 'warning'
            });
            return;
        }

        this.elements.addWordsDiv.classList.add('hidden');
        document.getElementById('start-practice').classList.add('hidden');
        this.elements.practiceDiv.classList.remove('hidden');
        this.nextQuestion();
    }

    nextQuestion() {
        this.currentWord = words[Math.floor(Math.random() * words.length)];
        this.elements.questionEl.textContent = `Jak se řekne '${this.currentWord.word}' v jazyce ${this.currentWord.language}?`;
        this.elements.answerEl.value = '';
        this.elements.feedbackEl.textContent = '';
        this.playPronunciation();
    }

    checkAnswer() {
        const answer = this.elements.answerEl.value.trim();
        this.stats.total++;

        const isCorrect = answer.toLowerCase() === this.currentWord.translation.toLowerCase();

        if (isCorrect) {
            this.handleCorrectAnswer();
        } else {
            this.handleIncorrectAnswer();
        }

        this.updateStats();
        setTimeout(() => this.nextQuestion(), 2000);
    }

    handleCorrectAnswer() {
        this.stats.correct++;
        this.elements.feedbackEl.textContent = 'Správně!';
        this.elements.feedbackEl.className = 'feedback-correct';
    }

    handleIncorrectAnswer() {
        this.stats.incorrect++;
        this.elements.feedbackEl.textContent = `Špatně. Správná odpověď je: ${this.currentWord.translation}`;
        this.elements.feedbackEl.className = 'feedback-incorrect';
    }

    updateStats() {
        const accuracy = (this.stats.correct / this.stats.total * 100) || 0;
        this.elements.scoreDisplay.textContent =
            `Správně: ${this.stats.correct} | Špatně: ${this.stats.incorrect} | Celkem: ${this.stats.total}`;
        this.updateProgressBar(accuracy);
    }

    updateProgressBar(accuracy) {
        const progressBar = this.elements.progressBar;
        progressBar.style.width = `${accuracy}%`;

        if (accuracy >= 50) {
            progressBar.style.backgroundColor = 'green';
        } else {
            progressBar.style.backgroundColor = 'red';
        }
        progressBar.textContent = `${Math.round(accuracy)}%`;
    }

    toggleAddWords() {
        this.elements.addWordsDiv.classList.toggle('hidden');
    }

    playPronunciation() {
        if (!this.currentWord) return;

        const utterance = new SpeechSynthesisUtterance(this.currentWord.word);
        utterance.lang = 'en-GB';
        utterance.rate = 1;
        window.speechSynthesis.speak(utterance);
    }
}

// Initialize the application
document.addEventListener('DOMContentLoaded', () => {
    const trainer = new VocabularyTrainer();
    const countDiv = document.getElementById('count');
    countDiv.innerHTML = 'Počet slovíček v databázi: ' + words.length;
});
</script>

<script>



</script>
</body>
</html>