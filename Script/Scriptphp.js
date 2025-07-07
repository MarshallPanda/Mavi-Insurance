fetch('https://TUNOMBREDEUSUARIO.infinityfreeapp.com/send-whatsapp.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({
    chatId: `${numero}@c.us`,
    message: texto
  })
})
.then(res => res.json())
.then(res => {
  alert("Mensaje enviado con éxito.");
  console.log(res);
})
.catch(err => {
  alert("Error al enviar el mensaje.");
  console.error(err);
});
