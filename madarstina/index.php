<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/uikit.min.css">
    <script src="../js/uikit.min.js"></script>
    <script src="../js/uikit-icons.min.js"></script>
    <title>Maďarština - Učení slovíček</title>
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
         <li><a href="index.php">Maďarština</a></li>

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
            <h2>Maďarština</h2>
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

    {"language": "maďarština", "word": "Ház", "translation": "Dům"},

    {"language": "maďarština", "word": "Fa", "translation": "Strom"},

    {"language": "maďarština", "word": "Kutya", "translation": "Pes"},

    {"language": "maďarština", "word": "Macska", "translation": "Kočka"},

    {"language": "maďarština", "word": "Víz", "translation": "Voda"},

    {"language": "maďarština", "word": "Tűz", "translation": "Oheň"},

    {"language": "maďarština", "word": "Levegő", "translation": "Vzduch"},

    {"language": "maďarština", "word": "Barát", "translation": "Přítel"},

    {"language": "maďarština", "word": "Autó", "translation": "Auto"},

    {"language": "maďarština", "word": "Könyv", "translation": "Kniha"},

    {"language": "maďarština", "word": "Virág", "translation": "Květina"},

    {"language": "maďarština", "word": "Anya", "translation": "Matka"},

    {"language": "maďarština", "word": "Apa", "translation": "Otec"},

    {"language": "maďarština", "word": "Gyerek", "translation": "Dítě"},

    {"language": "maďarština", "word": "Nap", "translation": "Den"},

    {"language": "maďarština", "word": "Éjszaka", "translation": "Noc"},

    {"language": "maďarština", "word": "Szék", "translation": "Židle"},

    {"language": "maďarština", "word": "Asztal", "translation": "Stůl"},

    {"language": "maďarština", "word": "Iskola", "translation": "Škola"},

    {"language": "maďarština", "word": "Vonat", "translation": "Vlak"}

]


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
            utterance.lang = 'hu-HU';
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