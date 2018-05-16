function validateFields(e) {
    let isValid      = false;
    let validFields  = 0;
    const errorMsg   = "Dit veld is vereist";
    let input_fields = document.querySelectorAll("input[type=text]");
    let text_el      = document.querySelector('textarea');
    let error_el     = document.querySelectorAll("span.hidden");
    console.log(text_el.childNodes);
    console.log(text_el.childNodes.length);


    for (let i = 0, len = input_fields.length; i < len;i++) {

        if(input_fields[i].value.trim() === "") {

            input_fields[i].classList.add('is-invalid');
            error_el[i].classList.add('invalid-field');
            error_el[i].innerHTML = errorMsg;

        } else {
            input_fields[i].classList.remove('is-invalid');
            error_el[i].classList.remove('invalid-field');
            error_el[i].innerHTML = "";
            validFields++;
        }
    }
    if (validFields == input_fields.length) { isValid = true;}
    if (!isValid) { e.preventDefault(); }

}

function bindEvents() {
    let submitBtn = document.getElementById('submit-btn');
    submitBtn.addEventListener('click', validateFields);
}
bindEvents();