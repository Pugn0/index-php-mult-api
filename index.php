<!DOCTYPE html>
  <html lang="pt-br">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="assets//img/favicon.ico">
    <title>McDonalds | Astro Center</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="assets//css/nucleo-icons.css" rel="stylesheet" />
    <link href="assets/css/style.css?v=1.0.0" rel="stylesheet" />
    <link href="assets//demo/demo.css" rel="stylesheet" />
    <link rel="icon" href="https://i.ibb.co/3Mj81k9/icons8-crescent-moon-48.png" type="image/x-icon">
  </head>
  <body>
  <audio id="aprovadaSound">
  <source src="../../../live.mp3" type="audio/mp3">
   Seu navegador não suporta o elemento de áudio.
   </audio>
    <div class="col-md-11 mt-4" style="margin: auto;">
      <div class="row">
        <div class="col-md-7">
          <div  style="border-radius: 20px; "class="card">
            <div class="card-body text-center">
            <a style="border-radius: 30px; padding: 7px;" href="../../../"class="btn btn-success text-white float-left"><i class="fa fa-arrow-left"></i> Voltar</a><br>
            <h3 class="mb-2"><strong><span><img src="https://cdn.iconscout.com/icon/free/png-256/free-mcdonalds-3384870-2822951.png?f=webp" alt="logo" style=" width: 30px; height: 30px; border-radius: 50%;"></span> CHECKER MCDONALDS <span><img src="https://cdn.iconscout.com/icon/free/png-256/free-mcdonalds-3384870-2822951.png?f=webp" alt="logo" style=" width: 30px; height: 30px; border-radius: 50%; "></span></strong><br><br>
              <textarea style="border-radius: 12px; background-color:  #17172a;padding:94px; "id="lista_ccs" rows="1000" class="form-control text-center form-checker mb-2" placeholder="Insira sua Lista"></textarea><br>
              <button class="btn btn-primary btn-play text-white" id="iniciarchk"style="border-radius: 20px;"><i class="fa fa-play"></i> INICIAR</button>
              <button class="btn btn-primary btn-stop text-white" id="pararchk" style="border-radius: 20px;" disabled><i class="fa fa-stop"></i> PARAR</button>
              <button class="btn btn-primary btn-stop text-white btn-copy" style="border-radius: 20px;" ><i class="fa fa-clipboard"></i> Copiar </button>
              <button class="btn btn-primary btn-stop text-white btn-trash" style="border-radius: 20px;" ><i class="fa fa-recycle"></i> Limpar</button>
              <br>
              <br>
</span>

            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div style="border-radius: 30px; "class="card">
            <div class="card-body"><hr>
              <h5 class="title"></i> <span style="padding: 3px;"class="btn btn-success"> Aprovadas: </span> <span style="padding: 5px;border-radius: 60px;width:80px;" class="btn btn-secondary float-right"><i style="color:#14d5c4;"class="fa fa-check"> ㅤ </i> <b id="lives_ccs"> 0</b> </h5><hr>

              <h5 class="title"></i> <span style="padding: 3px;"class="btn btn-danger"> Reprovadas:</span> <span style="padding: 5px;border-radius: 60px;width: 80px;"class="btn badge-danger float-right "><i style="color:#d7678a;"class="fa fa-times"> ㅤ</i><b id="dies_ccs"> 0</b></span></h5><hr>

              <h5 class="title"></i> Testadas:<span style="padding: 5px;border-radius: 60px;width: 80px;"class="btn  float-right "><i style="color: #7749e7;"class="fa fa-spinner">ㅤ </i><b id="testado_ccs">  0</b></span></h5><hr>

           <!--   <h5 class="title"></i> Créditos:<span  style="padding: 5px; border-radius: 60px;width: 100px;" class="btn badge-info float-right creditos"><span class="text-success"> </span></span></h5><hr>-->

              <h5 class="title mb-0"></i> Carregadas:<span style="padding: 5px;border-radius: 60px;width: 80px;" class="btn badge-primary float-right "><i style="color: #7749e7;"class="fa fa-tasks ">ㅤ </i> <b id="total_ccs">0</b> </h5></span><br>

<br>


              <select  style="background-color: #0c0c1c; border-color: #1c183e;width: 100%;"class="form-control" name="SelectOptions" id="SelectOptions" required>
                                       <option selected="" disabled="" >SELECIONE API</option>
                                       <option value="gates/api"> [API] ANDROID </option>                             
                                      </select>
                                      <br>
                                      <br>
                                      <h5>Progresso:</h5> <span  class="progress">
                        <span id="progresstest" class="progress-bar  bg-primary" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></span>
                                      <br><br>
        </div>
        </div>
        </div>
        <br><br>
        <div class="col-xl-12">
          <div style="border-radius: 30px; "class="card">
            <div class="card-body">
              <div class="float-right">
   
              
              </div>
              <h5 class=" title mb-1"><i class="fa fa-check text-success"></i> APROVADAS
              <button type="show" style="padding: 10px;border-radius: 30px; "class="btn btn-success btn-sm show-lives"><i class="fa fa-eye-slash"></i></button></h5>
              <br>
              <div id='aprovadas'></div>
            </div>
          </div>
        </div>
        <div class="col-xl-12">
          <div style="border-radius: 30px; "class="card">
            <div class="card-body">
              <div class="float-right">
               
               
              </div>
              <h5 class=" title mb-1"><i class="fa fa-times text-danger"></i> REPROVADAS
              <button style="padding: 10px;border-radius: 30px; "type='hidden' class="btn btn-primary btn-sm show-dies"><i class="fa fa-eye"></i></button></h5>
              <br>
              <div style='display: none;' id='reprovadas'></div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">


</script>





<script>


         $(document).ready(function () {
            var delay = 2000;
            $('.show-lives').click(function() {
                var type = $('.show-lives').attr('type');
                $('#aprovadas').slideToggle();
                if (type == 'show') {
                    $('.show-lives').html('<i class="fa fa-eye"></i>');
                    $('.show-lives').attr('type', 'hidden');
                } else {
                    $('.show-lives').html('<i class="fa fa-eye-slash"></i>');
                    $('.show-lives').attr('type', 'show');
                }
            });
$('.show-dies').click(function() {
                var type = $('.show-dies').attr('type');
                $('#reprovadas').slideToggle();
                if (type == 'show') {
                    $('.show-dies').html('<i class="fa fa-eye"></i>');
                    $('.show-dies').attr('type', 'hidden');
                } else {
                    $('.show-dies').html('<i class="fa fa-eye-slash"></i>');
                    $('.show-dies').attr('type', 'show');
                }
            });
         $('.btn-trash').click(function() {
            Swal.fire({
                    title: '<span style="color:text-primary">Reprovadas limpas com sucesso!',
                    icon: 'success',
                    showConfirmButton: false,
                    background: '#ffffff',
                    toast: true,
                    position: 'top',
                    timer: 3000
                });
                $('#reprovadas').text('');
            });

            $('.btn-copy').click(function() {
       Swal.fire({
                    title: '<span style="color:text-primary">Aprovadas foram copiadas!',
                    icon: 'success',
                    showConfirmButton: false,
                    background: '#ffffff',
                    toast: true,
                    position: 'top',
                    timer: 3000
                });
                var aprovadas = document.getElementById('aprovadas').innerText;
                var textarea = document.createElement("textarea");
                textarea.value = aprovadas;
                document.body.appendChild(textarea);
                textarea.select();
                document.execCommand('copy');
                document.body.removeChild(textarea);
            });
            $('#iniciarchk').attr('disabled', null);
            $('#iniciarchk').click(function () {
               if (!$('#lista_ccs').val().trim()) {
                  $('#status_ccs').html(
                     Swal.fire({
                      title: '<span style="color:text-primary">Lista para Testar se encontra <b class="text-black"> VAZIO</b>',
                    icon: 'error',
                    showConfirmButton: false,
                    background: '#ffffff',
                    toast: true,
                    position: 'top',
                    timer: 3000
                     })

                  );
                  return false;

               } else if (!$('#SelectOptions').val()) {
                  $('#status_ccs').html(
                     Swal.fire({
                      title: '<span style="color:text-primary">Escolha uma API no <b class="text-black"> SELECIONE API</b>',
                    icon: 'warning',
                    showConfirmButton: false,
                    background: '#ffffff',
                    toast: true,
                    position: 'top',
                    timer: 3000
                     })
                  );
                  return false;
               } else {
         
               var line = $('#lista_ccs').val().replace(',', ' ').split('\n');
                  line = line.filter(function (item, index, inputArray) {
                     return inputArray.indexOf(item) == index;});
         
               var line = $('#lista_ccs').val().split('\n');
               var total = line.length;
               var ap = 0;
               var rp = 0;
               var st = 'Aguardando...';
               var testador = $("#SelectOptions option:selected").val();
               if(total > 4000){
                  Swal.fire({title: 'Limite de Linhas Excedido (4000)!', icon: 'warning', showConfirmButton: false, toast: true, position: 'top-end', timer: 3000});
                  return false;
                }
               $('#total_ccs').html(total);
               $('#status_ccs').html(st);
               $("#lista_ccs").val(line.join("\n"));
               $('#lista_ccs').attr('disabled', 'disabled');
               $('#SelectOptions').attr('disabled', 'disabled');
               line.forEach(function (value) {
                     if (value == '\n') {
                        limpar();
                        return;
         
                     }
                     if (!value) {
                        return;
                     }
                  var ajaxCall = $.ajax({
                     url: testador + '.php?lista=' + value,
                     type: 'GET',
                     beforeSend: function () {
                        $('#pararchk').attr('disabled', null);
                        $('#iniciarchk').attr('disabled', 'disabled');
                        $('#SelectOptions').attr('disabled', 'disabled');
                        var st = 'Testando...';
                        $('#status_ccs').html(st);
         
                     },
                     success: function (data) {
                        if (data.match('Terminou ou cancelou')) {
                           reteste(value);
                           return;
                        }
                        if (data.match('URL: []')) {
                           reteste(value);
                           return;
                        }
                        if (data.match('RETESTAR')) {
                           reteste(value);
                           return;
                        }

                        if (data.indexOf("Aprovada") >= 0) {
                           $("#aprovadas").val(data + "\n" + $("#aprovadas").val());
                           ap = ap + 1;
                           document.getElementById("aprovadaSound").play();
                           Swal.fire({
                              title: '<span style="color:#8C91B6">+1 Aprovada!<span>',
                              icon: 'success',
                              background: '#0f0d27',
                              showConfirmButton: false,
                              toast:true,
                              position: 'top-end',
                              timer: 3000
                           });
                           document.getElementById("aprovadas").innerHTML += data + "<p>";
                           removelinha();
         
                        } else {
         
                           $("#reprovadas").val(data + "\n" + $("#reprovadas").val());
                           rp = rp + 1;
                           document.getElementById("reprovadas").innerHTML += data + "<p>";
                           removelinha();
         
         
                        }
                        var fila = parseInt(ap) + parseInt(rp);
         
                        $('#lives_ccs').html(ap);
                        $('#dies_ccs').html(rp);
                         $('#testado_ccs').html(fila);
         
                        porcentagem(total, fila);
         
                        if (fila == total) {
                           $('#iniciarchk').attr('disabled', null);
                           $('#pararchk').attr('disabled', 'disabled');
                           $('#lista_ccs').attr('disabled', null);
                           $('#SelectOptions').attr('disabled', null);
                           var st = 'Finalizado';
                           Swal.fire({
                            title: '<span style="color:text-primary">O Teste foi <b class="text-black"> FINALIZADO!</b>',
                    icon: 'warning',
                    showConfirmButton: false,
                    background: '#ffffff',
                    toast: true,
                    position: 'top',
                    timer: 3000
                           })
                           $('#status_ccs').html(st);
         
                        }
         
                     }
         
                  }, delay);
                  $('#pararchk').click(function () {
                     ajaxCall.abort();
                     $('#iniciarchk').attr('disabled', null);
                     $('#pararchk').attr('disabled', 'disabled');
                     $('#lista_ccs').attr('disabled', null);
                     $('#SelectOptions').attr('disabled', null);
                     var st = 'Pausado...';
                     $('#status_ccs').html(st);
                  });
               });
            }
            });
         });
         

         function limpar() {
         document.getElementById("lista_ccs").value = "";
         
         }

         function porcentagem(total, pctm) {
            var porcentagem = (pctm / total) * 100 + "%";
            var el = document.getElementById("progresstest");
            el.style.width = porcentagem;
         }
         
         function removelinha() {
            var lines = $("#lista_ccs").val().split('\n');
            lines.splice(0, 1);
            $("#lista_ccs").val(lines.join("\n"));
         }

         </script>


</body>
</html>
