let pion = [[' 🔴 ',0],[' 🟠 ',0],[' 🟡 ',0],[' 🟢 ',0],['🔵',0],['🟣',0]];

let players = [];

var dieNum;
var currentPlayer = 0;
var player;


function startGame(x) {
  for(var i = 0; i < x; i++) {
    players.push(pion[i]);
    $('#p0').html(pion[i][0])
  }
  currentPlayer = 0;
  localStorage.setItem("players", JSON.stringify(players));
  localStorage.setItem("currentPlayer", JSON.stringify(currentPlayer));
}

function getRandomInt(min, max) {
  return Math.floor(Math.random() * (max - min + 1) + min);
};

const delay = async (ms = 1000) => new Promise(resolve => setTimeout(resolve, ms))

async function rollDie() {
  
  players1 = JSON.parse(localStorage.getItem("players"))
  currentPlayer = JSON.parse(localStorage.getItem("currentPlayer"))
  localStorage.removeItem("players")
  console.log(players1);
  await delay(1000);
	// * Choix d'une valeur pour le dé
  dice = getRandomInt(1,6); 
  var imgUrl = `res/dice/dice-${dice}.png`
  $("#dice").css({
    "background": "url(" + imgUrl + ")",
    "background-size":"cover",
    "background-repeat":"no-repeat",
    "background-position": "55px 30px",
    "background-size": "90px 90px",
    "background-color": "#fff",
    "height": "150px",
    "width": "200px",
    "border-radius": "10px",
    "font-family": "Menlo, monospace",
    "font-size": "4em",
    "line-height": "100px",
    "text-align": "center",
  })
  console.log("dice"+dice+".png")
 
  // * Tant que x inférieur à la valeur du dé
  for(x = 0; x < dice; x++) { 
      
		  // * Chaque seconde, déplacer le pion de 1;
      

			var text = $('#p'+Math.floor(players1[currentPlayer][1])).text()

      var text = text.split(players1[currentPlayer][0])

      $('#p'+Math.floor(players1[currentPlayer][1])).html(text)

			players1[currentPlayer][1] = Math.floor(players1[currentPlayer][1]) + 1;

			if(Math.floor(players1[currentPlayer][1]) > 39) { players1[currentPlayer][1] = 0;}

			$('#p'+Math.floor(players1[currentPlayer][1])).append(players1[currentPlayer][0])

			await delay(500);

  }

  localStorage.setItem("players", JSON.stringify(players1));
  
  switch (players1[currentPlayer][1]) {
    case 0:
      changeWindow2(players1[currentPlayer][1])
      break;
    case 5:
      changeWindow2(players1[currentPlayer][1])
      break;
    case 10:
      changeWindow2(players1[currentPlayer][1])
      break;
    case 15:
      changeWindow2(players1[currentPlayer][1])
      break;
    case 20:
      changeWindow2(players1[currentPlayer][1])
      break;
    case 25:
      changeWindow2(players1[currentPlayer][1])
      break;
    case 30:
      changeWindow2(players1[currentPlayer][1])
      break;
    case 35:
      changeWindow2(players1[currentPlayer][1])
      break;
    default:
      changeWindow(players1[currentPlayer][0]);
      break;

  }

};

async function changeWindow(x) {
  await delay(500);
  pos = JSON.parse(localStorage.getItem("currentPlayer"))
  players1 = JSON.parse(localStorage.getItem("players"))
  window.location.href=`index.php?uc=partie&action=save&array=${players1[pos]}&jsquestion=0`;
  localStorage.removeItem("currentPlayer")
  currentPlayer = currentPlayer + 1;

  if(currentPlayer > players1.length - 1) { currentPlayer = 0 }

  localStorage.setItem("currentPlayer", JSON.stringify(currentPlayer));
}

async function changeWindow2(x) {
  await delay(500);
  pos = JSON.parse(localStorage.getItem("currentPlayer"))
  players1 = JSON.parse(localStorage.getItem("players"))
  window.location.href=`index.php?uc=partie&action=save&array=${players1[pos]}&jsquestion=1`;
  localStorage.removeItem("currentPlayer")
  currentPlayer = currentPlayer + 1;

  if(currentPlayer > players1.length - 1) { currentPlayer = 0 }

  localStorage.setItem("currentPlayer", JSON.stringify(currentPlayer));
}


function resumeGame(nbJoueur, players1) {
  localStorage.removeItem("currentPlayer");
  localStorage.removeItem("players");
  console.log(players1)
  let players = [];
  for (var i = 0; i < players.length; i++) {
    $('#p'+players[i][1]).html(players[i][0])
    players.push(players1)
   
  }
  console.log(players)
  localStorage.setItem("currentPlayer", JSON.stringify(nbJoueur));
  localStorage.setItem("players", JSON.stringify(players1));
  
}


