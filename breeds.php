<?php include_once 'includes/header.php'; ?>
<section class="py-4 my-5">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="avatar bg-faded p-5 d-flex ms-auto rounded">
                    <a href="cat_breeds.php">
                        <div class="section-heading mb-0">
                            <span class="section-heading-upper">Browse</span>
                            <h2>
                                <span class="word wisteria">cats</span>
                                <span class="word belize">felines</span>
                                <span class="word pomegranate">kitties</span>
                                <span class="word green">pussycats</span>
                                <span class="word green">companions</span>
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="avatar bg-faded p-5 d-flex ms-auto rounded">
                    <a href="dog_breeds.php">
                        <div class="section-heading mb-0">
                            <span class="section-heading-upper">Browse</span>
                            <h2>
                                <span class="wordd wisteria">dogs</span>
                                <span class="wordd belize">canines</span>
                                <span class="wordd pomegranate">hounds</span>
                                <span class="wordd green">tykes</span>
                                <span class="wordd green">companions</span>
                            </h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include_once 'includes/footer.php'; ?>
<script>
    var words = document.getElementsByClassName('word');
    var wordArray = [];
    var currentWord = 0;

    words[currentWord].style.opacity = 1;
    for (var i = 0; i < words.length; i++) {
        splitLetters(words[i]);
    }

    function changeWord() {
        var cw = wordArray[currentWord];
        var nw = currentWord == words.length - 1 ? wordArray[0] : wordArray[currentWord + 1];
        for (var i = 0; i < cw.length; i++) {
            animateLetterOut(cw, i);
        }

        for (var i = 0; i < nw.length; i++) {
            nw[i].className = 'letter behind';
            nw[0].parentElement.style.opacity = 1;
            animateLetterIn(nw, i);
        }

        currentWord = (currentWord == wordArray.length - 1) ? 0 : currentWord + 1;
    }

    function animateLetterOut(cw, i) {
        setTimeout(function() {
            cw[i].className = 'letter out';
        }, i * 80);
    }

    function animateLetterIn(nw, i) {
        setTimeout(function() {
            nw[i].className = 'letter in';
        }, 340 + (i * 80));
    }

    function splitLetters(word) {
        var content = word.innerHTML;
        word.innerHTML = '';
        var letters = [];
        for (var i = 0; i < content.length; i++) {
            var letter = document.createElement('span');
            letter.className = 'letter';
            letter.innerHTML = content.charAt(i);
            word.appendChild(letter);
            letters.push(letter);
        }

        wordArray.push(letters);
    }

    changeWord();
    setInterval(changeWord, 2000);
</script>
<script>
    var wordsd = document.getElementsByClassName('wordd');
    var wordArrayd = [];
    var currentWordd = 0;

    wordsd[currentWordd].style.opacity = 1;
    for (var i = 0; i < wordsd.length; i++) {
        splitLetters(wordsd[i]);
    }

    function changeWordd() {
        var cwd = wordArrayd[currentWordd];
        var nwd = currentWordd == wordsd.length - 1 ? wordArrayd[0] : wordArrayd[currentWordd + 1];
        for (var i = 0; i < cwd.length; i++) {
            animateLetterOut(cwd, i);
        }

        for (var i = 0; i < nwd.length; i++) {
            nwd[i].className = 'letterd behindd';
            nwd[0].parentElement.style.opacity = 1;
            animateLetterIn(nwd, i);
        }

        currentWordd = (currentWordd == wordArrayd.length - 1) ? 0 : currentWordd + 1;
    }

    function animateLetterOutd(cwd, i) {
        setTimeout(function() {
            cwd[i].className = 'letterd outd';
        }, i * 80);
    }

    function animateLetterInd(nwd, i) {
        setTimeout(function() {
            nwd[i].className = 'letterd ind';
        }, 340 + (i * 80));
    }

    function splitLetters(wordd) {
        var contentd = wordd.innerHTML;
        wordd.innerHTML = '';
        var lettersd = [];
        for (var i = 0; i < contentd.length; i++) {
            var letterd = document.createElement('span');
            letterd.className = 'letterd';
            letterd.innerHTML = contentd.charAt(i);
            wordd.appendChild(letterd);
            lettersd.push(letterd);
        }

        wordArrayd.push(lettersd);
    }

    changeWordd();
    setInterval(changeWordd, 4000);
</script>
</body>

</html>