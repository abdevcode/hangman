$( document ).ready(function() {
    let attempts = 5;
    let testedLetters  = [];
    let superhero = $('#superhero').val();

    let players = [];
    let playerIndex = 0;

    loadPlayers();
    setNextPlayerTurn();

    $( document ).keypress(function (e) {
        let letter = e.key.toUpperCase();
        let letterIndex = superhero.toUpperCase().indexOf(letter);

        // Si es igual a -1 => Esta letra ya se habia revisado
        if (testedLetters.indexOf(letter) === -1) {
            // Si es mayor que -1 => ha encontrado la letra
            if ( letterIndex > -1 ){
                addCorrectLetter(letter);
                checkWin();
            } else {
                addWrongLetter(letter);
                checkLose();
            }
            setNextPlayerTurn();
        }

        testedLetters.push(letter);
    });

    function setNextPlayerTurn() {
        $('#player-turn').text(players[(playerIndex++%players.length)]);
    }

    function loadPlayers() {
        $('[id^="player-"]').each(function(index){
            players[index-1] = $(this).val();
        });
    }

    function checkLose() {
        if (--attempts <= 0) {
            console.log('THE END!');
            $('#game-result').val('loser');
            $('#gameover-form').submit();
        }
    }

    function checkWin() {
        if (!superhero.trim()) {
            console.log('THE END!');
            $('#game-result').val('winner');
            $('#gameover-form').submit();
        }
    }

    function addCorrectLetter(letter) {
        let regex = new RegExp(letter, "gi");
        let result;

        while ( (result = regex.exec(superhero.toUpperCase())) ) {
            // Mostrar la letra
            $('#letter-' + result.index).find('span').show();

            // Reemplazar las letras por espacios en blanco
            superhero = superhero.substring(0, result.index) + ' ' + superhero.substring(result.index + 1, superhero.length);
        }
    }

    function addWrongLetter(letter) {
        let wrongLetterElem = $( document.createElement('span') );
        wrongLetterElem.addClass('font-weight-bold mr-1');
        wrongLetterElem.html('<del>'+letter+'</del>');
        $('#letters-failed').append(wrongLetterElem);
    }
});