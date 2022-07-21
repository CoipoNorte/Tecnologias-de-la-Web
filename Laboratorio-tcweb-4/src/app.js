const path = require('path');
const express = require('express');
const morgan = require('morgan');
const mongoose = require('mongoose');

const contra = "5Tt7mvVB3QaDEja7";
const usuario = "Copito";
const BDname = "Productos";
const uri = "mongodb+srv://"+usuario+":"+contra+"@cluster0.xp4fn.mongodb.net/"+BDname+"?retryWrites=true&w=majority";

const app = express();

// Conectar a la base de datos
mongoose.connect(uri)
  .then(db => console.log('db uwu'))
  .catch(err => console.log(err));

// Importar Rutas
const indexRoutes = require('./routes/index');

// Configuraciones
app.set('port', process.env.PORT || 3000);
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'ejs');

// middlewares
app.use(morgan('dev'));
app.use(express.urlencoded({extended: false}));

// Rutas
app.use('/', indexRoutes);

app.listen(app.get('port'), () => {
  console.log(`Servidor en el Puertoowo ${app.get('port')}`);
});