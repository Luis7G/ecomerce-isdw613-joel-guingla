function suma(a, b) {
    return a + b;
}

console.log("Hola mundo!" + suma(2, 3));

function initializePage() {
    console.log("******Onload Completed******");
    console.log(navigator.userAgent);
    console.log(navigator.language);
    console.log(navigator.languages);
    console.log(navigator.onLine);
    // Tarea, durante la practica -s Implementar la funcionalid de copiado
    //console. log( navigator.ap);
    //Creen un inut text con algun texto predefinido —s un boton "Copiar"-> Copie en eI clipboard
    //Pegar eI texto en un notepad, en algun elemento visual que permita comprobar que se ha copiado


    const input = document.createElement("input");
    input.type = "text";
    input.value = "Este es el texto que se copiará";
  
    const button = document.createElement("button");
    button.textContent = "Copiar";
  
    document.body.appendChild(input);
    document.body.appendChild(button);
  
    button.addEventListener("click", () => {
      const texto = input.value;
      navigator.clipboard.writeText(texto);
    });
}