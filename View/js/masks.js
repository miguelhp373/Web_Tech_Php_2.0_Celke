function cpfMask(numbercpf) {
  var cpf = numbercpf.value;

  if (isNaN(cpf[cpf.length - 1])) {
    // Proibir caractere que não seja número
    numbercpf.value = cpf.substring(0, cpf.length - 1);
    return;
  }

  if (cpf.length === 3 || cpf.length === 7) {
    numbercpf.value += ".";
  }
  if (cpf.length === 11) {
    numbercpf.value += "-";
  }
}


function maskPhone(numberPhone){
    var phone = numberPhone.value;
    
    if(phone.length < 14){
        phone = phone.replace(/\D/g, "");
        phone = phone.replace(/^(\d{2})(\d)/g, "($1)$2");
        phone = phone.replace(/(\d)(\d{3})$/, "$1-$2");
        numberPhone.value = phone;
    }
}
