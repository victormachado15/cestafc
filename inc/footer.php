 <div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            -->
         
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script src="js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>


  
<script type='text/javascript'>
    
    $(document).ready(function(){     
          
          $("#pesquisa").keyup(function() {

              var pesquisa = $("#pesquisa").val();
              if(pesquisa.length > 2){
                var url = "consulta-eleitor-nome.php?pesquisa="+pesquisa

                var xhttp;
                xhttp = new XMLHttpRequest();

                xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                  
                  document.getElementById("resultado").innerHTML = this.responseText;
                  
                  }
                };
                xhttp.open("GET", "consulta-eleitor-nome.php?pesquisa="+pesquisa, true);
                xhttp.send();  
              }
        });
    });

        document.addEventListener('DOMContentLoaded', ()=> {
            const form = document.getElementById('form_consulta');
            form.addEventListener('submit', (e)=> {
                e.preventDefault();
            });
        });
</script> 


    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
    </script>
<script type='text/javascript'>
    
    $(document).ready(function(){     
          
          $("#buscar").click(function() {

              var titulo = $("#titulo").val();
              var matric = $("#matric").val();
              var valido = 1;
              if((titulo.length == 0) && (matric.length == 0)){
                      alert("Por favor, informe o CPF e Matrícula!");
                      valido = 0;
              }else{  
                  if (titulo.length == 0) {
                          alert("Por favor, informe o CPF!");
                          valido = 0;
                  }
                  if (matric.length == 0) {
                          alert("Por favor, informe a Matrícula!");
                          valido = 0;
                  }
              }
              var url = "consulta-eleitor.php?titulo="+titulo+"matricula="+matric;

              var xhttp;
              xhttp = new XMLHttpRequest();

              xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200 && valido == 1) {
                
                document.getElementById("resultado").innerHTML = this.responseText;
                $('#section-buscar').hide();
                }
            };
            xhttp.open("GET", "consulta-eleitor.php?titulo="+titulo, true);
            xhttp.send();  
        });
    });

        document.addEventListener('DOMContentLoaded', ()=> {
            const form = document.getElementById('form_consulta');
            form.addEventListener('submit', (e)=> {
                e.preventDefault();
            });
        });
        
</script>   

<script type="text/javascript">
  $(document).ready(function(){ 
        // Get the input field
      var input = document.getElementById("titulo");

      // Execute a function when the user releases a key on the keyboard
      input.addEventListener("keyup", function(event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
          // Cancel the default action, if needed
          event.preventDefault();
          // Trigger the button element with a click
          document.getElementById("buscar").click();
        }
      });
  });
</script>


</body>
</html>