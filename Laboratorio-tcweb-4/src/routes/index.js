const express = require('express');
const router = express.Router();
const Task = require('../model/task');

router.get('/inicio', async (req, res) => {
  const tasks = await Task.find();
  res.render('lab4_inicio', {
    tasks
  });
});
router.get('/crearproducto', async (req, res) => {
  const tasks = await Task.find();
  res.render('lab4_crearproducto', {
    tasks
  });
});

/* METODOS */
/*-------------------------------------------------*/
//AGREGAR
router.post('/agregar', async (req, res, next) => {
  let task = new Task(req.body);

  console.log(task);
  console.log('{Starus: "OK","respuesta": {' + JSON.stringify(task) + '}}');

  await task.save();
  res.redirect('/crearproducto');
});

//VER
router.get('/ver/:id', async (req, res, next) => {
  const task = await Task.findById(req.params.id);
  console.log(task)
  res.render('lab4_ver', { task });
});

//MODIFICAR
router.get('/modificar/:id', async (req, res, next) => {
  const task = await Task.findById(req.params.id);
  console.log(task)
  res.render('lab4_modificar', { task });
});
router.post('/modificar/:id', async (req, res, next) => {
  const { id } = req.params;
  await Task.update({_id: id}, req.body);
  res.redirect('/crearproducto');
});

//BORRAR
router.get('/eliminar/:id', async (req, res, next) => {
  let { id } = req.params;
  await Task.remove({_id: id});
  res.redirect('/crearproducto');
});

module.exports = router;