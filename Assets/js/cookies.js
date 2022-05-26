
  function filtrarNombre(value) {

    if(value == null){
      document.cookie = escape("cookieNombre") + "=" + "" + expires + "; path=/";
      location.reload();
    }
    expires = "";
    document.cookie = escape("cookieNombre") + "=" + escape(value) + expires + "; path=/";
    location.reload();

  }

  function filtrarPrecios(value){

    
    if(isNaN(value)){
      alert("Tienes que insertar un monto valido");
    }else{
      expires = "";
      document.cookie = escape("cookiePrecio") + "=" + escape(value) + expires + "; path=/";
      location.reload();
    }

  }