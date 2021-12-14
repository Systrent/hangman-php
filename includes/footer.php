    </div>
    <footer id="footer" class="footer-admin fixed-bottom">
        <p class="footer-p-admin text-center">♥ Enjoy the game ♥</p>
    </footer>
    <br/>
    <br/>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!-- JQueryUI -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script>
    function showPassword(){
        let pass_type = document.getElementById("password");
        let icon_eye = document.getElementById("iconeye");
        if(pass_type.type == "password"){
            pass_type.type = "text";
            icon_eye.className = "fas fa-eye-slash";
        }else{
            pass_type.type = "password";
            icon_eye.className = "fas fa-eye";
        }
    }
    </script>
</body>

</html>