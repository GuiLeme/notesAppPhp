function verifica(){
    checks = document.getElementsByClassName('check')

    lis = []
    for (i=0;i<checks.length;i++){
        lis.push(checks[i].checked)
    }

    lisStr = listToStr(lis)
    
}

function listToStr(lista){
    str = ''
    for (i=0; i<lista.length;i++){
        if (i == lista.length){
            str += lista[i]
        }
        else{
            str += lista[i] + ','
        }
    }
    return str
}