const search = document.querySelector('input[placeholder="Wyszukaj gry"]');
const gameContainer = document.querySelector(".all-games");

search.addEventListener("keyup", function (event)
{
    if (event.key === "Enter")
    {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (games) {
            gameContainer.innerHTML = "";
            loadGames(games)
        });
    }
});

function loadGames(games)
{
    games.forEach(game =>
    {
        console.log(game);
        createGame(game);
    });
}

function createGame(game)
{
    const template = document.querySelector("#game-template");
    const clone = template.content.cloneNode(true);

    const picture = clone.querySelector("img");
    picture.src = `/../public/uploads/${game.picture}`;

    const name = clone.querySelector("h3");
    name.innerHTML = game.name;

    const platform = clone.querySelector(".platform");
    platform.innerHTML = game.platform;

    const datepremiere = clone.querySelector(".datepremiere");
    datepremiere.innerHTML = game.datepremiere;

    const type = clone.querySelector(".type");
    type.innerHTML = game.type;

    const description = clone.querySelector(".description");
    description.innerHTML = game.description;

    const rate = clone.querySelector(".rate");
    rate.innerHTML = game.rate;

    gameContainer.appendChild(clone);
}