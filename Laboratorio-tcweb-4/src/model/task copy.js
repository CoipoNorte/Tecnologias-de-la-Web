const mongoose = require('mongoose');
const Schema = mongoose.Schema;

const TaskSchema = Schema({
  nombre: String,
  precio: String,
  imagen: String,
  categoria: String,
  descripcion: String,
});

module.exports = mongoose.model('tasks', TaskSchema);
