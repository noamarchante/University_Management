// Archivo traducciones.js
	// Nombre: traducciones.js
	// Autor: 	Noa López Marchante
	// Fecha de creación: 20/11/2019 
    // Función: Configura la funcionalidad de las traducciones en front


//lee la funcion traducir
$(document).ready(function(){
    translatePage();
});

//función que traduce la pagina
function translatePage() {
    language = getCookie("language-selected");

    var lang=language, // Check the Browser language
        translate; // Container of all translations

    // Call translations json file and populate translate variable
    $.getJSON("../Locale/traducciones.json", function(texts) {
        translate=texts;
        // Translate all the element with data-translate
        translateElement("data-translate", translate, lang);
    });

//funcion que traduce un elemento
    function translateElement(elementName, translate, lang) {
        //coge elemento
        $("[" + elementName + "]").each(function() {
            let text= $(this).attr(elementName), // Save the Text into the variable
                numbers= text.match(/\d+/g),
                dinamicText = text.match(/%(.*?)%/g),
                element=  $('[' + elementName + '="'+text+'"]'),
                postHTML;

                //comprueba si es null
            if (dinamicText != null) {
                dinamicText.forEach(function(tag) { text = text.replace(tag, '%c'); });
            }//fin comprobacion null

            //comprueba numero
            if (numbers != null && numbers>1)
                text= text.replace(numbers, '%n');
            //comprueba traduccion
            if (translate[text]!==undefined) { // Check if exist the text in translation.json

                //comprueba lenguaje
                if (translate[text][lang]!==undefined) { // Check if exist the text in the language
                    postHTML= translate[text][lang];
                } else { // If not exist the lang, show the text in primary
                    postHTML= text;
                }//fin comprobacion

                //comprueba numeros
                if (numbers != null && numbers>1)
                    postHTML= postHTML.replace('%n', numbers);

                    //comprueba texto
                if (dinamicText != null) {
                    //recorre texto
                    dinamicText.forEach(function(tag) {
                        tag = tag.replace("%", "<b>");
                        tag = tag.replace("%", "</b>")
                        postHTML = postHTML.replace('%c', tag);
                    });//fin funcion
                }//fin texto

                // Set placeholders
                if (($(this)[0].tagName === "INPUT")) {
                    $('[' + elementName + '="'+text+'"]').attr("placeholder", postHTML);
                } else { //si si estan
                    element.html(postHTML);
                }//fin

            } else {//en otro caso
                $('[' + elementName + '="'+text+'"]').html("ERR").css({'color':'red','font-weight':'bold'});
            }//fin if
        });//fin funcion
    }//fin funcion traducir
}//fin