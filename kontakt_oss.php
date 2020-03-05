
<!DOCTYPE html>
<html>
 <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-44456092-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-44456092-2');
      gtag('set', {'user_id': 'USER_ID'}); // Angi User-ID ved hjelp av pålogget user_id.
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Viken Blockchain Solutions</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqBootstrapValidation/1.3.6/jqBootstrapValidation.js"></script>
 </head>
 <body>
      <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark navbar-custom">
        <div class="container"><a class="navbar-brand" href="index.html">Viken Blockchain Solutions</a><button data-toggle="collapse" class="navbar-toggler" data-target="#navbarResponsive"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Forside</a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="#">Kontakt Oss</a></li>
                </ul>
            </div>
        </div>
     </nav>
        <br />
        <br />
        <div class="container">
            <br>
            <br />
                <h2 align="center">Viken Blockchain Solutions</h2>
                <h3 align="center">Kontakt oss og vi gir deg en tilbakemelding innen 24 timer</h3>
            <br />

            <form id="simple_form" novalidate="novalidate">

                <div class="control-group">
                    <div class="form-group mb-0 pb-2">
                        <input type="text" name="contact_name" id="contact_name" class="form-control form-control-small" placeholder="Firmanavn" required="required" data-validation-required-message="Skriv firmanavn her." />
                        <p class="text-danger help-block"></p>
                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group">
                        <input type="email" name="contact_email" id="contact_email" class="form-control form-control-small" placeholder="Epost" required="required" data-validation-required-message="Skriv din epostadresse her." />
                        <p class="text-danger help-block"></p>

                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group">
                        <input type="tel" name="contact_mobile" id="contact_mobile" class="form-control form-control-small" placeholder="Mobilnr" required="required" data-validation-required-message="Skriv ditt mobilnummer her." pattern="^[0-9]{8}$" data-validation-pattern-message="8 siffer kreves." />
                        <p class="text-danger help-block"></p>

                    </div>
                </div>

                <div class="control-group">
                    <div class="form-group">
                        <textarea name="contact_message" id="contact_message" class="form-control form-control-small" rows="5" placeholder="Forespørsel" required="required" data-validation-required-message="Skriv din forespørsel her."></textarea>
                        <p class="text-danger help-block"></p>
                    </div>
                </div>
                <br />
                <div id="success"></div>
                <div class="form-group">
                 <button type="submit" class="btn btn-primary" id="send_button">Send</button>
                </div>
                <br />
                <br />
            </form>
        </div>
        <br />
        <br>
        <br>
        <footer class="py-5 bg-black">
            <div class="container">
              <p class="text-center text-white m-0 small">Copyright&nbsp;© Viken Blockchain Solutions 2020
              </p>
            </div>
        </footer>
</body>
</html>

<script>
$(document).ready(function(){

    $('#simple_form input, #simple_form textarea').jqBootstrapValidation({
     preventSubmit: true,
     submitSuccess: function($form, event){
      event.preventDefault();
      $this = $('#send_button');
      $this.prop('disabled', true);
      var form_data = $("#simple_form").serialize();
      $.ajax({
       url:"send.php",
       method:"POST",
       data:form_data,
       success:function(){
        $('#success').html("<div class='alert alert-success'><strong>Din forespørsel er blitt sendt.</strong></div>");
        $('#simple_form').trigger('reset');
       },
       error:function(){
        $('#success').html("<div class='alert alert-danger'>Det oppsto en feil ved sending. Prøv igjen senere.</div>");
        $('#simple_form').trigger('reset');
       },
       complete:function(){
        setTimeout(function(){
         $this.prop("disabled", false);
         $('#success').html('');
        }, 5000);
       }
      });
     },
    });

});
</script>
