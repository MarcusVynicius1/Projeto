const controls = document.querySelectorAll(".control");
let currentItem = 0;
const items = document.querySelectorAll(".item");
const maxItems = items.length;

controls.forEach((control) => {
  control.addEventListener("click", (e) => {
    isLeft = e.target.classList.contains("arrow-left");

    if (isLeft) {
      currentItem -= 1;
    } else {
      currentItem += 1;
    }

    if (currentItem >= maxItems) {
      currentItem = 0;
    }

    if (currentItem < 0) {
      currentItem = maxItems - 1;
    }

    items.forEach((item) => item.classList.remove("current-item"));

    items[currentItem].scrollIntoView({
      behavior: "smooth",
      inline: "center"
    });

    items[currentItem].classList.add("current-item");
  });
});

function baixarPDF(){

    var texto1 = document.getElementById("um").value;
    var texto2 = document.getElementById("dois").value;
    var texto3 = document.getElementById("tres").value;
    var texto4 = document.getElementById("quatro").value;
    
    jQuery.ajax({
      type: "POST",
      url: 'salvarDadosProjeto.php',
      dataType: 'json',
      data: {functionname: 'salvar', arguments: [texto1, texto2, texto3, texto4]},
  
      success: function (obj, textstatus) {
                    if( !('error' in obj) ) {
                        yourVariable = obj.result;
                    }
                    else {
                        console.log(obj.error);
                    }
              }
    });
 
    var textoConcatenado = texto1 + "<br>" + "<br>" + texto2 + "<br>"+ "<br>" + texto3 + "<br>" + "<br>" + texto4;
    var text = textoConcatenado.split(/\r?\n/);
    var str = text.join('</br>'); 
    
    document.getElementById("gambi").innerHTML = str;
    let element = document.getElementById('gambi')
    html2pdf(element, {
      margin: 10,
      filename: 'EngSoft.pdf',
      fontsize: 30,
      html2canvas: {scale: 2, logging: true, dpi: 192, letterRendering: true},
      jsPDF: {unit: 'mm', format: 'a4', orientation: 'portrait'}
    }); 
  }
