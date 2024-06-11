function showGame(game) {
    // Haal de template op en clone die
    const gameTemplate = document.getElementById("game_template");
    const gameClone = gameTemplate.content.cloneNode(true);

    // Vul de clone in 
    gameClone.querySelector(".game_name").innerHTML = game.name;
    gameClone.querySelector(".game_description").innerHTML = game.description;
    gameClone.querySelector("#game_img").src = game.img;
    gameClone.querySelector("#game_ref").href = game.href;

    // Append de clone aan de games
    const gamesOverzicht = document.getElementById("games_overzicht");
    gamesOverzicht.appendChild(gameClone);
}

async function getGames() {
    // Haal de data op, krijgt een array van de games
    const response = await fetch("json/games.json");
    const games = await response.json();

    // Voor elke game, showGame
    for(const game of games) {
        showGame(game);
    }
}

getGames();