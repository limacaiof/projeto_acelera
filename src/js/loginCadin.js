//Validação dos Campos
const fields = document.querySelectorAll(".formLogin [required]");

function ValidateField(field){
    function verifyErrors(){
        let foundError = false;
        for(let error in field.validity){
            if(field.validity[error] && !field.validity.valid){
                foundError = error;
            }
        }
        console.log("Error Exists",foundError);
        return foundError;
    }

    function customMessage(typeError){
        const message = {
            text:{
                value: "Por favor, preencha esse campo !"
            },
            email:{
                valueMissing: "Email é Obrigatório",
                typeMismatch: "Por favor, preencha um email valid" 
            }
        }
        return message[field.type][typeError];
    }
    function setCustomMessage(message){
        const spanError = field.parentNode.querySelector("span.error");
        if(message){
            spanError.classList.add("active");
            spanError.innerHTML = "Campo Obrigatório";
        }else{
            spanError.classList.remove("active");
            spanError.innerHTML = "";
        }
    }

    return function(){
        const error = verifyErrors();
        if(error){
            const message = customMessage(error);
            setCustomMessage(message);    
        }else{
            field.style.border= "2px solid green";
            setCustomMessage();
        }
    }
}


function customValidation(event){
    const field = event.target;
    const validation = ValidateField(field);
    validation();
}

//Adicionar aos input um evento de invalid, todo tipo campo invalido cairá nesse evento
for (let field of fields){
    field.addEventListener("invalid", event =>{
        //Eliminar o bubble
        event.preventDefault();
        customValidation(event);
    });
    field.addEventListener("blur", customValidation);

    field.addEventListener("mouseover", event =>{
        event.preventDefault();
        event.srcElement.style.backgroundColor = "red";
        event.srcElement.style.transitionDuration = ".5s"
    });
    field.addEventListener("mouseout", event =>{
        event.preventDefault();
        event.srcElement.style.backgroundColor = "white";
        event.srcElement.style.transitionDuration = ".1s"
    });
}

