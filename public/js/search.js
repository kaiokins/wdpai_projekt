const search = document.querySelector('input[placeholder="Wyszukaj gry"]');
const gameContainer = document.querySelector(".all-games");
const sortButton = document.querySelectorAll('.sort-button')

sortButton.forEach(function (e) {
    e.addEventListener('click',function (event) {
        event.preventDefault();
        search.value = '';

        let type = this.dataset.type;
        let state = this.dataset.asc;
        let asc = '';
        if(state=='0')
        {
            asc = 1;
            this.querySelector('i').classList.add('fa-sort-up')
            this.querySelector('i').classList.remove('fa-sort-down')
        }
        else
        {
            asc = 0;
            this.querySelector('i').classList.add('fa-sort-down')
            this.querySelector('i').classList.remove('fa-sort-up')
        }

        this.dataset.asc = asc;

        const data = {sort: type,asc: asc, fun: 'sort'};

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

    })
})

search.addEventListener("keyup", function (event)
{
    if (event.key === "Enter")
    {
        event.preventDefault();

        const data = {search: this.value,  fun: 'search'};

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
        // console.log(game);
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
    rate.innerHTML = Math.round(game.rate);

    gameContainer.appendChild(clone);
}