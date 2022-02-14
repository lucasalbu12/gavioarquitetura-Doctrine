
</section>
<footer class='main-footer'>
    <div class="footer-content">
        <div class="footer-social-info">
            <div class="footer-social-media">
                <a href="#" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a href="https://www.instagram.com/isagavio.arq/" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="footer-adress">
                <p>Rua Ataliba de Barros, 182, São Mateus - Juiz de Fora (Rossi 360 Business, sala 407)</p>
                <p>2021 - Todos os direitos reservados.</p>
            </div>

        </div>
    </div>
    <div class="footer-content">
        <div class="footer-form">
            <strong>Entre em contato conosco!</strong>
<!--            --><?php
//            if(isset($_POST['email']) && !empty($_POST['email'])){
//                if(mail($to,$subject,$body,$header)){ ?>
<!--                    <p class='alert-success mensagem-envio'>Mensagem enviada com sucesso!</p>-->
<!---->
<!--                    --><?php
//                } else{ ?>
<!--                    <p class='alert-danger mensagem-envio'>A mensagem não pode ser enviada. :(</p>-->
<!--                --><?php //}} ?>
            <form action="index.php" method="POST">

                <input type="text" name='nome' placeholder='Seu nome'>

                <input type="text" name='email' placeholder='Seu e-mail'>

                <input type="text" name='assunto' placeholder='Digite um assunto'>

                <textarea name="mensagem" id="message-text" placeholder='Mensagem'></textarea>
                <button type='submit' name='submit'>Enviar</button>
            </form>

        </div>
    </div>
</footer>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
<script src="../../resources/js/open-menu.js"></script>
</body>
</html>