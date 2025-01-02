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
    </style>
</head>
<body>
<div class="uk-container uk-container-xsmall" style="border:1px solid gray; background-color: #DBF227">
    <h1 class="uk-text-uppercase uk-margin-medium-top">Procvičování slovíček</h1>
<nav aria-label="Breadcrumb">
    <ul class="uk-breadcrumb">
        <li><a href="../index.php">Výběr jazyků</a></li>
         <li><a href="index.php">Francouzština</a></li>

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
            <h2>Francouzština</h2>
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
        <hr>
        <span class="uk-text-small" style="color:black">2025 COPYLEFT Aleš Kuklínek</span> <br>
        <span  class="uk-text-small" style="color:black" id="count"></span>
    </footer>
    <br><br><br><br>
</div>

<script>
    const words = [
        { language: 'čeština', word: 'Maison', translation: 'Dům' },
        { language: 'čeština', word: 'Chien', translation: 'Pes' },
        { language: 'čeština', word: 'Chat', translation: 'Kočka' },
        { language: 'čeština', word: 'Fleur', translation: 'Květina' },
        { language: 'čeština', word: 'Arbre', translation: 'Strom' },
        { language: 'čeština', word: 'Voiture', translation: 'Auto' },
        { language: 'čeština', word: 'Livre', translation: 'Kniha' },
        { language: 'čeština', word: 'Pomme', translation: 'Jablko' },
        { language: 'čeština', word: 'École', translation: 'Škola' },
        { language: 'čeština', word: 'Table', translation: 'Stůl' },
        { language: 'čeština', word: 'Chaise', translation: 'Židle' },
        { language: 'čeština', word: 'Porte', translation: 'Dveře' },
        { language: 'čeština', word: 'Fenêtre', translation: 'Okno' },
        { language: 'čeština', word: 'Lune', translation: 'Měsíc' },
        { language: 'čeština', word: 'Soleil', translation: 'Slunce' },
        { language: 'čeština', word: 'Mer', translation: 'Moře' },
        { language: 'čeština', word: 'Montagne', translation: 'Hora' },
        { language: 'čeština', word: 'Rivière', translation: 'Řeka' },
        { language: 'čeština', word: 'Neige', translation: 'Sníh' },
        { language: 'čeština', word: 'Pluie', translation: 'Déšť' },
        { language: 'čeština', word: 'Vent', translation: 'Vítr' },
        { language: 'čeština', word: 'Feu', translation: 'Oheň' },
        { language: 'čeština', word: 'Eau', translation: 'Voda' },
        { language: 'čeština', word: 'Pain', translation: 'Chléb' },
        { language: 'čeština', word: 'Fromage', translation: 'Sýr' },
        { language: 'čeština', word: 'Viande', translation: 'Maso' },
        { language: 'čeština', word: 'Poisson', translation: 'Ryba' },
        { language: 'čeština', word: 'Lait', translation: 'Mléko' },
        { language: 'čeština', word: 'Café', translation: 'Káva' },
        { language: 'čeština', word: 'Thé', translation: 'Čaj' },
        { language: 'čeština', word: 'Vin', translation: 'Víno' },
        { language: 'čeština', word: 'Bière', translation: 'Pivo' },
        { language: 'čeština', word: 'Fille', translation: 'Dívka' },
        { language: 'čeština', word: 'Garçon', translation: 'Chlapec' },
        { language: 'čeština', word: 'Femme', translation: 'Žena' },
        { language: 'čeština', word: 'Homme', translation: 'Muž' },
        { language: 'čeština', word: 'Enfant', translation: 'Dítě' },
        { language: 'čeština', word: 'Ami', translation: 'Přítel' },
        { language: 'čeština', word: 'Amour', translation: 'Láska' },
        { language: 'čeština', word: 'Travail', translation: 'Práce' },
        { language: 'čeština', word: 'Temps', translation: 'Čas' },
        { language: 'čeština', word: 'Jour', translation: 'Den' },
        { language: 'čeština', word: 'Nuit', translation: 'Noc' },
        { language: 'čeština', word: 'Lumière', translation: 'Světlo' },
        { language: 'čeština', word: 'Obscurité', translation: 'Temnota' },
        { language: 'čeština', word: 'Rue', translation: 'Ulice' },
        { language: 'čeština', word: 'Ville', translation: 'Město' },
        { language: 'čeština', word: 'Pays', translation: 'Země' },
        { language: 'čeština', word: 'Monde', translation: 'Svět' },
        { language: 'čeština', word: 'Musique', translation: 'Hudba' },
        { language: 'čeština', word: 'Chanson', translation: 'Píseň' },
        { language: 'čeština', word: 'Danse', translation: 'Tanec' },
        { language: 'čeština', word: 'Film', translation: 'Film' },
        { language: 'čeština', word: 'Sport', translation: 'Sport' },
        { language: 'čeština', word: 'Football', translation: 'Fotbal' },
        { language: 'čeština', word: 'Tennis', translation: 'Tenis' },
        { language: 'čeština', word: 'Étoile', translation: 'Hvězda' },
        { language: 'čeština', word: 'Ciel', translation: 'Nebe' },
        { language: 'čeština', word: 'Terre', translation: 'Země' },
        { language: 'čeština', word: 'Lac', translation: 'Jezero' },
        { language: 'čeština', word: 'Plage', translation: 'Pláž' },
        { language: 'čeština', word: 'Forêt', translation: 'Les' },
        { language: 'čeština', word: 'Cheval', translation: 'Kůň' },
        { language: 'čeština', word: 'Oiseau', translation: 'Pták' },
        { language: 'čeština', word: 'Poisson', translation: 'Ryba' },
        { language: 'čeština', word: 'Lapin', translation: 'Králík' },
        { language: 'čeština', word: 'Souris', translation: 'Myš' },
        { language: 'čeština', word: 'Tigre', translation: 'Tygr' },
        { language: 'čeština', word: 'Lion', translation: 'Lev' },
        { language: 'čeština', word: 'Serpent', translation: 'Had' },
        { language: 'čeština', word: 'Loup', translation: 'Vlk' },
        { language: 'čeština', word: 'Ours', translation: 'Medvěd' },
        { language: 'čeština', word: 'Éléphant', translation: 'Slon' },
        { language: 'čeština', word: 'Zèbre', translation: 'Zebra' },
        { language: 'čeština', word: 'Singe', translation: 'Opice' },
        { language: 'čeština', word: 'Papillon', translation: 'Motýl' },
        { language: 'čeština', word: 'Abeille', translation: 'Včela' },
        { language: 'čeština', word: 'Araignée', translation: 'Pavouk' },
        { language: 'čeština', word: 'Fourmi', translation: 'Mravenec' },
        { language: 'čeština', word: 'Libellule', translation: 'Vážka' },
        { language: 'čeština', word: 'Coccinelle', translation: 'Beruška' },
        { language: 'čeština', word: 'Soleil', translation: 'Slunce' },
        { language: 'čeština', word: 'Lune', translation: 'Měsíc' },
        { language: 'čeština', word: 'Étoile', translation: 'Hvězda' },
        { language: 'čeština', word: 'Arc-en-ciel', translation: 'Duhový oblouk' },
        { language: 'čeština', word: 'Nuage', translation: 'Mrak' },
        { language: 'čeština', word: 'Pluie', translation: 'Déšť' },
        { language: 'čeština', word: 'Neige', translation: 'Sníh' },
        { language: 'čeština', word: 'Givre', translation: 'Jinovatka' },
        { language: 'čeština', word: 'Orage', translation: 'Bouřka' },
        { language: 'čeština', word: 'Tornade', translation: 'Tornádo' },
        { language: 'čeština', word: 'Éclair', translation: 'Blesk' },
        { language: 'čeština', word: 'Bateau', translation: 'Loď' },
        { language: 'čeština', word: 'Pont', translation: 'Most' },
        { language: 'čeština', word: 'Route', translation: 'Silnice' },
        { language: 'čeština', word: 'Chemin', translation: 'Cesta' },
        { language: 'čeština', word: 'Colline', translation: 'Kopec' },
        { language: 'čeština', word: 'Vallée', translation: 'Údolí' },

        { language: 'čeština', word: 'Eau', translation: 'Voda' },
        { language: 'čeština', word: 'Pain', translation: 'Chléb' },
        { language: 'čeština', word: 'Fromage', translation: 'Sýr' },
        { language: 'čeština', word: 'Viande', translation: 'Maso' },
        { language: 'čeština', word: 'Poisson', translation: 'Ryba' },
        { language: 'čeština', word: 'Lait', translation: 'Mléko' },
        { language: 'čeština', word: 'Café', translation: 'Káva' },
        { language: 'čeština', word: 'Thé', translation: 'Čaj' },
        { language: 'čeština', word: 'Vin', translation: 'Víno' },
        { language: 'čeština', word: 'Bière', translation: 'Pivo' },
        { language: 'čeština', word: 'Fille', translation: 'Dívka' },
        { language: 'čeština', word: 'Garçon', translation: 'Chlapec' },
        { language: 'čeština', word: 'Femme', translation: 'Žena' },
        { language: 'čeština', word: 'Homme', translation: 'Muž' },
        { language: 'čeština', word: 'Enfant', translation: 'Dítě' },
        { language: 'čeština', word: 'Ami', translation: 'Přítel' },
        { language: 'čeština', word: 'Amour', translation: 'Láska' },
        { language: 'čeština', word: 'Travail', translation: 'Práce' },
        { language: 'čeština', word: 'Temps', translation: 'Čas' },
        { language: 'čeština', word: 'Jour', translation: 'Den' },
        { language: 'čeština', word: 'Nuit', translation: 'Noc' },
        { language: 'čeština', word: 'Lumière', translation: 'Světlo' },
        { language: 'čeština', word: 'Obscurité', translation: 'Temnota' },
        { language: 'čeština', word: 'Rue', translation: 'Ulice' },
        { language: 'čeština', word: 'Ville', translation: 'Město' },
        { language: 'čeština', word: 'Pays', translation: 'Země' },
        { language: 'čeština', word: 'Monde', translation: 'Svět' },
        { language: 'čeština', word: 'Musique', translation: 'Hudba' },
        { language: 'čeština', word: 'Chanson', translation: 'Píseň' },
        { language: 'čeština', word: 'Danse', translation: 'Tanec' },
        { language: 'čeština', word: 'Film', translation: 'Film' },
        { language: 'čeština', word: 'Sport', translation: 'Sport' },
        { language: 'čeština', word: 'Football', translation: 'Fotbal' },
        { language: 'čeština', word: 'Tennis', translation: 'Tenis' },
        { language: 'čeština', word: 'Étoile', translation: 'Hvězda' },
        { language: 'čeština', word: 'Ciel', translation: 'Nebe' },
        { language: 'čeština', word: 'Terre', translation: 'Země' },
        { language: 'čeština', word: 'Lac', translation: 'Jezero' },
        { language: 'čeština', word: 'Plage', translation: 'Pláž' },
        { language: 'čeština', word: 'Forêt', translation: 'Les' },
        { language: 'čeština', word: 'Cheval', translation: 'Kůň' },
        { language: 'čeština', word: 'Oiseau', translation: 'Pták' },
        { language: 'čeština', word: 'Poisson', translation: 'Ryba' },
        { language: 'čeština', word: 'Lapin', translation: 'Králík' },
        { language: 'čeština', word: 'Souris', translation: 'Myš' },
        { language: 'čeština', word: 'Tigre', translation: 'Tygr' },
        { language: 'čeština', word: 'Lion', translation: 'Lev' },
        { language: 'čeština', word: 'Serpent', translation: 'Had' },
        { language: 'čeština', word: 'Loup', translation: 'Vlk' },
        { language: 'čeština', word: 'Ours', translation: 'Medvěd' },
        { language: 'čeština', word: 'Éléphant', translation: 'Slon' },
        { language: 'čeština', word: 'Zèbre', translation: 'Zebra' },
        { language: 'čeština', word: 'Singe', translation: 'Opice' },
        { language: 'čeština', word: 'Papillon', translation: 'Motýl' },
        { language: 'čeština', word: 'Abeille', translation: 'Včela' },
        { language: 'čeština', word: 'Araignée', translation: 'Pavouk' },
        { language: 'čeština', word: 'Fourmi', translation: 'Mravenec' },
        { language: 'čeština', word: 'Libellule', translation: 'Vážka' },
        { language: 'čeština', word: 'Coccinelle', translation: 'Beruška' },
        { language: 'čeština', word: 'Soleil', translation: 'Slunce' },
        { language: 'čeština', word: 'Lune', translation: 'Měsíc' },
        { language: 'čeština', word: 'Étoile', translation: 'Hvězda' },
        { language: 'čeština', word: 'Arc-en-ciel', translation: 'Duhový oblouk' },
        { language: 'čeština', word: 'Nuage', translation: 'Mrak' },
        { language: 'čeština', word: 'Pluie', translation: 'Déšť' },
        { language: 'čeština', word: 'Neige', translation: 'Sníh' },
        { language: 'čeština', word: 'Givre', translation: 'Jinovatka' },
        { language: 'čeština', word: 'Orage', translation: 'Bouřka' },
        { language: 'čeština', word: 'Tornade', translation: 'Tornádo' },
        { language: 'čeština', word: 'Éclair', translation: 'Blesk' },

        // Adding 200 more French words
        { language: 'čeština', word: 'Bateau', translation: 'Loď' },
        { language: 'čeština', word: 'Pont', translation: 'Most' },
        { language: 'čeština', word: 'Route', translation: 'Silnice' },
        { language: 'čeština', word: 'Chemin', translation: 'Cesta' },
        { language: 'čeština', word: 'Colline', translation: 'Kopec' },
        { language: 'čeština', word: 'Vallée', translation: 'Údolí' },
        { language: 'čeština', word: 'Château', translation: 'Zámek' },
        { language: 'čeština', word: 'Tour', translation: 'Věž' },
        { language: 'čeština', word: 'Jardin', translation: 'Zahrada' },
        { language: 'čeština', word: 'Fleuriste', translation: 'Květinářství' },
        { language: 'čeština', word: 'Magasin', translation: 'Obchod' },
        { language: 'čeština', word: 'Supermarché', translation: 'Supermarket' },
        { language: 'čeština', word: 'Pharmacie', translation: 'Lékárna' },
        { language: 'čeština', word: 'Église', translation: 'Kostel'}
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

            //test

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
            this.elements.progressBar.style.width = `${accuracy}%`;
        }

        toggleAddWords() {
            this.elements.addWordsDiv.classList.toggle('hidden');
        }

        playPronunciation() {
            if (!this.currentWord) return;

            const utterance = new SpeechSynthesisUtterance(this.currentWord.word);
            utterance.lang = 'fr-FR';
            utterance.rate = 1;
            window.speechSynthesis.speak(utterance);
        }
    }


    // Initialize the application
    document.addEventListener('DOMContentLoaded', () => {
        const trainer = new VocabularyTrainer();
        const wordCount = words.length; const countDiv = document.getElementById('count'); countDiv.innerHTML = 'Počet slovíček v databázi: ' + wordCount;

    });
</script>

<script>



</script>
</body>
</html>