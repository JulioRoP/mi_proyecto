<form action="<?= site_url('contacto/enviar') ?>" method="post">
    <input type="text" name="nombre" placeholder="Tu Nombre" required>
    <input type="email" name="email" placeholder="Tu Correo" required>
    <textarea name="mensaje" placeholder="Tu Mensaje" required></textarea>
    <button type="submit">Enviar</button>
</form>
