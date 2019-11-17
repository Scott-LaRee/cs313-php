 
const express = require('express')
const path = require('path')
const PORT = process.env.PORT || 5000
const app = express();

app.use(express.static(path.join(__dirname, 'public')));
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');
app.get('/', (req, res) => res.render('pages/index'));
  

app.get('/getRate', calculateRate);//(req, res) => res.render('pages/rates'));
app.listen(PORT, () => console.log(`Listening on ${ PORT }`));


function calculateRate(req, res) {
  const type = req.query.type;
  const weight = req.query.weight;
  var cost = 0;

  switch (type) {
    case '1':
      cost = calculateStamped(weight);
      break;
    case '2':
      cost = calculateMetered(weight);
      break;
    case '3':
      cost = calculateFlats(weight);
      break;
    case '4':
      cost = calculatePackage(weight);
      break;
    default:
      break;
  }
  params = { weight, weight, cost, cost};

  if (cost != 0) {
    res.render('pages/rates', params);
  } 
}

function calculateStamped(weight) {
  var cost = 0;

  if (weight < 1) {
    cost = 0.55;
  } else if (weight < 2) {
    cost = 0.70;
  } else if (weight < 3) {
    cost = 0.85;
  } else if (weight < 3.5) {
    cost = 1;
  } else {
    cost = calculateFlats(weight);
  }

  return cost;
}

function calculateMetered(weight) {
  var cost = 0;
  if (weight < 1) {
    cost = 0.5;
  } else if (weight < 2) {
    cost = 0.65;
  } else if (weight < 3) {
    cost = 0.8;
  } else if (weight < 3.5) {
    cost = 0.95
  } else {
    cost = calculateFlats(weight);
  }
  return cost;
}

function calculateFlats(weight) {
  var cost = 0;

  if (weight < 1) {
    cost = 1;
  } else if (weight < 2) {
    cost = 1.15;
  } else if (weight < 3) {
    cost = 1.3;
  } else if (weight < 4) {
    cost = 1.45;
  } else if (weight < 5) {
    cost = 1.6; 
  } else if (weight < 6) {
    cost = 1.75;
  } else if (weight < 7) {
    cost = 1.9;
  } else if (weight < 8) {
    cost = 2.05;
  } else if (weight < 9) {
    cost = 2.2;
  } else if (weight < 10) {
    cost = 2.35;
  } else if (weight < 11) {
    cost = 2.5;
  } else if (weight < 12) {
    cost = 2.65;
  } else if (weight < 13) {
    cost = 2.8;
  } 

  return cost;
}

function calculatePackage(weight) {
  var cost = 0;

  if (weight < 4) {
    cost = 3.66;
  }  else if (weight < 8) {
    cost = 4.39;
  } else if (weight < 12) {
    cost = 5.19;
  } else if (weight < 13) {
    cost = 5.71;
  } 
  
  return cost;
}